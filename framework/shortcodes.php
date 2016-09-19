<?php
add_filter('widget_text', 'do_shortcode');

add_shortcode('button', 'pts_button_shortcode');
function pts_button_shortcode($atts){
    $a = shortcode_atts( array(
       'title' => 'Button',
       'href' => '#',
       'size' => '',
       'style' => '',
       'el_class' => '',
       'type' => ''
   ), $atts );
    $icon = $class = '';
    if($a['style'] != '') {
	    $class .= ' '.$a['style'];
    }
    if($a['type'] != '') {
	    $class .= ' '.$a['type'];
    }
    if($a['size'] != '') {
	    $class .= ' '.$a['size'];
    }
    if($a['el_class'] != '') {
	    $class .= ' '.$a['el_class'];
    }
    return '<a class="btn'. $class .'" href="' . $a['href'] . '"><span>'. $icon . $a['title'] . '</span></a>';
}

add_shortcode('hr','pts_hr_shortcode');

function pts_hr_shortcode($atts) {
    $a = shortcode_atts(array(
        'class' => '',
        'height' => ''   
    ),$atts);
    
    return '<hr class="divider '.$a['class'].'" style="height:'.$a['height'].'px;"/>';
}

// **********************************************************************// 
// ! Call to action
// **********************************************************************// 

add_shortcode('callto', 'pts_callto_shortcode');
function pts_callto_shortcode($atts, $content = null) {
    $a = shortcode_atts( array(
        'btn' => '',
        'style' => 'default',
        'link' => '',
        'btn_color' => ''
    ), $atts);
    $btn = '';
    $class = '';
    $btnClass = '';
    
    if($a['btn'] != '') {
        $btn = '<a href="'.$a['link'].'" class="call-to-action-btn"><div><img src="'.get_template_directory_uri().'/images/call-to-action.png" /><div class="btn-text-area" style="font-size: 30px; width:100%; text-align:center; overflow: visible; height:auto; font-weight:bolder; text-transform:none;">'.$a['btn'].'</div></div></a>';
    }
    
    if($a['style'] != '') {
        $class = 'style-'.$a['style'];
    }
    
    $output = '';
    $output .= '<div class="cta-block '.$class.'">';
    $output .= '<div class="row">';
    
            if($a['btn'] != '') {

                    $output .= '<div class="col-xs-9 col-md-9 col-sm-9 col-lg-9 cta-content"><h3 style="line-height: 3.9; font-size: 29px; margin-left: 20px;">'. do_shortcode($content) .'</h3></div>';
                    $output .= '<div class="col-xs-3 col-md-3 col-sm-3 col-lg-3 cta-btn-container" style="text-align:right;">'.$btn.'</div>';


            } else{
                $output .= '<div class="col-xs-12 col-md-12">'. do_shortcode($content) .'</div>';
            }
    $output .= '</div>';
    $output .= '</div>';
    
    return $output;
}

add_shortcode('getintouch', 'pts_getintouch');
function pts_getintouch($atts){
    $a = shortcode_atts( array(
        'email' => '',
        'phone' => '',
        'fax' => '',
        'address' => '',
        'button' => 'no'
    ), $atts);
    
    if($a['email']!='')
        $email = '<p class="no-margin-bottom"><i class="fa fa-envelope"></i> '.$a['email'].'</p>';
    
    if($a['phone']!='')
        $phone = '<p class="no-margin-bottom"><i class="fa fa-phone"></i> '.$a['phone'].'</p>';
    
    if($a['fax']!='')
        $fax = '<p class="no-margin-bottom"><i class="fa fa-fax"></i> '.$a['fax'].'</p>';
    
    if($a['address']!='')
        $address = '<p class="no-margin-bottom"><i class="fa fa-map-marker "></i> '.$a['address'].'</p>';
    
    if($a['button']!='no')
        $address = '<br/><a class="btn btn-accent-color">Get Map</a>';
    
    $output = $email.$phone.$fax.$address;
    
    return $output;
}

add_shortcode('recent_posts_cust', 'recent_posts_cust');
function recent_posts_cust($atts)
{
    $a = shortcode_atts( array(
        'number' => '5',
        'type' => '',
        'date' => 'yes',
        'image' => 'no',
        'excerpt' => 'yes',
        'title' => 'yes'
    ), $atts);
    
    $args = '';
    $args = array(
        'ignore_sticky_posts'    => false,
	    'order'                  => 'DESC'
    );
    
    $args['posts_per_page'] = $a['number'];
    
    if($a['type'] != '')
        $args['post_type'] = $a['type'];
    
    query_posts($args);

    $content = "";
    $content .= "<ul class='shortcode_recent_entries'>";
    if( have_posts() ) : 

        while( have_posts() ) :
            the_post();
            $link = get_permalink();
            $title = get_the_title();
            $thumb_id = get_post_thumbnail_id();
            $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'project_thumb', true);
            $thumb_url = $thumb_url_array[0];
                        
            $content .= "<li>";
            if($a['title']=='yes')
                $content .= "<a href='$link'>$title</a>";
    
            if($a['image']!='no')
                $content .= "<a href='$link'><img src='".$thumb_url."'/></a>";
    
            if($a['date']=='yes'){
                $date = get_the_date();
                $content .= "<span class='post-date'>".$date."</span>";
            }
    
            if($a['excerpt']=='yes'){
                $content .= "<p class='excerpt'>" . get_the_excerpt() . "</p>";
            }
            $content .= "<div class='clearfix'>";
            $content .= "</li>";
            
        endwhile;
        wp_reset_query();
    endif;
    $content .= "</ul>";
    
    return $content;   // For use as widget
}

add_shortcode('social_area', 'pts_social_shortcode');
function pts_social_shortcode($atts){
    return '<ul class="ul-vert">'.top_social_section().'</ul>';
}

add_shortcode('cur_year','cur_year_func');
function cur_year_func(){
    return date('Y');
}

add_shortcode('login','login_function');
function login_function($atts){
    $a = shortcode_atts( array(
        'redirect_url' => home_url(),
        'register_url' => ot_get_option('pts_registration_url')
    ), $atts);

    $output = '';

    global $user_ID;
    if (!$user_ID) {
        if ($_GET['lost-pass'] == '' && $_GET['lost-pass'] != '1') {
            $output .= '<div class="col-xs-12 col-sm-6 col-md-6"><div class="new-customer-box">';
            $output .= '<h4>' . __('NEW CUSTOMERS', PTS_DOMAIN) . '</h4>';
            $output .= '<div class="nc-body">';
            $output .= '<div>' . __('By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.', PTS_DOMAIN) . '</div>';
            $output .= '</div>';
            $output .= '<div class="login-action"><a class="btn btn-danger btn-large btn-fill" href="' . $a['register_url'] . '">Create an account</a><div class="clearfix"></div></div>';
            $output .= '</div>';
            $output .= '</div>';

            $output .= '<div class="col-xs-12 col-sm-6 col-md-6" style="padding-right: 0px;">';
            $output .= '<div class="login-box">';
            $output .= '<h4>' . __('REGISTERED CUSTOMERS', PTS_DOMAIN) . '</h4>';
            $output .= '<div class="rc-body">';
            $output .= '<p style="font-weight: bold; color: ' . ot_get_option('pts_accent_color') . '">' . __('If you have an account with us, please log in.', PTS_DOMAIN) . '</p>';
            $output .= '<div>' . pts_get_loginform() . '</div>';
            $output .= '</div>';
            $output .= '<div class="login-action"><a href="' . $_SERVER["REQUEST_URI"] . '?lost-pass=1" style="padding-top:10px; float: left; margin-left: 14px;">Forgot Your Password?</a> <button class="btn btn-info btn-large btn-fill" id="login-submit">Login</button><div class="clearfix"></div></div>';
            $output .= '</div>';
            $output .= '</div>';
        } elseif ($_GET['lost-pass'] != '' && $_GET['lost-pass'] == '1') {
            $output .= '<div class="col-xs-12 col-sm-12 col-md-12" style="padding-left: 0px;">';
            $output .= pts_get_lostpasswordform();
            $output .= '</div>';
            $output .= '<div style="clear: both;"></div>';
            $output .= '<div style="height: 30px;"></div>';
        }
    }
    else
    {
        $output .= 'You are already logged in. Click <a href="'.home_url().'">here</a> to the homepage.';
    }
    return $output;
}