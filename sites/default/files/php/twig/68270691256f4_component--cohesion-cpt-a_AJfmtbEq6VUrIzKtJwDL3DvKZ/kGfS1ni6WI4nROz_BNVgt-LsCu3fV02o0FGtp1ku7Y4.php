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

/* sites/default/files/cohesion/templates/component--cohesion-cpt-a-header-supernav-l1.html.twig */
class __TwigTemplate_45f1d7d3d7eaeb62d91242a332e17a54 extends Template
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
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container ssa-component coh-component ssa-component-instance-";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["componentUuid"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-component-instance-";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["componentUuid"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-style-a-cpt-header-level-1 ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-ce-cpt_a_header_supernav_l1-eeba5238\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container nav-container ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-ce-cpt_a_header_supernav_l1-c80dc620\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container logo-header coh-ce-cpt_a_header_supernav_l1-b3495578\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
        yield " <a href=\"";
        $context["entityId"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5c1a2581-2615-4e85-bea8-68243075b429"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        if ((($context["entityId"] ?? null) != "")) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->pathRenderer($this->sandbox->ensureToStringAllowed(($context["entityId"] ?? null), 1, $this->source)), "html", null, true);
        }
        yield "\" class=\"coh-link\" target=\"_self\" > ";
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "91c6ab64-9264-4320-9ba1-65c375abe34a", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_image"), "html", null, true);
            yield " <img class=\"coh-image ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
            yield " coh-ce-cpt_a_header_supernav_l1-a75a4475 coh-image-responsive-xl\" src=\"";
            $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "91c6ab64-9264-4320-9ba1-65c375abe34a"));
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
            yield "\" ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "3604dbc4-6dad-40e4-b073-8624ce65a956") == "")) {
                yield "alt";
            } else {
                yield "alt=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "3604dbc4-6dad-40e4-b073-8624ce65a956"));
                yield "\"";
            }
            yield " /> ";
        }
        yield " </a> </div> ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <nav class=\"coh-container coh-style-a-header-navigation coh-ce-cpt_a_header_supernav_l1-153e5ecc\" > ";
        $context["block_name"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "8e59b3a5-0d39-419a-a84c-05b303cba28e"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " <div class=\"coh-block coh-ce-cpt_a_header_supernav_l1-ca8569a\"> ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->drupalBlock($this->sandbox->ensureToStringAllowed(($context["block_name"] ?? null), 1, $this->source)), "html", null, true);
        yield " </div> </nav> ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <nav class=\"coh-container coh-style-a-header-navigation authenticated-user coh-ce-cpt_a_header_supernav_l1-7d062b8f\" > ";
        $context["block_name"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "27027d02-c646-4713-b170-730c035ba173"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " <div class=\"coh-block coh-ce-cpt_a_header_supernav_l1-ca8569a\"> ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->drupalBlock($this->sandbox->ensureToStringAllowed(($context["block_name"] ?? null), 1, $this->source)), "html", null, true);
        yield " </div> </nav> ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <nav class=\"coh-container coh-style-a-header-navigation authenticate-user-menu coh-ce-cpt_a_header_supernav_l1-daa04904\" > </nav> ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container coh-ce-cpt_a_header_supernav_l1-b3495578\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container coh-ce-cpt_a_header_supernav_l1-cfba9189\" > ";
        $context["nid_2587140755"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "347d05fd-ef9f-4633-89cd-9ff61c919c29"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            if ((($context["nid_2587140755"] ?? null) != "")) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->pathRenderer($this->sandbox->ensureToStringAllowed(($context["nid_2587140755"] ?? null), 1, $this->source)), "html", null, true);
            }
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
            yield " <span class=\"coh-container icon-img logout-icon search-icon coh-ce-cpt_a_header_supernav_l1-26a8f3b5\" > ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
            yield " <a href=\"";
            $context["entityId"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "347d05fd-ef9f-4633-89cd-9ff61c919c29"));
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            if ((($context["entityId"] ?? null) != "")) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->pathRenderer($this->sandbox->ensureToStringAllowed(($context["entityId"] ?? null), 1, $this->source)), "html", null, true);
            }
            yield "\" class=\"coh-link\" ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "83f5456c-1700-4071-8795-7ecec9fd116c") == "")) {
            } else {
                yield "title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "83f5456c-1700-4071-8795-7ecec9fd116c"));
                yield "\"";
            }
            yield " ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "af610cec-628d-4528-8113-c22b636f7631") != "")) {
                yield "target=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "af610cec-628d-4528-8113-c22b636f7631"), "html", null, true);
                yield "\"";
            }
            yield " > ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_image"), "html", null, true);
            yield " <img class=\"coh-image coh-image-responsive-xl\" src=\"";
            $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f424d4fc-ddba-4f32-9be2-da865c3782d4"));
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
            yield "\" ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "83f5456c-1700-4071-8795-7ecec9fd116c") == "")) {
                yield "alt";
            } else {
                yield "alt=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "83f5456c-1700-4071-8795-7ecec9fd116c"));
                yield "\"";
            }
            yield " /> </a> </span> ";
        }
        yield " ";
        $context["nid_948644101"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "64298882-582c-4079-a6b6-386699f267d8"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            if ((($context["nid_948644101"] ?? null) != "")) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->pathRenderer($this->sandbox->ensureToStringAllowed(($context["nid_948644101"] ?? null), 1, $this->source)), "html", null, true);
            }
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
            yield " <span class=\"coh-container icon-img search-icon coh-ce-cpt_a_header_supernav_l1-c4685329\" > ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
            yield " <a href=\"";
            $context["entityId"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "64298882-582c-4079-a6b6-386699f267d8"));
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            if ((($context["entityId"] ?? null) != "")) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->pathRenderer($this->sandbox->ensureToStringAllowed(($context["entityId"] ?? null), 1, $this->source)), "html", null, true);
            }
            yield "\" class=\"coh-link\" ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "9a04d5ec-5a86-424c-b7cb-5065b05e508d") == "")) {
            } else {
                yield "title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "9a04d5ec-5a86-424c-b7cb-5065b05e508d"));
                yield "\"";
            }
            yield " ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a45879f2-04b2-422d-8f63-3c440b7e7f69") != "")) {
                yield "target=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a45879f2-04b2-422d-8f63-3c440b7e7f69"), "html", null, true);
                yield "\"";
            }
            yield " > ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_image"), "html", null, true);
            yield " <img class=\"coh-image coh-image-responsive-xl\" src=\"";
            $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "e7d10f5e-b4c1-46c1-b8c1-714e0acda26b"));
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
            yield "\" ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "9a04d5ec-5a86-424c-b7cb-5065b05e508d") == "")) {
                yield "alt";
            } else {
                yield "alt=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "9a04d5ec-5a86-424c-b7cb-5065b05e508d"));
                yield "\"";
            }
            yield " /> </a> </span> ";
        }
        yield " ";
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "29c7d018-d7ef-487e-9166-a6a8ac62b4c6", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
            yield " <span class=\"coh-container icon-img lang-icon authenticated-user coh-ce-cpt_a_header_supernav_l1-305a20b3\" > <button class=\"coh-button ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
            yield " coh-ce-cpt_a_header_supernav_l1-8eeb7bb\" title=\"Login\" id=\"current_user_initials\" data-coh-settings='{  }' data-modal-open='userprofile-popup' id='userprofile-popup' type=\"button\"> </button> </span> ";
        }
        yield " ";
        $context["contextCsv"] = ('' === $tmp = "context:remove_icon_for_signup") ? '' : new Markup($tmp, $this->env->getCharset());
        $context["contextCondition"] = ('' === $tmp = "AND") ? '' : new Markup($tmp, $this->env->getCharset());
        if ($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->contextPasses([($context["contextCsv"] ?? null)], ($context["contextCondition"] ?? null))) {
            yield " ";
            $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "29c7d018-d7ef-487e-9166-a6a8ac62b4c6", ""), "html", null, true);
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield " ";
            if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
                yield " ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
                yield " <span class=\"coh-container icon-img lang-icon anonymous-user coh-ce-cpt_a_header_supernav_l1-c4685329\" > <button class=\"coh-button ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
                yield " coh-ce-cpt_a_header_supernav_l1-e4ee1693\" ";
                if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "e2ac73dc-af1c-4de1-adab-7896b64de81b") == "")) {
                } else {
                    yield "title=\"";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "e2ac73dc-af1c-4de1-adab-7896b64de81b"));
                    yield "\"";
                }
                yield " data-coh-settings='{  }' data-modal-open='loginmodal-popup' id='loginmodal-popup-button' type=\"button\"> </button> </span> ";
            }
            yield " ";
        }
        yield " ";
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "95a3aa5d-5d4c-47e7-8e81-e0082a49be6a", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
            yield " <div class=\"coh-container coh-ce-cpt_a_header_supernav_l1-a183e1c0\" > ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.jquery_ui_effect_none"), "html", null, true);
            yield " <button class=\"coh-button select-other-language ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
            yield " coh-ce-cpt_a_header_supernav_l1-20f1849f coh-interaction\" ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "d4803618-6ece-4006-8053-27d25b21fb16") == "")) {
            } else {
                yield "title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "d4803618-6ece-4006-8053-27d25b21fb16"));
                yield "\"";
            }
            yield " data-interaction-modifiers=\"[{&quot;modifierType&quot;:&quot;toggle-modifier&quot;,&quot;interactionScope&quot;:&quot;document&quot;,&quot;interactionTarget&quot;:&quot;.lang-prompt-BG&quot;,&quot;modifierName&quot;:&quot;language-prompt-close language-prompt-open&quot;},{&quot;modifierType&quot;:&quot;toggle-modifier-accessible-collapsed&quot;,&quot;interactionScope&quot;:&quot;document&quot;,&quot;interactionTarget&quot;:&quot;.Mobile-menu-button, .coh-style-super-navigation-1&quot;,&quot;modifierName&quot;:&quot;menu-visible&quot;}]\" aria-haspopup=\"true\" aria-expanded=\"false\" aria-label=\"Select other language\" data-coh-settings='{ \"xl\":{\"buttonAnimation\":[{\"animationType\":\"none\"}]} }' type=\"button\"> ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2c961861-5697-4004-8ea0-1ee9c27a646a"));
            yield "</button> </div> ";
        }
        yield " </div> </div> ";
        $context["nid_1968299733"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5509be58-fa05-4059-8a43-4445b48894c9"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            if ((($context["nid_1968299733"] ?? null) != "")) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->pathRenderer($this->sandbox->ensureToStringAllowed(($context["nid_1968299733"] ?? null), 1, $this->source)), "html", null, true);
            }
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
            yield " <div class=\"coh-container ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
            yield " coh-ce-cpt_a_header_supernav_l1-e701ac27\" > ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
            yield " <a href=\"";
            $context["entityId"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5509be58-fa05-4059-8a43-4445b48894c9"));
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            if ((($context["entityId"] ?? null) != "")) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->pathRenderer($this->sandbox->ensureToStringAllowed(($context["entityId"] ?? null), 1, $this->source)), "html", null, true);
            }
            yield "\" class=\"coh-link switcher-link coh-style-a-header-right-button ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
            yield " coh-ce-cpt_a_header_supernav_l1-7a7e344d\" ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "e317edcf-3b30-4132-afd4-60286d4d9ed8") == "")) {
            } else {
                yield "title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "e317edcf-3b30-4132-afd4-60286d4d9ed8"));
                yield "\"";
            }
            yield " ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2662b4e5-2530-425e-acd8-8beb3d67bf89") != "")) {
                yield "target=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2662b4e5-2530-425e-acd8-8beb3d67bf89"), "html", null, true);
                yield "\"";
            }
            yield " > ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "e317edcf-3b30-4132-afd4-60286d4d9ed8"));
            yield "    </a> </div> ";
        }
        yield " </div> </div> ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container ssa-component coh-component ssa-component-instance-";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["componentUuid"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-component-instance-";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["componentUuid"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-style-a-supernavl1-logo-icon coh-style-a-cpt-header-level-1 ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-ce-cpt_a_header_supernav_l1-aa9e894e\" aria-hidden=\"true\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container coh-ce-cpt_a_header_supernav_l1-430cb62e\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container coh-ce-cpt_a_header_supernav_l1-b3495578\" > ";
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "05b890c1-2732-4a04-b47c-438118e70b6c"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
            yield " <span class=\"coh-container icon-img login-icon\" > ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
            yield " <a href=\"";
            $context["entityId"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "05b890c1-2732-4a04-b47c-438118e70b6c"));
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            if ((($context["entityId"] ?? null) != "")) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->pathRenderer($this->sandbox->ensureToStringAllowed(($context["entityId"] ?? null), 1, $this->source)), "html", null, true);
            }
            yield "\" class=\"coh-link\" ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "9a04d5ec-5a86-424c-b7cb-5065b05e508d") == "")) {
            } else {
                yield "title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "9a04d5ec-5a86-424c-b7cb-5065b05e508d"));
                yield "\"";
            }
            yield " ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "8ab3c7fa-93a3-4a73-8f6d-97670805e934") != "")) {
                yield "target=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "8ab3c7fa-93a3-4a73-8f6d-97670805e934"), "html", null, true);
                yield "\"";
            }
            yield " > ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_image"), "html", null, true);
            yield " <img class=\"coh-image coh-image-responsive-xl\" src=\"";
            $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7a7e982d-66fa-461d-8095-b72529ec0596"));
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
            yield "\" ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "d4803618-6ece-4006-8053-27d25b21fb16") == "")) {
                yield "alt";
            } else {
                yield "alt=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "d4803618-6ece-4006-8053-27d25b21fb16"));
                yield "\"";
            }
            yield " /> </a> </span> ";
        }
        yield " ";
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "95a3aa5d-5d4c-47e7-8e81-e0082a49be6a", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
            yield " <div class=\"coh-container\" > ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.jquery_ui_effect_none"), "html", null, true);
            yield " <button class=\"coh-button select-other-language ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
            yield " coh-ce-cpt_a_header_supernav_l1-6f824b1 coh-interaction\" title=\"Select other language\" data-interaction-modifiers=\"[{&quot;modifierType&quot;:&quot;toggle-modifier&quot;,&quot;interactionScope&quot;:&quot;document&quot;,&quot;interactionTarget&quot;:&quot;.lang-prompt-BG&quot;,&quot;modifierName&quot;:&quot;language-prompt-close language-prompt-open&quot;},{&quot;modifierType&quot;:&quot;toggle-modifier-accessible-collapsed&quot;,&quot;interactionScope&quot;:&quot;document&quot;,&quot;interactionTarget&quot;:&quot;.coh-style-super-navigation-1&quot;,&quot;modifierName&quot;:&quot;menu-visible&quot;}]\" aria-haspopup=\"true\" aria-expanded=\"false\" aria-label=\"Select other language\" data-coh-settings='{ \"xl\":{\"buttonAnimation\":[{\"animationType\":\"none\"}]} }' type=\"button\"> </button> </div> ";
        }
        yield " </div> ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container coh-ce-cpt_a_header_supernav_l1-daa04904\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container logo-header coh-ce-cpt_a_header_supernav_l1-cdec6eaa\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
        yield " <a href=\"";
        $context["entityId"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5c1a2581-2615-4e85-bea8-68243075b429"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        if ((($context["entityId"] ?? null) != "")) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->pathRenderer($this->sandbox->ensureToStringAllowed(($context["entityId"] ?? null), 1, $this->source)), "html", null, true);
        }
        yield "\" class=\"coh-link\" target=\"_self\" > ";
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "91c6ab64-9264-4320-9ba1-65c375abe34a", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_image"), "html", null, true);
            yield " <img class=\"coh-image ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
            yield " coh-ce-cpt_a_header_supernav_l1-a75a4475 coh-image-responsive-xl\" src=\"";
            $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "91c6ab64-9264-4320-9ba1-65c375abe34a"));
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
            yield "\" ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "3604dbc4-6dad-40e4-b073-8624ce65a956") == "")) {
                yield "alt";
            } else {
                yield "alt=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "3604dbc4-6dad-40e4-b073-8624ce65a956"));
                yield "\"";
            }
            yield " /> ";
        }
        yield " </a> </div> </div> ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container coh-ce-cpt_a_header_supernav_l1-b3495578\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.jquery_ui_effect_blind"), "html", null, true);
        yield " <button class=\"coh-button Mobile-menu-button coh-interaction\" title=\"Toogle menu\" data-interaction-modifiers=\"[{&quot;modifierType&quot;:&quot;toggle-modifier-accessible-collapsed&quot;,&quot;interactionScope&quot;:&quot;document&quot;,&quot;interactionTarget&quot;:&quot;.Mobile-menu-button&quot;,&quot;modifierName&quot;:&quot;menu-visible&quot;},{&quot;modifierType&quot;:&quot;toggle-modifier&quot;,&quot;interactionScope&quot;:&quot;document&quot;,&quot;interactionTarget&quot;:&quot;.mobile-nav-icon&quot;,&quot;modifierName&quot;:&quot;mobile-menu-close mobile-menu-open&quot;},{&quot;modifierType&quot;:&quot;toggle-modifier&quot;,&quot;interactionScope&quot;:&quot;document&quot;,&quot;interactionTarget&quot;:&quot;.logout-icon&quot;,&quot;modifierName&quot;:&quot;logout-icon-hidden&quot;}]\" aria-haspopup=\"true\" aria-expanded=\"false\" data-coh-settings='{ \"xl\":{\"buttonAnimation\":[{\"animationType\":\"blind\",\"animationScope\":\"document\",\"animationDirection\":\"up\",\"animationEasing\":\"swing\"}]} }' type=\"button\"> </button> </div> </div> ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container mobile-nav-icon mobile-menu-close coh-ce-cpt_a_header_supernav_l1-b30f5cec\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container authenticated-user coh-ce-cpt_a_header_supernav_l1-c3b21d03\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container coh-ce-cpt_a_header_supernav_l1-f279017b\" > ";
        $context["inlineElementContent"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "9be9936c-c6f5-4d7b-baab-3d684d387a16"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " <span class=\"coh-inline-element\">";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["inlineElementContent"] ?? null), 1, $this->source), "html", null, true);
        yield "</span> ";
        $context["inlineElementContent"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("John Smith", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " <strong class=\"coh-inline-element\" id=\"current_user_current_name_mobile\">";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["inlineElementContent"] ?? null), 1, $this->source), "html", null, true);
        yield "</strong> </div> ";
        $context["paragraphContent"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("john.doe@mail.com", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " <p class=\"coh-paragraph coh-ce-cpt_a_header_supernav_l1-e13bad6\" id=\"current_user_email_mobile\" >";
        yield Twig\Extension\CoreExtension::nl2br($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["paragraphContent"] ?? null), 1, $this->source), "html", null, true));
        yield "</p> ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container coh-ce-cpt_a_header_supernav_l1-87ddf3a1\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
        yield " <a href=\"javascript:void(0)\" class=\"coh-link coh-ce-cpt_a_header_supernav_l1-78ffd20a\" data-modal-open='userprofile-popup' role=\"button\" id='userprofile-popup' > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "b3f301d5-0894-4d8c-89a3-cb8555d5b972"));
        yield "    </a> </div> </div> ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container coh-style-a-header-navigation\" > ";
        $context["block_name"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "8e59b3a5-0d39-419a-a84c-05b303cba28e"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " <div class=\"coh-block\"> ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->drupalBlock($this->sandbox->ensureToStringAllowed(($context["block_name"] ?? null), 1, $this->source)), "html", null, true);
        yield " </div> ";
        $context["block_name"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "27027d02-c646-4713-b170-730c035ba173"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " <div class=\"coh-block authenticated-user coh-ce-cpt_a_header_supernav_l1-e32e4de2\"> ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->drupalBlock($this->sandbox->ensureToStringAllowed(($context["block_name"] ?? null), 1, $this->source)), "html", null, true);
        yield " </div> </div> ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container authenticated-user coh-ce-cpt_a_header_supernav_l1-e3131f9b\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.jquery_ui_effect_none"), "html", null, true);
        yield " <button class=\"coh-button okta-button coh-style-a-logout-button-invert coh-interaction\" data-interaction-modifiers=\"[{&quot;modifierType&quot;:&quot;&quot;,&quot;interactionScope&quot;:&quot;document&quot;}]\" data-coh-settings='{ \"xl\":{\"buttonAnimation\":[{\"animationType\":\"none\"}]} }' type=\"button\">";
        yield t("Log out", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
        yield "</button> </div> ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container anonymous-user coh-ce-cpt_a_header_supernav_l1-c5be696\" > ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container coh-ce-cpt_a_header_supernav_l1-6a912276\" > ";
        $context["nid_948644101"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "64298882-582c-4079-a6b6-386699f267d8"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            if ((($context["nid_948644101"] ?? null) != "")) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->pathRenderer($this->sandbox->ensureToStringAllowed(($context["nid_948644101"] ?? null), 1, $this->source)), "html", null, true);
            }
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
            yield " <div class=\"coh-container coh-ce-cpt_a_header_supernav_l1-daa04904\" > ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
            yield " <a href=\"";
            $context["entityId"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "64298882-582c-4079-a6b6-386699f267d8"));
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            if ((($context["entityId"] ?? null) != "")) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->pathRenderer($this->sandbox->ensureToStringAllowed(($context["entityId"] ?? null), 1, $this->source)), "html", null, true);
            }
            yield "\" class=\"coh-link coh-style-a-store-button\" ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "9a04d5ec-5a86-424c-b7cb-5065b05e508d") == "")) {
            } else {
                yield "title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "9a04d5ec-5a86-424c-b7cb-5065b05e508d"));
                yield "\"";
            }
            yield " ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a45879f2-04b2-422d-8f63-3c440b7e7f69") != "")) {
                yield "target=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a45879f2-04b2-422d-8f63-3c440b7e7f69"), "html", null, true);
                yield "\"";
            }
            yield " >";
            yield t("Store", array(), ["langcode" => $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getContentLanguage()]);
            yield "</a> </div> ";
        }
        yield " ";
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "29c7d018-d7ef-487e-9166-a6a8ac62b4c6", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
            yield " <div class=\"coh-container coh-ce-cpt_a_header_supernav_l1-daa04904\" > ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
            yield " <a href=\"javascript:void(0)\" class=\"coh-link coh-style-a-logout-button-invert\" ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "e2ac73dc-af1c-4de1-adab-7896b64de81b") == "")) {
            } else {
                yield "title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "e2ac73dc-af1c-4de1-adab-7896b64de81b"));
                yield "\"";
            }
            yield " data-modal-open='loginmodal-popup' role=\"button\" id='loginmodal-popup-mobile' > ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "e2ac73dc-af1c-4de1-adab-7896b64de81b"));
            yield "    </a> </div> ";
        }
        yield " </div> </div> ";
        $context["nid_1968299733"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5509be58-fa05-4059-8a43-4445b48894c9"));
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            if ((($context["nid_1968299733"] ?? null) != "")) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->pathRenderer($this->sandbox->ensureToStringAllowed(($context["nid_1968299733"] ?? null), 1, $this->source)), "html", null, true);
            }
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
            yield " <div class=\"coh-container bottom-button ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
            yield " coh-ce-cpt_a_header_supernav_l1-2744958a\" > ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_link"), "html", null, true);
            yield " <a href=\"";
            $context["entityId"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "5509be58-fa05-4059-8a43-4445b48894c9"));
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            if ((($context["entityId"] ?? null) != "")) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->pathRenderer($this->sandbox->ensureToStringAllowed(($context["entityId"] ?? null), 1, $this->source)), "html", null, true);
            }
            yield "\" class=\"coh-link switcher-link coh-style-a-header-right-button ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
            yield " coh-ce-cpt_a_header_supernav_l1-58bc8107\" ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "e317edcf-3b30-4132-afd4-60286d4d9ed8") == "")) {
            } else {
                yield "title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "e317edcf-3b30-4132-afd4-60286d4d9ed8"));
                yield "\"";
            }
            yield " ";
            if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2662b4e5-2530-425e-acd8-8beb3d67bf89") != "")) {
                yield "target=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2662b4e5-2530-425e-acd8-8beb3d67bf89"), "html", null, true);
                yield "\"";
            }
            yield " > ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "e317edcf-3b30-4132-afd4-60286d4d9ed8"));
            yield "    </a> </div> ";
        }
        yield " </div> </div> 
";
        // line 2
        $context["compiledCSS"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield "<style>.";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 2, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-eeba5238 {
";
            // line 3
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "12e30031-984e-43ff-a0eb-b9ed0c2b4d78"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "12e30031-984e-43ff-a0eb-b9ed0c2b4d78"))) {
                    yield " background-color: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "12e30031-984e-43ff-a0eb-b9ed0c2b4d78"));
                    yield ";";
                }
            }
            // line 4
            yield "}
@media (max-width: 1023px) {
  .";
            // line 6
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 6, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-eeba5238 {
    display: none;
  }
}
@media (max-width: 767px) {
  .";
            // line 11
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 11, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-eeba5238 {
    display: none;
  }
}
@media (max-width: 564px) {
  .";
            // line 16
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 16, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-eeba5238 {
    display: none;
  }
}
.";
            // line 20
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 20, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-eeba5238 .menu .menu-item a {
";
            // line 21
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "86be1b6c-5611-492f-bc59-3b503bd1425b"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "86be1b6c-5611-492f-bc59-3b503bd1425b"))) {
                    yield " color: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "86be1b6c-5611-492f-bc59-3b503bd1425b"));
                    yield ";";
                }
            }
            // line 22
            yield "}
.";
            // line 23
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 23, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-c80dc620 {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
}
@media (max-width: 1023px) {
  .";
            // line 34
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 34, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-c80dc620 .mobile-menu-open {
";
            // line 35
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a555f041-bfb3-40ef-b472-cba9167c3f36"))) {
                yield "     ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a555f041-bfb3-40ef-b472-cba9167c3f36"))) {
                    yield " min-height: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a555f041-bfb3-40ef-b472-cba9167c3f36"));
                    yield ";";
                }
            }
            // line 36
            yield "  }
}
";
            // line 38
            if (( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "91c6ab64-9264-4320-9ba1-65c375abe34a")) ||  !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2f768cce-e9d1-43b8-84eb-d655b063ba55")))) {
                yield ".";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 38, $this->source), "html", null, true);
                yield ".coh-ce-cpt_a_header_supernav_l1-a75a4475 {
";
                // line 39
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "91c6ab64-9264-4320-9ba1-65c375abe34a"))) {
                    yield "   ";
                    if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "91c6ab64-9264-4320-9ba1-65c375abe34a"))) {
                        yield " content: url(\"";
                        $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "91c6ab64-9264-4320-9ba1-65c375abe34a"));
                            return; yield '';
                        })())) ? '' : new Markup($tmp, $this->env->getCharset());
                        $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                            return; yield '';
                        })())) ? '' : new Markup($tmp, $this->env->getCharset());
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 39, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 39, $this->source)), "html", null, true);
                        yield "\");";
                    }
                }
                // line 40
                yield "}
@media (max-width: 1023px) {
  .";
                // line 42
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 42, $this->source), "html", null, true);
                yield ".coh-ce-cpt_a_header_supernav_l1-a75a4475 {
";
                // line 43
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2f768cce-e9d1-43b8-84eb-d655b063ba55"))) {
                    yield "     ";
                    if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2f768cce-e9d1-43b8-84eb-d655b063ba55"))) {
                        yield " content: url(\"";
                        $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2f768cce-e9d1-43b8-84eb-d655b063ba55"));
                            return; yield '';
                        })())) ? '' : new Markup($tmp, $this->env->getCharset());
                        $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                            return; yield '';
                        })())) ? '' : new Markup($tmp, $this->env->getCharset());
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 43, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 43, $this->source)), "html", null, true);
                        yield "\");";
                    }
                }
                // line 44
                yield "  }
}";
            }
            // line 46
            yield ".";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 46, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-8eeb7bb {
";
            // line 47
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:54fea908-1a05-49de-9491-c3059e42e969]", ["media-reference" => ($context["media_reference"] ?? null)], $context, true))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:54fea908-1a05-49de-9491-c3059e42e969]", ["media-reference" => ($context["media_reference"] ?? null)], $context, true))) {
                    yield " background-image: url(\"";
                    $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:54fea908-1a05-49de-9491-c3059e42e969]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 47, $this->source), true), "html", null, true);
                        return; yield '';
                    })())) ? '' : new Markup($tmp, $this->env->getCharset());
                    $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                        return; yield '';
                    })())) ? '' : new Markup($tmp, $this->env->getCharset());
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 47, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 47, $this->source)), "html", null, true);
                    yield "\");";
                }
            }
            // line 48
            yield "  background-position: center;
  background-size: 1.4375rem 1.4375rem;
  background-repeat: no-repeat;
  background-attachment: scroll;
  display: block;
  width: 1.4375rem;
  height: 1.4375rem;
  font-family: 'Open Sans', sans-serif;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  font-weight: 700;
  color: rgb(255, 255, 255);
  font-size: 0.65625rem;
  text-align: center;
  text-transform: capitalize;
}
.";
            // line 64
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 64, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-e4ee1693 {
";
            // line 65
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "17962cb7-4343-4429-8586-2efbe0db400d"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "17962cb7-4343-4429-8586-2efbe0db400d"))) {
                    yield " background-image: url(\"";
                    $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "17962cb7-4343-4429-8586-2efbe0db400d"));
                        return; yield '';
                    })())) ? '' : new Markup($tmp, $this->env->getCharset());
                    $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                        return; yield '';
                    })())) ? '' : new Markup($tmp, $this->env->getCharset());
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 65, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 65, $this->source)), "html", null, true);
                    yield "\");";
                }
            }
            // line 66
            yield "  background-position: center;
  background-size: 1.25rem 1.25rem;
  background-repeat: no-repeat;
  background-attachment: scroll;
  display: block;
  width: 1.25rem;
  height: 1.5rem;
}
.";
            // line 74
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 74, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-20f1849f {
  height: 1.4375rem;
  width: 1.4375rem;
  margin-right: 0.3125rem;
";
            // line 78
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7a7e982d-66fa-461d-8095-b72529ec0596"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7a7e982d-66fa-461d-8095-b72529ec0596"))) {
                    yield " background-image: url(\"";
                    $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "7a7e982d-66fa-461d-8095-b72529ec0596"));
                        return; yield '';
                    })())) ? '' : new Markup($tmp, $this->env->getCharset());
                    $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                        return; yield '';
                    })())) ? '' : new Markup($tmp, $this->env->getCharset());
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 78, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 78, $this->source)), "html", null, true);
                    yield "\");";
                }
            }
            // line 79
            yield "  background-position: center;
  background-size: 23px 23px;
  background-repeat: no-repeat;
  background-attachment: local;
  display: block;
  font-family: 'Open Sans', sans-serif;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  font-weight: 700;
  color: rgb(255, 255, 255);
  font-size: 0.65625rem;
  text-align: center;
}
.";
            // line 92
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 92, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-e701ac27 {
  -webkit-flex-basis: auto;
      -ms-flex-preferred-size: auto;
          flex-basis: auto;
  -webkit-box-flex: 0;
  -webkit-flex-grow: 0;
      -ms-flex-positive: 0;
          flex-grow: 0;
  -webkit-flex-shrink: 0;
      -ms-flex-negative: 0;
          flex-shrink: 0;
";
            // line 103
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a43dcf35-0989-4216-a405-bb4b96ac1572"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a43dcf35-0989-4216-a405-bb4b96ac1572"))) {
                    yield " background-color: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a43dcf35-0989-4216-a405-bb4b96ac1572"));
                    yield ";";
                }
            }
            // line 104
            yield "}
.";
            // line 105
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 105, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-7a7e344d {
";
            // line 106
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f1d8f1d4-f2c2-4b25-8357-eade08d994b5"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f1d8f1d4-f2c2-4b25-8357-eade08d994b5"))) {
                    yield " color: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f1d8f1d4-f2c2-4b25-8357-eade08d994b5"));
                    yield ";";
                }
            }
            // line 107
            yield "}
.";
            // line 108
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 108, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-7a7e344d:after {
  position: absolute;
  right: 0px;
  height: 23px;
  width: 13px;
";
            // line 113
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:02f7b275-b692-42d3-b43c-f0d9d19468a6]", ["media-reference" => ($context["media_reference"] ?? null)], $context, true))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:02f7b275-b692-42d3-b43c-f0d9d19468a6]", ["media-reference" => ($context["media_reference"] ?? null)], $context, true))) {
                    yield " content: url(\"";
                    $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:02f7b275-b692-42d3-b43c-f0d9d19468a6]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 113, $this->source), true), "html", null, true);
                        return; yield '';
                    })())) ? '' : new Markup($tmp, $this->env->getCharset());
                    $context["imagestyle"] = ('' === $tmp = "crop_thumbnail") ? '' : new Markup($tmp, $this->env->getCharset());
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 113, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 113, $this->source)), "html", null, true);
                    yield "\");";
                }
            }
            // line 114
            yield "  padding-right: 10px;
  padding-left: 10px;
}
@media (max-width: 1023px) {
  .";
            // line 118
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 118, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-7a7e344d:after {
    left: 100%;
  }
}
.";
            // line 122
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 122, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-aa9e894e {
  display: none;
";
            // line 124
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "b2375135-bbbc-4377-a028-a76a2b67bef0"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "b2375135-bbbc-4377-a028-a76a2b67bef0"))) {
                    yield " background-color: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "b2375135-bbbc-4377-a028-a76a2b67bef0"));
                    yield ";";
                }
            }
            // line 125
            yield "}
@media (max-width: 1023px) {
  .";
            // line 127
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 127, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-aa9e894e {
    display: block;
  }
}
@media (max-width: 767px) {
  .";
            // line 132
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 132, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-aa9e894e {
    display: block;
  }
}
@media (max-width: 564px) {
  .";
            // line 137
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 137, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-aa9e894e {
    display: block;
  }
}
.";
            // line 141
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 141, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-aa9e894e .mobile-menu-open {
";
            // line 142
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "560410be-b94c-457d-97d7-a35d529b3037"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "560410be-b94c-457d-97d7-a35d529b3037"))) {
                    yield " background-color: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "560410be-b94c-457d-97d7-a35d529b3037"));
                    yield ";";
                }
            }
            // line 143
            yield "}
.";
            // line 144
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 144, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-aa9e894e .mobile-menu-open .menu-item a {
";
            // line 145
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a2bb0624-c870-4ebe-b3c1-158593ebb27c"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a2bb0624-c870-4ebe-b3c1-158593ebb27c"))) {
                    yield " color: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a2bb0624-c870-4ebe-b3c1-158593ebb27c"));
                    yield ";";
                }
            }
            // line 146
            yield "}
.";
            // line 147
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 147, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-6f824b1 {
  height: 1.25rem;
  width: 1.25rem;
  margin-right: 0.3125rem;
  margin-bottom: 0.375rem;
  margin-left: 0.625rem;
";
            // line 153
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:a46fdf06-dda2-4791-8cda-9370f020978f]", ["media-reference" => ($context["media_reference"] ?? null)], $context, true))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:a46fdf06-dda2-4791-8cda-9370f020978f]", ["media-reference" => ($context["media_reference"] ?? null)], $context, true))) {
                    yield " background-image: url(\"";
                    $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:a46fdf06-dda2-4791-8cda-9370f020978f]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 153, $this->source), true), "html", null, true);
                        return; yield '';
                    })())) ? '' : new Markup($tmp, $this->env->getCharset());
                    $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                        return; yield '';
                    })())) ? '' : new Markup($tmp, $this->env->getCharset());
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 153, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 153, $this->source)), "html", null, true);
                    yield "\");";
                }
            }
            // line 154
            yield "  background-position: center;
  background-size: 20px 20px;
  background-repeat: no-repeat;
  background-attachment: local;
  display: block;
}
";
            // line 160
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "19234898-d39c-4fc2-adbb-a11e0f2ce742"))) {
                yield ".";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 160, $this->source), "html", null, true);
                yield ".coh-ce-cpt_a_header_supernav_l1-2744958a {
";
                // line 161
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "19234898-d39c-4fc2-adbb-a11e0f2ce742"))) {
                    yield "   ";
                    if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "19234898-d39c-4fc2-adbb-a11e0f2ce742"))) {
                        yield " background-color: ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "19234898-d39c-4fc2-adbb-a11e0f2ce742"));
                        yield ";";
                    }
                }
                // line 162
                yield "}";
            }
            // line 163
            yield ".";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 163, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-58bc8107 {
";
            // line 164
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f2103339-355d-44f1-b186-4ccb4c6baa2b"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f2103339-355d-44f1-b186-4ccb4c6baa2b"))) {
                    yield " color: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f2103339-355d-44f1-b186-4ccb4c6baa2b"));
                    yield ";";
                }
            }
            // line 165
            yield "}
.";
            // line 166
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 166, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-58bc8107:after {
  position: absolute;
  right: 0px;
  height: 23px;
  width: 13px;
";
            // line 171
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:02f7b275-b692-42d3-b43c-f0d9d19468a6]", ["media-reference" => ($context["media_reference"] ?? null)], $context, true))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:02f7b275-b692-42d3-b43c-f0d9d19468a6]", ["media-reference" => ($context["media_reference"] ?? null)], $context, true))) {
                    yield " content: url(\"";
                    $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:02f7b275-b692-42d3-b43c-f0d9d19468a6]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 171, $this->source), true), "html", null, true);
                        return; yield '';
                    })())) ? '' : new Markup($tmp, $this->env->getCharset());
                    $context["imagestyle"] = ('' === $tmp = "crop_thumbnail") ? '' : new Markup($tmp, $this->env->getCharset());
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 171, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 171, $this->source)), "html", null, true);
                    yield "\");";
                }
            }
            // line 172
            yield "  padding-right: 10px;
  padding-left: 10px;
}
@media (max-width: 1023px) {
  .";
            // line 176
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 176, $this->source), "html", null, true);
            yield ".coh-ce-cpt_a_header_supernav_l1-58bc8107:after {
    left: 100%;
  }
}
</style>";
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 180
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderInlineStyle($this->sandbox->ensureToStringAllowed(($context["compiledCSS"] ?? null), 180, $this->source)));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["componentUuid", "media_reference", "_context"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "sites/default/files/cohesion/templates/component--cohesion-cpt-a-header-supernav-l1.html.twig";
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
        return array (  1165 => 180,  1156 => 176,  1150 => 172,  1136 => 171,  1128 => 166,  1125 => 165,  1116 => 164,  1111 => 163,  1108 => 162,  1099 => 161,  1093 => 160,  1085 => 154,  1069 => 153,  1060 => 147,  1057 => 146,  1048 => 145,  1044 => 144,  1041 => 143,  1032 => 142,  1028 => 141,  1021 => 137,  1013 => 132,  1005 => 127,  1001 => 125,  992 => 124,  987 => 122,  980 => 118,  974 => 114,  960 => 113,  952 => 108,  949 => 107,  940 => 106,  936 => 105,  933 => 104,  924 => 103,  910 => 92,  895 => 79,  879 => 78,  872 => 74,  862 => 66,  846 => 65,  842 => 64,  824 => 48,  808 => 47,  803 => 46,  799 => 44,  783 => 43,  779 => 42,  775 => 40,  759 => 39,  753 => 38,  749 => 36,  740 => 35,  736 => 34,  722 => 23,  719 => 22,  710 => 21,  706 => 20,  699 => 16,  691 => 11,  683 => 6,  679 => 4,  670 => 3,  664 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "sites/default/files/cohesion/templates/component--cohesion-cpt-a-header-supernav-l1.html.twig", "/var/www/html/sites/default/files/cohesion/templates/component--cohesion-cpt-a-header-supernav-l1.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1, "if" => 1, "trans" => 1);
        static $filters = array("escape" => 1, "raw" => 1, "trim" => 1, "nl2br" => 1);
        static $functions = array("coh_instanceid" => 1, "attach_library" => 1, "getComponentFieldValue" => 1, "path_renderer" => 1, "cohesion_image_style" => 1, "drupal_block" => 1, "contextpasses" => 1, "get_content_language" => 1, "processtoken" => 47, "renderInlineStyle" => 180);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'trans'],
                ['escape', 'raw', 'trim', 'nl2br'],
                ['coh_instanceid', 'attach_library', 'getComponentFieldValue', 'path_renderer', 'cohesion_image_style', 'drupal_block', 'contextpasses', 'get_content_language', 'processtoken', 'renderInlineStyle'],
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
