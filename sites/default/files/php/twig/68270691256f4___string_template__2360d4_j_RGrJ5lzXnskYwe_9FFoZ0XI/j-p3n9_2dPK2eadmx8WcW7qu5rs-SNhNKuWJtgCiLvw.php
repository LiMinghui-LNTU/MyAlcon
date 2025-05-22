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

/* __string_template__2360d417f5c800e6f88ce3640da4198a */
class __TwigTemplate_f484bf88a933f910cbee666220186e37 extends Template
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
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.matchHeight"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.cohMatchHeights"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.windowscroll"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/element_templates.link"), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cohesion/global_libraries.parallax_scrolling"), "html", null, true);
        yield " ";
        $context["component_variable_382c3f6d_dcd9_4660_b59b_76eb9155b66d_text"] = ('' === $tmp = "<h3 class=\"text-align-center\"><span class=\"coh-color-white\">Site for International Healthcare Professionals only&nbsp;&nbsp;</span></h3><p class=\"text-align-center\"><br><span class=\"coh-color-white\"><u>Check if a local MyAlcon page is available for your country to access country product information</u></span></p><p class=\"text-align-center\"><br><span class=\"coh-color-white\">&nbsp;You are accessing Alcon's INTERNATIONAL online platform for Healthcare Professionals (MyAlcon).</span><br><span class=\"coh-color-white\">This platform is intended to provide general product information for education and illustration purposes.</span><br><span class=\"coh-color-white\">It is not intended to provide information to the general public or medical advice.</span></p><p class=\"text-align-center\"><br><span class=\"coh-color-white\">As product information, availability, indication and trade names may vary from country to country, the content of this site may not be fully in line with the approved or cleared product information in the country you are accessing from. Unless stated otherwise for specific product or event pages, the content on this site is based on the regulatory and legal principles applicable to the United Kingdom.</span></p><p class=\"text-align-center\">&nbsp;</p><p class=\"text-align-center\"><br><span class=\"coh-color-white\"><strong>By clicking Yes. I confirm that:</strong></span><br><span class=\"coh-color-white\">- I&nbsp;understand that this platform Is directed to Healthcare Professionals only and that I am a licensed Healthcare Professional.</span><br><span class=\"coh-color-white\">-&nbsp; I have read and agree to MyAlcon's </span><a class=\"coh-style-a-link-white\" href=\"https://www.au.alcon.com/terms-use\"><span class=\"coh-color-white\"><u>terms and conditions</u></span></a><span class=\"coh-color-white\"> and </span><a class=\"coh-style-a-link-white\" href=\"https://www.au.alcon.com/privacy-policy\"><span class=\"coh-color-white\"><u>privacy policy</u></span></a><span class=\"coh-color-white\"><strong>.</strong></span></p><p>&nbsp;</p>") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_382c3f6d_dcd9_4660_b59b_76eb9155b66d_textFormat"] = ('' === $tmp = "cohesion") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_9595ae9f_26d0_4855_9ddd_92a1c3ec5de0"] = ('' === $tmp = "Yes") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a976cf74_acfa_4bf1_8aa6_46d76413d5ae"] = ('' === $tmp = "No") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_2778760a_7f2e_40a0_aef0_51f7160277d8"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_14be993a_3314_49e3_95de_2cd8617a6fe3"] = ('' === $tmp = "self") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_2e27a3d1_b617_44ed_99ea_50c3bc7fd0a4"] = ('' === $tmp = "self") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_1f7c651d_6069_44e9_bce0_3839af26e172"] = ('' === $tmp = "node::2556") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_prof_restricted_access_pu1", false, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), ["382c3f6d-dcd9-4660-b59b-76eb9155b66d" => ["text" => "component_variable_382c3f6d_dcd9_4660_b59b_76eb9155b66d_text", "textFormat" => "component_variable_382c3f6d_dcd9_4660_b59b_76eb9155b66d_textFormat"], "9595ae9f-26d0-4855-9ddd-92a1c3ec5de0" => "component_variable_9595ae9f_26d0_4855_9ddd_92a1c3ec5de0", "a976cf74-acfa-4bf1-8aa6-46d76413d5ae" => "component_variable_a976cf74_acfa_4bf1_8aa6_46d76413d5ae", "2778760a-7f2e-40a0-aef0-51f7160277d8" => "component_variable_2778760a_7f2e_40a0_aef0_51f7160277d8", "14be993a-3314-49e3-95de-2cd8617a6fe3" => "component_variable_14be993a_3314_49e3_95de_2cd8617a6fe3", "2e27a3d1-b617-44ed-99ea-50c3bc7fd0a4" => "component_variable_2e27a3d1_b617_44ed_99ea_50c3bc7fd0a4", "1f7c651d-6069-44e9-bce0-3839af26e172" => "component_variable_1f7c651d_6069_44e9_bce0_3839af26e172"], "4211bbbf-3b4a-412d-9480-82f398b2b159", ""), "html", null, true);
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
        return "__string_template__2360d417f5c800e6f88ce3640da4198a";
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
        return new Source("", "__string_template__2360d417f5c800e6f88ce3640da4198a", "");
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
