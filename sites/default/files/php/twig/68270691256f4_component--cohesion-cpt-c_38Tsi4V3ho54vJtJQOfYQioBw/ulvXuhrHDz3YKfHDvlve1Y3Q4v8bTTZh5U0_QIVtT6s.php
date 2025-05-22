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

/* sites/default/files/cohesion/templates/component--cohesion-cpt-copyright.html.twig */
class __TwigTemplate_4bf15f92200fe07b0e52519854f5c634 extends Template
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
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/element_templates.image"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
        yield " <div class=\"coh-container ssa-component coh-component ssa-component-instance-";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["componentUuid"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-component-instance-";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["componentUuid"] ?? null), 1, $this->source), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
        yield " coh-ce-cpt_copyright-47a7fbb7\" > ";
        $context["wysiwyg_372860593"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "1cf0a4b1-31cb-4e9a-bfc3-b59d6742b8c8", "#text"), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["text_format_372860593"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "1cf0a4b1-31cb-4e9a-bfc3-b59d6742b8c8", "#textFormat"), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["token_text_372860593"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "1cf0a4b1-31cb-4e9a-bfc3-b59d6742b8c8", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->formatWysiwyg($this->sandbox->ensureToStringAllowed(($context["wysiwyg_372860593"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["text_format_372860593"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["token_text_372860593"] ?? null), 1, $this->source)), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
            yield " <div class=\"coh-container ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
            yield " coh-ce-cpt_copyright-cfad884c\" > ";
            $context["wysiwyg_372860593"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "1cf0a4b1-31cb-4e9a-bfc3-b59d6742b8c8", "#text"), "html", null, true);
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            $context["text_format_372860593"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "1cf0a4b1-31cb-4e9a-bfc3-b59d6742b8c8", "#textFormat"), "html", null, true);
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            $context["token_text_372860593"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "1cf0a4b1-31cb-4e9a-bfc3-b59d6742b8c8", ""), "html", null, true);
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->formatWysiwyg($this->sandbox->ensureToStringAllowed(($context["wysiwyg_372860593"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["text_format_372860593"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["token_text_372860593"] ?? null), 1, $this->source)), "html", null, true);
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield " ";
            if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
                yield " ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_wysiwyg"), "html", null, true);
                yield " <div class=\"coh-wysiwyg ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
                yield " coh-ce-cpt_copyright-416811f7\" ";
                if ((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", ["access visual page builder"], "method", false, false, true, 1) &&  !array_key_exists("component_content", $context))) {
                    yield " data-ssa-field-uuid=\"";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderFieldUuid($context, "1cf0a4b1-31cb-4e9a-bfc3-b59d6742b8c8", "Array"), "html", null, true);
                    yield "\" data-ssa-form-type=\"form-wysiwyg\"";
                }
                yield " > ";
                $context["wysiwyg"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "1cf0a4b1-31cb-4e9a-bfc3-b59d6742b8c8", "#text"), "html", null, true);
                    return; yield '';
                })())) ? '' : new Markup($tmp, $this->env->getCharset());
                yield " ";
                $context["text_format"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "1cf0a4b1-31cb-4e9a-bfc3-b59d6742b8c8", "#textFormat"), "html", null, true);
                    return; yield '';
                })())) ? '' : new Markup($tmp, $this->env->getCharset());
                yield " ";
                $context["token_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "1cf0a4b1-31cb-4e9a-bfc3-b59d6742b8c8", ""), "html", null, true);
                    return; yield '';
                })())) ? '' : new Markup($tmp, $this->env->getCharset());
                yield " ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->formatWysiwyg($this->sandbox->ensureToStringAllowed(($context["wysiwyg"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["text_format"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["token_text"] ?? null), 1, $this->source)), "html", null, true);
                yield " </div> ";
            }
            yield " ";
            $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "1cfc1e60-a898-4d7c-9cca-8bf0f59fcd09", ""), "html", null, true);
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield " ";
            if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
                yield " ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_image"), "html", null, true);
                yield " <img class=\"coh-image ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
                yield " coh-ce-cpt_copyright-3505a3e8 coh-image-responsive-xl\" src=\"";
                $context["src"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "1cfc1e60-a898-4d7c-9cca-8bf0f59fcd09"));
                    return; yield '';
                })())) ? '' : new Markup($tmp, $this->env->getCharset());
                $context["imagestyle"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                    return; yield '';
                })())) ? '' : new Markup($tmp, $this->env->getCharset());
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->cohesionImageStyle($this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["imagestyle"] ?? null), 1, $this->source)), "html", null, true);
                yield "\" ";
                if (($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2af4927d-af0e-48da-939c-8c1665ab2ef9") == "")) {
                    yield "alt";
                } else {
                    yield "alt=\"";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "2af4927d-af0e-48da-939c-8c1665ab2ef9"));
                    yield "\"";
                }
                yield " /> ";
            }
            yield " </div> ";
        }
        yield " ";
        $context["hideData"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a63b478a-4e8a-4db1-bd97-29a397f845dd", ""), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if (((null === ($context["hideData"] ?? null)) || (Twig\Extension\CoreExtension::trim(($context["hideData"] ?? null)) != ""))) {
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_container"), "html", null, true);
            yield " <div class=\"coh-container ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
            yield " coh-ce-cpt_copyright-4f6434a7\" > ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/coh_element_wysiwyg"), "html", null, true);
            yield " <div class=\"coh-wysiwyg ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 1, $this->source), "html", null, true);
            yield " coh-ce-cpt_copyright-783668c4\" ";
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", ["access visual page builder"], "method", false, false, true, 1) &&  !array_key_exists("component_content", $context))) {
                yield " data-ssa-field-uuid=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderFieldUuid($context, "a63b478a-4e8a-4db1-bd97-29a397f845dd", "Array"), "html", null, true);
                yield "\" data-ssa-form-type=\"form-input\"";
            }
            yield " > ";
            $context["wysiwyg"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a63b478a-4e8a-4db1-bd97-29a397f845dd", "#text"), "html", null, true);
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield " ";
            $context["text_format"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a63b478a-4e8a-4db1-bd97-29a397f845dd", "#textFormat"), "html", null, true);
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield " ";
            $context["token_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a63b478a-4e8a-4db1-bd97-29a397f845dd", ""), "html", null, true);
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->formatWysiwyg($this->sandbox->ensureToStringAllowed(($context["wysiwyg"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["text_format"] ?? null), 1, $this->source), $this->sandbox->ensureToStringAllowed(($context["token_text"] ?? null), 1, $this->source)), "html", null, true);
            yield " </div> </div> ";
        }
        yield " </div> 
";
        // line 2
        $context["compiledCSS"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield "<style>";
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f1eeabbc-13b6-412a-9fe9-9ce25aa0dc9e"))) {
                yield ".";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 2, $this->source), "html", null, true);
                yield ".coh-ce-cpt_copyright-47a7fbb7 {
";
                // line 3
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f1eeabbc-13b6-412a-9fe9-9ce25aa0dc9e"))) {
                    yield "   ";
                    if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f1eeabbc-13b6-412a-9fe9-9ce25aa0dc9e"))) {
                        yield " background-color: ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f1eeabbc-13b6-412a-9fe9-9ce25aa0dc9e"));
                        yield ";";
                    }
                }
                // line 4
                yield "}";
            }
            // line 5
            yield ".";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 5, $this->source), "html", null, true);
            yield ".coh-ce-cpt_copyright-cfad884c {
";
            // line 6
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "fdc9583a-794d-40dd-930d-4eaf85cdba79"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "fdc9583a-794d-40dd-930d-4eaf85cdba79"))) {
                    yield " padding-top: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "fdc9583a-794d-40dd-930d-4eaf85cdba79"));
                    yield "px;";
                }
            }
            // line 7
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "3c604e02-79a5-4c59-8e1f-c1e8bb88d1f4"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "3c604e02-79a5-4c59-8e1f-c1e8bb88d1f4"))) {
                    yield " padding-right: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "3c604e02-79a5-4c59-8e1f-c1e8bb88d1f4"));
                    yield "px;";
                }
            }
            // line 8
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f1a8f383-baaa-47c7-82ff-392438e84ed5"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f1a8f383-baaa-47c7-82ff-392438e84ed5"))) {
                    yield " padding-bottom: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f1a8f383-baaa-47c7-82ff-392438e84ed5"));
                    yield "px;";
                }
            }
            // line 9
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "62dee661-af6d-40e0-8bda-a34d0ec7f8d8"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "62dee661-af6d-40e0-8bda-a34d0ec7f8d8"))) {
                    yield " padding-left: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "62dee661-af6d-40e0-8bda-a34d0ec7f8d8"));
                    yield "px;";
                }
            }
            // line 10
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f94a6785-ed6e-47ff-a322-ba070a4bc1bf"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f94a6785-ed6e-47ff-a322-ba070a4bc1bf"))) {
                    yield " width: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "f94a6785-ed6e-47ff-a322-ba070a4bc1bf"));
                    yield ";";
                }
            }
            // line 11
            yield "  float: left;
}
@media (max-width: 1023px) {
  .";
            // line 14
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 14, $this->source), "html", null, true);
            yield ".coh-ce-cpt_copyright-cfad884c {
    float: none;
  }
}
@media (max-width: 564px) {
  .";
            // line 19
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 19, $this->source), "html", null, true);
            yield ".coh-ce-cpt_copyright-cfad884c {
    width: 100%;
    float: none;
    text-align: center;
  }
}
";
            // line 25
            if ((( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "b15325af-e54d-40b0-ac15-cc4b1d92c041")) ||  !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "d3a63014-d4e0-492c-8e5f-4d144f10389f"))) ||  !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "97938610-c674-4400-8bd4-76202ffc0abf")))) {
                yield ".";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 25, $this->source), "html", null, true);
                yield ".coh-ce-cpt_copyright-416811f7 {
";
                // line 26
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "b15325af-e54d-40b0-ac15-cc4b1d92c041"))) {
                    yield "   ";
                    if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "b15325af-e54d-40b0-ac15-cc4b1d92c041"))) {
                        yield " font-weight: ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "b15325af-e54d-40b0-ac15-cc4b1d92c041"));
                        yield ";";
                    }
                }
                // line 27
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "d3a63014-d4e0-492c-8e5f-4d144f10389f"))) {
                    yield "   ";
                    if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "d3a63014-d4e0-492c-8e5f-4d144f10389f"))) {
                        yield " color: ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "d3a63014-d4e0-492c-8e5f-4d144f10389f"));
                        yield ";";
                    }
                }
                // line 28
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "97938610-c674-4400-8bd4-76202ffc0abf"))) {
                    yield "   ";
                    if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "97938610-c674-4400-8bd4-76202ffc0abf"))) {
                        yield " font-size: ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "97938610-c674-4400-8bd4-76202ffc0abf"));
                        yield "px;";
                    }
                }
                // line 29
                yield "}";
            }
            // line 30
            yield ".";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 30, $this->source), "html", null, true);
            yield ".coh-ce-cpt_copyright-3505a3e8 {
";
            // line 31
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "b23b10c4-448e-486b-b72a-44568cf616b7"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "b23b10c4-448e-486b-b72a-44568cf616b7"))) {
                    yield " height: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "b23b10c4-448e-486b-b72a-44568cf616b7"));
                    yield ";";
                }
            }
            // line 32
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "fe600660-4354-4b23-bfef-99db7cbab4f2"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "fe600660-4354-4b23-bfef-99db7cbab4f2"))) {
                    yield " width: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "fe600660-4354-4b23-bfef-99db7cbab4f2"));
                    yield ";";
                }
            }
            // line 33
            yield "  float: left;
}
.";
            // line 35
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 35, $this->source), "html", null, true);
            yield ".coh-ce-cpt_copyright-3505a3e8:before, .";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 35, $this->source), "html", null, true);
            yield ".coh-ce-cpt_copyright-3505a3e8:after {
  clear: none;
  content: normal;
  display: inline;
}
.";
            // line 40
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 40, $this->source), "html", null, true);
            yield ".coh-ce-cpt_copyright-4f6434a7 {
";
            // line 41
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "c775fea4-a328-4110-89cc-383663455970"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "c775fea4-a328-4110-89cc-383663455970"))) {
                    yield " width: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "c775fea4-a328-4110-89cc-383663455970"));
                    yield ";";
                }
            }
            // line 42
            yield "  float: left;
";
            // line 43
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "b080c509-8ef0-4ef1-abb1-8612a1680557"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "b080c509-8ef0-4ef1-abb1-8612a1680557"))) {
                    yield " padding-top: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "b080c509-8ef0-4ef1-abb1-8612a1680557"));
                    yield "px;";
                }
            }
            // line 44
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ed998460-299f-4834-b186-57277d2264ed"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ed998460-299f-4834-b186-57277d2264ed"))) {
                    yield " padding-right: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ed998460-299f-4834-b186-57277d2264ed"));
                    yield "px;";
                }
            }
            // line 45
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ba8286d3-e64e-404c-8f15-796c8a98c32e"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ba8286d3-e64e-404c-8f15-796c8a98c32e"))) {
                    yield " padding-bottom: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ba8286d3-e64e-404c-8f15-796c8a98c32e"));
                    yield "px;";
                }
            }
            // line 46
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a9ac74ab-0309-4a23-9fba-38c61c486627"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a9ac74ab-0309-4a23-9fba-38c61c486627"))) {
                    yield " padding-left: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "a9ac74ab-0309-4a23-9fba-38c61c486627"));
                    yield "px;";
                }
            }
            // line 47
            yield "}
.";
            // line 48
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 48, $this->source), "html", null, true);
            yield ".coh-ce-cpt_copyright-4f6434a7:before, .";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 48, $this->source), "html", null, true);
            yield ".coh-ce-cpt_copyright-4f6434a7:after {
  clear: none;
  content: normal;
  display: inline;
}
@media (max-width: 564px) {
  .";
            // line 54
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 54, $this->source), "html", null, true);
            yield ".coh-ce-cpt_copyright-4f6434a7 {
    width: 100%;
    float: none;
  }
  .";
            // line 58
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 58, $this->source), "html", null, true);
            yield ".coh-ce-cpt_copyright-4f6434a7:before, .";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 58, $this->source), "html", null, true);
            yield ".coh-ce-cpt_copyright-4f6434a7:after {
    clear: none;
    content: normal;
    display: inline;
  }
}
.";
            // line 64
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 64, $this->source), "html", null, true);
            yield ".coh-ce-cpt_copyright-783668c4 {
";
            // line 65
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "21f0e242-99fe-4abc-b2e0-f4a89ab239b8"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "21f0e242-99fe-4abc-b2e0-f4a89ab239b8"))) {
                    yield " font-weight: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "21f0e242-99fe-4abc-b2e0-f4a89ab239b8"));
                    yield ";";
                }
            }
            // line 66
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ccdccd92-c1e8-427a-b59c-9510afe790b5"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ccdccd92-c1e8-427a-b59c-9510afe790b5"))) {
                    yield " color: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "ccdccd92-c1e8-427a-b59c-9510afe790b5"));
                    yield ";";
                }
            }
            // line 67
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "67c04871-288e-4274-ac7e-73158cc6d433"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "67c04871-288e-4274-ac7e-73158cc6d433"))) {
                    yield " font-size: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "67c04871-288e-4274-ac7e-73158cc6d433"));
                    yield "px;";
                }
            }
            // line 68
            if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "88f19929-fa2a-4c46-b9fd-a202255f1386"))) {
                yield "   ";
                if ( !Twig\Extension\CoreExtension::testEmpty($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "88f19929-fa2a-4c46-b9fd-a202255f1386"))) {
                    yield " text-align: ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->getComponentFieldValue($context, "88f19929-fa2a-4c46-b9fd-a202255f1386"));
                    yield ";";
                }
            }
            // line 69
            yield "  line-height: 1.5;
}
@media (max-width: 1023px) {
  .";
            // line 72
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["coh_instance_class"] ?? null), 72, $this->source), "html", null, true);
            yield ".coh-ce-cpt_copyright-783668c4 {
    text-align: center;
  }
}
</style>";
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 76
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderInlineStyle($this->sandbox->ensureToStringAllowed(($context["compiledCSS"] ?? null), 76, $this->source)));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["componentUuid", "user", "component_content"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "sites/default/files/cohesion/templates/component--cohesion-cpt-copyright.html.twig";
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
        return array (  514 => 76,  505 => 72,  500 => 69,  491 => 68,  482 => 67,  473 => 66,  464 => 65,  460 => 64,  449 => 58,  442 => 54,  431 => 48,  428 => 47,  419 => 46,  410 => 45,  401 => 44,  392 => 43,  389 => 42,  380 => 41,  376 => 40,  366 => 35,  362 => 33,  353 => 32,  344 => 31,  339 => 30,  336 => 29,  327 => 28,  318 => 27,  309 => 26,  303 => 25,  294 => 19,  286 => 14,  281 => 11,  272 => 10,  263 => 9,  254 => 8,  245 => 7,  236 => 6,  231 => 5,  228 => 4,  219 => 3,  211 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "sites/default/files/cohesion/templates/component--cohesion-cpt-copyright.html.twig", "/var/www/html/sites/default/files/cohesion/templates/component--cohesion-cpt-copyright.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1, "if" => 1);
        static $filters = array("escape" => 1, "trim" => 1, "raw" => 1);
        static $functions = array("coh_instanceid" => 1, "attach_library" => 1, "getComponentFieldValue" => 1, "format_wysiwyg" => 1, "render_field_uuid" => 1, "cohesion_image_style" => 1, "renderInlineStyle" => 76);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 'trim', 'raw'],
                ['coh_instanceid', 'attach_library', 'getComponentFieldValue', 'format_wysiwyg', 'render_field_uuid', 'cohesion_image_style', 'renderInlineStyle'],
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
