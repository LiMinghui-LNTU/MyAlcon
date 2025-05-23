<?php

namespace Drupal\samlauth\Controller;

use Drupal\Component\Utility\UrlHelper;
use Drupal\Core\Cache\CacheableResponse;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\Path\PathValidatorInterface;
use Drupal\Core\Render\RendererInterface;
use Drupal\Core\Site\Settings;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Url;
use Drupal\Core\Utility\Error;
use Drupal\Core\Utility\Token;
use Drupal\samlauth\SamlService;
use Drupal\samlauth\UserVisibleException;
use OneLogin\Saml2\Metadata;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

/**
 * Returns responses for samlauth module routes.
 */
class SamlController extends ControllerBase {

  use ExecuteInRenderContextTrait;
  use StringTranslationTrait;

  /**
   * Name of the configuration object containing the setting used by this class.
   */
  const CONFIG_OBJECT_NAME = 'samlauth.authentication';

  /**
   * The samlauth SAML service.
   *
   * @var \Drupal\samlauth\SamlService
   */
  protected $saml;

  /**
   * The request stack.
   *
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  protected $requestStack;

  /**
   * The PathValidator service.
   *
   * @var \Drupal\Core\Path\PathValidatorInterface
   */
  protected $pathValidator;

  /**
   * The renderer service.
   *
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected $renderer;

  /**
   * The token service.
   *
   * @var \Drupal\Core\Utility\Token
   */
  protected $token;

  /**
   * The messenger service.
   *
   * @var \Drupal\Core\Messenger\MessengerInterface
   */
  protected $messenger;

  /**
   * A logger instance.
   *
   * @var \Psr\Log\LoggerInterface
   */
  protected $logger;

  /**
   * SamlController constructor.
   *
   * @param \Drupal\samlauth\SamlService $saml
   *   The samlauth SAML service.
   * @param \Symfony\Component\HttpFoundation\RequestStack $request_stack
   *   The request stack.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   * @param \Drupal\Core\Path\PathValidatorInterface $path_validator
   *   The PathValidator service.
   * @param \Drupal\Core\Render\RendererInterface $renderer
   *   The Renderer service.
   * @param \Drupal\Core\Utility\Token $token
   *   The token service.
   * @param \Drupal\Core\Messenger\MessengerInterface $messenger
   *   The messenger service.
   * @param \Psr\Log\LoggerInterface $logger
   *   A logger instance.
   */
  public function __construct(SamlService $saml, RequestStack $request_stack, ConfigFactoryInterface $config_factory, PathValidatorInterface $path_validator, RendererInterface $renderer, Token $token, MessengerInterface $messenger, LoggerInterface $logger) {
    $this->saml = $saml;
    $this->requestStack = $request_stack;
    $this->configFactory = $config_factory;
    $this->pathValidator = $path_validator;
    $this->renderer = $renderer;
    $this->token = $token;
    $this->messenger = $messenger;
    $this->logger = $logger;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('samlauth.saml'),
      $container->get('request_stack'),
      $container->get('config.factory'),
      $container->get('path.validator'),
      $container->get('renderer'),
      $container->get('token'),
      $container->get('messenger'),
      $container->get('logger.channel.samlauth')
    );
  }

  /**
   * Initiates a SAML2 authentication flow.
   *
   * This route does not log us in (yet); it should redirect to the Login
   * service on the IdP, which should be redirecting back to our ACS endpoint
   * after authenticating the user.
   *
   * @param bool $force_auth
   *   (optional) Tell the IdP to force authentication. This should present an
   *   authentication mechanism to the user even if they are logged in already
   *   from the IdP's viewpoint. It's up to the IdP to actually implement this.
   *
   * @return \Drupal\Core\Routing\TrustedRedirectResponse
   *   The HTTP response to send back.
   */
  public function login($force_auth = FALSE) {
    // $function returns a string and supposedly never calls 'external' Drupal
    // code... so it wouldn't need to be executed inside a render context. The
    // standard exception handling does, though.
    $function = function () use ($force_auth) {
      return $this->saml->login($this->getUrlFromDestination(), [], $force_auth);
    };
    // This response redirects to an external URL in all/common cases. We count
    // on the routing.yml to specify that it's not cacheable.
    return $this->getShortenedRedirectResponse($function, $force_auth ? $this->t('initiating SAML login with forced authentication') : $this->t('initiating SAML login'), '<front>');
  }

  /**
   * Initiates a SAML2 authentication flow specifying forced (re)authentication.
   *
   * This is likely only useful for testing; regular users with an active SSO
   * session (at the IdP) in their browser do not usually want to
   * reauthenticate. This route is not mentioned anywhere else.
   *
   * @return \Drupal\Core\Routing\TrustedRedirectResponse
   *   The HTTP response to send back.
   */
  public function reauth() {
    return $this->login(TRUE);
  }

  /**
   * Initiates a SAML2 logout flow.
   *
   * According to the SAML spec, this route does not log us out (yet); it
   * should redirect to the SLS service on the IdP, which should be redirecting
   * back to our SLS endpoint (possibly first logging out from other systems
   * first). We do usually log out before redirecting, though.
   *
   * @return \Drupal\Core\Routing\TrustedRedirectResponse
   *   The HTTP response to send back.
   */
  public function logout() {
    // $function returns a string and supposedly never calls 'external' Drupal
    // code... so it wouldn't need to be executed inside a render context. The
    // standard exception handling does, though.
    $function = function () {
      return $this->saml->logout($this->getUrlFromDestination());
    };
    // This response redirects to an external URL in all/common cases. We count
    // on the routing.yml to specify that it's not cacheable.
    return $this->getShortenedRedirectResponse($function, $this->t('initiating SAML logout'), '<front>');
  }

  /**
   * Displays service provider metadata XML for iDP autoconfiguration.
   *
   * @return \Symfony\Component\HttpFoundation\Response
   *   The HTTP response to send back.
   */
  public function metadata() {
    $config = $this->config(self::CONFIG_OBJECT_NAME);
    try {
      // Undocumented except in warnings: ?with-errors=1 may output invalid XML.
      $check = $this->requestStack->getCurrentRequest()->get('check');
      // Things we need to take into account:
      // - The validUntil and cacheDuration properties are optional in the
      //   SAML spec, but the SAML PHP Toolkit always assigns values. (At the
      //   time of checking: "2 days into the future" and "1 week",
      //   respectively. No reason provided for these figures.)
      // - The only info we can find so far is one hint at wiki.shibboleth.net
      //   MetadataManagementBestPractices: "[cacheDuration] is merely a hint
      //   but metadata expiration [validUntil] is absolute". This matches bug
      //   reports: if we send a validUntil in the past, logins stop working.
      // - We want the HTTP response (with XML contents) to be cacheable
      //   (which, hand-wavy, means 2 things: the Drupal render cache which is
      //   controlled by CacheableResponse, and whatever other HTTP proxies
      //   there may be which are controlled by HTTP headers.) Unlike the
      //   SAML validUntil, we can turn this off for testing.
      // - Once a cacheable response is sent, (we'll assume) we cannot purge it.
      //   Once any response is sent, we cannot purge data from the requester
      //   (IdP).
      // So:
      // - We must make sure no validUntil date in a cached response is ever in
      //   the past - i.e. it must be equal/larger than the response 'expires'
      //   value.
      // - For configuration values, let's make the 'validUntil period'
      //   configurable, plus a checkbox for response caching. Let's set the
      //   response expiry to (validUntil - 10 seconds) to sidestep weird
      //   response delays.
      // - For the cacheDuration value, we don't have much of an idea what is a
      //   good value - except, given the above defaults, it apparently doesn't
      //   matter much if it is a lot higher than validUntil. A cached response
      //   on our side could in extreme circumstances indicate a 'validUntil'
      //   of 10 seconds from now, and a 'cacheDuration' of a week. Is that
      //   bad? Apparently not, if "validUntil is absolute".
      $metadata_valid = $config->get('metadata_valid_secs') ?: Metadata::TIME_VALID;
      $metadata = $this->saml->getMetadata(time() + $metadata_valid, NULL, $check === '0');

      // Default is TRUE for existing installs.
      if ($config->get('metadata_cache_http') ?? TRUE) {
        $response = new CacheableResponse($metadata, 200, ['Content-Type' => 'text/xml']);
        $response->setMaxAge($metadata_valid > 10 ? $metadata_valid - 10 : $metadata_valid);
        // Response should be un-cached if the configured validity increases.
        // Setting a dependency on the whole config is a bit crude but will do.
        $response->addCacheableDependency($config);
      }
      else {
        $response = new Response($metadata, 200, ['Content-Type' => 'text/xml']);
      }
    }
    catch (\Exception $e) {
      // This (invoking the exception handling that executes inside a render
      // context) is an awfully convoluted way of handling the exception - but
      // it reuses code and generates the redirect response in a 'protected'
      // way. (Is it even useful to redirect to the front page with an error
      // message? It will not help non-humans requesting the XML document. But
      // humans checking this path will at least see a better hint of what's
      // going on, than if we just return Drupal's plain general exception
      // response. And rendering an error page without redirecting... seems too
      // much effort.)
      // @todo really, though? Why not just output the response either as
      //   a small plain text or fake XML, containing just the exception text?
      $function = function () use ($e) {
        throw $e;
      };
      $response = $this->getTrustedRedirectResponse($function, $this->t('processing SAML SP metadata'), '<front>');
    }

    return $response;
  }

  /**
   * Performs the Attribute Consumer Service.
   *
   * This is usually the second step in the authentication flow; the Login
   * service on the IdP should redirect (or: execute a POST request to) here.
   *
   * @return \Symfony\Component\HttpFoundation\Response
   *   The HTTP response to send back.
   */
  public function acs() {
    // We don't necessarily need to wrap our code in a render context: because
    // our redirect is always internal, we could work with a plain
    // non-cacheable RedirectResponse which will not cause a "leaked metadata"
    // exception even if some code leaks metadata. But we'll use the same
    // pattern as our other routes, for consistency/code reuse, and to log more
    // possible 'leaky' code. We count on the routing.yml to specify the
    // response is not cacheable.
    $function = function () {
      $ok = $this->saml->acs();
      return $this->getRedirectUrlAfterProcessing(TRUE, !$ok);
    };
    return $this->getTrustedRedirectResponse($function, $this->t('processing SAML authentication response'), '<front>');
  }

  /**
   * Performs the Single Logout Service.
   *
   * This is usually the second step in the logout flow; the SLS service on the
   * IdP should redirect here.
   *
   * @return \Symfony\Component\HttpFoundation\Response
   *   The HTTP response to send back.
   */
  public function sls() {
    $function = function () {
      return $this->saml->sls() ?: $this->getRedirectUrlAfterProcessing();
    };
    // This response redirects to an external URL in most cases. (Except for
    // SP-initiated logout that was initially started from this SP, i.e.
    // through the logout() route). We count on the routing.yml to specify that
    // it's not cacheable.
    return $this->getShortenedRedirectResponse($function, $this->t('processing SAML single-logout response'), '<front>');
  }

  /**
   * Redirects to a 'Change Password' URL on the IdP.
   *
   * This is not officially SAML functionality. This route is used on the user
   * account edit form. It's kept accessible to only logged-in users so that
   * the redirect URL cannot be discovered by anonymous users.
   *
   * @return \Symfony\Component\HttpFoundation\RedirectResponse
   *   The HTTP response to send back.
   */
  public function changepw() {
    $function = function () {
      $url = $this->config(self::CONFIG_OBJECT_NAME)->get('idp_change_password_service');
      if (!$url) {
        throw new UserVisibleException("Change password service is not available.");
      }
      return $url;
    };
    $response = $this->getTrustedRedirectResponse($function, $this->t('redirecting to changepw URL'), '<front>');
    $response->addCacheableDependency($this->config(self::CONFIG_OBJECT_NAME));
    return $response;
  }

  /**
   * Constructs a full URL from the 'destination' parameter.
   *
   * Also unsets the destination parameter. This is only considered suitable
   * for feeding a URL string into php-saml's login() / logout() methods.
   *
   * @return string|null
   *   The full absolute URL (i.e. our hostname plus the path in the destination
   *   parameter), or NULL if no destination parameter was given. This value is
   *   tuned to what login() / logout() expect for an input argument.
   *
   * @throws \Drupal\samlauth\UserVisibleException
   *   If the destination is disallowed.
   *
   * @see \Drupal\Core\Security\RequestSanitizer::processParameterBag()
   */
  protected function getUrlFromDestination() {
    $destination_url = NULL;
    $request_query_parameters = $this->requestStack->getCurrentRequest()->query;
    $destination = $request_query_parameters->get('destination');
    if ($destination) {
      // No need to check for external URL because Core >= 8.6.2 filters those;
      // see processParameterBag().
      // @todo in 4.x, remove this if() for simplicity?
      if (UrlHelper::isExternal($destination)) {
        // Disallow redirecting to an external URL after we log in.
        throw new UserVisibleException('Destination URL query parameter must not be external: @destination', ['@destination' => $destination]);
      }

      // When a destination is provided with a starting slash, it is assumed to
      // include the base path already.
      $base_path = $this->requestStack->getCurrentRequest()->getBasePath();
      if (str_starts_with($destination, '/')) {
        if (str_starts_with($destination, $base_path)) {
          // Remove base_path from the destination URI.
          $destination = substr($destination, strlen($base_path));
        }
      }
      else {
        $destination = '/' . $destination;
      }
      $destination_url = Url::fromUri('internal:' . $destination)->setAbsolute()->toString(TRUE)->getGeneratedUrl();

      // After we return from this controller, Drupal immediately redirects to
      // the path set in the 'destination' parameter (for the current URL being
      // handled). We want to always redirect to the IdP instead (and only use
      // $destination_url after the user gets redirected back here), so remove
      // the parameter.
      $request_query_parameters->remove('destination');
    }

    return $destination_url;
  }

  /**
   * Returns a URL to redirect to.
   *
   * This should be called only after processing an ACS/logout response.
   *
   * @param bool $after_acs
   *   (Optional) TRUE if an ACS request was just processed.
   * @param bool $ignore_relay_state
   *   (Optional) TRUE if the RelayState parameter in the current request
   *   should not be used.
   *
   * @return \Drupal\Core\Url
   *   The URL to redirect to.
   */
  protected function getRedirectUrlAfterProcessing($after_acs = FALSE, $ignore_relay_state = FALSE) {
    if (!$ignore_relay_state) {
      $relay_state = $this->requestStack->getCurrentRequest()->get('RelayState');
      if ($relay_state) {
        // Check relay state URL; if it's unsafe then just fall back to the default.
        $url = $this->ensureSafeRelayState($relay_state, $after_acs);
      }
    }

    if (empty($url)) {
      // If no url was specified, we check if it was configured.
      $url = $this->config(self::CONFIG_OBJECT_NAME)->get($after_acs ? 'login_redirect_url' : 'logout_redirect_url');
      $url = $this->token->replace($url);
    }

    if ($url) {
      // We don't check access here. If a URL was explicitly specified, we
      // prefer returning a 403 over silently redirecting somewhere else.
      $url_object = $this->pathValidator->getUrlIfValidWithoutAccessCheck($url);
      if (empty($url_object)) {
        $type = $after_acs ? 'Login' : 'Logout';
        $this->logger->warning("The $type Redirect URL is not a valid path; falling back to default.");
      }
    }

    if (empty($url_object)) {
      // If no url was configured, fall back to a hardcoded route.
      if ($this->currentUser()->isAuthenticated()) {
        $url_object = Url::fromRoute('entity.user.canonical', ['user' => $this->currentUser()->id()]);
      }
      else {
        $url_object = Url::fromRoute('<front>');
      }
    }

    return $url_object;
  }

  /**
   * Checks a relay state URL for safety.
   *
   * A relay state can be unsafe if it was set explicitly by the IdP, or if
   * a request from the /saml/login endpoint was intercepted and altered (e.g.
   * by forwarding it in an email).
   *
   * While not 100% guaranteed, this protected method is likely to keep
   * existing over major versions. Systems which need nonstandard checks, can
   * modify the acs / sls routes to a child class that overrides this method.
   * The standard (only?) situation when this method is called, is when
   * login/logout is already done, so after returning an empty string, the
   * caller just redirects to a default URL instead. If you must, you can throw
   * an exception; see handleExceptionInRenderContext() for how these are
   * handled.
   *
   * @param string $relay_state
   *   The relay state to check
   * @param bool $after_acs
   *   (Optional) TRUE if an ACS request was just processed.
   *
   * @return string
   *   A safe URL (likely the unchanged input parameter), or empty string to
   *   indicate that the caller should take appropriate action.
   */
  protected function ensureSafeRelayState(string $relay_state, bool $after_acs = FALSE): string {
    $safe_url = '';

    if (!UrlHelper::isValid($relay_state, TRUE)) {
      $this->logger->warning('Invalid RelayState parameter found in request; ignoring: @relaystate', ['@relaystate' => $relay_state]);
    }
    else {
      $safe = FALSE;
      // Only allow hostnames set as trusted hosts. If no trusted hosts are
      // set (which is unlikely because this prompts an error in the Core status
      // report), then only allow the hostname from the current request.
      // @todo remove the config option in v4.x (always check trusted_host_patterns).
      //   also: replace base_url by router.request_context everywhere in the module.
      if (!$this->config(self::CONFIG_OBJECT_NAME)->get('bypass_relay_state_check')) {
        $trusted_patterns = Settings::get('trusted_host_patterns');
        if ($trusted_patterns) {
          $redirect_host = parse_url($relay_state, PHP_URL_HOST);
          foreach ($trusted_patterns as $pattern) {
            if (preg_match("[$pattern]i", $redirect_host)) {
              $safe = TRUE;
              break;
            }
          }
        }
        else {
          $safe = !UrlHelper::isExternal($relay_state) || UrlHelper::externalIsLocal($relay_state, $GLOBALS['base_url']);
        }
        if (!$safe) {
          $this->logger->warning('Untrusted external RelayState parameter found in request; ignoring: @relaystate', ['@relaystate' => $relay_state]);
        }
      }

      // The SAML toolkit set a default RelayState to itself
      // (saml/log(in|out)) when starting the process, which will just cause
      // an unnecessary intermediary redirect before AccessDeniedSubscriber
      // routes us to the same place. Or, if the Drupal site has multiple
      // domains and the user still isn't logged in on the domain in the
      // RelayState, we'll have a redirect loop between us and the IdP.
      // @todo hopefully get rid of this, when dropping OneLogin\Auth which
      //   forces a relaystate back onto ourselves (#3211529).
      if ($safe && !preg_match('[/saml/(log|reauth)]', $relay_state)) {
        $safe_url = $relay_state;
      }
    }

    return $safe_url;
  }

  /**
   * Gets a redirect response and modifies it a bit.
   *
   * Split off from getTrustedRedirectResponse() because that's in a trait.
   *
   * @param callable $callable
   *   Callable.
   * @param string $while
   *   Description of when we're doing this, for error logging.
   * @param string $redirect_route_on_exception
   *   Drupal route name to redirect to on exception.
   */
  protected function getShortenedRedirectResponse(callable $callable, $while, $redirect_route_on_exception) {
    $response = $this->getTrustedRedirectResponse($callable, $while, $redirect_route_on_exception);
    // Symfony RedirectResponses set a HTML document as content, which is going
    // to be ugly with our long URLs. Almost noone sees this content for a
    // HTTP redirect, but still: overwrite it with a similar HTML document that
    // doesn't include the URL parameter blurb in the rendered parts.
    $url = $response->getTargetUrl();
    $pos = strpos($url, '?');
    $shortened_url = $pos ? substr($url, 0, $pos) : $url;
    // Almost literal copy from RedirectResponse::setTargetUrl():
    $response->setContent(
      sprintf('<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url=%1$s" />

        <title>Redirecting to %2$s</title>
    </head>
    <body>
        Redirecting to <a href="%1$s">%2$s</a>.
    </body>
</html>', htmlspecialchars($url, ENT_QUOTES, 'UTF-8'), $shortened_url));

    return $response;
  }

  /**
   * {@inheritdoc}
   *
   * @todo in 4.x, always throw; move our own error handling into
   *   AccessDeniedSubscriber. This means the situation of error_throw=TRUE
   *   will become standard.
   *   It would be nice to first do some investigation if contrib modules doing
   *   error redirection (customerror / error_redirect?) are mature / have good
   *   code, before doing this. If so, we can safely get rid of the
   *   'error_redirect_url' setting and recommend installing a module if this
   *   functionality is needed.
   */
  protected function handleExceptionInRenderContext(\Exception $exception, $default_redirect_route, $while = '') {
    if ($exception instanceof TooManyRequestsHttpException) {
      // If this ever happens, don't spend time on a RedirectResponse (when the
      // redirected page will need to spend time rendering the page that
      // includes an error message. Throwing an exception here will fall
      // through to the Symfony HttpKernel - and unfortunately for us, Drupal's
      // CustomPageExceptionHtmlSubscriber will intercept the response handling
      // and redirect anyway, unless we intercept it first in our own
      // AccessDeniedSubscriber.)
      throw $exception;
    }

    $config = $this->config(self::CONFIG_OBJECT_NAME);
    // This config value (possibly together with 'error_redirect_url') will
    // likely be removed in the 4.x version of the module - and we'll always
    // throw an exception for errors. (This module's default error handling
    // will then be in an event subscriber which can more easily be
    // overridden. For now, explicitly set 'error_throw' if you want to
    // have your own event subscriber catch handle the error on a
    // KernelEvents::EXCEPTION event - see AccessDeniedSubscriber for example.)
    if ($config->get('error_throw')) {
      throw new AccessDeniedHttpException($exception->getMessage(), $exception);
    }
    if ($exception instanceof UserVisibleException || $config->get('debug_display_error_details')) {
      // Show the full error on screen; also log, but with lowered severity.
      // Assume we don't need the "while" part for a user visible error because
      // it's likely to not fully match the detailed message.
      $this->messenger->addError($exception->getMessage());
      if ($exception instanceof UserVisibleException) {
        // Log original data; the backend is meant to translate during output.
        $this->logger->warning($exception->getOriginalMessage(), $exception->getReplacements());
      }
      else {
        // Use same format for logging as Drupal's ExceptionLoggingSubscriber
        // except also specify where the error was encountered.
        $error = Error::decodeException($exception);
        unset($error['severity_level']);
        $error['@while'] = $while;
        $this->logger->warning('%type encountered during @while: @message in %function (line %line of %file).', $error);
      }
    }
    else {
      // Don't expose the error to prevent information leakage; the user likely
      // can't do much with it anyway. But hint that more details are available.
      // There's no perfect solution for a translatable message here:
      // - not translating an English $while will be strange for the UI message,
      //   which will have some English in the middle of a translated message.
      // - interpolating $while in the message to be translated, or having
      //   t($while) as an argument in the addError(), is against Drupal
      //   standards; it means that message-extraction tools will not pick up
      //   the right message to translate.
      // So instead, $while (the argument to getTrustedRedirectResponse() calls)
      // is pre-translated. Mostly equal to the default site language, but
      // might be the logged-in user language for logout/sls.
      $this->messenger->addError($this->t('Error encountered during @while; details have been logged.', ['@while' => $while]));
      $error = Error::decodeException($exception);
      unset($error['severity_level']);
      // Pre-translated string stored as context parameter. There's no good way
      // to handle this.
      $error['@while'] = $while;
      $this->logger->warning('%type encountered during @while: @message in %function (line %line of %file).', $error);
    }

    // Get error URL.
    $url = $config->get('error_redirect_url');
    $url_object = NULL;
    if ($url) {
      $url = $this->token->replace($url);
      $url_object = $this->pathValidator->getUrlIfValidWithoutAccessCheck($url);
      if (empty($url_object)) {
        $this->getLogger('samlauth')->warning("The Error Redirect URL is not a valid path; falling back to provided route @route.", ['@route' => $default_redirect_route]);
      }
    }

    if (empty($url_object)) {
      $url_object = Url::fromRoute($default_redirect_route);
    }
    return $url_object;
  }

}
