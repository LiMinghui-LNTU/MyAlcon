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

/* __string_template__dc93637cbffd5c125dca66da16b7c722 */
class __TwigTemplate_b4a96b6701d6d8911ff8702b1e49af68 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'block1552434219' => [$this, 'block_block1552434219'],
            'block2688335709' => [$this, 'block_block2688335709'],
            'block2842216893' => [$this, 'block_block2842216893'],
            'block568473980' => [$this, 'block_block568473980'],
            'block3266346827' => [$this, 'block_block3266346827'],
            'block339126742' => [$this, 'block_block339126742'],
            'block623515100' => [$this, 'block_block623515100'],
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
        $context["component_variable_b3706315_9672_4809_bcc2_6cbdc377f9a7_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_b3706315_9672_4809_bcc2_6cbdc377f9a7_textFormat"] = ('' === $tmp = "cohesion") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_413f77e1_83af_45f7_a61f_b3f790d58c23_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_413f77e1_83af_45f7_a61f_b3f790d58c23_textFormat"] = ('' === $tmp = "cohesion") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_e4e2190d_7a2c_4cae_8169_85c7bdcda0df"] = ('' === $tmp = "coh-style-a-max-width-wide") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_4cfd6591_a5c8_4ce9_8dc8_1c3f267e2298"] = ('' === $tmp = "coh-style-a-slider-style") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_28a8c5e5_6603_42c4_9f62_faa49b19ba29"] = ('' === $tmp = "coh-style-a-slider-style-left-nav-alternative-1") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_82ada7b3_cf05_4088_807e_df36c36591d7"] = ('' === $tmp = "coh-style-a-slider-style-right-nav-alternative-1") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_767108ae_b477_4e58_b39a_102afcf6d38b"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_b2d756f4_5136_408b_8f2a_f24030208350"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_57bf5257_179f_47c9_bbf5_d0826c549eac"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_12ea1fbe_b6c7_4fc4_9704_934ff6e5e5a5"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_e8fdccbe_0f75_4b9d_8e99_4b8a10cc28e4"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_97ca1225_4087_4ebb_9d33_5be77a8c3792"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_b23de95c_fae9_4c6b_9f0e_a6f8b16b1dd7"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_116417f8_ddc7_47b5_b755_2fbcbd3af1ef"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_f73128e5_a801_4f1c_acc7_9684de84826e"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_ab68eedd_1036_4330_ae86_136f7b352048"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_c960e2e7_b67c_4f04_93db_91d1113e35d8"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_4f9154c7_0a26_4ff1_8c60_c1b83626d84f"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["dropZoneContent"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield " ";
            yield from $this->unwrap()->yieldBlock('block1552434219', $context, $blocks);
            yield " ";
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if ( !array_key_exists("dropZones", $context)) {
            $context["dropZones"] = [];
        }
        yield " ";
        $context["dropZones"] = Twig\Extension\CoreExtension::merge($this->sandbox->ensureToStringAllowed(($context["dropZones"] ?? null), 1, $this->source), ["cc15bd96-b3be-417b-9b62-30869c7304b8" => ($context["dropZoneContent"] ?? null)]);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_slider_container", false, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), Twig\Extension\CoreExtension::merge($this->sandbox->ensureToStringAllowed(($context["dropZones"] ?? null), 1, $this->source), ["b3706315-9672-4809-bcc2-6cbdc377f9a7" => ["text" => "component_variable_b3706315_9672_4809_bcc2_6cbdc377f9a7_text", "textFormat" => "component_variable_b3706315_9672_4809_bcc2_6cbdc377f9a7_textFormat"], "413f77e1-83af-45f7-a61f-b3f790d58c23" => ["text" => "component_variable_413f77e1_83af_45f7_a61f_b3f790d58c23_text", "textFormat" => "component_variable_413f77e1_83af_45f7_a61f_b3f790d58c23_textFormat"], "e4e2190d-7a2c-4cae-8169-85c7bdcda0df" => "component_variable_e4e2190d_7a2c_4cae_8169_85c7bdcda0df", "4cfd6591-a5c8-4ce9-8dc8-1c3f267e2298" => "component_variable_4cfd6591_a5c8_4ce9_8dc8_1c3f267e2298", "28a8c5e5-6603-42c4-9f62-faa49b19ba29" => "component_variable_28a8c5e5_6603_42c4_9f62_faa49b19ba29", "82ada7b3-cf05-4088-807e-df36c36591d7" => "component_variable_82ada7b3_cf05_4088_807e_df36c36591d7", "767108ae-b477-4e58-b39a-102afcf6d38b" => "component_variable_767108ae_b477_4e58_b39a_102afcf6d38b", "b2d756f4-5136-408b-8f2a-f24030208350" => "component_variable_b2d756f4_5136_408b_8f2a_f24030208350", "57bf5257-179f-47c9-bbf5-d0826c549eac" => "component_variable_57bf5257_179f_47c9_bbf5_d0826c549eac", "12ea1fbe-b6c7-4fc4-9704-934ff6e5e5a5" => "component_variable_12ea1fbe_b6c7_4fc4_9704_934ff6e5e5a5", "e8fdccbe-0f75-4b9d-8e99-4b8a10cc28e4" => "component_variable_e8fdccbe_0f75_4b9d_8e99_4b8a10cc28e4", "97ca1225-4087-4ebb-9d33-5be77a8c3792" => "component_variable_97ca1225_4087_4ebb_9d33_5be77a8c3792", "b23de95c-fae9-4c6b-9f0e-a6f8b16b1dd7" => "component_variable_b23de95c_fae9_4c6b_9f0e_a6f8b16b1dd7", "116417f8-ddc7-47b5-b755-2fbcbd3af1ef" => "component_variable_116417f8_ddc7_47b5_b755_2fbcbd3af1ef", "f73128e5-a801-4f1c-acc7-9684de84826e" => "component_variable_f73128e5_a801_4f1c_acc7_9684de84826e", "ab68eedd-1036-4330-ae86-136f7b352048" => "component_variable_ab68eedd_1036_4330_ae86_136f7b352048", "c960e2e7-b67c-4f04-93db-91d1113e35d8" => "component_variable_c960e2e7_b67c_4f04_93db_91d1113e35d8", "4f9154c7-0a26-4ff1-8c60-c1b83626d84f" => "component_variable_4f9154c7_0a26_4ff1_8c60_c1b83626d84f"]), "34fb1d4b-f70e-428d-bdd3-f6102823e127", ""), "html", null, true);
        yield " ";
        $context["component_variable_1d55350b_7676_46aa_8f0f_a4d1f0a5b24a_text"] = ('' === $tmp = "<h2 class=\"text-align-center\"><span class=\"coh-color-alcon-almost-black\" style=\"white-space:pre-wrap;\">让您医疗机构的愿景成为现实</span></h2><p class=\"text-align-center\">&nbsp;</p>") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_1d55350b_7676_46aa_8f0f_a4d1f0a5b24a_textFormat"] = ('' === $tmp = "cohesion") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_726a6292_7aad_4b4d_8750_bf0cc6d509d8_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_726a6292_7aad_4b4d_8750_bf0cc6d509d8_textFormat"] = ('' === $tmp = "cohesion") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_3a097893_61bb_4464_9c7e_7b5bdb7b49ad"] = ('' === $tmp = "coh-style-a-max-width-wide") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_3dcf22c7_cc7f_4558_b008_efa17bfee8d4"] = ('' === $tmp = "rgba(214, 219, 227, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_83e624f2_999e_4cdd_83f1_9ae62fbe3ff2"] = ('' === $tmp = "coh-style-a-padding-top-medium") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_09891839_abe7_4e6f_ab19_674d4228c7a6"] = ('' === $tmp = "coh-style-a-padding-bottom-medium") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_4d0692c1_8eb1_4c59_9e5a_df86f4e9cc34"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_612b6cf0_923c_4571_9d4b_c3b800bc70fe"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_13327339_c209_42fe_942a_7533fec8b802"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a79cd349_f9e5_4b21_b2e1_9badc6735feb"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_7732e1e6_56fa_4a07_b03f_1c547e7dc698"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_aceb75e1_a982_47f2_8d66_e0fabe1bb35f"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_92a4dcb2_cf4f_4aee_9e75_c65eb2d9aa26"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_348b2aec_7b08_4799_b126_29e1c77d0adb"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_33b3ebcc_375a_40a0_a1c1_c18e105df255"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_1bcfee0d_6a9e_4329_9273_4e2af401e135"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["dropZoneContent"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield " ";
            yield from $this->unwrap()->yieldBlock('block2842216893', $context, $blocks);
            yield " ";
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if ( !array_key_exists("dropZones", $context)) {
            $context["dropZones"] = [];
        }
        yield " ";
        $context["dropZones"] = Twig\Extension\CoreExtension::merge($this->sandbox->ensureToStringAllowed(($context["dropZones"] ?? null), 1, $this->source), ["70b6e18d-7bea-47bb-a1ff-183c94b55887" => ($context["dropZoneContent"] ?? null)]);
        yield " ";
        $context["dropZoneContent"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield " ";
            yield from $this->unwrap()->yieldBlock('block568473980', $context, $blocks);
            yield " ";
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if ( !array_key_exists("dropZones", $context)) {
            $context["dropZones"] = [];
        }
        yield " ";
        $context["dropZones"] = Twig\Extension\CoreExtension::merge($this->sandbox->ensureToStringAllowed(($context["dropZones"] ?? null), 1, $this->source), ["4911e7f6-9deb-4b88-b77f-6ef560a7704b" => ($context["dropZoneContent"] ?? null)]);
        yield " ";
        $context["dropZoneContent"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield " ";
            yield from $this->unwrap()->yieldBlock('block3266346827', $context, $blocks);
            yield " ";
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if ( !array_key_exists("dropZones", $context)) {
            $context["dropZones"] = [];
        }
        yield " ";
        $context["dropZones"] = Twig\Extension\CoreExtension::merge($this->sandbox->ensureToStringAllowed(($context["dropZones"] ?? null), 1, $this->source), ["30d36d77-996d-447d-a710-c3fdac202108" => ($context["dropZoneContent"] ?? null)]);
        yield " ";
        $context["dropZoneContent"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield " ";
            yield from $this->unwrap()->yieldBlock('block339126742', $context, $blocks);
            yield " ";
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if ( !array_key_exists("dropZones", $context)) {
            $context["dropZones"] = [];
        }
        yield " ";
        $context["dropZones"] = Twig\Extension\CoreExtension::merge($this->sandbox->ensureToStringAllowed(($context["dropZones"] ?? null), 1, $this->source), ["b3c8f21f-f2cc-4628-86ec-8beeb90255ef" => ($context["dropZoneContent"] ?? null)]);
        yield " ";
        $context["dropZoneContent"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield " ";
            yield from $this->unwrap()->yieldBlock('block623515100', $context, $blocks);
            yield " ";
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if ( !array_key_exists("dropZones", $context)) {
            $context["dropZones"] = [];
        }
        yield " ";
        $context["dropZones"] = Twig\Extension\CoreExtension::merge($this->sandbox->ensureToStringAllowed(($context["dropZones"] ?? null), 1, $this->source), ["c3229374-6e98-43da-b737-b92bebfe21aa" => ($context["dropZoneContent"] ?? null)]);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_card_cont_5c", false, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), Twig\Extension\CoreExtension::merge($this->sandbox->ensureToStringAllowed(($context["dropZones"] ?? null), 1, $this->source), ["1d55350b-7676-46aa-8f0f-a4d1f0a5b24a" => ["text" => "component_variable_1d55350b_7676_46aa_8f0f_a4d1f0a5b24a_text", "textFormat" => "component_variable_1d55350b_7676_46aa_8f0f_a4d1f0a5b24a_textFormat"], "726a6292-7aad-4b4d-8750-bf0cc6d509d8" => ["text" => "component_variable_726a6292_7aad_4b4d_8750_bf0cc6d509d8_text", "textFormat" => "component_variable_726a6292_7aad_4b4d_8750_bf0cc6d509d8_textFormat"], "3a097893-61bb-4464-9c7e-7b5bdb7b49ad" => "component_variable_3a097893_61bb_4464_9c7e_7b5bdb7b49ad", "3dcf22c7-cc7f-4558-b008-efa17bfee8d4" => "component_variable_3dcf22c7_cc7f_4558_b008_efa17bfee8d4", "83e624f2-999e-4cdd-83f1-9ae62fbe3ff2" => "component_variable_83e624f2_999e_4cdd_83f1_9ae62fbe3ff2", "09891839-abe7-4e6f-ab19-674d4228c7a6" => "component_variable_09891839_abe7_4e6f_ab19_674d4228c7a6", "4d0692c1-8eb1-4c59-9e5a-df86f4e9cc34" => "component_variable_4d0692c1_8eb1_4c59_9e5a_df86f4e9cc34", "612b6cf0-923c-4571-9d4b-c3b800bc70fe" => "component_variable_612b6cf0_923c_4571_9d4b_c3b800bc70fe", "13327339-c209-42fe-942a-7533fec8b802" => "component_variable_13327339_c209_42fe_942a_7533fec8b802", "a79cd349-f9e5-4b21-b2e1-9badc6735feb" => "component_variable_a79cd349_f9e5_4b21_b2e1_9badc6735feb", "7732e1e6-56fa-4a07-b03f-1c547e7dc698" => "component_variable_7732e1e6_56fa_4a07_b03f_1c547e7dc698", "aceb75e1-a982-47f2-8d66-e0fabe1bb35f" => "component_variable_aceb75e1_a982_47f2_8d66_e0fabe1bb35f", "92a4dcb2-cf4f-4aee-9e75-c65eb2d9aa26" => "component_variable_92a4dcb2_cf4f_4aee_9e75_c65eb2d9aa26", "348b2aec-7b08-4799-b126-29e1c77d0adb" => "component_variable_348b2aec_7b08_4799_b126_29e1c77d0adb", "33b3ebcc-375a-40a0-a1c1-c18e105df255" => "component_variable_33b3ebcc_375a_40a0_a1c1_c18e105df255", "1bcfee0d-6a9e-4329-9273-4e2af401e135" => "component_variable_1bcfee0d_6a9e_4329_9273_4e2af401e135"]), "5d654e7b-529b-41ba-9ceb-01e073c3af3d", ""), "html", null, true);
        yield " ";
        $context["component_variable_6c7a1973_4738_40e5_b3e6_239b4b742290_text"] = ('' === $tmp = "<h1><strong>爱尔康体验学院</strong></h1><p>&nbsp;</p><h6><span class=\"coh-color-primary-alcon-true-blue\" style=\"color:#003595;\">为眼健康专业人士提供的非推广性质的培训和教育资源。</span></h6>") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_6c7a1973_4738_40e5_b3e6_239b4b742290_textFormat"] = ('' === $tmp = "cohesion") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_e6ad30ed_c867_42c8_a171_174e30bcb10d_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_e6ad30ed_c867_42c8_a171_174e30bcb10d_textFormat"] = ('' === $tmp = "cohesion") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_813f48da_9f92_4bc3_a9af_96e2b3fe3d14"] = ('' === $tmp = "获取培训和资源") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_32b1a67f_3ca2_4bb7_a7e3_14194f0cbb6b"] = ('' === $tmp = "https://www.alconexperienceacademy.com/index-aea.aspx") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_679e273b_9e29_4d6e_949b_7afe8a97426a"] = ('' === $tmp = "_self") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_067d3d4c_be42_4006_a45b_ec128958525d"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_dfd923e6_e81d_4eaf_8528_506429f46506"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_c48de973_477c_4a3e_9560_c248a86dabea"] = ('' === $tmp = "_self") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_9921302e_1099_47d1_8fe7_460b9c0bb097"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:1a6d5dab-457a-4b40-96b3-590b148a765e]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_93bf7a97_9900_4cf9_91c9_bddcc97ab23f"] = ('' === $tmp = "Alcon experience academy") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_5a29c4b3_07e4_4d67_9f63_b4babb7ee9e1"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:1a6d5dab-457a-4b40-96b3-590b148a765e]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_26caa545_69ff_4cf7_b4dc_570a024aa47e"] = ('' === $tmp = "coh-style-a-max-width-wide") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_1bab13a8_8eee_487b_a740_960529d7b857"] = ('' === $tmp = "coh-style-a-background-image-component-height-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_fb0fa11d_af8c_4f1a_a070_545c18f8b0de"] = ('' === $tmp = "50%") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_b3f9027f_89f1_4d94_944e_e00c267b4570"] = ('' === $tmp = "coh-style-a-hero-alignment-left") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_2dbbf42e_13db_4a71_b098_49b14bfcf7de"] = ('' === $tmp = "center") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_795339c1_50d8_41c5_994a_66f9dd4bc10d"] = ('' === $tmp = "coh-style-a-button-primary") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_03c40b6e_df68_4a6e_813f_8d8f2ae5e64b"] = ('' === $tmp = "coh-style-a-button-inverted") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_80f4e94a_d835_4caa_9b5b_16969c44443c"] = ('' === $tmp = "rgba(245, 245, 245, 0.097)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_cec25110_f80f_4b01_81ba_87db11debf32"] = ('' === $tmp = "rgba(250, 250, 250, 0.108)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_42708eea_756e_4789_b2fe_3db441795437"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_eb9db88e_9786_4658_9d5d_e9ab46c28698"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_d77169ff_7c0b_43be_9a2d_fd04c3867fc8"] = ('' === $tmp = "coh-style-a-padding-left-medium") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_4e64bcdf_e218_4a36_a06f_7b2cee529ec7"] = ('' === $tmp = "coh-style-a-padding-right-medium") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_104efa25_afa1_417c_ba3e_fe98730fa26a"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_1684434d_98e7_42df_b9f1_18b1f0838a5b"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_7f6be8e4_4be3_45da_a928_9ff6f0b932cb"] = ('' === $tmp = "coh-style-a-padding-left-medium") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_c49fc140_5f66_403d_9e2d_d2d6c063a7d1"] = ('' === $tmp = "coh-style-a-padding-right-medium") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a98cf2ad_ff9f_46d9_b57f_734e491a3bac"] = ('' === $tmp = "Left") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_d366a48f_a8dd_48a5_bc05_688fd47c520b"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_536ce25f_3a62_47d5_aa50_1e28cba967ad"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_32775589_aa98_4736_b3ac_46142cffd8cf"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_7850523d_b357_4811_a9e0_ceaf14123bf6"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_txt_bkgrd_img_m1", false, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), ["6c7a1973-4738-40e5-b3e6-239b4b742290" => ["text" => "component_variable_6c7a1973_4738_40e5_b3e6_239b4b742290_text", "textFormat" => "component_variable_6c7a1973_4738_40e5_b3e6_239b4b742290_textFormat"], "e6ad30ed-c867-42c8-a171-174e30bcb10d" => ["text" => "component_variable_e6ad30ed_c867_42c8_a171_174e30bcb10d_text", "textFormat" => "component_variable_e6ad30ed_c867_42c8_a171_174e30bcb10d_textFormat"], "813f48da-9f92-4bc3-a9af-96e2b3fe3d14" => "component_variable_813f48da_9f92_4bc3_a9af_96e2b3fe3d14", "32b1a67f-3ca2-4bb7-a7e3-14194f0cbb6b" => "component_variable_32b1a67f_3ca2_4bb7_a7e3_14194f0cbb6b", "679e273b-9e29-4d6e-949b-7afe8a97426a" => "component_variable_679e273b_9e29_4d6e_949b_7afe8a97426a", "067d3d4c-be42-4006-a45b-ec128958525d" => "component_variable_067d3d4c_be42_4006_a45b_ec128958525d", "dfd923e6-e81d-4eaf-8528-506429f46506" => "component_variable_dfd923e6_e81d_4eaf_8528_506429f46506", "c48de973-477c-4a3e-9560-c248a86dabea" => "component_variable_c48de973_477c_4a3e_9560_c248a86dabea", "9921302e-1099-47d1-8fe7-460b9c0bb097" => "component_variable_9921302e_1099_47d1_8fe7_460b9c0bb097", "93bf7a97-9900-4cf9-91c9-bddcc97ab23f" => "component_variable_93bf7a97_9900_4cf9_91c9_bddcc97ab23f", "5a29c4b3-07e4-4d67-9f63-b4babb7ee9e1" => "component_variable_5a29c4b3_07e4_4d67_9f63_b4babb7ee9e1", "26caa545-69ff-4cf7-b4dc-570a024aa47e" => "component_variable_26caa545_69ff_4cf7_b4dc_570a024aa47e", "1bab13a8-8eee-487b-a740-960529d7b857" => "component_variable_1bab13a8_8eee_487b_a740_960529d7b857", "fb0fa11d-af8c-4f1a-a070-545c18f8b0de" => "component_variable_fb0fa11d_af8c_4f1a_a070_545c18f8b0de", "b3f9027f-89f1-4d94-944e-e00c267b4570" => "component_variable_b3f9027f_89f1_4d94_944e_e00c267b4570", "2dbbf42e-13db-4a71-b098-49b14bfcf7de" => "component_variable_2dbbf42e_13db_4a71_b098_49b14bfcf7de", "795339c1-50d8-41c5-994a-66f9dd4bc10d" => "component_variable_795339c1_50d8_41c5_994a_66f9dd4bc10d", "03c40b6e-df68-4a6e-813f-8d8f2ae5e64b" => "component_variable_03c40b6e_df68_4a6e_813f_8d8f2ae5e64b", "80f4e94a-d835-4caa-9b5b-16969c44443c" => "component_variable_80f4e94a_d835_4caa_9b5b_16969c44443c", "cec25110-f80f-4b01-81ba-87db11debf32" => "component_variable_cec25110_f80f_4b01_81ba_87db11debf32", "42708eea-756e-4789-b2fe-3db441795437" => "component_variable_42708eea_756e_4789_b2fe_3db441795437", "eb9db88e-9786-4658-9d5d-e9ab46c28698" => "component_variable_eb9db88e_9786_4658_9d5d_e9ab46c28698", "d77169ff-7c0b-43be-9a2d-fd04c3867fc8" => "component_variable_d77169ff_7c0b_43be_9a2d_fd04c3867fc8", "4e64bcdf-e218-4a36-a06f-7b2cee529ec7" => "component_variable_4e64bcdf_e218_4a36_a06f_7b2cee529ec7", "104efa25-afa1-417c-ba3e-fe98730fa26a" => "component_variable_104efa25_afa1_417c_ba3e_fe98730fa26a", "1684434d-98e7-42df-b9f1-18b1f0838a5b" => "component_variable_1684434d_98e7_42df_b9f1_18b1f0838a5b", "7f6be8e4-4be3-45da-a928-9ff6f0b932cb" => "component_variable_7f6be8e4_4be3_45da_a928_9ff6f0b932cb", "c49fc140-5f66-403d-9e2d-d2d6c063a7d1" => "component_variable_c49fc140_5f66_403d_9e2d_d2d6c063a7d1", "a98cf2ad-ff9f-46d9-b57f-734e491a3bac" => "component_variable_a98cf2ad_ff9f_46d9_b57f_734e491a3bac", "d366a48f-a8dd-48a5-bc05-688fd47c520b" => "component_variable_d366a48f_a8dd_48a5_bc05_688fd47c520b", "536ce25f-3a62-47d5-aa50-1e28cba967ad" => "component_variable_536ce25f_3a62_47d5_aa50_1e28cba967ad", "32775589-aa98-4736-b3ac-46142cffd8cf" => "component_variable_32775589_aa98_4736_b3ac_46142cffd8cf", "7850523d-b357-4811-a9e0-ceaf14123bf6" => "component_variable_7850523d_b357_4811_a9e0_ceaf14123bf6"], "f2df0d47-c0ff-45e0-b5d9-01adcb905656", ""), "html", null, true);
        yield " ";
        $context["component_variable_0c0d618b_d4e2_4f05_bfde_0c4f26d33509_text"] = ('' === $tmp = "<h2><strong>我们是爱尔康</strong></h2><p class=\"coh-style-a-body-text-large\"><br><meta charset=\"utf-8\"><span style=\"white-space:pre-wrap;\">我们的目标是帮助患者提高视力，观察世界，成就更好的人生。在经历了第一个70年后，我们再次踏上新征程。发现我们的故事。</span></p>") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_0c0d618b_d4e2_4f05_bfde_0c4f26d33509_textFormat"] = ('' === $tmp = "cohesion") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_ea00e1fe_e2d6_44a7_a522_ce57aa927e0e_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_ea00e1fe_e2d6_44a7_a522_ce57aa927e0e_textFormat"] = ('' === $tmp = "cohesion") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_e3768d84_1a87_45b2_917f_57d40910837c"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_752bd974_f292_411b_9450_ab670cb7e918"] = ('' === $tmp = "_self") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_cae8dd83_01ff_406b_bf88_29ac397146f4"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_2f9c4ecc_287e_478a_a3a7_b83b9bf9572e"] = ('' === $tmp = "_self") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_fc465ba2_4f07_4d88_b2a6_e45395aeea47"] = ('' === $tmp = "https://embed.ustudio.com/embed/DqUoIMR0Byo6/U0eY7i3nIxq6") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a480714e_c370_467d_9394_91482405a586"] = ('' === $tmp = "coh-style-a-max-width-wide") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_e34c8ace_e6a4_48ad_9588_cbf83d3d1540"] = ('' === $tmp = "center") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_39c068c6_8b13_4e5e_b540_791243f91125"] = ('' === $tmp = "center") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_0de3ffe0_ac76_4b75_b386_9481649def3c"] = ('' === $tmp = "coh-style-a-button-primary") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_b0b09ed5_d474_4514_a529_60e54baac546"] = ('' === $tmp = "coh-style-a-button-inverted") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_e1fd9416_acce_4cb3_b697_5cfcdf213bee"] = ('' === $tmp = "Left") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_ff8edcce_8fca_4ad7_af72_e6d014d1a41d"] = 0;
        yield " ";
        $context["component_variable_ce3ea6ac_890e_44eb_9116_7a0d5281d9c4"] = 0;
        yield " ";
        $context["component_variable_e3fa9c8b_b59f_4b73_a124_53ba548fed2a"] = false;
        yield " ";
        $context["component_variable_97872d5d_9bd0_4144_98fa_d9f80a77f769"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_5643082a_2c19_4173_8acd_950ac4aa4ff7"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_6691d912_b10c_4caa_87d7_1e9b9d5fcd53"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_1261faf3_2cbd_4cf8_b3a8_0672904cac8b"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_e1215f4b_df59_4bbd_b8bb_b531be846885"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_e2710d75_c027_4190_8139_627ae8f3be57"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_c8a3ec42_0715_4d24_bfee_b76fac3e8b98"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_5535f823_e561_41d4_9602_64335f7c4e6e"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_042a0bb3_1a3f_4af1_92f9_e8ba5403a7b6"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_75de9c87_e74c_4927_9400_379554eabd44"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_ed00f5f5_e271_4b4c_b2f4_813d69710df3"] = ('' === $tmp = "coh-style-a-padding-top-large") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_afa06c3a_9a5a_4990_914a_6894a70c8f5a"] = ('' === $tmp = "coh-style-a-padding-bottom-large") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a514bc60_33e3_41d6_9e92_311afe6c6bb3"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_33116997_4751_4e51_8c9e_7cbd386a33b2"] = ('' === $tmp = "coh-style-a-padding-right-medium") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_7a560a24_f711_476e_b783_39a55b118c1e"] = ('' === $tmp = "coh-style-a-padding-top-large") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_1cf0487e_9463_4b01_aa07_97d88709e5a5"] = ('' === $tmp = "coh-style-a-padding-bottom-large") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_f194bdce_6a26_40ea_94b8_34911bac5290"] = ('' === $tmp = "coh-style-a-padding-left-medium") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_2c3d3e9c_9c61_4c47_bc4d_4c16d313f6e8"] = ('' === $tmp = "coh-style-a-padding-right-medium") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_177928c7_0a10_4cca_92c2_e14f08216fd0"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_88f34784_e3a9_403f_b6b3_3af7850475b2"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_feb7b2f7_07c8_480d_85b8_9c01d4af93cf"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_2d53cb72_5ba1_498b_a6e2_02da6f0c85e7"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_318909ac_14af_49ff_9e84_494fdd66e36f"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_77c0bf53_516b_4386_9df9_2bb08ec4ccfc"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_3ed3234b_4c02_4a76_8423_1314d4eb843e"] = ('' === $tmp = "rgba(249, 246, 241, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_334a681b_d839_49ce_9fa0_3a426b7f46c2"] = ('' === $tmp = "rgba(249, 246, 241, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_b00e06e0_fe81_4f9b_af87_ed936c64ab11"] = ('' === $tmp = "rgba(249, 246, 241, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_txt_ustudio", false, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), ["0c0d618b-d4e2-4f05-bfde-0c4f26d33509" => ["text" => "component_variable_0c0d618b_d4e2_4f05_bfde_0c4f26d33509_text", "textFormat" => "component_variable_0c0d618b_d4e2_4f05_bfde_0c4f26d33509_textFormat"], "ea00e1fe-e2d6-44a7-a522-ce57aa927e0e" => ["text" => "component_variable_ea00e1fe_e2d6_44a7_a522_ce57aa927e0e_text", "textFormat" => "component_variable_ea00e1fe_e2d6_44a7_a522_ce57aa927e0e_textFormat"], "e3768d84-1a87-45b2-917f-57d40910837c" => "component_variable_e3768d84_1a87_45b2_917f_57d40910837c", "752bd974-f292-411b-9450-ab670cb7e918" => "component_variable_752bd974_f292_411b_9450_ab670cb7e918", "cae8dd83-01ff-406b-bf88-29ac397146f4" => "component_variable_cae8dd83_01ff_406b_bf88_29ac397146f4", "2f9c4ecc-287e-478a-a3a7-b83b9bf9572e" => "component_variable_2f9c4ecc_287e_478a_a3a7_b83b9bf9572e", "fc465ba2-4f07-4d88-b2a6-e45395aeea47" => "component_variable_fc465ba2_4f07_4d88_b2a6_e45395aeea47", "a480714e-c370-467d-9394-91482405a586" => "component_variable_a480714e_c370_467d_9394_91482405a586", "e34c8ace-e6a4-48ad-9588-cbf83d3d1540" => "component_variable_e34c8ace_e6a4_48ad_9588_cbf83d3d1540", "39c068c6-8b13-4e5e-b540-791243f91125" => "component_variable_39c068c6_8b13_4e5e_b540_791243f91125", "0de3ffe0-ac76-4b75-b386-9481649def3c" => "component_variable_0de3ffe0_ac76_4b75_b386_9481649def3c", "b0b09ed5-d474-4514-a529-60e54baac546" => "component_variable_b0b09ed5_d474_4514_a529_60e54baac546", "e1fd9416-acce-4cb3-b697-5cfcdf213bee" => "component_variable_e1fd9416_acce_4cb3_b697_5cfcdf213bee", "ff8edcce-8fca-4ad7-af72-e6d014d1a41d" => "component_variable_ff8edcce_8fca_4ad7_af72_e6d014d1a41d", "ce3ea6ac-890e-44eb-9116-7a0d5281d9c4" => "component_variable_ce3ea6ac_890e_44eb_9116_7a0d5281d9c4", "e3fa9c8b-b59f-4b73-a124-53ba548fed2a" => "component_variable_e3fa9c8b_b59f_4b73_a124_53ba548fed2a", "97872d5d-9bd0-4144-98fa-d9f80a77f769" => "component_variable_97872d5d_9bd0_4144_98fa_d9f80a77f769", "5643082a-2c19-4173-8acd-950ac4aa4ff7" => "component_variable_5643082a_2c19_4173_8acd_950ac4aa4ff7", "6691d912-b10c-4caa-87d7-1e9b9d5fcd53" => "component_variable_6691d912_b10c_4caa_87d7_1e9b9d5fcd53", "1261faf3-2cbd-4cf8-b3a8-0672904cac8b" => "component_variable_1261faf3_2cbd_4cf8_b3a8_0672904cac8b", "e1215f4b-df59-4bbd-b8bb-b531be846885" => "component_variable_e1215f4b_df59_4bbd_b8bb_b531be846885", "e2710d75-c027-4190-8139-627ae8f3be57" => "component_variable_e2710d75_c027_4190_8139_627ae8f3be57", "c8a3ec42-0715-4d24-bfee-b76fac3e8b98" => "component_variable_c8a3ec42_0715_4d24_bfee_b76fac3e8b98", "5535f823-e561-41d4-9602-64335f7c4e6e" => "component_variable_5535f823_e561_41d4_9602_64335f7c4e6e", "042a0bb3-1a3f-4af1-92f9-e8ba5403a7b6" => "component_variable_042a0bb3_1a3f_4af1_92f9_e8ba5403a7b6", "75de9c87-e74c-4927-9400-379554eabd44" => "component_variable_75de9c87_e74c_4927_9400_379554eabd44", "ed00f5f5-e271-4b4c-b2f4-813d69710df3" => "component_variable_ed00f5f5_e271_4b4c_b2f4_813d69710df3", "afa06c3a-9a5a-4990-914a-6894a70c8f5a" => "component_variable_afa06c3a_9a5a_4990_914a_6894a70c8f5a", "a514bc60-33e3-41d6-9e92-311afe6c6bb3" => "component_variable_a514bc60_33e3_41d6_9e92_311afe6c6bb3", "33116997-4751-4e51-8c9e-7cbd386a33b2" => "component_variable_33116997_4751_4e51_8c9e_7cbd386a33b2", "7a560a24-f711-476e-b783-39a55b118c1e" => "component_variable_7a560a24_f711_476e_b783_39a55b118c1e", "1cf0487e-9463-4b01-aa07-97d88709e5a5" => "component_variable_1cf0487e_9463_4b01_aa07_97d88709e5a5", "f194bdce-6a26-40ea-94b8-34911bac5290" => "component_variable_f194bdce_6a26_40ea_94b8_34911bac5290", "2c3d3e9c-9c61-4c47-bc4d-4c16d313f6e8" => "component_variable_2c3d3e9c_9c61_4c47_bc4d_4c16d313f6e8", "177928c7-0a10-4cca-92c2-e14f08216fd0" => "component_variable_177928c7_0a10_4cca_92c2_e14f08216fd0", "88f34784-e3a9-403f-b6b3-3af7850475b2" => "component_variable_88f34784_e3a9_403f_b6b3_3af7850475b2", "feb7b2f7-07c8-480d-85b8-9c01d4af93cf" => "component_variable_feb7b2f7_07c8_480d_85b8_9c01d4af93cf", "2d53cb72-5ba1-498b-a6e2-02da6f0c85e7" => "component_variable_2d53cb72_5ba1_498b_a6e2_02da6f0c85e7", "318909ac-14af-49ff-9e84-494fdd66e36f" => "component_variable_318909ac_14af_49ff_9e84_494fdd66e36f", "77c0bf53-516b-4386-9df9-2bb08ec4ccfc" => "component_variable_77c0bf53_516b_4386_9df9_2bb08ec4ccfc", "3ed3234b-4c02-4a76-8423-1314d4eb843e" => "component_variable_3ed3234b_4c02_4a76_8423_1314d4eb843e", "334a681b-d839-49ce-9fa0-3a426b7f46c2" => "component_variable_334a681b_d839_49ce_9fa0_3a426b7f46c2", "b00e06e0-fe81-4f9b-af87-ed936c64ab11" => "component_variable_b00e06e0_fe81_4f9b_af87_ed936c64ab11"], "99d46ed2-0c1f-4588-9b14-a9db9638ba80", ""), "html", null, true);
        yield " ";
        $context["component_variable_f1eeabbc_13b6_412a_9fe9_9ce25aa0dc9e"] = ('' === $tmp = "rgba(0, 53, 149, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_f94a6785_ed6e_47ff_a322_ba070a4bc1bf"] = ('' === $tmp = "auto") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_1cf0a4b1_31cb_4e9a_bfc3_b59d6742b8c8_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_1cf0a4b1_31cb_4e9a_bfc3_b59d6742b8c8_textFormat"] = ('' === $tmp = "cohesion") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_fe600660_4354_4b23_bfef_99db7cbab4f2"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_b23b10c4_448e_486b_b72a_44568cf616b7"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a2731a95_050e_4f91_a614_8adff7acb8a3"] = ('' === $tmp = "right") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_fdc9583a_794d_40dd_930d_4eaf85cdba79"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_3c604e02_79a5_4c59_8e1f_c1e8bb88d1f4"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_f1a8f383_baaa_47c7_82ff_392438e84ed5"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_62dee661_af6d_40e0_8bda_a34d0ec7f8d8"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_97938610_c674_4400_8bd4_76202ffc0abf"] = 12;
        yield " ";
        $context["component_variable_b15325af_e54d_40b0_ac15_cc4b1d92c041"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a63b478a_4e8a_4db1_bd97_29a397f845dd"] = ('' === $tmp = "©2023 Alcon Inc. 03/23  CN-CNT-2400017") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_c775fea4_a328_4110_89cc_383663455970"] = ('' === $tmp = "100%") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_88f19929_fa2a_4c46_b9fd_a202255f1386"] = ('' === $tmp = "right") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_b080c509_8ef0_4ef1_abb1_8612a1680557"] = 25;
        yield " ";
        $context["component_variable_ed998460_299f_4834_b186_57277d2264ed"] = 25;
        yield " ";
        $context["component_variable_ba8286d3_e64e_404c_8f15_796c8a98c32e"] = 25;
        yield " ";
        $context["component_variable_a9ac74ab_0309_4a23_9fba_38c61c486627"] = 25;
        yield " ";
        $context["component_variable_ccdccd92_c1e8_427a_b59c_9510afe790b5"] = ('' === $tmp = "rgba(255, 255, 255, 1)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_67c04871_288e_4274_ac7e_73158cc6d433"] = 16;
        yield " ";
        $context["component_variable_21f0e242_99fe_4abc_b2e0_f4a89ab239b8"] = 550;
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_copyright", false, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), ["f1eeabbc-13b6-412a-9fe9-9ce25aa0dc9e" => "component_variable_f1eeabbc_13b6_412a_9fe9_9ce25aa0dc9e", "f94a6785-ed6e-47ff-a322-ba070a4bc1bf" => "component_variable_f94a6785_ed6e_47ff_a322_ba070a4bc1bf", "1cf0a4b1-31cb-4e9a-bfc3-b59d6742b8c8" => ["text" => "component_variable_1cf0a4b1_31cb_4e9a_bfc3_b59d6742b8c8_text", "textFormat" => "component_variable_1cf0a4b1_31cb_4e9a_bfc3_b59d6742b8c8_textFormat"], "fe600660-4354-4b23-bfef-99db7cbab4f2" => "component_variable_fe600660_4354_4b23_bfef_99db7cbab4f2", "b23b10c4-448e-486b-b72a-44568cf616b7" => "component_variable_b23b10c4_448e_486b_b72a_44568cf616b7", "a2731a95-050e-4f91-a614-8adff7acb8a3" => "component_variable_a2731a95_050e_4f91_a614_8adff7acb8a3", "fdc9583a-794d-40dd-930d-4eaf85cdba79" => "component_variable_fdc9583a_794d_40dd_930d_4eaf85cdba79", "3c604e02-79a5-4c59-8e1f-c1e8bb88d1f4" => "component_variable_3c604e02_79a5_4c59_8e1f_c1e8bb88d1f4", "f1a8f383-baaa-47c7-82ff-392438e84ed5" => "component_variable_f1a8f383_baaa_47c7_82ff_392438e84ed5", "62dee661-af6d-40e0-8bda-a34d0ec7f8d8" => "component_variable_62dee661_af6d_40e0_8bda_a34d0ec7f8d8", "97938610-c674-4400-8bd4-76202ffc0abf" => "component_variable_97938610_c674_4400_8bd4_76202ffc0abf", "b15325af-e54d-40b0-ac15-cc4b1d92c041" => "component_variable_b15325af_e54d_40b0_ac15_cc4b1d92c041", "a63b478a-4e8a-4db1-bd97-29a397f845dd" => "component_variable_a63b478a_4e8a_4db1_bd97_29a397f845dd", "c775fea4-a328-4110-89cc-383663455970" => "component_variable_c775fea4_a328_4110_89cc_383663455970", "88f19929-fa2a-4c46-b9fd-a202255f1386" => "component_variable_88f19929_fa2a_4c46_b9fd_a202255f1386", "b080c509-8ef0-4ef1-abb1-8612a1680557" => "component_variable_b080c509_8ef0_4ef1_abb1_8612a1680557", "ed998460-299f-4834-b186-57277d2264ed" => "component_variable_ed998460_299f_4834_b186_57277d2264ed", "ba8286d3-e64e-404c-8f15-796c8a98c32e" => "component_variable_ba8286d3_e64e_404c_8f15_796c8a98c32e", "a9ac74ab-0309-4a23-9fba-38c61c486627" => "component_variable_a9ac74ab_0309_4a23_9fba_38c61c486627", "ccdccd92-c1e8-427a-b59c-9510afe790b5" => "component_variable_ccdccd92_c1e8_427a_b59c_9510afe790b5", "67c04871-288e-4274-ac7e-73158cc6d433" => "component_variable_67c04871_288e_4274_ac7e_73158cc6d433", "21f0e242-99fe-4abc-b2e0-f4a89ab239b8" => "component_variable_21f0e242_99fe_4abc_b2e0_f4a89ab239b8"], "3e365321-0eda-48ac-8304-0d1e6e1ac5a3", ""), "html", null, true);
        yield " 
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["dropZones", "_context", "media_reference"]);        return; yield '';
    }

    public function block_block1552434219($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->frontendBuilderDropzone($context, "01eeec57-cb8d-4462-b676-547a4e1f6255", "start"), "html", null, true);
        yield " ";
        $context["dropZoneContent"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield " ";
            yield from $this->unwrap()->yieldBlock('block2688335709', $context, $blocks);
            yield " ";
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        if ( !array_key_exists("dropZones", $context)) {
            $context["dropZones"] = [];
        }
        yield " ";
        $context["dropZones"] = Twig\Extension\CoreExtension::merge($this->sandbox->ensureToStringAllowed(($context["dropZones"] ?? null), 1, $this->source), ["bc1c5b59-34a0-4706-a1f9-0809f9573c5f" => ($context["dropZoneContent"] ?? null)]);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_slide_dropzone", false, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), Twig\Extension\CoreExtension::merge($this->sandbox->ensureToStringAllowed(($context["dropZones"] ?? null), 1, $this->source), []), "764617a2-7b22-4fa2-9b74-3ba7dcc938e8", ""), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->frontendBuilderDropzone($context, "01eeec57-cb8d-4462-b676-547a4e1f6255", "end"), "html", null, true);
        return; yield '';
    }

    public function block_block2688335709($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->frontendBuilderDropzone($context, "64ad866b-bc49-478f-b4e0-13d9b16a2b0d", "start"), "html", null, true);
        yield " ";
        $context["component_variable_ba2ccfef_05db_4e04_a813_8021cd1f0031_text"] = ('' === $tmp = "<div><h1><span class=\"coh-color-primary-alcon-true-blue\">以患者为中心的</span><br><span class=\"coh-color-primary-alcon-true-blue\">创新技术合作伙伴</span></h1><p>&nbsp;</p></div><h4><span class=\"coh-color-primary-alcon-true-blue\">我们致力于在全球范围内引领能够推动生活变革的视觉和眼科护理产品创新，因为精彩视界，成就精彩人生。</span></h4>") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_ba2ccfef_05db_4e04_a813_8021cd1f0031_textFormat"] = ('' === $tmp = "cohesion") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_aa32f338_0dd8_4def_ba41_dc83fd47f101_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_aa32f338_0dd8_4def_ba41_dc83fd47f101_textFormat"] = ('' === $tmp = "cohesion") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_8de35a71_15d6_48c3_8b4a_52cc19e108c0"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_7e4b567d_b0d7_43fa_ae04_7ace6fd6d192"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_8629a8d4_56e8_42d8_baa4_bb9d8f6fab42"] = ('' === $tmp = "_self") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_659ac605_dbce_43d3_8855_da0538f4a768"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_40c3b822_744e_469f_948b_cced105020d3"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_41798e91_337f_48a3_bf42_65b2da4b5440"] = ('' === $tmp = "_self") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_ba6cf312_cc5b_449b_98b1_fdb8702139d5"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:2ebe3dfb-a207-4e20-9839-315e43d82328]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_1f93e490_a796_444c_85f6_873b0a381281"] = ('' === $tmp = "An image of a smiling doctor with ophthalmic devices behind him.") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_7ccb4916_ec51_4aa4_974c_03c9a7d78579"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:2ebe3dfb-a207-4e20-9839-315e43d82328]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_6b229834_12d3_459f_a59d_3417a7406830"] = ('' === $tmp = "coh-style-a-hero-height-tall") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_71b2d39b_eba2_4eeb_954b_e075c3ee4c61"] = ('' === $tmp = "60%") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_968918d2_01e2_484f_891f_3eda6b2c2695"] = ('' === $tmp = "coh-style-a-hero-alignment-left") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_ec9d174b_2a50_4f94_9e62_864e4bf5b637"] = ('' === $tmp = "center") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_d724510b_344b_438a_9564_f03edd87b3e0"] = ('' === $tmp = "coh-style-a-button-primary") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_85b4cdbe_215b_47ca_807a_c95bf2fa2b73"] = ('' === $tmp = "coh-style-a-button-inverted") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_0d270cb9_0c3e_42b6_9421_5efc590e5817"] = ('' === $tmp = "rgba(245, 245, 245, 0.097)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_53db68b4_e945_4245_9728_038c9f3ad3ad"] = ('' === $tmp = "rgba(250, 250, 250, 0.108)") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_c1f79b49_7c87_4b49_b3c8_18ff18218af1"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_467f75ed_517e_4c19_b87f_97cd298023d9"] = ('' === $tmp = "coh-style-a-padding-bottom-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_e24be338_2acc_4335_8f51_763142148874"] = ('' === $tmp = "coh-style-a-padding-left-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_bafb82c4_2d5a_447b_b688_07468a9cecd8"] = ('' === $tmp = "coh-style-a-padding-right-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_5ae26751_330e_40d8_920c_75ed7772c514"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_e88775ce_5066_48ff_a23c_591defc45db4"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_ba688780_c124_44ae_85f6_776398acce40"] = ('' === $tmp = "coh-style-a-padding-left-medium") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_9ddc8046_21ab_4bc7_833f_43028dc57e54"] = ('' === $tmp = "coh-style-a-padding-right-medium") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_5434fcb5_c947_4214_8603_22c584b0fee8"] = ('' === $tmp = "Left") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_714a1a11_0852_4103_99b9_c4c6582efb03"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_b6062003_4bca_44c2_ae63_793a2d9ec3f7"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_aadd6b54_8985_4d12_85c6_8831a7f6ea9d"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_8def705f_38a0_4f30_8ef0_0dfe090fc7b5"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_f0cbac1f_e5a3_437a_a021_dccce1ff33bd"] = false;
        yield " ";
        $context["component_variable_e20ee81e_9708_4e2a_980d_5c87013130dd"] = false;
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_hero_m1_txt_bkgrd_img", false, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), ["ba2ccfef-05db-4e04-a813-8021cd1f0031" => ["text" => "component_variable_ba2ccfef_05db_4e04_a813_8021cd1f0031_text", "textFormat" => "component_variable_ba2ccfef_05db_4e04_a813_8021cd1f0031_textFormat"], "aa32f338-0dd8-4def-ba41-dc83fd47f101" => ["text" => "component_variable_aa32f338_0dd8_4def_ba41_dc83fd47f101_text", "textFormat" => "component_variable_aa32f338_0dd8_4def_ba41_dc83fd47f101_textFormat"], "8de35a71-15d6-48c3-8b4a-52cc19e108c0" => "component_variable_8de35a71_15d6_48c3_8b4a_52cc19e108c0", "7e4b567d-b0d7-43fa-ae04-7ace6fd6d192" => "component_variable_7e4b567d_b0d7_43fa_ae04_7ace6fd6d192", "8629a8d4-56e8-42d8-baa4-bb9d8f6fab42" => "component_variable_8629a8d4_56e8_42d8_baa4_bb9d8f6fab42", "659ac605-dbce-43d3-8855-da0538f4a768" => "component_variable_659ac605_dbce_43d3_8855_da0538f4a768", "40c3b822-744e-469f-948b-cced105020d3" => "component_variable_40c3b822_744e_469f_948b_cced105020d3", "41798e91-337f-48a3-bf42-65b2da4b5440" => "component_variable_41798e91_337f_48a3_bf42_65b2da4b5440", "ba6cf312-cc5b-449b-98b1-fdb8702139d5" => "component_variable_ba6cf312_cc5b_449b_98b1_fdb8702139d5", "1f93e490-a796-444c-85f6-873b0a381281" => "component_variable_1f93e490_a796_444c_85f6_873b0a381281", "7ccb4916-ec51-4aa4-974c-03c9a7d78579" => "component_variable_7ccb4916_ec51_4aa4_974c_03c9a7d78579", "6b229834-12d3-459f-a59d-3417a7406830" => "component_variable_6b229834_12d3_459f_a59d_3417a7406830", "71b2d39b-eba2-4eeb-954b-e075c3ee4c61" => "component_variable_71b2d39b_eba2_4eeb_954b_e075c3ee4c61", "968918d2-01e2-484f-891f-3eda6b2c2695" => "component_variable_968918d2_01e2_484f_891f_3eda6b2c2695", "ec9d174b-2a50-4f94-9e62-864e4bf5b637" => "component_variable_ec9d174b_2a50_4f94_9e62_864e4bf5b637", "d724510b-344b-438a-9564-f03edd87b3e0" => "component_variable_d724510b_344b_438a_9564_f03edd87b3e0", "85b4cdbe-215b-47ca-807a-c95bf2fa2b73" => "component_variable_85b4cdbe_215b_47ca_807a_c95bf2fa2b73", "0d270cb9-0c3e-42b6-9421-5efc590e5817" => "component_variable_0d270cb9_0c3e_42b6_9421_5efc590e5817", "53db68b4-e945-4245-9728-038c9f3ad3ad" => "component_variable_53db68b4_e945_4245_9728_038c9f3ad3ad", "c1f79b49-7c87-4b49-b3c8-18ff18218af1" => "component_variable_c1f79b49_7c87_4b49_b3c8_18ff18218af1", "467f75ed-517e-4c19-b87f-97cd298023d9" => "component_variable_467f75ed_517e_4c19_b87f_97cd298023d9", "e24be338-2acc-4335-8f51-763142148874" => "component_variable_e24be338_2acc_4335_8f51_763142148874", "bafb82c4-2d5a-447b-b688-07468a9cecd8" => "component_variable_bafb82c4_2d5a_447b_b688_07468a9cecd8", "5ae26751-330e-40d8-920c-75ed7772c514" => "component_variable_5ae26751_330e_40d8_920c_75ed7772c514", "e88775ce-5066-48ff-a23c-591defc45db4" => "component_variable_e88775ce_5066_48ff_a23c_591defc45db4", "ba688780-c124-44ae-85f6-776398acce40" => "component_variable_ba688780_c124_44ae_85f6_776398acce40", "9ddc8046-21ab-4bc7-833f-43028dc57e54" => "component_variable_9ddc8046_21ab_4bc7_833f_43028dc57e54", "5434fcb5-c947-4214-8603-22c584b0fee8" => "component_variable_5434fcb5_c947_4214_8603_22c584b0fee8", "714a1a11-0852-4103-99b9-c4c6582efb03" => "component_variable_714a1a11_0852_4103_99b9_c4c6582efb03", "b6062003-4bca-44c2-ae63-793a2d9ec3f7" => "component_variable_b6062003_4bca_44c2_ae63_793a2d9ec3f7", "aadd6b54-8985-4d12-85c6-8831a7f6ea9d" => "component_variable_aadd6b54_8985_4d12_85c6_8831a7f6ea9d", "8def705f-38a0-4f30-8ef0-0dfe090fc7b5" => "component_variable_8def705f_38a0_4f30_8ef0_0dfe090fc7b5", "f0cbac1f-e5a3-437a-a021-dccce1ff33bd" => "component_variable_f0cbac1f_e5a3_437a_a021_dccce1ff33bd", "e20ee81e-9708-4e2a-980d-5c87013130dd" => "component_variable_e20ee81e_9708_4e2a_980d_5c87013130dd"], "85a84669-8983-4b01-b5be-fd566e76bcea", ""), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->frontendBuilderDropzone($context, "64ad866b-bc49-478f-b4e0-13d9b16a2b0d", "end"), "html", null, true);
        return; yield '';
    }

    public function block_block2842216893($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->frontendBuilderDropzone($context, "ec12c80c-b5e3-4224-b807-7dfe9e539046", "start"), "html", null, true);
        yield " ";
        $context["component_variable_11156835_ffb2_4939_9445_073e8a21d260_text"] = ('' === $tmp = "<h6 class=\"text-align-center\">白内障手术</h6>") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_11156835_ffb2_4939_9445_073e8a21d260_textFormat"] = ('' === $tmp = "cohesion") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_b355dfad_90a7_4145_bf74_4604365e70c7"] = ('' === $tmp = "node::1623") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_1ff8e573_be31_4e85_98fd_8254bc96402c"] = ('' === $tmp = "_self") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_0379bdcf_0e61_46d4_b93a_8bc556373fd5"] = ('' === $tmp = "Go to new page") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_eac64334_2ed2_442b_afc1_fb5865cec475"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:0814a7a0-b53b-422e-94e1-8a1dd05a1370]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_30d03620_8798_4c48_bfd9_2ae1c20fa1ed"] = ('' === $tmp = "An image of the Centurion Vision System device over a white background.") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_ca132c67_2c15_43c2_ac80_a5244ca0ab16"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:0814a7a0-b53b-422e-94e1-8a1dd05a1370]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_7209f0d5_b930_48eb_b1ae_3d4eb2562283"] = true;
        yield " ";
        $context["component_variable_f215373e_f5a1_455e_8b7c_8a3ea147cb53"] = true;
        yield " ";
        $context["component_variable_51425e9d_0996_4563_99c6_8ecdc280b349"] = false;
        yield " ";
        $context["component_variable_a662329d_6649_47ed_b717_ab3218d13c8b"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_6aaae3ad_9a13_4756_a14f_f32df6ac1adb"] = ('' === $tmp = "coh-style-a-card-medium-full") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_6986d419_0e41_49db_9fbc_b5edc8e7aa44"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_0bf2fe62_c40a_4319_877a_df5723c1a94c"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_c55f663c_8618_4bf6_bd35_075a46d70818"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_016f69ce_f061_48f1_896e_8c381a86bc9e"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a2fbe16d_bb9c_4e0a_aa80_f4b2cc589175"] = ('' === $tmp = "none") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_0960c679_be17_4db7_b89c_d17cefa1dc24"] = ('' === $tmp = "coh-style-a-padding-top-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_24c7e4c4_65b8_416b_acda_bffe28dff98c"] = ('' === $tmp = "coh-style-a-padding-bottom-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_3f53ac32_6987_4286_acb4_33c848db1b94"] = ('' === $tmp = "coh-style-a-padding-left-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_80760545_7de0_4ff6_b047_7db687d8dd78"] = ('' === $tmp = "coh-style-a-padding-right-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_card_img_txt_link_c5c", false, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), ["11156835-ffb2-4939-9445-073e8a21d260" => ["text" => "component_variable_11156835_ffb2_4939_9445_073e8a21d260_text", "textFormat" => "component_variable_11156835_ffb2_4939_9445_073e8a21d260_textFormat"], "b355dfad-90a7-4145-bf74-4604365e70c7" => "component_variable_b355dfad_90a7_4145_bf74_4604365e70c7", "1ff8e573-be31-4e85-98fd-8254bc96402c" => "component_variable_1ff8e573_be31_4e85_98fd_8254bc96402c", "0379bdcf-0e61-46d4-b93a-8bc556373fd5" => "component_variable_0379bdcf_0e61_46d4_b93a_8bc556373fd5", "eac64334-2ed2-442b-afc1-fb5865cec475" => "component_variable_eac64334_2ed2_442b_afc1_fb5865cec475", "30d03620-8798-4c48-bfd9-2ae1c20fa1ed" => "component_variable_30d03620_8798_4c48_bfd9_2ae1c20fa1ed", "ca132c67-2c15-43c2-ac80-a5244ca0ab16" => "component_variable_ca132c67_2c15_43c2_ac80_a5244ca0ab16", "7209f0d5-b930-48eb-b1ae-3d4eb2562283" => "component_variable_7209f0d5_b930_48eb_b1ae_3d4eb2562283", "f215373e-f5a1-455e-8b7c-8a3ea147cb53" => "component_variable_f215373e_f5a1_455e_8b7c_8a3ea147cb53", "51425e9d-0996-4563-99c6-8ecdc280b349" => "component_variable_51425e9d_0996_4563_99c6_8ecdc280b349", "a662329d-6649-47ed-b717-ab3218d13c8b" => "component_variable_a662329d_6649_47ed_b717_ab3218d13c8b", "6aaae3ad-9a13-4756-a14f-f32df6ac1adb" => "component_variable_6aaae3ad_9a13_4756_a14f_f32df6ac1adb", "6986d419-0e41-49db-9fbc-b5edc8e7aa44" => "component_variable_6986d419_0e41_49db_9fbc_b5edc8e7aa44", "0bf2fe62-c40a-4319-877a-df5723c1a94c" => "component_variable_0bf2fe62_c40a_4319_877a_df5723c1a94c", "c55f663c-8618-4bf6-bd35-075a46d70818" => "component_variable_c55f663c_8618_4bf6_bd35_075a46d70818", "016f69ce-f061-48f1-896e-8c381a86bc9e" => "component_variable_016f69ce_f061_48f1_896e_8c381a86bc9e", "a2fbe16d-bb9c-4e0a-aa80-f4b2cc589175" => "component_variable_a2fbe16d_bb9c_4e0a_aa80_f4b2cc589175", "0960c679-be17-4db7-b89c-d17cefa1dc24" => "component_variable_0960c679_be17_4db7_b89c_d17cefa1dc24", "24c7e4c4-65b8-416b-acda-bffe28dff98c" => "component_variable_24c7e4c4_65b8_416b_acda_bffe28dff98c", "3f53ac32-6987-4286-acb4-33c848db1b94" => "component_variable_3f53ac32_6987_4286_acb4_33c848db1b94", "80760545-7de0-4ff6-b047-7db687d8dd78" => "component_variable_80760545_7de0_4ff6_b047_7db687d8dd78"], "9be11977-7f81-4bcf-8f76-c81156defc13", ""), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->frontendBuilderDropzone($context, "ec12c80c-b5e3-4224-b807-7dfe9e539046", "end"), "html", null, true);
        return; yield '';
    }

    public function block_block568473980($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->frontendBuilderDropzone($context, "2edbb3f3-91ba-42d9-bda8-9da5d13b7150", "start"), "html", null, true);
        yield " ";
        $context["component_variable_11156835_ffb2_4939_9445_073e8a21d260_text"] = ('' === $tmp = "<h6 class=\"text-align-center\">屈光技术</h6>") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_11156835_ffb2_4939_9445_073e8a21d260_textFormat"] = ('' === $tmp = "cohesion") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_b355dfad_90a7_4145_bf74_4604365e70c7"] = ('' === $tmp = "node::2560") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_1ff8e573_be31_4e85_98fd_8254bc96402c"] = ('' === $tmp = "_self") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_0379bdcf_0e61_46d4_b93a_8bc556373fd5"] = ('' === $tmp = "Go to new page") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_eac64334_2ed2_442b_afc1_fb5865cec475"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:020db8e6-cd5d-4a9d-ba1e-4525fcac81b8]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_30d03620_8798_4c48_bfd9_2ae1c20fa1ed"] = ('' === $tmp = "An image of ophthalmic refractive devices over a white background.") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_ca132c67_2c15_43c2_ac80_a5244ca0ab16"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:020db8e6-cd5d-4a9d-ba1e-4525fcac81b8]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_7209f0d5_b930_48eb_b1ae_3d4eb2562283"] = true;
        yield " ";
        $context["component_variable_f215373e_f5a1_455e_8b7c_8a3ea147cb53"] = true;
        yield " ";
        $context["component_variable_51425e9d_0996_4563_99c6_8ecdc280b349"] = false;
        yield " ";
        $context["component_variable_a662329d_6649_47ed_b717_ab3218d13c8b"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_6aaae3ad_9a13_4756_a14f_f32df6ac1adb"] = ('' === $tmp = "coh-style-a-card-medium-full") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_6986d419_0e41_49db_9fbc_b5edc8e7aa44"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_0bf2fe62_c40a_4319_877a_df5723c1a94c"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_c55f663c_8618_4bf6_bd35_075a46d70818"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_016f69ce_f061_48f1_896e_8c381a86bc9e"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a2fbe16d_bb9c_4e0a_aa80_f4b2cc589175"] = ('' === $tmp = "none") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_0960c679_be17_4db7_b89c_d17cefa1dc24"] = ('' === $tmp = "coh-style-a-padding-top-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_24c7e4c4_65b8_416b_acda_bffe28dff98c"] = ('' === $tmp = "coh-style-a-padding-bottom-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_3f53ac32_6987_4286_acb4_33c848db1b94"] = ('' === $tmp = "coh-style-a-padding-left-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_80760545_7de0_4ff6_b047_7db687d8dd78"] = ('' === $tmp = "coh-style-a-padding-right-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_card_img_txt_link_c5c", false, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), ["11156835-ffb2-4939-9445-073e8a21d260" => ["text" => "component_variable_11156835_ffb2_4939_9445_073e8a21d260_text", "textFormat" => "component_variable_11156835_ffb2_4939_9445_073e8a21d260_textFormat"], "b355dfad-90a7-4145-bf74-4604365e70c7" => "component_variable_b355dfad_90a7_4145_bf74_4604365e70c7", "1ff8e573-be31-4e85-98fd-8254bc96402c" => "component_variable_1ff8e573_be31_4e85_98fd_8254bc96402c", "0379bdcf-0e61-46d4-b93a-8bc556373fd5" => "component_variable_0379bdcf_0e61_46d4_b93a_8bc556373fd5", "eac64334-2ed2-442b-afc1-fb5865cec475" => "component_variable_eac64334_2ed2_442b_afc1_fb5865cec475", "30d03620-8798-4c48-bfd9-2ae1c20fa1ed" => "component_variable_30d03620_8798_4c48_bfd9_2ae1c20fa1ed", "ca132c67-2c15-43c2-ac80-a5244ca0ab16" => "component_variable_ca132c67_2c15_43c2_ac80_a5244ca0ab16", "7209f0d5-b930-48eb-b1ae-3d4eb2562283" => "component_variable_7209f0d5_b930_48eb_b1ae_3d4eb2562283", "f215373e-f5a1-455e-8b7c-8a3ea147cb53" => "component_variable_f215373e_f5a1_455e_8b7c_8a3ea147cb53", "51425e9d-0996-4563-99c6-8ecdc280b349" => "component_variable_51425e9d_0996_4563_99c6_8ecdc280b349", "a662329d-6649-47ed-b717-ab3218d13c8b" => "component_variable_a662329d_6649_47ed_b717_ab3218d13c8b", "6aaae3ad-9a13-4756-a14f-f32df6ac1adb" => "component_variable_6aaae3ad_9a13_4756_a14f_f32df6ac1adb", "6986d419-0e41-49db-9fbc-b5edc8e7aa44" => "component_variable_6986d419_0e41_49db_9fbc_b5edc8e7aa44", "0bf2fe62-c40a-4319-877a-df5723c1a94c" => "component_variable_0bf2fe62_c40a_4319_877a_df5723c1a94c", "c55f663c-8618-4bf6-bd35-075a46d70818" => "component_variable_c55f663c_8618_4bf6_bd35_075a46d70818", "016f69ce-f061-48f1-896e-8c381a86bc9e" => "component_variable_016f69ce_f061_48f1_896e_8c381a86bc9e", "a2fbe16d-bb9c-4e0a-aa80-f4b2cc589175" => "component_variable_a2fbe16d_bb9c_4e0a_aa80_f4b2cc589175", "0960c679-be17-4db7-b89c-d17cefa1dc24" => "component_variable_0960c679_be17_4db7_b89c_d17cefa1dc24", "24c7e4c4-65b8-416b-acda-bffe28dff98c" => "component_variable_24c7e4c4_65b8_416b_acda_bffe28dff98c", "3f53ac32-6987-4286-acb4-33c848db1b94" => "component_variable_3f53ac32_6987_4286_acb4_33c848db1b94", "80760545-7de0-4ff6-b047-7db687d8dd78" => "component_variable_80760545_7de0_4ff6_b047_7db687d8dd78"], "af23355f-89d5-4808-a682-2b4ac2756600", ""), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->frontendBuilderDropzone($context, "2edbb3f3-91ba-42d9-bda8-9da5d13b7150", "end"), "html", null, true);
        return; yield '';
    }

    public function block_block3266346827($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->frontendBuilderDropzone($context, "3f3cf8bc-9bed-418c-a527-52dac78d2071", "start"), "html", null, true);
        yield " ";
        $context["component_variable_11156835_ffb2_4939_9445_073e8a21d260_text"] = ('' === $tmp = "<h6 class=\"text-align-center\">玻璃体视网膜手术</h6>") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_11156835_ffb2_4939_9445_073e8a21d260_textFormat"] = ('' === $tmp = "cohesion") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_b355dfad_90a7_4145_bf74_4604365e70c7"] = ('' === $tmp = "node::2046") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_1ff8e573_be31_4e85_98fd_8254bc96402c"] = ('' === $tmp = "_self") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_0379bdcf_0e61_46d4_b93a_8bc556373fd5"] = ('' === $tmp = "Go to new page") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_eac64334_2ed2_442b_afc1_fb5865cec475"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:f2d1d485-ba8b-4c1b-8fd9-7b851423c0cf]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_30d03620_8798_4c48_bfd9_2ae1c20fa1ed"] = ('' === $tmp = "An image of a surgeon wearing blue scrubs in the operating room, observing a surgical operation on a screen.") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_ca132c67_2c15_43c2_ac80_a5244ca0ab16"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:f2d1d485-ba8b-4c1b-8fd9-7b851423c0cf]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_7209f0d5_b930_48eb_b1ae_3d4eb2562283"] = true;
        yield " ";
        $context["component_variable_f215373e_f5a1_455e_8b7c_8a3ea147cb53"] = true;
        yield " ";
        $context["component_variable_51425e9d_0996_4563_99c6_8ecdc280b349"] = false;
        yield " ";
        $context["component_variable_a662329d_6649_47ed_b717_ab3218d13c8b"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_6aaae3ad_9a13_4756_a14f_f32df6ac1adb"] = ('' === $tmp = "coh-style-a-card-medium-full") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_6986d419_0e41_49db_9fbc_b5edc8e7aa44"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_0bf2fe62_c40a_4319_877a_df5723c1a94c"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_c55f663c_8618_4bf6_bd35_075a46d70818"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_016f69ce_f061_48f1_896e_8c381a86bc9e"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a2fbe16d_bb9c_4e0a_aa80_f4b2cc589175"] = ('' === $tmp = "none") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_0960c679_be17_4db7_b89c_d17cefa1dc24"] = ('' === $tmp = "coh-style-a-padding-top-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_24c7e4c4_65b8_416b_acda_bffe28dff98c"] = ('' === $tmp = "coh-style-a-padding-bottom-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_3f53ac32_6987_4286_acb4_33c848db1b94"] = ('' === $tmp = "coh-style-a-padding-left-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_80760545_7de0_4ff6_b047_7db687d8dd78"] = ('' === $tmp = "coh-style-a-padding-right-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_card_img_txt_link_c5c", false, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), ["11156835-ffb2-4939-9445-073e8a21d260" => ["text" => "component_variable_11156835_ffb2_4939_9445_073e8a21d260_text", "textFormat" => "component_variable_11156835_ffb2_4939_9445_073e8a21d260_textFormat"], "b355dfad-90a7-4145-bf74-4604365e70c7" => "component_variable_b355dfad_90a7_4145_bf74_4604365e70c7", "1ff8e573-be31-4e85-98fd-8254bc96402c" => "component_variable_1ff8e573_be31_4e85_98fd_8254bc96402c", "0379bdcf-0e61-46d4-b93a-8bc556373fd5" => "component_variable_0379bdcf_0e61_46d4_b93a_8bc556373fd5", "eac64334-2ed2-442b-afc1-fb5865cec475" => "component_variable_eac64334_2ed2_442b_afc1_fb5865cec475", "30d03620-8798-4c48-bfd9-2ae1c20fa1ed" => "component_variable_30d03620_8798_4c48_bfd9_2ae1c20fa1ed", "ca132c67-2c15-43c2-ac80-a5244ca0ab16" => "component_variable_ca132c67_2c15_43c2_ac80_a5244ca0ab16", "7209f0d5-b930-48eb-b1ae-3d4eb2562283" => "component_variable_7209f0d5_b930_48eb_b1ae_3d4eb2562283", "f215373e-f5a1-455e-8b7c-8a3ea147cb53" => "component_variable_f215373e_f5a1_455e_8b7c_8a3ea147cb53", "51425e9d-0996-4563-99c6-8ecdc280b349" => "component_variable_51425e9d_0996_4563_99c6_8ecdc280b349", "a662329d-6649-47ed-b717-ab3218d13c8b" => "component_variable_a662329d_6649_47ed_b717_ab3218d13c8b", "6aaae3ad-9a13-4756-a14f-f32df6ac1adb" => "component_variable_6aaae3ad_9a13_4756_a14f_f32df6ac1adb", "6986d419-0e41-49db-9fbc-b5edc8e7aa44" => "component_variable_6986d419_0e41_49db_9fbc_b5edc8e7aa44", "0bf2fe62-c40a-4319-877a-df5723c1a94c" => "component_variable_0bf2fe62_c40a_4319_877a_df5723c1a94c", "c55f663c-8618-4bf6-bd35-075a46d70818" => "component_variable_c55f663c_8618_4bf6_bd35_075a46d70818", "016f69ce-f061-48f1-896e-8c381a86bc9e" => "component_variable_016f69ce_f061_48f1_896e_8c381a86bc9e", "a2fbe16d-bb9c-4e0a-aa80-f4b2cc589175" => "component_variable_a2fbe16d_bb9c_4e0a_aa80_f4b2cc589175", "0960c679-be17-4db7-b89c-d17cefa1dc24" => "component_variable_0960c679_be17_4db7_b89c_d17cefa1dc24", "24c7e4c4-65b8-416b-acda-bffe28dff98c" => "component_variable_24c7e4c4_65b8_416b_acda_bffe28dff98c", "3f53ac32-6987-4286-acb4-33c848db1b94" => "component_variable_3f53ac32_6987_4286_acb4_33c848db1b94", "80760545-7de0-4ff6-b047-7db687d8dd78" => "component_variable_80760545_7de0_4ff6_b047_7db687d8dd78"], "e7faf843-9ec6-497f-ba9e-61d45d4d1f5f", ""), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->frontendBuilderDropzone($context, "3f3cf8bc-9bed-418c-a527-52dac78d2071", "end"), "html", null, true);
        return; yield '';
    }

    public function block_block339126742($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->frontendBuilderDropzone($context, "3ea894e0-824e-4f9b-98f5-07a7926661e4", "start"), "html", null, true);
        yield " ";
        $context["component_variable_11156835_ffb2_4939_9445_073e8a21d260_text"] = ('' === $tmp = "<h6 class=\"text-align-center\">青光眼手术</h6>") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_11156835_ffb2_4939_9445_073e8a21d260_textFormat"] = ('' === $tmp = "cohesion") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_b355dfad_90a7_4145_bf74_4604365e70c7"] = ('' === $tmp = "#") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_1ff8e573_be31_4e85_98fd_8254bc96402c"] = ('' === $tmp = "_self") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_0379bdcf_0e61_46d4_b93a_8bc556373fd5"] = ('' === $tmp = "Go to new page") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_eac64334_2ed2_442b_afc1_fb5865cec475"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:59221437-a4e5-44eb-9bc6-190f9b938aae]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_30d03620_8798_4c48_bfd9_2ae1c20fa1ed"] = ('' === $tmp = "Glaucoma Surgery") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_ca132c67_2c15_43c2_ac80_a5244ca0ab16"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:59221437-a4e5-44eb-9bc6-190f9b938aae]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_7209f0d5_b930_48eb_b1ae_3d4eb2562283"] = true;
        yield " ";
        $context["component_variable_f215373e_f5a1_455e_8b7c_8a3ea147cb53"] = true;
        yield " ";
        $context["component_variable_51425e9d_0996_4563_99c6_8ecdc280b349"] = false;
        yield " ";
        $context["component_variable_a662329d_6649_47ed_b717_ab3218d13c8b"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_6aaae3ad_9a13_4756_a14f_f32df6ac1adb"] = ('' === $tmp = "coh-style-a-card-medium-full") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_6986d419_0e41_49db_9fbc_b5edc8e7aa44"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_0bf2fe62_c40a_4319_877a_df5723c1a94c"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_c55f663c_8618_4bf6_bd35_075a46d70818"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_016f69ce_f061_48f1_896e_8c381a86bc9e"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a2fbe16d_bb9c_4e0a_aa80_f4b2cc589175"] = ('' === $tmp = "none") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_0960c679_be17_4db7_b89c_d17cefa1dc24"] = ('' === $tmp = "coh-style-a-padding-top-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_24c7e4c4_65b8_416b_acda_bffe28dff98c"] = ('' === $tmp = "coh-style-a-padding-bottom-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_3f53ac32_6987_4286_acb4_33c848db1b94"] = ('' === $tmp = "coh-style-a-padding-left-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_80760545_7de0_4ff6_b047_7db687d8dd78"] = ('' === $tmp = "coh-style-a-padding-right-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_card_img_txt_link_c5c", false, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), ["11156835-ffb2-4939-9445-073e8a21d260" => ["text" => "component_variable_11156835_ffb2_4939_9445_073e8a21d260_text", "textFormat" => "component_variable_11156835_ffb2_4939_9445_073e8a21d260_textFormat"], "b355dfad-90a7-4145-bf74-4604365e70c7" => "component_variable_b355dfad_90a7_4145_bf74_4604365e70c7", "1ff8e573-be31-4e85-98fd-8254bc96402c" => "component_variable_1ff8e573_be31_4e85_98fd_8254bc96402c", "0379bdcf-0e61-46d4-b93a-8bc556373fd5" => "component_variable_0379bdcf_0e61_46d4_b93a_8bc556373fd5", "eac64334-2ed2-442b-afc1-fb5865cec475" => "component_variable_eac64334_2ed2_442b_afc1_fb5865cec475", "30d03620-8798-4c48-bfd9-2ae1c20fa1ed" => "component_variable_30d03620_8798_4c48_bfd9_2ae1c20fa1ed", "ca132c67-2c15-43c2-ac80-a5244ca0ab16" => "component_variable_ca132c67_2c15_43c2_ac80_a5244ca0ab16", "7209f0d5-b930-48eb-b1ae-3d4eb2562283" => "component_variable_7209f0d5_b930_48eb_b1ae_3d4eb2562283", "f215373e-f5a1-455e-8b7c-8a3ea147cb53" => "component_variable_f215373e_f5a1_455e_8b7c_8a3ea147cb53", "51425e9d-0996-4563-99c6-8ecdc280b349" => "component_variable_51425e9d_0996_4563_99c6_8ecdc280b349", "a662329d-6649-47ed-b717-ab3218d13c8b" => "component_variable_a662329d_6649_47ed_b717_ab3218d13c8b", "6aaae3ad-9a13-4756-a14f-f32df6ac1adb" => "component_variable_6aaae3ad_9a13_4756_a14f_f32df6ac1adb", "6986d419-0e41-49db-9fbc-b5edc8e7aa44" => "component_variable_6986d419_0e41_49db_9fbc_b5edc8e7aa44", "0bf2fe62-c40a-4319-877a-df5723c1a94c" => "component_variable_0bf2fe62_c40a_4319_877a_df5723c1a94c", "c55f663c-8618-4bf6-bd35-075a46d70818" => "component_variable_c55f663c_8618_4bf6_bd35_075a46d70818", "016f69ce-f061-48f1-896e-8c381a86bc9e" => "component_variable_016f69ce_f061_48f1_896e_8c381a86bc9e", "a2fbe16d-bb9c-4e0a-aa80-f4b2cc589175" => "component_variable_a2fbe16d_bb9c_4e0a_aa80_f4b2cc589175", "0960c679-be17-4db7-b89c-d17cefa1dc24" => "component_variable_0960c679_be17_4db7_b89c_d17cefa1dc24", "24c7e4c4-65b8-416b-acda-bffe28dff98c" => "component_variable_24c7e4c4_65b8_416b_acda_bffe28dff98c", "3f53ac32-6987-4286-acb4-33c848db1b94" => "component_variable_3f53ac32_6987_4286_acb4_33c848db1b94", "80760545-7de0-4ff6-b047-7db687d8dd78" => "component_variable_80760545_7de0_4ff6_b047_7db687d8dd78"], "4cade6ae-7e89-4b39-8551-42f5267c9441", ""), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->frontendBuilderDropzone($context, "3ea894e0-824e-4f9b-98f5-07a7926661e4", "end"), "html", null, true);
        return; yield '';
    }

    public function block_block623515100($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->frontendBuilderDropzone($context, "85bb800c-9b83-44bd-9b9a-fd95e3be8fc8", "start"), "html", null, true);
        yield " ";
        $context["component_variable_11156835_ffb2_4939_9445_073e8a21d260_text"] = ('' === $tmp = "<h6 class=\"text-align-center\">专业人士资源</h6>") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_11156835_ffb2_4939_9445_073e8a21d260_textFormat"] = ('' === $tmp = "cohesion") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_b355dfad_90a7_4145_bf74_4604365e70c7"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_1ff8e573_be31_4e85_98fd_8254bc96402c"] = ('' === $tmp = "_self") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_0379bdcf_0e61_46d4_b93a_8bc556373fd5"] = ('' === $tmp = "Go to new page") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_eac64334_2ed2_442b_afc1_fb5865cec475"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:30569a95-af6f-4e02-b7c4-4d265c50554c]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_30d03620_8798_4c48_bfd9_2ae1c20fa1ed"] = ('' === $tmp = "An up-close image of an individual’s eye, staring straight ahead.") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_ca132c67_2c15_43c2_ac80_a5244ca0ab16"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->tokenReplace("[media-reference:file:30569a95-af6f-4e02-b7c4-4d265c50554c]", ["media-reference" => ($context["media_reference"] ?? null)], $this->sandbox->ensureToStringAllowed($context, 1, $this->source), false), "html", null, true);
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_7209f0d5_b930_48eb_b1ae_3d4eb2562283"] = true;
        yield " ";
        $context["component_variable_f215373e_f5a1_455e_8b7c_8a3ea147cb53"] = true;
        yield " ";
        $context["component_variable_51425e9d_0996_4563_99c6_8ecdc280b349"] = false;
        yield " ";
        $context["component_variable_a662329d_6649_47ed_b717_ab3218d13c8b"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_6aaae3ad_9a13_4756_a14f_f32df6ac1adb"] = ('' === $tmp = "coh-style-a-card-medium-full") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_6986d419_0e41_49db_9fbc_b5edc8e7aa44"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_0bf2fe62_c40a_4319_877a_df5723c1a94c"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_c55f663c_8618_4bf6_bd35_075a46d70818"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_016f69ce_f061_48f1_896e_8c381a86bc9e"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_a2fbe16d_bb9c_4e0a_aa80_f4b2cc589175"] = ('' === $tmp = "none") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_0960c679_be17_4db7_b89c_d17cefa1dc24"] = ('' === $tmp = "coh-style-a-padding-top-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_24c7e4c4_65b8_416b_acda_bffe28dff98c"] = ('' === $tmp = "coh-style-a-padding-bottom-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_3f53ac32_6987_4286_acb4_33c848db1b94"] = ('' === $tmp = "coh-style-a-padding-left-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        $context["component_variable_80760545_7de0_4ff6_b047_7db687d8dd78"] = ('' === $tmp = "coh-style-a-padding-right-small") ? '' : new Markup($tmp, $this->env->getCharset());
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->renderComponent("cpt_a_card_img_txt_link_c5c", false, $this->sandbox->ensureToStringAllowed($context, 1, $this->source), ["11156835-ffb2-4939-9445-073e8a21d260" => ["text" => "component_variable_11156835_ffb2_4939_9445_073e8a21d260_text", "textFormat" => "component_variable_11156835_ffb2_4939_9445_073e8a21d260_textFormat"], "b355dfad-90a7-4145-bf74-4604365e70c7" => "component_variable_b355dfad_90a7_4145_bf74_4604365e70c7", "1ff8e573-be31-4e85-98fd-8254bc96402c" => "component_variable_1ff8e573_be31_4e85_98fd_8254bc96402c", "0379bdcf-0e61-46d4-b93a-8bc556373fd5" => "component_variable_0379bdcf_0e61_46d4_b93a_8bc556373fd5", "eac64334-2ed2-442b-afc1-fb5865cec475" => "component_variable_eac64334_2ed2_442b_afc1_fb5865cec475", "30d03620-8798-4c48-bfd9-2ae1c20fa1ed" => "component_variable_30d03620_8798_4c48_bfd9_2ae1c20fa1ed", "ca132c67-2c15-43c2-ac80-a5244ca0ab16" => "component_variable_ca132c67_2c15_43c2_ac80_a5244ca0ab16", "7209f0d5-b930-48eb-b1ae-3d4eb2562283" => "component_variable_7209f0d5_b930_48eb_b1ae_3d4eb2562283", "f215373e-f5a1-455e-8b7c-8a3ea147cb53" => "component_variable_f215373e_f5a1_455e_8b7c_8a3ea147cb53", "51425e9d-0996-4563-99c6-8ecdc280b349" => "component_variable_51425e9d_0996_4563_99c6_8ecdc280b349", "a662329d-6649-47ed-b717-ab3218d13c8b" => "component_variable_a662329d_6649_47ed_b717_ab3218d13c8b", "6aaae3ad-9a13-4756-a14f-f32df6ac1adb" => "component_variable_6aaae3ad_9a13_4756_a14f_f32df6ac1adb", "6986d419-0e41-49db-9fbc-b5edc8e7aa44" => "component_variable_6986d419_0e41_49db_9fbc_b5edc8e7aa44", "0bf2fe62-c40a-4319-877a-df5723c1a94c" => "component_variable_0bf2fe62_c40a_4319_877a_df5723c1a94c", "c55f663c-8618-4bf6-bd35-075a46d70818" => "component_variable_c55f663c_8618_4bf6_bd35_075a46d70818", "016f69ce-f061-48f1-896e-8c381a86bc9e" => "component_variable_016f69ce_f061_48f1_896e_8c381a86bc9e", "a2fbe16d-bb9c-4e0a-aa80-f4b2cc589175" => "component_variable_a2fbe16d_bb9c_4e0a_aa80_f4b2cc589175", "0960c679-be17-4db7-b89c-d17cefa1dc24" => "component_variable_0960c679_be17_4db7_b89c_d17cefa1dc24", "24c7e4c4-65b8-416b-acda-bffe28dff98c" => "component_variable_24c7e4c4_65b8_416b_acda_bffe28dff98c", "3f53ac32-6987-4286-acb4-33c848db1b94" => "component_variable_3f53ac32_6987_4286_acb4_33c848db1b94", "80760545-7de0-4ff6-b047-7db687d8dd78" => "component_variable_80760545_7de0_4ff6_b047_7db687d8dd78"], "337f1cc2-b7ad-4f36-8a9a-5b438c400cb9", ""), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\cohesion_templates\TwigExtension\TwigExtension']->frontendBuilderDropzone($context, "85bb800c-9b83-44bd-9b9a-fd95e3be8fc8", "end"), "html", null, true);
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "__string_template__dc93637cbffd5c125dca66da16b7c722";
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
        return array (  47 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__dc93637cbffd5c125dca66da16b7c722", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1, "block" => 1, "if" => 1);
        static $filters = array("escape" => 1, "merge" => 1);
        static $functions = array("attach_library" => 1, "renderComponent" => 1, "processtoken" => 1, "frontendBuilderDropzone" => 1);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block', 'if'],
                ['escape', 'merge'],
                ['attach_library', 'renderComponent', 'processtoken', 'frontendBuilderDropzone'],
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
