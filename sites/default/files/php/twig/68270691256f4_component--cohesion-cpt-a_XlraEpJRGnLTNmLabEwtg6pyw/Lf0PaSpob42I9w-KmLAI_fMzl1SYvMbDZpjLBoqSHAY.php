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

/* sites/default/files/cohesion/templates/component--cohesion-cpt-a-supernav-footer-profession.html.twig */
class __TwigTemplate_6ef8d526c26aac32f7909730cab697e8 extends Template
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
        $context["coh_instance_class"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohInstanceId($context), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
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
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/element_templates.link"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/element_templates.drupal-menu"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/element_templates.image"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/element_templates.row-for-columns"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container ssa-component coh-component ssa-component-instance-";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["componentUuid"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-component-instance-";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["componentUuid"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-style-footer ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-ce-cpt_a_supernav_footer_profession-7e045db8\" > <div class=\"coh-row coh-row-xl coh-row-visible-xl\" data-coh-row-match-heights=\"{&quot;xl&quot;:{&quot;target&quot;:&quot;none&quot;}}\"> <div class=\"coh-row-inner\"> <div class=\"coh-column coh-ce-cpt_a_supernav_footer_profession-6153bf23 coh-visible-sm coh-col-sm-12 coh-visible-xl coh-col-xl-6\" > ";
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "57b1eb9b-1a00-43d9-a72d-180b382d7edd", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            $context["inlineElementContent"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "57b1eb9b-1a00-43d9-a72d-180b382d7edd"));
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield " <span class=\"coh-inline-element ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "75ecbd54-c8a0-4b94-a334-1441f9b82d97"));
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
            yield " coh-ce-cpt_a_supernav_footer_profession-51d2a282\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["inlineElementContent"] ?? null), 1, $this->source), "html", null, true);
            yield "</span> ";
        }
        yield " ";
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "364b3f71-a13b-40ef-b4e2-9420cc40aa84", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " <h2 class=\"coh-heading ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7f5ff564-4ff0-4ee8-a97d-8c53d05a6372"));
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "44c3016d-d760-4b25-bace-f87f3d0a16a9"));
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
            yield " coh-ce-cpt_a_supernav_footer_profession-f9a7ff35\" ";
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", ["access visual page builder"], "method", false, false, true, 1) &&  !array_key_exists("component_content", $context))) {
                yield " data-ssa-field-uuid=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderFieldUuid($context, "364b3f71-a13b-40ef-b4e2-9420cc40aa84", "Array"), "html", null, true);
                yield "\" data-ssa-form-type=\"form-input\"";
            }
            yield " > ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "364b3f71-a13b-40ef-b4e2-9420cc40aa84"));
            yield " </h2> ";
        }
        yield " ";
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "4f00638e-2829-4804-8f0e-a3ca2bfe9a73", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
            yield " <a href=\"";
            $context["href"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "35eeae70-2419-42dc-9a25-516a5b6f7bc5"));
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->escapeURL($this->sandbox->ensureToStringAllowed(($context["href"] ?? null), 1, $this->source)), "html", null, true);
            yield "\" class=\"coh-link ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "98115a80-1773-407b-942d-0b566e249415"));
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "65b313c2-9ac9-447b-987e-2ada047ff8f6"));
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5221680e-4694-4e90-82f5-2a0f6c1a5206"));
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "dbb682c1-1642-4919-a0f6-639a0cad6e85"));
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "fb30a552-59b9-4f49-bc34-c5b96142ac4e"));
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
            yield " coh-ce-cpt_a_supernav_footer_profession-d2c14868\" ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f0c2db5b-2fed-4b12-9fa4-5506013f5fc7") != "")) {
                yield "target=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f0c2db5b-2fed-4b12-9fa4-5506013f5fc7"), "html", null, true);
                yield "\"";
            }
            yield " > ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "4f00638e-2829-4804-8f0e-a3ca2bfe9a73"));
            yield "    </a> ";
        }
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_wysiwyg"), "html", null, true);
        yield " <div class=\"coh-wysiwyg ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "975f0251-2198-4090-81dc-a9e203bab417"));
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "64a01165-2823-4e4a-a4de-7a3a2052314b"));
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "03d4d4dd-6167-428d-a6b9-9b28cad7494e"));
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "d60082e5-31d6-4029-84a9-17dcb775a929"));
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "c03f8012-b93d-4f61-84e6-e0156b050011"));
        yield "\" ";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", ["access visual page builder"], "method", false, false, true, 1) &&  !array_key_exists("component_content", $context))) {
            yield " data-ssa-field-uuid=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderFieldUuid($context, "ea3a019b-3f26-4013-886f-7f02e1391a15", "Array"), "html", null, true);
            yield "\" data-ssa-form-type=\"form-wysiwyg\"";
        }
        yield " > ";
        $context["wysiwyg"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ea3a019b-3f26-4013-886f-7f02e1391a15", "#text"), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["text_format"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ea3a019b-3f26-4013-886f-7f02e1391a15", "#textFormat"), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["token_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ea3a019b-3f26-4013-886f-7f02e1391a15", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->formatWysiwyg($this->sandbox->ensureToStringAllowed(($context["wysiwyg"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["text_format"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["token_text"] ?? null), 1, $this->source)), "html", null, true);
        yield " </div> </div> <div class=\"coh-column coh-ce-cpt_a_supernav_footer_profession-a02cfde1 coh-visible-sm coh-col-sm-6 coh-visible-xl coh-col-xl-2\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_drupal_menu"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderMenu("professional-footer-column-1", "", false, 1), "html", null, true);
        yield " </div> <div class=\"coh-column coh-ce-cpt_a_supernav_footer_profession-a02cfde1 coh-visible-sm coh-col-sm-6 coh-visible-xl coh-col-xl-2\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_drupal_menu"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderMenu("professional-footer-column-2", "", false, 1), "html", null, true);
        yield " </div> <div class=\"coh-column coh-ce-cpt_a_supernav_footer_profession-a02cfde1 coh-visible-sm coh-col-sm-6 coh-visible-xl coh-col-xl-2\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_drupal_menu"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderMenu("professional-footer-column-3", "", false, 1), "html", null, true);
        yield " </div> <div class=\"coh-column lang-box coh-ce-cpt_a_supernav_footer_profession-e30a9eed coh-visible-sm coh-col-sm-12 coh-col-xl-auto\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
        yield " <a href=\"";
        $context["href"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "65eff1a4-0950-40ac-9710-f646f040187e"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->escapeURL($this->sandbox->ensureToStringAllowed(($context["href"] ?? null), 1, $this->source)), "html", null, true);
        yield "\" class=\"coh-link lang-btn ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-ce-cpt_a_supernav_footer_profession-82ddcf60\" ";
        if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "8e624ec2-18a1-4b06-8a20-2f11e4ed1eec") == "")) {
        } else {
            yield "title=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "8e624ec2-18a1-4b06-8a20-2f11e4ed1eec"));
            yield "\"";
        }
        yield " target=\"_self\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "13bc154b-344b-4ede-a2fe-0a8d6f7e67fb"));
        yield "    </a> </div> <div class=\"coh-column ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-ce-cpt_a_supernav_footer_profession-b26ec37c coh-visible-sm coh-col-sm-6 coh-col-xl\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_drupal_menu"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderMenu("professional-footer-legal-links", "", false, 1), "html", null, true);
        yield " </div> <div class=\"coh-column coh-ce-cpt_a_supernav_footer_profession-c29098f7 coh-visible-sm coh-col-sm-12 coh-col-xl-auto\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_image"), "html", null, true);
        yield " <picture> <source srcset=\"";
        $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2bc3cfff-0781-43bc-8c53-827742d85653"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
        yield "\" media=\"(min-width: 1600px)\" type=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageMimeType($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
        yield "\"> <source srcset=\"";
        $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2bc3cfff-0781-43bc-8c53-827742d85653"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
        yield "\" media=\"(min-width: 1170px) and (max-width: 1599px)\" type=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageMimeType($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
        yield "\"> <source srcset=\"";
        $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2bc3cfff-0781-43bc-8c53-827742d85653"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
        yield "\" media=\"(min-width: 1024px) and (max-width: 1169px)\" type=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageMimeType($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
        yield "\"> <source srcset=\"";
        $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2bc3cfff-0781-43bc-8c53-827742d85653"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
        yield "\" media=\"(min-width: 768px) and (max-width: 1023px)\" type=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageMimeType($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
        yield "\"> <source srcset=\"";
        $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2bc3cfff-0781-43bc-8c53-827742d85653"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
        yield "\" media=\"(min-width: 565px) and (max-width: 767px)\" type=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageMimeType($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
        yield "\"> <source srcset=\"";
        $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2bc3cfff-0781-43bc-8c53-827742d85653"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
        yield "\" media=\"(min-width: 0px) and (max-width: 564px)\" type=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageMimeType($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
        yield "\"> <img class=\"coh-image coh-ce-cpt_a_supernav_footer_profession-201608de coh-image-responsive-xl\" src=\"";
        $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2bc3cfff-0781-43bc-8c53-827742d85653"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
        yield "\" ";
        if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "93129e94-d9d4-46c2-8268-81667defc275") == "")) {
            yield "alt";
        } else {
            yield "alt=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "93129e94-d9d4-46c2-8268-81667defc275"));
            yield "\"";
        }
        yield " /> </picture> </div> </div> </div> </div> 
";
        // line 2
        $context["compiledCSS"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield "<style>";
            if (( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a90ab494-d0c9-4718-a9e9-fe4c5c3c1d0e")) ||  !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7fe88373-a216-474e-8caa-9064c2a6427f")))) {
                yield ".";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 2, $this->source), "html", null, true);
                yield ".coh-ce-cpt_a_supernav_footer_profession-7e045db8 {
";
                // line 3
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a90ab494-d0c9-4718-a9e9-fe4c5c3c1d0e"))) {
                    yield "   ";
                    if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a90ab494-d0c9-4718-a9e9-fe4c5c3c1d0e"))) {
                        yield " background-color: ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a90ab494-d0c9-4718-a9e9-fe4c5c3c1d0e"));
                        yield ";";
                    }
                }
                // line 4
                yield "}
.";
                // line 5
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 5, $this->source), "html", null, true);
                yield ".coh-ce-cpt_a_supernav_footer_profession-7e045db8 .menu .menu-item a {
";
                // line 6
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7fe88373-a216-474e-8caa-9064c2a6427f"))) {
                    yield "   ";
                    if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7fe88373-a216-474e-8caa-9064c2a6427f"))) {
                        yield " color: ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7fe88373-a216-474e-8caa-9064c2a6427f"));
                        yield ";";
                    }
                }
                // line 7
                yield "}";
            }
            // line 8
            yield ".";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 8, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-51d2a282 {
";
            // line 9
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "d90f50b1-777e-4e26-ae93-c243ad8f2ff2"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "d90f50b1-777e-4e26-ae93-c243ad8f2ff2"))) {
                    yield " color: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "d90f50b1-777e-4e26-ae93-c243ad8f2ff2"));
                    yield ";";
                }
            }
            // line 10
            yield "  margin-bottom: 20px;
}
.";
            // line 12
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 12, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-f9a7ff35 {
";
            // line 13
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "51357ec2-5ea6-4634-8c18-f6f749c5e633"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "51357ec2-5ea6-4634-8c18-f6f749c5e633"))) {
                    yield " color: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "51357ec2-5ea6-4634-8c18-f6f749c5e633"));
                    yield ";";
                }
            }
            // line 14
            yield "  margin-top: 10px;
  margin-bottom: 20px;
  max-width: 300px;
  text-align: left;
}
@media (max-width: 1023px) {
  .";
            // line 20
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 20, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-f9a7ff35 {
    text-align: center;
    max-width: 100%;
  }
}
.";
            // line 25
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 25, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-d2c14868 {
";
            // line 26
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "66da1c64-532c-41b1-b8b4-96bf54ac47f5"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "66da1c64-532c-41b1-b8b4-96bf54ac47f5"))) {
                    yield " color: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "66da1c64-532c-41b1-b8b4-96bf54ac47f5"));
                    yield ";";
                }
            }
            // line 27
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "1dfc0289-49c8-4ac1-abe0-edd01d1889a7"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "1dfc0289-49c8-4ac1-abe0-edd01d1889a7"))) {
                    yield " background-color: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "1dfc0289-49c8-4ac1-abe0-edd01d1889a7"));
                    yield ";";
                }
            }
            // line 28
            yield "  border-width: 1px;
  -webkit-border-radius: 30px;
          border-radius: 30px;
  border-style: solid;
  border-color: rgb(230, 232, 238);
  text-align: center;
  min-width: 100px;
  width: auto;
  margin-bottom: 20px;
  font-weight: 600;
}
@media (max-width: 1023px) {
  .";
            // line 40
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 40, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-d2c14868 {
    min-width: 200px;
  }
}
@media (max-width: 767px) {
  .";
            // line 45
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 45, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-d2c14868 {
    max-width: 100%;
    width: 100%;
  }
}
.";
            // line 50
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 50, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-82ddcf60 {
  font-weight: 400;
  -webkit-flex-wrap: wrap;
      -ms-flex-wrap: wrap;
          flex-wrap: wrap;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
";
            // line 63
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "d90f50b1-777e-4e26-ae93-c243ad8f2ff2"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "d90f50b1-777e-4e26-ae93-c243ad8f2ff2"))) {
                    yield " color: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "d90f50b1-777e-4e26-ae93-c243ad8f2ff2"));
                    yield ";";
                }
            }
            // line 64
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ca45ae84-19a1-48e7-9734-a3c52401d853"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ca45ae84-19a1-48e7-9734-a3c52401d853"))) {
                    yield " background-color: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ca45ae84-19a1-48e7-9734-a3c52401d853"));
                    yield ";";
                }
            }
            // line 65
            yield "}
@media (max-width: 1023px) {
  .";
            // line 67
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 67, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-82ddcf60 {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
  }
}
.";
            // line 74
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 74, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-82ddcf60:before {
";
            // line 75
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "615b71b8-be3f-4941-8807-71638dd761f0"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "615b71b8-be3f-4941-8807-71638dd761f0"))) {
                    yield " background-image: url(\"";
                    $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "615b71b8-be3f-4941-8807-71638dd761f0"));
                        return; yield '';
                    })())) ? '' : new Markup($tmp, $this->env->getCharset());
                    $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                        return; yield '';
                    })())) ? '' : new Markup($tmp, $this->env->getCharset());
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 75, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 75, $this->source)), "html", null, true);
                    yield "\");";
                }
            }
            // line 76
            yield "  background-position: left top;
  background-size: 20px 20px;
  background-repeat: no-repeat;
  background-attachment: scroll;
  max-height: 20px;
  height: 20px;
  max-width: 20px;
  width: 20px;
  padding-right: 5px;
  float: left;
  display: inline-block;
  content: \"\";
}
@media (max-width: 1023px) {
  .";
            // line 90
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 90, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-82ddcf60:before {
    max-height: 20px;
    height: 20px;
    max-width: 20px;
    width: 20px;
  }
}
.";
            // line 97
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 97, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-b26ec37c {
  padding-top: 50px;
  border-top-width: 1px;
  border-top-style: solid;
  border-top-color: rgba(255, 255, 255, 0.1);
}
@media (max-width: 1023px) {
  .";
            // line 104
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 104, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-b26ec37c {
    padding-top: 30px;
    padding-bottom: 30px;
    border-top-width: 0px;
    border-top-style: none;
  }
}
.";
            // line 111
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 111, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-b26ec37c .menu {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
      -ms-flex-direction: row;
          flex-direction: row;
}
@media (max-width: 1023px) {
  .";
            // line 123
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 123, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-b26ec37c .menu {
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
        -ms-flex-direction: column;
            flex-direction: column;
  }
}
.";
            // line 131
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 131, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-b26ec37c .menu .menu-item {
  margin-right: 30px;
  margin-left: 0px;
  text-align: center;
}
@media (max-width: 1023px) {
  .";
            // line 137
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 137, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-b26ec37c .menu .menu-item {
    margin-right: 0px;
    margin-left: 1rem;
    text-align: left;
  }
}
@media (max-width: 767px) {
  .";
            // line 144
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 144, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-b26ec37c .menu .menu-item {
    text-align: left;
  }
}
@media (max-width: 564px) {
  .";
            // line 149
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 149, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-b26ec37c .menu .menu-item {
    text-align: left;
  }
}
.";
            // line 153
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 153, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-b26ec37c .menu .menu-item a:before {
  line-height: 1.0;
  font-weight: normal;
  text-transform: none;
  speak: none;
  font-variant: normal;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  content: \"\\f111\";
  font-family: icomoon;
";
            // line 163
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7fe88373-a216-474e-8caa-9064c2a6427f"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7fe88373-a216-474e-8caa-9064c2a6427f"))) {
                    yield " color: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7fe88373-a216-474e-8caa-9064c2a6427f"));
                    yield ";";
                }
            }
            // line 164
            yield "  display: none;
  padding-right: 30px;
  font-size: 8px;
}
@media (max-width: 1023px) {
  .";
            // line 169
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 169, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_supernav_footer_profession-b26ec37c .menu .menu-item a:before {
    display: none;
  }
}
</style>";
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 173
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderInlineStyle($this->sandbox->ensureToStringAllowed(($context["compiledCSS"] ?? null), 173, $this->source)));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["componentUuid", "user", "component_content"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "sites/default/files/cohesion/templates/component--cohesion-cpt-a-supernav-footer-profession.html.twig";
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
        return array (  658 => 173,  649 => 169,  642 => 164,  633 => 163,  620 => 153,  613 => 149,  605 => 144,  595 => 137,  586 => 131,  575 => 123,  560 => 111,  550 => 104,  540 => 97,  530 => 90,  514 => 76,  498 => 75,  494 => 74,  484 => 67,  480 => 65,  471 => 64,  462 => 63,  446 => 50,  438 => 45,  430 => 40,  416 => 28,  407 => 27,  398 => 26,  394 => 25,  386 => 20,  378 => 14,  369 => 13,  365 => 12,  361 => 10,  352 => 9,  347 => 8,  344 => 7,  335 => 6,  331 => 5,  328 => 4,  319 => 3,  311 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "sites/default/files/cohesion/templates/component--cohesion-cpt-a-supernav-footer-profession.html.twig", "/var/www/html/sites/default/files/cohesion/templates/component--cohesion-cpt-a-supernav-footer-profession.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1, "if" => 1);
        static $filters = array("escape" => 1, "trim" => 1, "raw" => 1);
        static $functions = array("coh_instanceid" => 1, "attach_library" => 1, "getComponentFieldValue" => 1, "render_field_uuid" => 1, "escape_url" => 1, "format_wysiwyg" => 1, "render_menu" => 1, "cohesion_image_style" => 1, "cohesion_image_mime_type" => 1, "renderInlineStyle" => 173);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 'trim', 'raw'],
                ['coh_instanceid', 'attach_library', 'getComponentFieldValue', 'render_field_uuid', 'escape_url', 'format_wysiwyg', 'render_menu', 'cohesion_image_style', 'cohesion_image_mime_type', 'renderInlineStyle'],
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
