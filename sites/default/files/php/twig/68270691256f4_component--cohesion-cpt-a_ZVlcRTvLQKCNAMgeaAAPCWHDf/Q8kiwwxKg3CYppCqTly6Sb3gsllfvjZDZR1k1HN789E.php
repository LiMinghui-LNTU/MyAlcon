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

/* sites/default/files/cohesion/templates/component--cohesion-cpt-a-hero-m1-txt-bkgrd-img.html.twig */
class __TwigTemplate_846126a904d5873ff41e0afa54449927 extends Template
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
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <section class=\"coh-container ssa-component coh-component ssa-component-instance-";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["componentUuid"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-component-instance-";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["componentUuid"] ?? null), 1, $this->source), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-ce-cpt_a_hero_m1_txt_bkgrd_img-83103057\" > ";
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f0cbac1f-e5a3-437a-a021-dccce1ff33bd", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            $context["block_name"] = ('' === $tmp = "salesforcelivechatcode") ? '' : new Markup($tmp, $this->env->getCharset());
            yield " <div class=\"coh-block\"> ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->drupalBlock($this->sandbox->ensureToStringAllowed(($context["block_name"] ?? null), 1, $this->source)), "html", null, true);
            yield " </div> ";
        }
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-ce-cpt_a_hero_m1_txt_bkgrd_img-47609ee1\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "c1f79b49-7c87-4b49-b3c8-18ff18218af1"));
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "467f75ed-517e-4c19-b87f-97cd298023d9"));
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "e24be338-2acc-4335-8f51-763142148874"));
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "bafb82c4-2d5a-447b-b688-07468a9cecd8"));
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-ce-cpt_a_hero_m1_txt_bkgrd_img-5108030a\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "6b229834-12d3-459f-a59d-3417a7406830"));
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-ce-cpt_a_hero_m1_txt_bkgrd_img-90bb702d\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5ae26751-330e-40d8-920c-75ed7772c514"));
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "e88775ce-5066-48ff-a23c-591defc45db4"));
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ba688780-c124-44ae-85f6-776398acce40"));
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "9ddc8046-21ab-4bc7-833f-43028dc57e54"));
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "968918d2-01e2-484f-891f-3eda6b2c2695"));
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-ce-cpt_a_hero_m1_txt_bkgrd_img-6ce87a10\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_wysiwyg"), "html", null, true);
        yield " <div class=\"coh-wysiwyg\" ";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", ["access visual page builder"], "method", false, false, true, 1) &&  !array_key_exists("component_content", $context))) {
            yield " data-ssa-field-uuid=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderFieldUuid($context, "ba2ccfef-05db-4e04-a813-8021cd1f0031", "Array"), "html", null, true);
            yield "\" data-ssa-form-type=\"form-wysiwyg\"";
        }
        yield " > ";
        $context["wysiwyg"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ba2ccfef-05db-4e04-a813-8021cd1f0031", "#text"), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["text_format"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ba2ccfef-05db-4e04-a813-8021cd1f0031", "#textFormat"), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["token_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ba2ccfef-05db-4e04-a813-8021cd1f0031", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->formatWysiwyg($this->sandbox->ensureToStringAllowed(($context["wysiwyg"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["text_format"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["token_text"] ?? null), 1, $this->source)), "html", null, true);
        yield " </div> ";
        $context["nid_2684782023"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7e4b567d-b0d7-43fa-ae04-7ace6fd6d192"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["nid_2445927336"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "40c3b822-744e-469f-948b-cced105020d3"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            if ((($context["nid_2684782023"] ?? null) != "")) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->pathRenderer($this->sandbox->ensureToStringAllowed(($context["nid_2684782023"] ?? null), 1, $this->source)), "html", null, true);
            }
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "714a1a11-0852-4103-99b9-c4c6582efb03", ""), "html", null, true);
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "b6062003-4bca-44c2-ae63-793a2d9ec3f7", ""), "html", null, true);
            if ((($context["nid_2445927336"] ?? null) != "")) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->pathRenderer($this->sandbox->ensureToStringAllowed(($context["nid_2445927336"] ?? null), 1, $this->source)), "html", null, true);
            }
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "aadd6b54-8985-4d12-85c6-8831a7f6ea9d", ""), "html", null, true);
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "8def705f-38a0-4f30-8ef0-0dfe090fc7b5", ""), "html", null, true);
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f0cbac1f-e5a3-437a-a021-dccce1ff33bd", ""), "html", null, true);
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "e20ee81e-9708-4e2a-980d-5c87013130dd", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
            yield " <div class=\"coh-container ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
            yield " coh-ce-cpt_a_hero_m1_txt_bkgrd_img-ee5f1760\" > ";
            $context["nid_2684782023"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7e4b567d-b0d7-43fa-ae04-7ace6fd6d192"));
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                if ((($context["nid_2684782023"] ?? null) != "")) {
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->pathRenderer($this->sandbox->ensureToStringAllowed(($context["nid_2684782023"] ?? null), 1, $this->source)), "html", null, true);
                }
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield " ";
            if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
                yield " ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
                yield " <a href=\"";
                $context["href"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7e4b567d-b0d7-43fa-ae04-7ace6fd6d192"));
                    return; yield '';
                })())) ? '' : new Markup($tmp, $this->env->getCharset());
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->escapeURL($this->sandbox->ensureToStringAllowed(($context["href"] ?? null), 1, $this->source)), "html", null, true);
                yield "\" class=\"coh-link ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "d724510b-344b-438a-9564-f03edd87b3e0"));
                yield "\" ";
                if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "8629a8d4-56e8-42d8-baa4-bb9d8f6fab42") != "")) {
                    yield "target=\"";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "8629a8d4-56e8-42d8-baa4-bb9d8f6fab42"), "html", null, true);
                    yield "\"";
                }
                yield " > ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "8de35a71-15d6-48c3-8b4a-52cc19e108c0"));
                yield "    </a> ";
            }
            yield " ";
            $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "714a1a11-0852-4103-99b9-c4c6582efb03", ""), "html", null, true);
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield " ";
            if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
                yield " ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
                yield " <a href=\"javascript:void(0)\" class=\"coh-link ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "d724510b-344b-438a-9564-f03edd87b3e0"));
                yield "\" data-modal-open='";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "714a1a11-0852-4103-99b9-c4c6582efb03"));
                yield "' role=\"button\" > ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "8de35a71-15d6-48c3-8b4a-52cc19e108c0"));
                yield "    </a> ";
            }
            yield " ";
            $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "b6062003-4bca-44c2-ae63-793a2d9ec3f7", ""), "html", null, true);
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield " ";
            if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
                yield " ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
                yield " <a href=\"#";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "b6062003-4bca-44c2-ae63-793a2d9ec3f7"));
                yield "\" class=\"coh-link ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "d724510b-344b-438a-9564-f03edd87b3e0"));
                yield "\" > ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "8de35a71-15d6-48c3-8b4a-52cc19e108c0"));
                yield "    </a> ";
            }
            yield " ";
            $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f0cbac1f-e5a3-437a-a021-dccce1ff33bd", ""), "html", null, true);
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield " ";
            if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
                yield " ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
                yield " <a href=\"javascript:void(0)\" class=\"coh-link live-chat-salesforce ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "d724510b-344b-438a-9564-f03edd87b3e0"));
                yield "\" title=\"Chat is loading...\" target=\"_self\" > ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "8de35a71-15d6-48c3-8b4a-52cc19e108c0"));
                yield "    </a> ";
            }
            yield " ";
            $context["nid_2445927336"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "40c3b822-744e-469f-948b-cced105020d3"));
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                if ((($context["nid_2445927336"] ?? null) != "")) {
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->pathRenderer($this->sandbox->ensureToStringAllowed(($context["nid_2445927336"] ?? null), 1, $this->source)), "html", null, true);
                }
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield " ";
            if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
                yield " ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
                yield " <a href=\"";
                $context["href"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "40c3b822-744e-469f-948b-cced105020d3"));
                    return; yield '';
                })())) ? '' : new Markup($tmp, $this->env->getCharset());
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->escapeURL($this->sandbox->ensureToStringAllowed(($context["href"] ?? null), 1, $this->source)), "html", null, true);
                yield "\" class=\"coh-link ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "85b4cdbe-215b-47ca-807a-c95bf2fa2b73"));
                yield " coh-ce-cpt_a_hero_m1_txt_bkgrd_img-38862444\" ";
                if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "41798e91-337f-48a3-bf42-65b2da4b5440") != "")) {
                    yield "target=\"";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "41798e91-337f-48a3-bf42-65b2da4b5440"), "html", null, true);
                    yield "\"";
                }
                yield " > ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "659ac605-dbce-43d3-8855-da0538f4a768"));
                yield "    </a> ";
            }
            yield " ";
            $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "aadd6b54-8985-4d12-85c6-8831a7f6ea9d", ""), "html", null, true);
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield " ";
            if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
                yield " ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
                yield " <a href=\"javascript:void(0)\" class=\"coh-link ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "85b4cdbe-215b-47ca-807a-c95bf2fa2b73"));
                yield " coh-ce-cpt_a_hero_m1_txt_bkgrd_img-38862444\" data-modal-open='";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "aadd6b54-8985-4d12-85c6-8831a7f6ea9d"));
                yield "' role=\"button\" > ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "659ac605-dbce-43d3-8855-da0538f4a768"));
                yield "    </a> ";
            }
            yield " ";
            $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "8def705f-38a0-4f30-8ef0-0dfe090fc7b5", ""), "html", null, true);
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield " ";
            if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
                yield " ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
                yield " <a href=\"#";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "8def705f-38a0-4f30-8ef0-0dfe090fc7b5"));
                yield "\" class=\"coh-link ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "85b4cdbe-215b-47ca-807a-c95bf2fa2b73"));
                yield " coh-ce-cpt_a_hero_m1_txt_bkgrd_img-38862444\" > ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "659ac605-dbce-43d3-8855-da0538f4a768"));
                yield "    </a> ";
            }
            yield " ";
            $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "e20ee81e-9708-4e2a-980d-5c87013130dd", ""), "html", null, true);
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield " ";
            if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
                yield " ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
                yield " <a href=\"javascript:void(0)\" class=\"coh-link live-chat-salesforce ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "85b4cdbe-215b-47ca-807a-c95bf2fa2b73"));
                yield " coh-ce-cpt_a_hero_m1_txt_bkgrd_img-38862444\" target=\"_self\" > ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "659ac605-dbce-43d3-8855-da0538f4a768"));
                yield "    </a> ";
            }
            yield " </div> ";
        }
        yield " ";
        $context["wysiwyg_3590618946"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "aa32f338-0dd8-4def-ba41-dc83fd47f101", "#text"), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["text_format_3590618946"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "aa32f338-0dd8-4def-ba41-dc83fd47f101", "#textFormat"), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["token_text_3590618946"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "aa32f338-0dd8-4def-ba41-dc83fd47f101", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->formatWysiwyg($this->sandbox->ensureToStringAllowed(($context["wysiwyg_3590618946"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["text_format_3590618946"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["token_text_3590618946"] ?? null), 1, $this->source)), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_wysiwyg"), "html", null, true);
            yield " <div class=\"coh-wysiwyg\" ";
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", ["access visual page builder"], "method", false, false, true, 1) &&  !array_key_exists("component_content", $context))) {
                yield " data-ssa-field-uuid=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderFieldUuid($context, "aa32f338-0dd8-4def-ba41-dc83fd47f101", "Array"), "html", null, true);
                yield "\" data-ssa-form-type=\"form-wysiwyg\"";
            }
            yield " > ";
            $context["wysiwyg"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "aa32f338-0dd8-4def-ba41-dc83fd47f101", "#text"), "html", null, true);
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield " ";
            $context["text_format"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "aa32f338-0dd8-4def-ba41-dc83fd47f101", "#textFormat"), "html", null, true);
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield " ";
            $context["token_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "aa32f338-0dd8-4def-ba41-dc83fd47f101", ""), "html", null, true);
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->formatWysiwyg($this->sandbox->ensureToStringAllowed(($context["wysiwyg"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["text_format"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["token_text"] ?? null), 1, $this->source)), "html", null, true);
            yield " </div> ";
        }
        yield " </div> </div> </div> </div> </section> 
";
        // line 2
        $context["compiledCSS"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield "<style>.";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 2, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_hero_m1_txt_bkgrd_img-83103057 {
  margin-right: auto;
  margin-left: auto;
";
            // line 5
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "11336112-edd8-4a82-b3fe-ad23099fa9f3"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "11336112-edd8-4a82-b3fe-ad23099fa9f3"))) {
                    yield " background-color: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "11336112-edd8-4a82-b3fe-ad23099fa9f3"));
                    yield ";";
                }
            }
            // line 6
            yield "}
.";
            // line 7
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 7, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_hero_m1_txt_bkgrd_img-47609ee1 {
";
            // line 8
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ba6cf312-cc5b-449b-98b1-fdb8702139d5"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ba6cf312-cc5b-449b-98b1-fdb8702139d5"))) {
                    yield " background-image: url(\"";
                    $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ba6cf312-cc5b-449b-98b1-fdb8702139d5"));
                        return; yield '';
                    })())) ? '' : new Markup($tmp, $this->env->getCharset());
                    $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                        return; yield '';
                    })())) ? '' : new Markup($tmp, $this->env->getCharset());
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 8, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 8, $this->source)), "html", null, true);
                    yield "\");";
                }
            }
            // line 9
            yield "  background-position: center top;
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: scroll;
}
@media (max-width: 767px) {
  .";
            // line 15
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 15, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_hero_m1_txt_bkgrd_img-47609ee1 {
";
            // line 16
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7ccb4916-ec51-4aa4-974c-03c9a7d78579"))) {
                yield " ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7ccb4916-ec51-4aa4-974c-03c9a7d78579"))) {
                    yield "     ";
                    if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7ccb4916-ec51-4aa4-974c-03c9a7d78579"))) {
                        yield " background-image: url(\"";
                        $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7ccb4916-ec51-4aa4-974c-03c9a7d78579"));
                            return; yield '';
                        })())) ? '' : new Markup($tmp, $this->env->getCharset());
                        $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                            return; yield '';
                        })())) ? '' : new Markup($tmp, $this->env->getCharset());
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 16, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 16, $this->source)), "html", null, true);
                        yield "\");";
                    }
                }
            }
            // line 17
            yield "    background-position: center top;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: scroll;
  }
}
@media (max-width: 564px) {
  .";
            // line 24
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 24, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_hero_m1_txt_bkgrd_img-47609ee1 {
    ";
            // line 25
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7ccb4916-ec51-4aa4-974c-03c9a7d78579"))) {
                yield " background-image: url(\"";
                $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7ccb4916-ec51-4aa4-974c-03c9a7d78579"));
                    return; yield '';
                })())) ? '' : new Markup($tmp, $this->env->getCharset());
                $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                    return; yield '';
                })())) ? '' : new Markup($tmp, $this->env->getCharset());
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 25, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 25, $this->source)), "html", null, true);
                yield "\");";
            }
            // line 26
            yield "    background-position: center top;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: scroll;
  }
}
";
            // line 32
            if ((( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "0d270cb9-0c3e-42b6-9421-5efc590e5817")) ||  !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "53db68b4-e945-4245-9728-038c9f3ad3ad"))) ||  !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "53db68b4-e945-4245-9728-038c9f3ad3ad")))) {
                yield ".";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 32, $this->source), "html", null, true);
                yield ".coh-ce-cpt_a_hero_m1_txt_bkgrd_img-5108030a {
";
                // line 33
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "0d270cb9-0c3e-42b6-9421-5efc590e5817"))) {
                    yield "   ";
                    if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "0d270cb9-0c3e-42b6-9421-5efc590e5817"))) {
                        yield " background-color: ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "0d270cb9-0c3e-42b6-9421-5efc590e5817"));
                        yield ";";
                    }
                }
                // line 34
                yield "}
@media (max-width: 767px) {
  .";
                // line 36
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 36, $this->source), "html", null, true);
                yield ".coh-ce-cpt_a_hero_m1_txt_bkgrd_img-5108030a {
";
                // line 37
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "53db68b4-e945-4245-9728-038c9f3ad3ad"))) {
                    yield " ";
                    if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "53db68b4-e945-4245-9728-038c9f3ad3ad"))) {
                        yield "     ";
                        if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "53db68b4-e945-4245-9728-038c9f3ad3ad"))) {
                            yield " background-color: ";
                            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "53db68b4-e945-4245-9728-038c9f3ad3ad"));
                            yield ";";
                        }
                    }
                }
                // line 38
                yield "  }
}
@media (max-width: 564px) {
  .";
                // line 41
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 41, $this->source), "html", null, true);
                yield ".coh-ce-cpt_a_hero_m1_txt_bkgrd_img-5108030a {
    ";
                // line 42
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "53db68b4-e945-4245-9728-038c9f3ad3ad"))) {
                    yield " background-color: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "53db68b4-e945-4245-9728-038c9f3ad3ad"));
                    yield ";";
                }
                // line 43
                yield "  }
}";
            }
            // line 45
            yield ".";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 45, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_hero_m1_txt_bkgrd_img-90bb702d {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
";
            // line 50
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                    yield " -webkit-box-align: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"));
                    yield ";";
                }
            }
            // line 51
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                    yield " -webkit-align-items: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"));
                    yield ";";
                }
            }
            // line 52
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                yield "       ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                    yield " -ms-flex-align: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"));
                    yield ";";
                }
            }
            // line 53
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                yield "           ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                    yield " align-items: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"));
                    yield ";";
                }
            }
            // line 54
            yield "}
@media (max-width: 767px) {
  .";
            // line 56
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 56, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_hero_m1_txt_bkgrd_img-90bb702d {
";
            // line 57
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                yield " ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                    yield "     ";
                    if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                        yield " -webkit-box-align: ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"));
                        yield ";";
                    }
                }
            }
            // line 58
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                yield " ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                    yield "     ";
                    if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                        yield " -webkit-align-items: ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"));
                        yield ";";
                    }
                }
            }
            // line 59
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                yield " ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                    yield "         ";
                    if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                        yield " -ms-flex-align: ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"));
                        yield ";";
                    }
                }
            }
            // line 60
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                yield " ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                    yield "             ";
                    if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                        yield " align-items: ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"));
                        yield ";";
                    }
                }
            }
            // line 61
            yield "  }
}
@media (max-width: 564px) {
  .";
            // line 64
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 64, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_hero_m1_txt_bkgrd_img-90bb702d {
    ";
            // line 65
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                yield " -webkit-box-align: ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"));
                yield ";";
            }
            // line 66
            yield "    ";
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                yield " -webkit-align-items: ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"));
                yield ";";
            }
            // line 67
            yield "        ";
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                yield " -ms-flex-align: ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"));
                yield ";";
            }
            // line 68
            yield "            ";
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"))) {
                yield " align-items: ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ec9d174b-2a50-4f94-9e62-864e4bf5b637"));
                yield ";";
            }
            // line 69
            yield "  }
}
.";
            // line 71
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 71, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_hero_m1_txt_bkgrd_img-6ce87a10 {
";
            // line 72
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "71b2d39b-eba2-4eeb-954b-e075c3ee4c61"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "71b2d39b-eba2-4eeb-954b-e075c3ee4c61"))) {
                    yield " width: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "71b2d39b-eba2-4eeb-954b-e075c3ee4c61"));
                    yield ";";
                }
            }
            // line 73
            yield "  min-width: 330px;
}
@media (max-width: 767px) {
  .";
            // line 76
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 76, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_hero_m1_txt_bkgrd_img-6ce87a10 {
";
            // line 77
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "71b2d39b-eba2-4eeb-954b-e075c3ee4c61"))) {
                yield "     ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "71b2d39b-eba2-4eeb-954b-e075c3ee4c61"))) {
                    yield " width: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "71b2d39b-eba2-4eeb-954b-e075c3ee4c61"));
                    yield ";";
                }
            }
            // line 78
            yield "    min-width: 330px;
  }
}
.";
            // line 81
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 81, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_hero_m1_txt_bkgrd_img-ee5f1760 {
  margin-top: 24px;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
      -ms-flex-direction: row;
          flex-direction: row;
  -webkit-flex-wrap: nowrap;
      -ms-flex-wrap: nowrap;
          flex-wrap: nowrap;
";
            // line 95
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5434fcb5-c947-4214-8603-22c584b0fee8"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5434fcb5-c947-4214-8603-22c584b0fee8"))) {
                    yield " -webkit-box-pack: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5434fcb5-c947-4214-8603-22c584b0fee8"));
                    yield ";";
                }
            }
            // line 96
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5434fcb5-c947-4214-8603-22c584b0fee8"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5434fcb5-c947-4214-8603-22c584b0fee8"))) {
                    yield " -webkit-justify-content: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5434fcb5-c947-4214-8603-22c584b0fee8"));
                    yield ";";
                }
            }
            // line 97
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5434fcb5-c947-4214-8603-22c584b0fee8"))) {
                yield "       ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5434fcb5-c947-4214-8603-22c584b0fee8"))) {
                    yield " -ms-flex-pack: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5434fcb5-c947-4214-8603-22c584b0fee8"));
                    yield ";";
                }
            }
            // line 98
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5434fcb5-c947-4214-8603-22c584b0fee8"))) {
                yield "           ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5434fcb5-c947-4214-8603-22c584b0fee8"))) {
                    yield " justify-content: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5434fcb5-c947-4214-8603-22c584b0fee8"));
                    yield ";";
                }
            }
            // line 99
            yield "}
@media (max-width: 564px) {
  .";
            // line 101
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 101, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_hero_m1_txt_bkgrd_img-ee5f1760 {
    display: block;
  }
}
</style>";
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 105
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderInlineStyle($this->sandbox->ensureToStringAllowed(($context["compiledCSS"] ?? null), 105, $this->source)));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["componentUuid", "user", "component_content"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "sites/default/files/cohesion/templates/component--cohesion-cpt-a-hero-m1-txt-bkgrd-img.html.twig";
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
        return array (  786 => 105,  777 => 101,  773 => 99,  764 => 98,  755 => 97,  746 => 96,  737 => 95,  720 => 81,  715 => 78,  706 => 77,  702 => 76,  697 => 73,  688 => 72,  684 => 71,  680 => 69,  673 => 68,  666 => 67,  659 => 66,  653 => 65,  649 => 64,  644 => 61,  632 => 60,  620 => 59,  608 => 58,  596 => 57,  592 => 56,  588 => 54,  579 => 53,  570 => 52,  561 => 51,  552 => 50,  543 => 45,  539 => 43,  533 => 42,  529 => 41,  524 => 38,  512 => 37,  508 => 36,  504 => 34,  495 => 33,  489 => 32,  481 => 26,  468 => 25,  464 => 24,  455 => 17,  436 => 16,  432 => 15,  424 => 9,  408 => 8,  404 => 7,  401 => 6,  392 => 5,  384 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "sites/default/files/cohesion/templates/component--cohesion-cpt-a-hero-m1-txt-bkgrd-img.html.twig", "/var/www/html/sites/default/files/cohesion/templates/component--cohesion-cpt-a-hero-m1-txt-bkgrd-img.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1, "if" => 1);
        static $filters = array("escape" => 1, "trim" => 1, "raw" => 1);
        static $functions = array("coh_instanceid" => 1, "attach_library" => 1, "getComponentFieldValue" => 1, "drupal_block" => 1, "render_field_uuid" => 1, "format_wysiwyg" => 1, "path_renderer" => 1, "escape_url" => 1, "cohesion_image_style" => 8, "renderInlineStyle" => 105);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 'trim', 'raw'],
                ['coh_instanceid', 'attach_library', 'getComponentFieldValue', 'drupal_block', 'render_field_uuid', 'format_wysiwyg', 'path_renderer', 'escape_url', 'cohesion_image_style', 'renderInlineStyle'],
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
