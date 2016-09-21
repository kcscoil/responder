<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://sogo.co.il
 * @since      1.0.0
 *
 * @package    Sogo_accessibility
 * @subpackage Sogo_accessibility/public/partials
 */

$hide_on = sogo_accessibility_Option::get_option('hide_in') == '' ? 1 : sogo_accessibility_Option::get_option('hide_in');
$bg_color_1 = sogo_accessibility_Option::get_option('btn_bg_color_1') == '' ? '#0780C3' : sogo_accessibility_Option::get_option('btn_bg_color_1');
$text_color_1 = sogo_accessibility_Option::get_option('text_color_1') == '' ? '#FFF' : sogo_accessibility_Option::get_option('text_color_1');
$bg_color_2 = sogo_accessibility_Option::get_option('btn_bg_color_2') == '' ? '#0780C3' : sogo_accessibility_Option::get_option('btn_bg_color_2');
$text_color_2 = sogo_accessibility_Option::get_option('text_color_2') == '' ? '#fff' : sogo_accessibility_Option::get_option('text_color_2');
$close_text = sogo_accessibility_Option::get_option('btn_text_2') == '' ? __('Accessibility', 'sogoacc') : sogo_accessibility_Option::get_option('btn_text_2');
$location = sogo_accessibility_Option::get_option('btn_location') == '' ? "topright" : sogo_accessibility_Option::get_option('btn_location');

if (sogo_accessibility_Option::get_option('btn_icon') != 'none') {
    $open_text = '<i style="font-size: 30px" class="fa ' . sogo_accessibility_Option::get_option('btn_icon') . '"  ></i>';
}elseif (sogo_accessibility_Option::get_option('btn_text') == ''){
    $open_text = '<i style="font-size: 30px" class="fa fa-universal-access"  ></i>';

}else{
    $open_text = sogo_accessibility_Option::get_option('btn_text') == '' ? __('Accessibility', 'sogoacc') : sogo_accessibility_Option::get_option('btn_text');

}
?>
<style>
    <?php
    if($hide_on == 2 ){ ?>
    @media (max-width: 767px) {
        #open_sogoacc {
            display: none !important
        }

    <?php
    }elseif($hide_on == 3){
     ?>
        @media (max-width: 991px) {
            #open_sogoacc {
                display: none !important
            }

        <?php
        }

        if(sogo_accessibility_Option::get_option('extra_css')== false){?>


            #open_sogoacc {
                background: <?php echo $bg_color_1 ?>;
                color: <?php echo $text_color_1 ?>;
                border-bottom: 1px solid <?php echo $bg_color_2 ?>;
                border-right: 1px solid <?php echo $bg_color_2 ?>;
            }


            #close_sogoacc {
                background: <?php echo $bg_color_2 ?>;
                color: <?php echo $text_color_2 ?>;
            }

            #sogoacc div#sogo_font_a button {
                color: <?php echo $bg_color_2 ?>;

            }

            body.sogo_readable_font * {
                font-family: <?php echo sogo_accessibility_Option::get_option('readable_font')?> !important;
            }

            body.sogo_underline_links a {
                text-decoration: underline !important;
            }

    <?php
}else{
echo sogo_accessibility_Option::get_option('extra_css');
}
?>


</style>
<div id="sogo_overlay"></div>
<a id="open_sogoacc"
   title="<?php echo esc_attr(__('Press "Alt + A" to open\close the accessibility menu', 'sogoacc')) ?>" tabindex="1"
   accesskey="a" href="#" class="<?php echo $location ?> toggle_sogoacc"><?php echo $open_text ?></a>
<div id="sogoacc" class="<?php echo $location ?>">
    <div id="close_sogoacc"
         class="toggle_sogoacc"><?php echo $close_text ?></div>
    <div class="btn-toolbar" role="toolbar">
        <div class="btn-group">
            <?php $btns = sogo_accessibility_Option::get_option('buttons'); ?>
            <?php if (!isset($btns['btn_1'])) : ?>
                <button type="button" id="b_n_c" class="btn btn-default">
                    <span class="sogo-icon-black_and_white"></span>
                    <?php _e('B&C', 'sogoacc') ?></button>
            <?php endif; ?>
            <?php if (!isset($btns['btn_2'])) : ?>
                <button type="button" id="contrasts"
                        data-css="<?php echo esc_attr(plugin_dir_url(__FILE__) . '/css/sogo_contrasts.css') ?>"
                        class="btn btn-default">
                    <span class="sogo-icon-black"></span>
                    <?php _e('Contrasts Dark', 'sogoacc') ?></button>
            <?php endif; ?>
            <?php if (!isset($btns['btn_3'])) : ?>
                <button type="button" id="contrasts_white"
                        data-css="<?php echo esc_attr(plugin_dir_url(__FILE__) . '/css/sogo_contrasts_white.css') ?>"
                        class="btn btn-default">
                    <span class="sogo-icon-white"></span>
                    <?php _e('Contrasts White', 'sogoacc') ?></button>
            <?php endif; ?>
            <?php if (!isset($btns['btn_4'])) : ?>
                <button type="button" id="animation_off" class="btn btn-default">
                    <span class="sogo-icon-flash"></span>
                    <?php _e('Stop Movement', 'sogoacc') ?></button>
            <?php endif; ?>
            <?php if (!isset($btns['btn_5'])) : ?>
                <button type="button" id="readable_font" class="btn btn-default">
                    <span class="sogo-icon-font"></span>
                    <?php _e('Readable Font', 'sogoacc') ?></button>
            <?php endif; ?>
            <?php if (!isset($btns['btn_6'])) : ?>
                <button type="button" id="underline_links" class="btn btn-default">
                    <span class="sogo-icon-link"></span>
                    <?php _e('Underline Links', 'sogoacc') ?></button>
            <?php endif; ?>


        </div>
        <div id="sogo_font_a" class="btn-group clearfix">
            <button id="sogo_a1" data-size="1" type="button"
                    class="btn btn-default "><?php _e('A', 'sogoacc') ?></button>
            <button id="sogo_a2" data-size="<?php echo sogo_accessibility_Option::get_option('a2'); ?>" type="button"
                    class="btn btn-default"><?php _e('A', 'sogoacc') ?></button>
            <button id="sogo_a3" data-size="<?php echo sogo_accessibility_Option::get_option('a3'); ?>" type="button"
                    class="btn btn-default"><?php _e('A', 'sogoacc') ?></button>
        </div>
        <div class="accessibility-info">

            <div><a title="<?php echo esc_attr(__('cancel accessibility', 'sogoacc')) ?>" id="sogo_accessibility"
                    href="#"><i class="fa fa-times-circle-o red"></i><?php _e('cancel accessibility', 'sogoacc') ?></a>
            </div>
            <div>
                <a title="<?php echo esc_attr(__('Accessibility Statement', 'sogoacc')) ?>"
                   href="#sogo_access_statement"><i
                        class="fa fa-info-circle green"></i><?php _e('Accessibility Statement', 'sogoacc') ?></a>

                <div id="sogo_access_statement">
                    <a href="#" id="close_sogo_access_statement" type="button" accesskey="c"
                       class="btn btn-default ">
                        <i class="fa fa-times-circle fa-3x"></i>
                    </a>
                    <div class="accessibility-info-inner">
                        <?php echo apply_filters('the_content', sogo_accessibility_Option::get_option('tac')) ?>
                    </div>


                </div>
            </div>


        </div>


    </div>
    <?php
    $show = true;
    if (get_option('_sogo_acc_lk_status') == 'valid') {
        if (sogo_accessibility_Option::get_option('hide_sogo_logo') == 1) {
            $show = false;
            ?>
            <div class="sogo-logo">
                <a target="_blank" href="<?php echo esc_url(sogo_accessibility_Option::get_option('logo_url')) ?>"
                   title="<?php echo esc_attr(sogo_accessibility_Option::get_option('logo_text')) ?>">
                    <span><?php echo sogo_accessibility_Option::get_option('logo_text') ?></span>
                    <img src="<?php echo esc_attr(sogo_accessibility_Option::get_option('logo')) ?>" alt=" logo"/>

                </a>
            </div>
            <?php
        }
    }

    if ($show) {
        ?>
        <div class="sogo-logo">
            <a target="_blank" href="https://pluginsmarket.com/downloads/accessibility-plugin/" title="Provided by sogo.co.il">
                <span><?php _e('Provided by:', 'sogoacc') ?></span>
                <img src="<?php echo plugin_dir_url(__FILE__) ?>/css/sogo-logo.png" alt="sogo logo"/>

            </a>
        </div>
    <?php } ?>
</div>