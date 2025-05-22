<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* sites/default/files/cohesion/templates/component--cohesion-cpt-a-prof-restricted-access-pu1.html.twig */
class __TwigTemplate_b26d12c2423c881fc66a343cf0f356f5 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension(SandboxExtension::class);
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.responsiveJs"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.windowscroll"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/element_templates.link"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/element_templates.image"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.matchHeight"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.parallax_scrolling"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.cohMatchHeights"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/element_templates.link"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/element_templates.modal"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_modal"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.jquery_ui_effect_fade"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.jquery_ui_effect_none"), "html", null, true);
        yield " <div class=\"coh-modal ssa-component coh-component ssa-component-instance-";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["componentUuid"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-component-instance-";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["componentUuid"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-modal-center coh-style-a-restricted-access-modal-overlay\" id=\"modal-id-restricted-access\" data-coh-modal-animation='{ \"effect\" : \"none\" }' data-coh-modal-delay-open='' data-coh-modal-delay-close='' data-coh-modal-overlay data-modal data-modal-manual-close hidden style=\"display: none;\"> <div class=\"coh-modal-overlay coh-style-a-restricted-access-modal-overlay\"  style=\"display: none;\"></div> <div class=\"coh-modal-inner coh-style-a-restricted-access-modal\" data-modal-document tabindex=\"0\" style=\"display: none;\"> ";
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2778760a-7f2e-40a0-aef0-51f7160277d8", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_image"), "html", null, true);
            yield " <img class=\"coh-image coh-image-xl coh-image-align-centre-xl\" src=\"";
            $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2778760a-7f2e-40a0-aef0-51f7160277d8"));
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
            yield "\" ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2aeeacb3-dfe5-4453-9346-960f35a892cd") == "")) {
                yield "alt";
            } else {
                yield "alt=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2aeeacb3-dfe5-4453-9346-960f35a892cd"));
                yield "\"";
            }
            yield " /> ";
        }
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_wysiwyg"), "html", null, true);
        yield " <div class=\"coh-wysiwyg\" ";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", ["access visual page builder"], "method", false, false, true, 1) &&  !array_key_exists("component_content", $context))) {
            yield " data-ssa-field-uuid=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderFieldUuid($context, "382c3f6d-dcd9-4660-b59b-76eb9155b66d", "Array"), "html", null, true);
            yield "\" data-ssa-form-type=\"form-wysiwyg\"";
        }
        yield " > ";
        $context["wysiwyg"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "382c3f6d-dcd9-4660-b59b-76eb9155b66d", "#text"), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["text_format"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "382c3f6d-dcd9-4660-b59b-76eb9155b66d", "#textFormat"), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["token_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "382c3f6d-dcd9-4660-b59b-76eb9155b66d", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->formatWysiwyg($this->sandbox->ensureToStringAllowed(($context["wysiwyg"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["text_format"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["token_text"] ?? null), 1, $this->source)), "html", null, true);
        yield " </div> ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container coh-ce-cpt_a_prof_restricted_access_pu1-671c20fd\" > ";
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2e27a3d1-b617-44ed-99ea-50c3bc7fd0a4", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.jquery_ui_effect_none"), "html", null, true);
            yield " <button class=\"coh-button coh-modal-close-button coh-style-a-button-modal-restricted-access coh-interaction\" data-interaction-modifiers=\"[{&quot;modifierType&quot;:&quot;&quot;}]\" id=\"tiid\" aria-label=\"Close\" data-modal-close-btn data-analytics=\"[null]\" data-analytics-layer=\"[null]\" data-coh-settings='{ \"xl\":{\"buttonAnimation\":[{\"animationType\":\"none\"}]} }' type=\"button\"> ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "9595ae9f-26d0-4855-9ddd-92a1c3ec5de0"));
            yield "</button> ";
        }
        yield " ";
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "06fceead-512e-405c-9b1f-06bf4cc4a144", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.jquery_ui_effect_none"), "html", null, true);
            yield " <button class=\"coh-button coh-modal-close-button coh-style-a-button-modal-restricted-access coh-interaction\" data-interaction-modifiers=\"[{&quot;modifierType&quot;:&quot;&quot;}]\" id=\"login\" data-analytics=\"[null]\" data-analytics-layer=\"[null]\" data-coh-settings='{ \"xl\":{\"buttonAnimation\":[{\"animationType\":\"none\"}]} }' type=\"button\"> ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "9595ae9f-26d0-4855-9ddd-92a1c3ec5de0"));
            yield "</button> ";
        }
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
        yield " <a href=\"";
        $context["href"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "1f7c651d-6069-44e9-bce0-3839af26e172"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->escapeURL($this->sandbox->ensureToStringAllowed(($context["href"] ?? null), 1, $this->source)), "html", null, true);
        yield "\" class=\"coh-link coh-style-button-modal-restricted-access-l coh-ce-cpt_a_prof_restricted_access_pu1-f89e1e8\" target=\"_self\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a976cf74-acfa-4bf1-8aa6-46d76413d5ae"));
        yield "    </a> </div> </div> </div> 
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["componentUuid", "user", "component_content"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "sites/default/files/cohesion/templates/component--cohesion-cpt-a-prof-restricted-access-pu1.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "sites/default/files/cohesion/templates/component--cohesion-cpt-a-prof-restricted-access-pu1.html.twig", "/var/www/html/sites/default/files/cohesion/templates/component--cohesion-cpt-a-prof-restricted-access-pu1.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1, "if" => 1);
        static $filters = array("escape" => 1, "trim" => 1, "raw" => 1);
        static $functions = array("attach_library" => 1, "getComponentFieldValue" => 1, "cohesion_image_style" => 1, "render_field_uuid" => 1, "format_wysiwyg" => 1, "escape_url" => 1);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 'trim', 'raw'],
                ['attach_library', 'getComponentFieldValue', 'cohesion_image_style', 'render_field_uuid', 'format_wysiwyg', 'escape_url'],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
