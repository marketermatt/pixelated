<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 1/12/15
 * Time: 1:51 PM
 */

//main style added to the top of each page

add_action('wp_head', 'pts_style_init');
if(!function_exists('pts_style_init')) {
    function pts_style_init()
    {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery("a[class^='prettyPhoto']").prettyPhoto();
            });
        </script>
        <style type="text/css">
            <?php
                $sitebackground = ot_get_option('pts_site_bg');
                $h1 = ot_get_option('pts_h1');
                $h2 = ot_get_option('pts_h2');
                $h3 = ot_get_option('pts_h3');
                $h4 = ot_get_option('pts_h4');
                $h5 = ot_get_option('pts_h5');
                $h6 = ot_get_option('pts_h6');
                $menufont = ot_get_option('pts_menu_font');


                if($sitebackground){
                echo 'body{';
                    if(!empty($sitebackground['background-color'])):  echo  'background-color:'. $sitebackground['background-color'].' !important;'; endif;
                    if(!empty($sitebackground['background-image'])):  echo 'background-image: url('.$sitebackground['background-image'].');'; endif;
                    if(!empty($sitebackground['background-attachment'])):  echo 'background-attachment:'. $sitebackground['background-attachment'].';'; endif;
                    if(!empty($sitebackground['background-repeat'])): echo 'background-repeat:'.$sitebackground['background-repeat'].';'; endif;
                    if(!empty($sitebackground['background-color'])): echo 'background-color:'. $sitebackground['background-color'].';'; endif;
                    if(!empty($sitebackground['background-position'])): echo 'background-position:' . $sitebackground['background-position'].';'; endif;
                    if(ot_get_option('background_cover') == 'enable'): echo 'background-size: cover;'; endif;
                echo '}';
                }

                $mainfont = ot_get_option('pts_main_font');

                echo 'body, p, ul li, ol li, .wca #recentcomments li{ line-height:'.$mainfont['line-height'].'; font-size:'.$mainfont['font-size'].'; color:'.$mainfont['font-color'].';}';
                echo 'a, .woocommerce .woocommerce-breadcrumb a{ color:'.ot_get_option('pts_accent_color').';}';
                echo '.list-item .list-image:hover, div.fancy-select div.trigger{border: 2px solid '.ot_get_option('pts_accent_color').';}';
                echo '.widgets_titles_sidebar{background:'.ot_get_option('pts_widget_title_bg').';}';
                echo '.btn-readmore{ background:'.ot_get_option('pts_accent_color').' !important; border-color:'.ot_get_option('pts_accent_color').'; !important}';

                echo '.form-holder .search-slider-button{ background:'.ot_get_option('pts_accent_color').' !important;-webkit-border-radius: 0px; -moz-border-radius: 0px; border-radius: 0px;}';
        echo '.wpb_accordion_section .ui-state-default{border: 1px solid '.ot_get_option('pts_accent_color').'; background:'.ot_get_option('pts_accent_color').' !important;}';
                echo '.btn-accent-color, .footer-area .widget_recent_entries .post-date, ul.shortcode_recent_entries .post-date, div.fancy-select div.trigger{background-color:'.ot_get_option('pts_accent_color').' !important;}';
                echo '.borderbottom h3, .wpb_tabs_nav{color:'.ot_get_option('pts_accent_color').' !important;}';
                if(ot_get_option('pts_top_menu_bg')) { echo '.section-top{background:'.ot_get_option('pts_top_menu_bg').';}'; };
                if(ot_get_option('pts_top_menu_color')) { echo '.section-top li a{font-family:'.pts_get_chosen_google_font($mainfont['font-family']).'; color:'.ot_get_option('pts_top_menu_color').'; font-size:'.$mainfont['font-size'].'; font-style:'.$mainfont['font-style'].'; font-variant:'.$mainfont['font-variant'].'; font-weight:'.$mainfont['font-weight'].'; letter-spacing:'.$mainfont['letter-spacing'].'; font-variant:'.$mainfont['font-variant'].'; text-transform:'.$mainfont['text-transform'].';}'; }
                if($menufont){ echo '.head-nav .navbar-nav li a, .shopping-cart-widget, .cart-summ,.shopping-cart-widget .amounts{font-family:'.pts_get_chosen_google_font($menufont['font-family']).'; color:'.$menufont['font-color'].'; font-size:'.$menufont['font-size'].'; font-style:'.$menufont['font-style'].'; font-variant:'.$menufont['font-variant'].'; font-weight:'.$menufont['font-weight'].'; letter-spacing:'.$menufont['letter-spacing'].';  line-height:'.$menufont['line-height'].'; text-decoration:'.$menufont['text-decoration'].'; text-transform:'.$menufont['text-transform'].'; }'; }
        echo '.dropdown-menu > li > a, .dropdown-menu > li > a{color:'.ot_get_option('pts_main_menu_color_hover').' !important;}';
                echo '.nav > li > a:hover, .nav > li > a:focus, .nav li.active a, .cart-summ:hover{color:'.ot_get_option('pts_main_menu_color_hover').';}';
                if(ot_get_option('pts_main_menuitem_bg_color_hover')){ echo '.navbar-nav > li > .dropdown-menu, .dropdown-menu, .nav > li > a:hover, .nav > li > a:focus, .nav li.active a{background:'.ot_get_option('pts_main_menuitem_bg_color_hover').' !important;}'; }
                echo '.dropdown-menu:after{border-bottom:11px solid '.ot_get_option('pts_main_menuitem_bg_color_hover').' !important;}';
                if(ot_get_option('pts_menu_margin_top')!=0){ echo '.head-nav{ margin-top:'.ot_get_option('pts_menu_margin_top').' !important;}';}
                echo '.homepage-column-1 .icon-area{background-color:'.ot_get_option('pts_homepage_column_sections_sec_1_color').';}';
                echo '.homepage-column-2 .icon-area{background-color:'.ot_get_option('pts_homepage_column_sections_sec_2_color').'}';
                echo '.homepage-column-3 .icon-area{background-color:'.ot_get_option('pts_homepage_column_sections_sec_3_color').'}';
        
        echo '.button-area-1 .btn{background-color:'.ot_get_option('pts_homepage_column_sections_sec_1_color').'; color:#fff !important;}';
        echo '.button-area-2 .btn{background-color:'.ot_get_option('pts_homepage_column_sections_sec_2_color').'; color:#fff !important;}';
        echo '.button-area-3 .btn{background-color:'.ot_get_option('pts_homepage_column_sections_sec_3_color').'; color:#fff !important;}';

        echo 'h1{font-family:'.pts_get_chosen_google_font($h1['font-family']).'; font-size:'.$h1['font-size'].'; font-color:'.$h1['font-color'].'; font-style:'.$h1['font-style'].'; font-variant:'.$h1['font-variant'].'; font-weight:'.$h1['font-weight'].'; letter-spacing:'.$h1['letter-spacing'].'; line-height:'.$h1['line-height'].'; text-decoration:'.$h1['text-decoration'].'; text-transform:'.$h1['text-transform'].';}';
        
        echo 'h2{font-family:'.pts_get_chosen_google_font($h2['font-family']).'; font-size:'.$h2['font-size'].'; font-color:'.$h2['font-color'].'; font-style:'.$h2['font-style'].'; font-variant:'.$h2['font-variant'].'; font-weight:'.$h2['font-weight'].'; letter-spacing:'.$h2['letter-spacing'].'; line-height:'.$h2['line-height'].'; text-decoration:'.$h2['text-decoration'].'; text-transform:'.$h2['text-transform'].';}';
        
        echo 'h3{font-family:'.pts_get_chosen_google_font($h3['font-family']).'; font-size:'.$h3['font-size'].'; font-color:'.$h3['font-color'].'; font-style:'.$h3['font-style'].'; font-variant:'.$h3['font-variant'].'; font-weight:'.$h3['font-weight'].'; letter-spacing:'.$h3['letter-spacing'].'; line-height:'.$h3['line-height'].'; text-decoration:'.$h3['text-decoration'].'; text-transform:'.$h3['text-transform'].';}';
        
        echo 'h4{font-family:'.pts_get_chosen_google_font($h4['font-family']).'; font-size:'.$h4['font-size'].'; font-color:'.$h4['font-color'].'; font-style:'.$h4['font-style'].'; font-variant:'.$h4['font-variant'].'; font-weight:'.$h4['font-weight'].'; letter-spacing:'.$h4['letter-spacing'].'; line-height:'.$h4['line-height'].'; text-decoration:'.$h4['text-decoration'].'; text-transform:'.$h4['text-transform'].';}';
        
        echo 'h5{font-family:'.pts_get_chosen_google_font($h5['font-family']).'; font-size:'.$h5['font-size'].'; font-color:'.$h5['font-color'].'; font-style:'.$h5['font-style'].'; font-variant:'.$h5['font-variant'].'; font-weight:'.$h5['font-weight'].'; letter-spacing:'.$h5['letter-spacing'].'; line-height:'.$h5['line-height'].'; text-decoration:'.$h5['text-decoration'].'; text-transform:'.$h5['text-transform'].';}';
        
        echo 'h6, .call-to-action-btn .btn-text-area{font-family:'.pts_get_chosen_google_font($h6['font-family']).'; font-size:'.$h6['font-size'].'; font-color:'.$h6['font-color'].'; font-style:'.$h6['font-style'].'; font-variant:'.$h6['font-variant'].'; font-weight:'.$h6['font-weight'].'; letter-spacing:'.$h6['letter-spacing'].'; line-height:'.$h6['line-height'].'; text-decoration:'.$h6['text-decoration'].'; text-transform:'.$h6['text-transform'].';}';
                
        echo '.isotope-item .isotope-inner:hover, .item:hover{border: 2px solid '.ot_get_option('pts_shop_hover_color').' !important; }';
        echo '.boxed-prod-list .price{ color: '.ot_get_option('pts_shop_hover_color').' !important; }';
        echo '.pts-buy{ background: '.ot_get_option('pts_shop_hover_color').' !important; border: 1px solid '.ot_get_option('pts_shop_hover_color').' !important; }';
        echo '.boxed-prod-list .pts-download{ background: '.ot_get_option('pts_shop_download_button').' !important; border: 1px solid '.ot_get_option('pts_shop_download_button').' !important; }';
        echo '.boxed-prod-list .pts-fdn{ background: '.ot_get_option('pts_shop_free_download_button').' !important; border: 1px solid '.ot_get_option('pts_shop_free_download_button').' !important; }';

        echo '.btn.bordered{border:2px solid '.ot_get_option('pts_accent_color').'; color:'.ot_get_option('pts_accent_color').'}';
        echo '.btn.filled{background:'.ot_get_option('pts_accent_color').'; color:#fff;}';
        echo '.wpb_video_wrapper{border: 5px solid '.ot_get_option('pts_accent_color').';}';
        echo 'table thead{ background:'.ot_get_option('pts_accent_color').';}';
        echo '.section-menu{background:'.ot_get_option('pts_main_menu_bg').';}';
          
        echo '@media (max-width: 1200px) {';
       			echo '.navbar-collapse{background:'.ot_get_option('pts_top_menu_bg').';}';
        echo '}';
          
          

            ?>
        </style>
        <?php
    }
}

if(!function_exists('pts_js_init')) {
    function pts_js_init()
    {
        ?>
        <script type="text/javascript">
            jQuery('.dropdown-toggle').dropdownHover();
            jQuery('.btn-tooltip').tooltip();
            jQuery('.label-tooltip').tooltip();
            jQuery('.pick-class-label').click(function(){
                var new_class = jQuery(this).attr('new-class');
                var old_class = jQuery('#display-buttons').attr('data-class');
                var display_div = jQuery('#display-buttons');
                if(display_div.length) {
                    var display_buttons = display_div.find('.btn');
                    display_buttons.removeClass(old_class);
                    display_buttons.addClass(new_class);
                    display_div.attr('data-class', new_class);
                }
            });
            jQuery( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 500,
                values: [ 75, 300 ]
            });
            jQuery( "#slider-default" ).slider({
                value: 70,
                orientation: "horizontal",
                range: "min",
                animate: true
            });
            jQuery('.carousel').carousel({
                interval: <?php echo ot_get_option('pts_slider_speed'); ?>
            });
        </script>
    <?php
    }
}
add_action('wp_footer', 'pts_js_init',30);

function pts_get_logo(){
    if(ot_get_option('pts_logo')):
        echo '<div id="logo-area"><img src="'.ot_get_option('pts_logo').'" id="main-logo"></div>';
    else:
        echo 'No Standard Logo Set. Please setup a logo';
    endif;
}

function pts_get_chosen_google_font($savedslug){
    //replace the _ with a space
    $savedslug = str_replace('_',' ',$savedslug);
    $savedslug = ucwords($savedslug);
    return $savedslug;
}