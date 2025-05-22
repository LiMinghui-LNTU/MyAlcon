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

/* __string_template__f6426384e37cd10e4196b6f7d28b9d39 */
class __TwigTemplate_d3173f14144f743098a8a06e61258a4a extends Template
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
        $context["component_variable_57b1eb9b_1a00_43d9_a72d_180b382d7edd"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_364b3f71_a13b_40ef_b4e2_9420cc40aa84"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_ea3a019b_3f26_4013_886f_7f02e1391a15_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_ea3a019b_3f26_4013_886f_7f02e1391a15_textFormat"] = ('' === $tmp = "cohesion") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_4f00638e_2829_4804_8f0e_a3ca2bfe9a73"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_f26e3161_8409_4547_989b_3f0999f204ad"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_35eeae70_2419_42dc_9a25_516a5b6f7bc5"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_f0c2db5b_2fed_4b12_9fa4_5506013f5fc7"] = ('' === $tmp = "_self") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_2bc3cfff_0781_43bc_8c53_827742d85653"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:84c89c03-5be2-4bc8-a4ec-88cf6d1ed14f]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_615b71b8_be3f_4941_8807_71638dd761f0"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:media:3a8b5db2-1d80-4051-9889-bc9bad7d441b]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_13bc154b_344b_4ede_a2fe_0a8d6f7e67fb"] = ('' === $tmp = "中华人民共和国") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a90ab494_d0c9_4718_a9e9_fe4c5c3c1d0e"] = ('' === $tmp = "rgba(0, 53, 149, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_1dfc0289_49c8_4ac1_abe0_edd01d1889a7"] = ('' === $tmp = "rgba(255, 255, 255, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_d90f50b1_777e_4e26_ae93_c243ad8f2ff2"] = ('' === $tmp = "rgba(255, 255, 255, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_66da1c64_532c_41b1_b8b4_96bf54ac47f5"] = ('' === $tmp = "rgba(0, 87, 184, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_7fe88373_a216_474e_8caa_9064c2a6427f"] = ('' === $tmp = "rgba(255, 255, 255, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_c03f8012_b93d_4f61_84e6_e0156b050011"] = ('' === $tmp = "coh-style-a-supernav-footer-max-width-narrow") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_7f5ff564_4ff0_4ee8_a97d_8c53d05a6372"] = ('' === $tmp = "coh-style-a-supernav-footer-font-weight-secondary") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_75ecbd54_c8a0_4b94_a334_1441f9b82d97"] = ('' === $tmp = "coh-style-a-supernav-footer-font-size-alternative") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_44c3016d_d760_4b25_bace_f87f3d0a16a9"] = ('' === $tmp = "coh-style-a-supernav-footer-font-size-alternative-2") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_98115a80_1773_407b_942d_0b566e249415"] = ('' === $tmp = "coh-style-a-supernav-footer-font-size-alternative") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_975f0251_2198_4090_81dc_a9e203bab417"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_64a01165_2823_4e4a_a4de_7a3a2052314b"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_03d4d4dd_6167_428d_a6b9_9b28cad7494e"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_d60082e5_31d6_4029_84a9_17dcb775a929"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_51357ec2_5ea6_4634_8c18_f6f749c5e633"] = ('' === $tmp = "rgba(255, 255, 255, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_65b313c2_9ac9_447b_987e_2ada047ff8f6"] = ('' === $tmp = "coh-style-a-supernav-footer-padding-top-medium") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_5221680e_4694_4e90_82f5_2a0f6c1a5206"] = ('' === $tmp = "coh-style-a-supernav-footer-padding-bottom-medium") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_dbb682c1_1642_4919_a0f6_639a0cad6e85"] = ('' === $tmp = "coh-style-a-supernav-footer-padding-left-large") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_fb30a552_59b9_4f49_bc34_c5b96142ac4e"] = ('' === $tmp = "coh-style-a-supernav-footer-padding-right-large") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_8e624ec2_18a1_4b06_8a20_2f11e4ed1eec"] = ('' === $tmp = "中华人民共和国") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_93129e94_d9d4_46c2_8268_81667defc275"] = ('' === $tmp = "Alcon See Briliantly") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_supernav_footer_profession", false, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), ["57b1eb9b-1a00-43d9-a72d-180b382d7edd" => "component_variable_57b1eb9b_1a00_43d9_a72d_180b382d7edd", "364b3f71-a13b-40ef-b4e2-9420cc40aa84" => "component_variable_364b3f71_a13b_40ef_b4e2_9420cc40aa84", "ea3a019b-3f26-4013-886f-7f02e1391a15" => ["text" => "component_variable_ea3a019b_3f26_4013_886f_7f02e1391a15_text", "textFormat" => "component_variable_ea3a019b_3f26_4013_886f_7f02e1391a15_textFormat"], "4f00638e-2829-4804-8f0e-a3ca2bfe9a73" => "component_variable_4f00638e_2829_4804_8f0e_a3ca2bfe9a73", "f26e3161-8409-4547-989b-3f0999f204ad" => "component_variable_f26e3161_8409_4547_989b_3f0999f204ad", "35eeae70-2419-42dc-9a25-516a5b6f7bc5" => "component_variable_35eeae70_2419_42dc_9a25_516a5b6f7bc5", "f0c2db5b-2fed-4b12-9fa4-5506013f5fc7" => "component_variable_f0c2db5b_2fed_4b12_9fa4_5506013f5fc7", "2bc3cfff-0781-43bc-8c53-827742d85653" => "component_variable_2bc3cfff_0781_43bc_8c53_827742d85653", "615b71b8-be3f-4941-8807-71638dd761f0" => "component_variable_615b71b8_be3f_4941_8807_71638dd761f0", "13bc154b-344b-4ede-a2fe-0a8d6f7e67fb" => "component_variable_13bc154b_344b_4ede_a2fe_0a8d6f7e67fb", "a90ab494-d0c9-4718-a9e9-fe4c5c3c1d0e" => "component_variable_a90ab494_d0c9_4718_a9e9_fe4c5c3c1d0e", "1dfc0289-49c8-4ac1-abe0-edd01d1889a7" => "component_variable_1dfc0289_49c8_4ac1_abe0_edd01d1889a7", "d90f50b1-777e-4e26-ae93-c243ad8f2ff2" => "component_variable_d90f50b1_777e_4e26_ae93_c243ad8f2ff2", "66da1c64-532c-41b1-b8b4-96bf54ac47f5" => "component_variable_66da1c64_532c_41b1_b8b4_96bf54ac47f5", "7fe88373-a216-474e-8caa-9064c2a6427f" => "component_variable_7fe88373_a216_474e_8caa_9064c2a6427f", "c03f8012-b93d-4f61-84e6-e0156b050011" => "component_variable_c03f8012_b93d_4f61_84e6_e0156b050011", "7f5ff564-4ff0-4ee8-a97d-8c53d05a6372" => "component_variable_7f5ff564_4ff0_4ee8_a97d_8c53d05a6372", "75ecbd54-c8a0-4b94-a334-1441f9b82d97" => "component_variable_75ecbd54_c8a0_4b94_a334_1441f9b82d97", "44c3016d-d760-4b25-bace-f87f3d0a16a9" => "component_variable_44c3016d_d760_4b25_bace_f87f3d0a16a9", "98115a80-1773-407b-942d-0b566e249415" => "component_variable_98115a80_1773_407b_942d_0b566e249415", "975f0251-2198-4090-81dc-a9e203bab417" => "component_variable_975f0251_2198_4090_81dc_a9e203bab417", "64a01165-2823-4e4a-a4de-7a3a2052314b" => "component_variable_64a01165_2823_4e4a_a4de_7a3a2052314b", "03d4d4dd-6167-428d-a6b9-9b28cad7494e" => "component_variable_03d4d4dd_6167_428d_a6b9_9b28cad7494e", "d60082e5-31d6-4029-84a9-17dcb775a929" => "component_variable_d60082e5_31d6_4029_84a9_17dcb775a929", "51357ec2-5ea6-4634-8c18-f6f749c5e633" => "component_variable_51357ec2_5ea6_4634_8c18_f6f749c5e633", "65b313c2-9ac9-447b-987e-2ada047ff8f6" => "component_variable_65b313c2_9ac9_447b_987e_2ada047ff8f6", "5221680e-4694-4e90-82f5-2a0f6c1a5206" => "component_variable_5221680e_4694_4e90_82f5_2a0f6c1a5206", "dbb682c1-1642-4919-a0f6-639a0cad6e85" => "component_variable_dbb682c1_1642_4919_a0f6_639a0cad6e85", "fb30a552-59b9-4f49-bc34-c5b96142ac4e" => "component_variable_fb30a552_59b9_4f49_bc34_c5b96142ac4e", "8e624ec2-18a1-4b06-8a20-2f11e4ed1eec" => "component_variable_8e624ec2_18a1_4b06_8a20_2f11e4ed1eec", "93129e94-d9d4-46c2-8268-81667defc275" => "component_variable_93129e94_d9d4_46c2_8268_81667defc275"], "0ee630c5-6b11-4b4d-b594-402688219d2a", ""), "html", null, true);
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
        return "__string_template__f6426384e37cd10e4196b6f7d28b9d39";
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
        return new Source("", "__string_template__f6426384e37cd10e4196b6f7d28b9d39", "");
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
