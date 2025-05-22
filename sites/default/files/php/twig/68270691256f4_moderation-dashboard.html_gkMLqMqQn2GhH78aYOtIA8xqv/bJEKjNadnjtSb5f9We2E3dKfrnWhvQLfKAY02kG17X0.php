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

/* modules/contrib/moderation_dashboard/templates/moderation-dashboard.html.twig */
class __TwigTemplate_28dce1891c75330d5350b4469091d031 extends Template
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
        if (($context["content"] ?? null)) {
            // line 2
            yield "  <div ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["moderation-dashboard"], "method", false, false, true, 2), 2, $this->source), "html", null, true);
            yield ">
    ";
            // line 3
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "left", [], "any", false, false, true, 3)) {
                // line 4
                yield "      <div ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["region_attributes"] ?? null), "left", [], "any", false, false, true, 4), "addClass", ["layout__region", "moderation-dashboard-region"], "method", false, false, true, 4), 4, $this->source), "html", null, true);
                yield ">
        ";
                // line 5
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "left", [], "any", false, false, true, 5), 5, $this->source), "html", null, true);
                yield "
      </div>
    ";
            }
            // line 8
            yield "    ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "middle", [], "any", false, false, true, 8)) {
                // line 9
                yield "      <div ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["region_attributes"] ?? null), "middle", [], "any", false, false, true, 9), "addClass", ["layout__region", "moderation-dashboard-region"], "method", false, false, true, 9), 9, $this->source), "html", null, true);
                yield ">
        ";
                // line 10
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "middle", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
                yield "
      </div>
    ";
            }
            // line 13
            yield "    ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "right", [], "any", false, false, true, 13)) {
                // line 14
                yield "      <div ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["region_attributes"] ?? null), "right", [], "any", false, false, true, 14), "addClass", ["layout__region", "moderation-dashboard-region"], "method", false, false, true, 14), 14, $this->source), "html", null, true);
                yield ">
        ";
                // line 15
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "right", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
                yield "
      </div>
    ";
            }
            // line 18
            yield "  </div>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["content", "attributes", "region_attributes"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "modules/contrib/moderation_dashboard/templates/moderation-dashboard.html.twig";
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
        return array (  88 => 18,  82 => 15,  77 => 14,  74 => 13,  68 => 10,  63 => 9,  60 => 8,  54 => 5,  49 => 4,  47 => 3,  42 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/moderation_dashboard/templates/moderation-dashboard.html.twig", "/var/www/html/modules/contrib/moderation_dashboard/templates/moderation-dashboard.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 1);
        static $filters = array("escape" => 2);
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
