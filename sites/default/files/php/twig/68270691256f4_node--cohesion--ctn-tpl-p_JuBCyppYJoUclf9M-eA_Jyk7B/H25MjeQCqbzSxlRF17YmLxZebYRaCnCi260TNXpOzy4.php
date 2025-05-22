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

/* sites/default/files/cohesion/templates/node--cohesion--ctn-tpl-professional-template.html.twig */
class __TwigTemplate_40d8a03d5499b5bf4966042ebf188cfa extends Template
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
        yield " <article ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 1, $this->source), "html", null, true);
        yield ">";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 1, $this->source), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <header class=\"coh-container\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cc_07c0e402-9238-4256-aac9-bc8dbd38835f", true, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), [], "4f418ae2-893a-429b-9f0c-814ac621d248", "07c0e402-9238-4256-aac9-bc8dbd38835f"), "html", null, true);
        yield " ";
        $context["component_variable_2592cee5_c8e1_459e_9d76_fb1135effc26"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("MyAlcon | International", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_24066086_5de3_436d_a996_65f6a1b5d535"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("This site is available in English. Select below for other countries.", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_16daada4_d633_494d_8713_9e6136423b47"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("Select Another Country", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_3c38bade_c111_43c6_9746_0cd45a5fcec0"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("node::2556", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_4deaeea7_6fa7_4c08_8fc4_db9e40aec472"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("rgba(229, 245, 255, 1)", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_bc7c43a1_2bf3_4883_bf59_aff26f266ebf"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("rgba(35, 35, 35, 1)", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_6307631e_87e5_4d52_a0b1_347ab9f7f90e"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("rgba(35, 35, 35, 1)", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_9c92bdfc_ad5e_494e_b4f5_8f7f41539c5d"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("rgba(35, 35, 35, 1)", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_35370c0a_1e4c_4fa3_b60b_dad0fd7489b8"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("rgba(255, 255, 255, 1)", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_20ec25ec_a7db_4fcc_b480_2b749246485d"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("rgba(0, 53, 149, 1)", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_4cd5fd9a_8bfe_4880_b578_eb301ffd490a"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("rgba(243, 246, 248, 1)", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_e39cf6f2_4ad7_4413_8e9a_2b0cc6812fe0"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("rgba(255, 255, 255, 1)", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_e1406390_5793_42d7_9342_be27017963f9"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("rgba(0, 53, 149, 1)", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_69c1c569_3168_4019_8e91_62ee5d7be612"] = false;
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_header_nav_ctry_lan_1", true, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), ["2592cee5-c8e1-459e-9d76-fb1135effc26" => "component_variable_2592cee5_c8e1_459e_9d76_fb1135effc26", "24066086-5de3-436d-a996-65f6a1b5d535" => "component_variable_24066086_5de3_436d_a996_65f6a1b5d535", "16daada4-d633-494d-8713-9e6136423b47" => "component_variable_16daada4_d633_494d_8713_9e6136423b47", "3c38bade-c111-43c6-9746-0cd45a5fcec0" => "component_variable_3c38bade_c111_43c6_9746_0cd45a5fcec0", "4deaeea7-6fa7-4c08-8fc4-db9e40aec472" => "component_variable_4deaeea7_6fa7_4c08_8fc4_db9e40aec472", "bc7c43a1-2bf3-4883-bf59-aff26f266ebf" => "component_variable_bc7c43a1_2bf3_4883_bf59_aff26f266ebf", "6307631e-87e5-4d52-a0b1-347ab9f7f90e" => "component_variable_6307631e_87e5_4d52_a0b1_347ab9f7f90e", "9c92bdfc-ad5e-494e-b4f5-8f7f41539c5d" => "component_variable_9c92bdfc_ad5e_494e_b4f5_8f7f41539c5d", "35370c0a-1e4c-4fa3-b60b-dad0fd7489b8" => "component_variable_35370c0a_1e4c_4fa3_b60b_dad0fd7489b8", "20ec25ec-a7db-4fcc-b480-2b749246485d" => "component_variable_20ec25ec_a7db_4fcc_b480_2b749246485d", "4cd5fd9a-8bfe-4880-b578-eb301ffd490a" => "component_variable_4cd5fd9a_8bfe_4880_b578_eb301ffd490a", "e39cf6f2-4ad7-4413-8e9a-2b0cc6812fe0" => "component_variable_e39cf6f2_4ad7_4413_8e9a_2b0cc6812fe0", "e1406390-5793-42d7-9342-be27017963f9" => "component_variable_e1406390_5793_42d7_9342_be27017963f9", "69c1c569-3168-4019-8e91-62ee5d7be612" => "component_variable_69c1c569_3168_4019_8e91_62ee5d7be612"], "45ac8df4-85af-4eea-93ab-1b98088f078a", "b01af79c-f141-46e6-b471-4a681a2a1103"), "html", null, true);
        yield " </header> ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container\" id=\"main-content\" > ";
        $context["thisField"] = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_layout_canvas_basic_page", [], "any", false, false, true, 1);
        yield " ";
        $context["hasChildren"] = false;
        yield " ";
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["thisField"] ?? null), "#is_multiple", [], "array", true, true, true, 1) && (CoreExtension::getAttribute($this->env, $this->source, (($__internal_compile_0 = ($context["thisField"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["#items"] ?? null) : null), "isempty", [], "any", false, false, true, 1) != true)) && ($context["hasChildren"] ?? null))) {
            yield " ";
            $context["fieldValues"] = CoreExtension::getAttribute($this->env, $this->source, (($__internal_compile_1 = ($context["thisField"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["#items"] ?? null) : null), "getiterator", [], "any", false, false, true, 1);
            yield " ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["fieldValues"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                yield " ";
                if (( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, true, 1)) && CoreExtension::getAttribute($this->env, $this->source, ($context["thisField"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, true, 1), [], "array", true, true, true, 1))) {
                    yield " ";
                    yield " ";
                    $context["fieldItem"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_2 = ($context["thisField"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[CoreExtension::getAttribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, true, 1)] ?? null) : null), 1, $this->source), "html", null, true);
                        return; yield '';
                    })())) ? '' : new Markup($tmp, $this->env->getCharset());
                    yield " ";
                    yield " ";
                }
                yield " ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            yield " ";
        } else {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_layout_canvas_basic_page", [], "any", false, false, true, 1), 1, $this->source), "html", null, true);
            yield " ";
        }
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_56563e8e_8429_4b7b_9b16_35695fe344ab"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_42282538_0f76_45f3_86b1_cb165f151f84"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("Gated content", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_91ab6633_8d10_484e_894e_fdf69e654619"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_21de6b6c_5cda_49cf_9add_4c548a63bb62"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("gated_content_form_standard", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_77fae0a1_f045_40d0_b85a_622f77eb465d"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("cohesion_theme_webform", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_ace40183_4435_4cc0_9a14_3d0d5b40effc"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_7a08c9fe_50c5_431e_bcc6_73ffa4124412"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_0e13d244_c9e2_4c44_bd79_be407c59f616"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_5de61427_a6b5_4d0c_8c03_3da199552fd9"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_924b32d4_2292_4a2e_8699_e87ad0046544_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("<h2 class=\"text-align-center\"><strong>Pop-Up on page load</strong></h2>

<p>&nbsp;</p>

<p><strong>Lorem Ipsum</strong>&nbsp; dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 6
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_924b32d4_2292_4a2e_8699_e87ad0046544_textFormat"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("cohesion", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_db0eb191_7ac7_4538_848f_047610e654d2"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_c7d9f1f2_aace_40fa_bfa7_d324e5f91449"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:4d2c159c-f9af-470c-8737-41f72a164946]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 6, $this->source), true), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_26ba7d8a_552c_42fc_aeb9_ed41e0d1fc1a"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:4d2c159c-f9af-470c-8737-41f72a164946]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 6, $this->source), true), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_939e9017_1d6a_4f51_b149_48df14de17a3"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_0c0a7233_3b5e_4ac2_ae56_e11dd91802ca"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_352f33a0_0e02_40dc_8862_2aa26baee8bd"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("0%", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_4a9c697c_1029_4c8d_99d1_1002b620e681"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_8dfb065b_6190_4aa2_a569_a9948a0275d8"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_4bb1c361_be7b_45d9_ace2_9f43ce0a190a"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_c3739eca_b815_44c8_a809_e01dbb0c4c7d"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_14e89b5d_1df6_4a7d_adda_ba40de347edf"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_61b732e2_678b_48dc_92bb_c49f7e2cdd10"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_3178818b_0b32_4040_86e6_7e6e57b49ffc"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_62ca6332_ba75_4ed3_bc94_b3dce5f22c19"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_6b97dc5d_d8d8_4af9_a3bc_fd99137cb216"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_webform_pop_up", true, $this->sandbox->ensureToStringAllowed($context, 6, $this->source), ["a6efefca-03bc-4860-8136-1e85a6f8e410" => [["56563e8e-8429-4b7b-9b16-35695fe344ab" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_56563e8e_8429_4b7b_9b16_35695fe344ab", "42282538-0f76-45f3-86b1-cb165f151f84" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_42282538_0f76_45f3_86b1_cb165f151f84", "91ab6633-8d10-484e-894e-fdf69e654619" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_91ab6633_8d10_484e_894e_fdf69e654619", "21de6b6c-5cda-49cf-9add-4c548a63bb62" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_21de6b6c_5cda_49cf_9add_4c548a63bb62", "77fae0a1-f045-40d0-b85a-622f77eb465d" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_77fae0a1_f045_40d0_b85a_622f77eb465d", "ace40183-4435-4cc0-9a14-3d0d5b40effc" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_ace40183_4435_4cc0_9a14_3d0d5b40effc", "7a08c9fe-50c5-431e-bcc6-73ffa4124412" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_7a08c9fe_50c5_431e_bcc6_73ffa4124412", "0e13d244-c9e2-4c44-bd79-be407c59f616" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_0e13d244_c9e2_4c44_bd79_be407c59f616", "5de61427-a6b5-4d0c-8c03-3da199552fd9" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_5de61427_a6b5_4d0c_8c03_3da199552fd9", "924b32d4-2292-4a2e-8699-e87ad0046544" => ["text" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_924b32d4_2292_4a2e_8699_e87ad0046544_text", "textFormat" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_924b32d4_2292_4a2e_8699_e87ad0046544_textFormat"], "db0eb191-7ac7-4538-848f-047610e654d2" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_db0eb191_7ac7_4538_848f_047610e654d2", "c7d9f1f2-aace-40fa-bfa7-d324e5f91449" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_c7d9f1f2_aace_40fa_bfa7_d324e5f91449", "26ba7d8a-552c-42fc-aeb9-ed41e0d1fc1a" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_26ba7d8a_552c_42fc_aeb9_ed41e0d1fc1a", "939e9017-1d6a-4f51-b149-48df14de17a3" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_939e9017_1d6a_4f51_b149_48df14de17a3", "0c0a7233-3b5e-4ac2-ae56-e11dd91802ca" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_0c0a7233_3b5e_4ac2_ae56_e11dd91802ca", "352f33a0-0e02-40dc-8862-2aa26baee8bd" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_352f33a0_0e02_40dc_8862_2aa26baee8bd", "4a9c697c-1029-4c8d-99d1-1002b620e681" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_4a9c697c_1029_4c8d_99d1_1002b620e681", "8dfb065b-6190-4aa2-a569-a9948a0275d8" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_8dfb065b_6190_4aa2_a569_a9948a0275d8", "4bb1c361-be7b-45d9-ace2-9f43ce0a190a" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_4bb1c361_be7b_45d9_ace2_9f43ce0a190a", "c3739eca-b815-44c8-a809-e01dbb0c4c7d" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_c3739eca_b815_44c8_a809_e01dbb0c4c7d", "14e89b5d-1df6-4a7d-adda-ba40de347edf" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_14e89b5d_1df6_4a7d_adda_ba40de347edf", "61b732e2-678b-48dc-92bb-c49f7e2cdd10" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_61b732e2_678b_48dc_92bb_c49f7e2cdd10", "3178818b-0b32-4040-86e6-7e6e57b49ffc" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_3178818b_0b32_4040_86e6_7e6e57b49ffc", "62ca6332-ba75-4ed3-bc94-b3dce5f22c19" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_62ca6332_ba75_4ed3_bc94_b3dce5f22c19", "6b97dc5d-d8d8-4af9-a3bc-fd99137cb216" => "component_variable_a6efefca_03bc_4860_8136_1e85a6f8e410_0_6b97dc5d_d8d8_4af9_a3bc_fd99137cb216"]]], "92d56815-7b91-42d7-98ad-92a7237d681c", ""), "html", null, true);
        yield " </div> ";
        $context["component_variable_382c3f6d_dcd9_4660_b59b_76eb9155b66d_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("<h3 class=\"text-align-center\"><span class=\"coh-color-white\">Site for International Healthcare Professionals only&nbsp;&nbsp;</span></h3><p class=\"text-align-center\"><br><span class=\"coh-color-white\"><u>Check if a local MyAlcon page is available for your country to access country product information</u></span></p><p class=\"text-align-center\"><br><span class=\"coh-color-white\">&nbsp;You are accessing Alcon's INTERNATIONAL online platform for Healthcare Professionals (MyAlcon).</span><br><span class=\"coh-color-white\">This platform is intended to provide general product information for education and illustration purposes.</span><br><span class=\"coh-color-white\">It is not intended to provide information to the general public or medical advice.</span></p><p class=\"text-align-center\"><br><span class=\"coh-color-white\">As product information, availability, indication and trade names may vary from country to country, the content of this site may not be fully in line with the approved or cleared product information in the country you are accessing from. Unless stated otherwise for specific product or event pages, the content on this site is based on the regulatory and legal principles applicable to the United Kingdom.</span></p><p class=\"text-align-center\">&nbsp;</p><p class=\"text-align-center\"><br><span class=\"coh-color-white\"><strong>By clicking Yes. I confirm that:</strong></span><br><span class=\"coh-color-white\">- I&nbsp;understand that this platform Is directed to Healthcare Professionals only and that I am a licensed Healthcare Professional.</span><br><span class=\"coh-color-white\">-&nbsp; I have read and agree to MyAlcon's </span><a class=\"coh-style-a-link-white\" href=\"https://www.au.alcon.com/terms-use\"><span class=\"coh-color-white\"><u>terms and conditions</u></span></a><span class=\"coh-color-white\"> and </span><a class=\"coh-style-a-link-white\" href=\"https://www.au.alcon.com/privacy-policy\"><span class=\"coh-color-white\"><u>privacy policy</u></span></a><span class=\"coh-color-white\"><strong>.</strong></span></p><p>&nbsp;</p>", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_382c3f6d_dcd9_4660_b59b_76eb9155b66d_textFormat"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("cohesion", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_9595ae9f_26d0_4855_9ddd_92a1c3ec5de0"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("Yes", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a976cf74_acfa_4bf1_8aa6_46d76413d5ae"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("No", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_1f7c651d_6069_44e9_bce0_3839af26e172"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("https://www.myalcon.com/international/professional/global-directory/", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_2778760a_7f2e_40a0_aef0_51f7160277d8"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_14be993a_3314_49e3_95de_2cd8617a6fe3"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("self", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_2e27a3d1_b617_44ed_99ea_50c3bc7fd0a4"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("self", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_prof_restricted_access_pu1", true, $this->sandbox->ensureToStringAllowed($context, 6, $this->source), ["382c3f6d-dcd9-4660-b59b-76eb9155b66d" => ["text" => "component_variable_382c3f6d_dcd9_4660_b59b_76eb9155b66d_text", "textFormat" => "component_variable_382c3f6d_dcd9_4660_b59b_76eb9155b66d_textFormat"], "9595ae9f-26d0-4855-9ddd-92a1c3ec5de0" => "component_variable_9595ae9f_26d0_4855_9ddd_92a1c3ec5de0", "a976cf74-acfa-4bf1-8aa6-46d76413d5ae" => "component_variable_a976cf74_acfa_4bf1_8aa6_46d76413d5ae", "1f7c651d-6069-44e9-bce0-3839af26e172" => "component_variable_1f7c651d_6069_44e9_bce0_3839af26e172", "2778760a-7f2e-40a0-aef0-51f7160277d8" => "component_variable_2778760a_7f2e_40a0_aef0_51f7160277d8", "14be993a-3314-49e3-95de-2cd8617a6fe3" => "component_variable_14be993a_3314_49e3_95de_2cd8617a6fe3", "2e27a3d1-b617-44ed-99ea-50c3bc7fd0a4" => "component_variable_2e27a3d1_b617_44ed_99ea_50c3bc7fd0a4"], "f91a98e3-5727-4cdd-a1bd-f71bea155013", "ff73492b-f181-473c-b7cc-6c16ecda8148"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_template_footer_professional", true, $this->sandbox->ensureToStringAllowed($context, 6, $this->source), [], "87e9a5b3-d473-40f7-815a-3716cbb87a34", ""), "html", null, true);
        yield " </article> 
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "title_suffix", "_context", "content", "media_reference"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "sites/default/files/cohesion/templates/node--cohesion--ctn-tpl-professional-template.html.twig";
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
        return array (  213 => 6,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "sites/default/files/cohesion/templates/node--cohesion--ctn-tpl-professional-template.html.twig", "/var/www/html/sites/default/files/cohesion/templates/node--cohesion--ctn-tpl-professional-template.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1, "trans" => 1, "if" => 1, "for" => 1);
        static $filters = array("escape" => 1);
        static $functions = array("attach_library" => 1, "renderComponent" => 1, "get_content_language" => 1, "processtoken" => 6);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'trans', 'if', 'for'],
                ['escape'],
                ['attach_library', 'renderComponent', 'get_content_language', 'processtoken'],
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
