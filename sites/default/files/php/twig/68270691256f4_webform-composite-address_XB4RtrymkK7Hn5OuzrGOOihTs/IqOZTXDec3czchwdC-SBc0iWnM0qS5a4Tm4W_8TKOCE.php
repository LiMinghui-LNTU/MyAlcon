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

/* modules/contrib/webform/templates/webform-composite-address.html.twig */
class __TwigTemplate_1ba7fab469d8d02c418912afa4e30d94 extends Template
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
        // line 16
        if (($context["flexbox"] ?? null)) {
            // line 17
            yield "<div class=\"webform-address\">
  ";
            // line 18
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "address", [], "any", false, false, true, 18)) {
                // line 19
                yield "    <div class=\"webform-flexbox webform-address__row-1\">
      <div class=\"webform-flex webform-flex--1 webform-address__address\"><div class=\"webform-flex--container\">";
                // line 20
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "address", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
                yield "</div></div>
    </div>
  ";
            }
            // line 23
            yield "
  ";
            // line 24
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "address_2", [], "any", false, false, true, 24)) {
                // line 25
                yield "    <div class=\"webform-flexbox webform-address__row-2\">
      <div class=\"webform-flex webform-flex--1 webform-address__address-2\"><div class=\"webform-flex--container\">";
                // line 26
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "address_2", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
                yield "</div></div>
    </div>
  ";
            }
            // line 29
            yield "
  ";
            // line 30
            if (((CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "city", [], "any", false, false, true, 30) || CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "state_province", [], "any", false, false, true, 30)) || CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "postal_code", [], "any", false, false, true, 30))) {
                // line 31
                yield "    <div class=\"webform-flexbox webform-address__row-3\">
      ";
                // line 32
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "city", [], "any", false, false, true, 32)) {
                    // line 33
                    yield "        <div class=\"webform-flex webform-flex--1 webform-address__city\"><div class=\"webform-flex--container\">";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "city", [], "any", false, false, true, 33), 33, $this->source), "html", null, true);
                    yield "</div></div>
      ";
                }
                // line 35
                yield "      ";
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "state_province", [], "any", false, false, true, 35)) {
                    // line 36
                    yield "        <div class=\"webform-flex webform-flex--1 webform-address__province\"><div class=\"webform-flex--container\">";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "state_province", [], "any", false, false, true, 36), 36, $this->source), "html", null, true);
                    yield "</div></div>
      ";
                }
                // line 38
                yield "      ";
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "postal_code", [], "any", false, false, true, 38)) {
                    // line 39
                    yield "        <div class=\"webform-flex webform-flex--1 webform-address__postal-code\"><div class=\"webform-flex--container\">";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "postal_code", [], "any", false, false, true, 39), 39, $this->source), "html", null, true);
                    yield "</div></div>
      ";
                }
                // line 41
                yield "    </div>
  ";
            }
            // line 43
            yield "
  ";
            // line 44
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "country", [], "any", false, false, true, 44)) {
                // line 45
                yield "    <div class=\"webform-flexbox webform-address__row-4\">
      <div class=\"webform-flex webform-flex--1 webform-address__country\"><div class=\"webform-flex--container\">";
                // line 46
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "country", [], "any", false, false, true, 46), 46, $this->source), "html", null, true);
                yield "</div></div>
    </div>
  ";
            }
            // line 49
            yield "</div>
";
        } else {
            // line 51
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 51, $this->source), "html", null, true);
            yield "
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["flexbox", "content"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "modules/contrib/webform/templates/webform-composite-address.html.twig";
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
        return array (  126 => 51,  122 => 49,  116 => 46,  113 => 45,  111 => 44,  108 => 43,  104 => 41,  98 => 39,  95 => 38,  89 => 36,  86 => 35,  80 => 33,  78 => 32,  75 => 31,  73 => 30,  70 => 29,  64 => 26,  61 => 25,  59 => 24,  56 => 23,  50 => 20,  47 => 19,  45 => 18,  42 => 17,  40 => 16,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/webform/templates/webform-composite-address.html.twig", "/var/www/html/modules/contrib/webform/templates/webform-composite-address.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 16);
        static $filters = array("escape" => 20);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                [],
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
