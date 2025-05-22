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

/* __string_template__b96caa33e373082faf7648d988e7ddf7 */
class __TwigTemplate_cb94c4f41933bed4a4969a4f030df04b extends Template
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
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.matchHeight"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.parallax_scrolling"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.cohMatchHeights"), "html", null, true);
        yield " ";
        $context["component_variable_2592cee5_c8e1_459e_9d76_fb1135effc26"] = ('' === $tmp = "MyAlcon | International") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_24066086_5de3_436d_a996_65f6a1b5d535"] = ('' === $tmp = "This site is available in English. Select below for other countries.") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_16daada4_d633_494d_8713_9e6136423b47"] = ('' === $tmp = "Select Another Country") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_3c38bade_c111_43c6_9746_0cd45a5fcec0"] = ('' === $tmp = "node::2559") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_4deaeea7_6fa7_4c08_8fc4_db9e40aec472"] = ('' === $tmp = "rgba(229, 245, 255, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_bc7c43a1_2bf3_4883_bf59_aff26f266ebf"] = ('' === $tmp = "rgba(35, 35, 35, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_6307631e_87e5_4d52_a0b1_347ab9f7f90e"] = ('' === $tmp = "rgba(35, 35, 35, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_9c92bdfc_ad5e_494e_b4f5_8f7f41539c5d"] = ('' === $tmp = "rgba(35, 35, 35, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_35370c0a_1e4c_4fa3_b60b_dad0fd7489b8"] = ('' === $tmp = "rgba(255, 255, 255, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_20ec25ec_a7db_4fcc_b480_2b749246485d"] = ('' === $tmp = "rgba(0, 53, 149, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_4cd5fd9a_8bfe_4880_b578_eb301ffd490a"] = ('' === $tmp = "rgba(243, 246, 248, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_e39cf6f2_4ad7_4413_8e9a_2b0cc6812fe0"] = ('' === $tmp = "rgba(255, 255, 255, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_e1406390_5793_42d7_9342_be27017963f9"] = ('' === $tmp = "rgba(0, 53, 149, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_69c1c569_3168_4019_8e91_62ee5d7be612"] = false;
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_header_nav_ctry_lan_1", false, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), ["2592cee5-c8e1-459e-9d76-fb1135effc26" => "component_variable_2592cee5_c8e1_459e_9d76_fb1135effc26", "24066086-5de3-436d-a996-65f6a1b5d535" => "component_variable_24066086_5de3_436d_a996_65f6a1b5d535", "16daada4-d633-494d-8713-9e6136423b47" => "component_variable_16daada4_d633_494d_8713_9e6136423b47", "3c38bade-c111-43c6-9746-0cd45a5fcec0" => "component_variable_3c38bade_c111_43c6_9746_0cd45a5fcec0", "4deaeea7-6fa7-4c08-8fc4-db9e40aec472" => "component_variable_4deaeea7_6fa7_4c08_8fc4_db9e40aec472", "bc7c43a1-2bf3-4883-bf59-aff26f266ebf" => "component_variable_bc7c43a1_2bf3_4883_bf59_aff26f266ebf", "6307631e-87e5-4d52-a0b1-347ab9f7f90e" => "component_variable_6307631e_87e5_4d52_a0b1_347ab9f7f90e", "9c92bdfc-ad5e-494e-b4f5-8f7f41539c5d" => "component_variable_9c92bdfc_ad5e_494e_b4f5_8f7f41539c5d", "35370c0a-1e4c-4fa3-b60b-dad0fd7489b8" => "component_variable_35370c0a_1e4c_4fa3_b60b_dad0fd7489b8", "20ec25ec-a7db-4fcc-b480-2b749246485d" => "component_variable_20ec25ec_a7db_4fcc_b480_2b749246485d", "4cd5fd9a-8bfe-4880-b578-eb301ffd490a" => "component_variable_4cd5fd9a_8bfe_4880_b578_eb301ffd490a", "e39cf6f2-4ad7-4413-8e9a-2b0cc6812fe0" => "component_variable_e39cf6f2_4ad7_4413_8e9a_2b0cc6812fe0", "e1406390-5793-42d7-9342-be27017963f9" => "component_variable_e1406390_5793_42d7_9342_be27017963f9", "69c1c569-3168-4019-8e91-62ee5d7be612" => "component_variable_69c1c569_3168_4019_8e91_62ee5d7be612"], "d7b5833d-937c-4db9-a6ff-735d85dea4e6", ""), "html", null, true);
        yield " 
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["_context"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "__string_template__b96caa33e373082faf7648d988e7ddf7";
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
        return new Source("", "__string_template__b96caa33e373082faf7648d988e7ddf7", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1);
        static $filters = array("escape" => 1);
        static $functions = array("attach_library" => 1, "renderComponent" => 1);

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['escape'],
                ['attach_library', 'renderComponent'],
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
