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

/* __string_template__be98d5a49412c4b7ea978f42673bd317 */
class __TwigTemplate_449c1f35dc3b2310d78409db54be46d6 extends Template
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
        $context["component_variable_91c6ab64_9264_4320_9ba1_65c375abe34a"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:media:110a3fc7-8bfd-4a51-8f73-cf06db60d39a]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_2bb0dfc3_c4a4_4b74_973c_33cbe436abff"] = ('' === $tmp = "Same window") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_3604dbc4_6dad_40e4_b073_8624ce65a956"] = ('' === $tmp = "MyAlcon Professional Logo") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_8e59b3a5_0d39_419a_a84c_05b303cba28e"] = ('' === $tmp = "professionallevel1") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_f424d4fc_ddba_4f32_9be2_da865c3782d4"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:media:26d36f6e-7262-49d0-bdc0-5a5478185d77]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_83f5456c_1700_4071_8795_7ecec9fd116c"] = ('' === $tmp = "Search for content") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_347d05fd_ef9f_4633_89cd_9ff61c919c29"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_af610cec_628d_4528_8113_c22b636f7631"] = ('' === $tmp = "_self") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_e7d10f5e_b4c1_46c1_b8c1_714e0acda26b"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:media:acae266e-7d93-4776-84ed-379cc59ace5a]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_9a04d5ec_5a86_424c_b7cb_5065b05e508d"] = ('' === $tmp = "Online Store") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_64298882_582c_4079_a6b6_386699f267d8"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a45879f2_04b2_422d_8f63_3c440b7e7f69"] = ('' === $tmp = "New window") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_7a7e982d_66fa_461d_8095_b72529ec0596"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:media:d8617a8d-403c-499d-9712-24d66c7b751e]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_d4803618_6ece_4006_8053_27d25b21fb16"] = ('' === $tmp = "Switch language") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_95a3aa5d_5d4c_47e7_8e81_e0082a49be6a"] = true;
        yield " ";
        $context["component_variable_17962cb7_4343_4429_8586_2efbe0db400d"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:media:88c901fc-0a2d-4394-be5a-57f2ed17d127]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_e2ac73dc_af1c_4de1_adab_7896b64de81b"] = ('' === $tmp = "Log in") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_e317edcf_3b30_4132_afd4_60286d4d9ed8"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_5509be58_fa05_4059_8a43_4445b48894c9"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_2662b4e5_2530_425e_acd8_8beb3d67bf89"] = ('' === $tmp = "_self") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_12e30031_984e_43ff_a0eb_b9ed0c2b4d78"] = ('' === $tmp = "rgba(0, 53, 149, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_86be1b6c_5611_492f_bc59_3b503bd1425b"] = ('' === $tmp = "rgba(255, 255, 255, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_b2375135_bbbc_4377_a028_a76a2b67bef0"] = ('' === $tmp = "rgba(0, 53, 149, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_560410be_b94c_457d_97d7_a35d529b3037"] = ('' === $tmp = "rgba(0, 53, 149, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a2bb0624_c870_4ebe_b3c1_158593ebb27c"] = ('' === $tmp = "rgba(243, 246, 248, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a43dcf35_0989_4216_a405_bb4b96ac1572"] = ('' === $tmp = "rgba(0, 0, 0, 0)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_f1d8f1d4_f2c2_4b25_8357_eade08d994b5"] = ('' === $tmp = "rgba(0, 53, 149, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_19234898_d39c_4fc2_adbb_a11e0f2ce742"] = ('' === $tmp = "rgba(0, 0, 0, 0)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_f2103339_355d_44f1_b186_4ccb4c6baa2b"] = ('' === $tmp = "rgba(0, 53, 149, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_5c1a2581_2615_4e85_bea8_68243075b429"] = ('' === $tmp = "node::1622") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_29c7d018_d7ef_487e_9166_a6a8ac62b4c6"] = false;
        yield " ";
        $context["component_variable_27027d02_c646_4713_b170_730c035ba173"] = ('' === $tmp = "oktaauthenticatedusermenu") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_2c961861_5697_4004_8ea0_1ee9c27a646a"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_header_supernav_l1", false, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), ["91c6ab64-9264-4320-9ba1-65c375abe34a" => "component_variable_91c6ab64_9264_4320_9ba1_65c375abe34a", "2bb0dfc3-c4a4-4b74-973c-33cbe436abff" => "component_variable_2bb0dfc3_c4a4_4b74_973c_33cbe436abff", "3604dbc4-6dad-40e4-b073-8624ce65a956" => "component_variable_3604dbc4_6dad_40e4_b073_8624ce65a956", "8e59b3a5-0d39-419a-a84c-05b303cba28e" => "component_variable_8e59b3a5_0d39_419a_a84c_05b303cba28e", "f424d4fc-ddba-4f32-9be2-da865c3782d4" => "component_variable_f424d4fc_ddba_4f32_9be2_da865c3782d4", "83f5456c-1700-4071-8795-7ecec9fd116c" => "component_variable_83f5456c_1700_4071_8795_7ecec9fd116c", "347d05fd-ef9f-4633-89cd-9ff61c919c29" => "component_variable_347d05fd_ef9f_4633_89cd_9ff61c919c29", "af610cec-628d-4528-8113-c22b636f7631" => "component_variable_af610cec_628d_4528_8113_c22b636f7631", "e7d10f5e-b4c1-46c1-b8c1-714e0acda26b" => "component_variable_e7d10f5e_b4c1_46c1_b8c1_714e0acda26b", "9a04d5ec-5a86-424c-b7cb-5065b05e508d" => "component_variable_9a04d5ec_5a86_424c_b7cb_5065b05e508d", "64298882-582c-4079-a6b6-386699f267d8" => "component_variable_64298882_582c_4079_a6b6_386699f267d8", "a45879f2-04b2-422d-8f63-3c440b7e7f69" => "component_variable_a45879f2_04b2_422d_8f63_3c440b7e7f69", "7a7e982d-66fa-461d-8095-b72529ec0596" => "component_variable_7a7e982d_66fa_461d_8095_b72529ec0596", "d4803618-6ece-4006-8053-27d25b21fb16" => "component_variable_d4803618_6ece_4006_8053_27d25b21fb16", "95a3aa5d-5d4c-47e7-8e81-e0082a49be6a" => "component_variable_95a3aa5d_5d4c_47e7_8e81_e0082a49be6a", "17962cb7-4343-4429-8586-2efbe0db400d" => "component_variable_17962cb7_4343_4429_8586_2efbe0db400d", "e2ac73dc-af1c-4de1-adab-7896b64de81b" => "component_variable_e2ac73dc_af1c_4de1_adab_7896b64de81b", "e317edcf-3b30-4132-afd4-60286d4d9ed8" => "component_variable_e317edcf_3b30_4132_afd4_60286d4d9ed8", "5509be58-fa05-4059-8a43-4445b48894c9" => "component_variable_5509be58_fa05_4059_8a43_4445b48894c9", "2662b4e5-2530-425e-acd8-8beb3d67bf89" => "component_variable_2662b4e5_2530_425e_acd8_8beb3d67bf89", "12e30031-984e-43ff-a0eb-b9ed0c2b4d78" => "component_variable_12e30031_984e_43ff_a0eb_b9ed0c2b4d78", "86be1b6c-5611-492f-bc59-3b503bd1425b" => "component_variable_86be1b6c_5611_492f_bc59_3b503bd1425b", "b2375135-bbbc-4377-a028-a76a2b67bef0" => "component_variable_b2375135_bbbc_4377_a028_a76a2b67bef0", "560410be-b94c-457d-97d7-a35d529b3037" => "component_variable_560410be_b94c_457d_97d7_a35d529b3037", "a2bb0624-c870-4ebe-b3c1-158593ebb27c" => "component_variable_a2bb0624_c870_4ebe_b3c1_158593ebb27c", "a43dcf35-0989-4216-a405-bb4b96ac1572" => "component_variable_a43dcf35_0989_4216_a405_bb4b96ac1572", "f1d8f1d4-f2c2-4b25-8357-eade08d994b5" => "component_variable_f1d8f1d4_f2c2_4b25_8357_eade08d994b5", "19234898-d39c-4fc2-adbb-a11e0f2ce742" => "component_variable_19234898_d39c_4fc2_adbb_a11e0f2ce742", "f2103339-355d-44f1-b186-4ccb4c6baa2b" => "component_variable_f2103339_355d_44f1_b186_4ccb4c6baa2b", "5c1a2581-2615-4e85-bea8-68243075b429" => "component_variable_5c1a2581_2615_4e85_bea8_68243075b429", "29c7d018-d7ef-487e-9166-a6a8ac62b4c6" => "component_variable_29c7d018_d7ef_487e_9166_a6a8ac62b4c6", "27027d02-c646-4713-b170-730c035ba173" => "component_variable_27027d02_c646_4713_b170_730c035ba173", "2c961861-5697-4004-8ea0-1ee9c27a646a" => "component_variable_2c961861_5697_4004_8ea0_1ee9c27a646a"], "324bb670-7670-44bd-a2ad-f70710a9a490", ""), "html", null, true);
        yield " 
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["media_reference", "_context"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "__string_template__be98d5a49412c4b7ea978f42673bd317";
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
        return new Source("", "__string_template__be98d5a49412c4b7ea978f42673bd317", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1);
        static $filters = array("escape" => 1);
        static $functions = array("attach_library" => 1, "processtoken" => 1, "renderComponent" => 1);

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['escape'],
                ['attach_library', 'processtoken', 'renderComponent'],
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
