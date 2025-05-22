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

/* sites/default/files/cohesion/templates/page--cohesion--master-template.html.twig */
class __TwigTemplate_7939debef7421caedb5d5c52830f6854 extends Template
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
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <main class=\"coh-container\" > ";
        if ($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->isActiveTheme("cohesion_theme")) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 1), 1, $this->source), "html", null, true);
        }
        yield " </main> ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <footer class=\"coh-container\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container coh-ce-46f80a9f\" > ";
        $context["component_variable_af01cd7a_833a_40fd_a8a9_f0656db075f5_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("<p><span id=\"ot-header-id-C0001\">1. Strictly Necessary Cookies</span> <span id=\"ot-header-id-C0002\">2. Functional Cookies</span> <span id=\"ot-header-id-C0003\">3. Targeting Cookies</span> <span id=\"ot-header-id-C0004\">4. Performance Cookies.</span> <span id=\"ot-header-id-C0005\">5. Social Media Cookies</span></p><p><span id=\"ot-status-id-C0001\">Close 1. Strictly Necessary Cookies</span> <span id=\"ot-status-id-C0002\">Close 2. Functional Cookies</span> <span id=\"ot-status-id-C0003\">Close 3. Targeting Cookies.</span> <span id=\"ot-status-id-C0004\">Close 4. Performance Cookies.</span> <span id=\"ot-status-id-C0005\">Close. 5. Social Media Cookies</span></p>", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_af01cd7a_833a_40fd_a8a9_f0656db075f5_textFormat"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("cohesion", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_897abae5_303a_4eef_943f_75b9f65132ab"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("coh-style-a-max-width-wide", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_952f179d_b4d8_4e69_9894_e4a39346e86f"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("coh-style-a-text-columns-one", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_9e834c9f_566d_43dd_b88d_0373b95ed01c"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_d2594a1b_6a3d_4af0_9cb4_311ce9b4cf8c"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_9620d4bd_3fc5_4f33_9a51_fe67c153963f"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_9869a998_5018_4552_9803_f16cee818fb0"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_7a56a305_cbd2_4329_b33d_fcba595e9ec4"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_text", true, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), ["af01cd7a-833a-40fd-a8a9-f0656db075f5" => ["text" => "component_variable_af01cd7a_833a_40fd_a8a9_f0656db075f5_text", "textFormat" => "component_variable_af01cd7a_833a_40fd_a8a9_f0656db075f5_textFormat"], "897abae5-303a-4eef-943f-75b9f65132ab" => "component_variable_897abae5_303a_4eef_943f_75b9f65132ab", "952f179d-b4d8-4e69-9894-e4a39346e86f" => "component_variable_952f179d_b4d8_4e69_9894_e4a39346e86f", "9e834c9f-566d-43dd-b88d-0373b95ed01c" => "component_variable_9e834c9f_566d_43dd_b88d_0373b95ed01c", "d2594a1b-6a3d-4af0-9cb4-311ce9b4cf8c" => "component_variable_d2594a1b_6a3d_4af0_9cb4_311ce9b4cf8c", "9620d4bd-3fc5-4f33-9a51-fe67c153963f" => "component_variable_9620d4bd_3fc5_4f33_9a51_fe67c153963f", "9869a998-5018-4552-9803-f16cee818fb0" => "component_variable_9869a998_5018_4552_9803_f16cee818fb0", "7a56a305-cbd2-4329-b33d-fcba595e9ec4" => "component_variable_7a56a305_cbd2_4329_b33d_fcba595e9ec4"], "79ccc8f8-f17d-48b1-8c54-4be543eba314", ""), "html", null, true);
        yield " </div> ";
        $context["component_variable_b7459e6d_d41e_4abf_9163_359cffe8498e_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("<h2 class=\"text-align-center\"><meta charset=\"utf-8\"><span style=\"white-space:pre-wrap;\">Get in touch with us</span></h2><p>&nbsp;</p>", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_b7459e6d_d41e_4abf_9163_359cffe8498e_textFormat"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("cohesion", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_c6afedd7_724e_444e_9937_8f397a1120ae"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("webform_9", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_1c28f9eb_2614_4fbd_9d2f_8ba56f11cdc5"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:754a4744-e115-4980-b59d-39e12a5e3f96]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), true), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_720d7f12_04c5_4305_8307_b65e1e809682"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:9d85dabe-5231-4244-ad72-e13f478c2964]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), true), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_f8df94e1_a067_4508_b083_bc9baf3d2bba"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("0%", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_1fa7ead9_18d8_4c59_9d23_87f69afc3647"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("rgba(0, 53, 149, 1)", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_b64b1754_442d_4c0b_aeda_344f5ba65f5a"] = false;
        yield " ";
        $context["component_variable_5adba9ac_fb49_488f_a761_e15e411c1713"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("lgstdsx10", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_webform_popup_close_btn", true, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), ["b7459e6d-d41e-4abf-9163-359cffe8498e" => ["text" => "component_variable_b7459e6d_d41e_4abf_9163_359cffe8498e_text", "textFormat" => "component_variable_b7459e6d_d41e_4abf_9163_359cffe8498e_textFormat"], "c6afedd7-724e-444e-9937-8f397a1120ae" => "component_variable_c6afedd7_724e_444e_9937_8f397a1120ae", "1c28f9eb-2614-4fbd-9d2f-8ba56f11cdc5" => "component_variable_1c28f9eb_2614_4fbd_9d2f_8ba56f11cdc5", "720d7f12-04c5-4305-8307-b65e1e809682" => "component_variable_720d7f12_04c5_4305_8307_b65e1e809682", "f8df94e1-a067-4508-b083-bc9baf3d2bba" => "component_variable_f8df94e1_a067_4508_b083_bc9baf3d2bba", "1fa7ead9-18d8-4c59-9d23-87f69afc3647" => "component_variable_1fa7ead9_18d8_4c59_9d23_87f69afc3647", "b64b1754-442d-4c0b-aeda-344f5ba65f5a" => "component_variable_b64b1754_442d_4c0b_aeda_344f5ba65f5a", "5adba9ac-fb49-488f-a761-e15e411c1713" => "component_variable_5adba9ac_fb49_488f_a761_e15e411c1713"], "af6d91b7-37f8-4d3d-a99a-340e8498d163", ""), "html", null, true);
        yield " </footer> 
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page", "_context", "media_reference"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "sites/default/files/cohesion/templates/page--cohesion--master-template.html.twig";
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
        return new Source("", "sites/default/files/cohesion/templates/page--cohesion--master-template.html.twig", "/var/www/html/sites/default/files/cohesion/templates/page--cohesion--master-template.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 1, "set" => 1, "trans" => 1);
        static $filters = array("escape" => 1);
        static $functions = array("attach_library" => 1, "isActiveTheme" => 1, "get_content_language" => 1, "renderComponent" => 1, "processtoken" => 1);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'trans'],
                ['escape'],
                ['attach_library', 'isActiveTheme', 'get_content_language', 'renderComponent', 'processtoken'],
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
