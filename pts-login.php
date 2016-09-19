<?php
/**
 * Template Name: Login Template
 */
global $user_ID;
if ($user_ID) {
    wp_redirect( home_url() ); exit;
}
get_header(); ?>
    <div class="container-wrap">
        <div class="container-fluid borderbottom">
            <div class="page-excerpt container">
                <h3><?php echo get_the_title(); ?></h3>
                <?php pts_breadcrumbs(); ?>
                <?php echo theme_excerpts(); ?>
            </div>
        </div>
        <div class="<?php echo set_container(); ?>" style="padding-bottom: 30px;">
        <?php if($_GET['lost-pass']=='' && $_GET['lost-pass']!='1'){ ?>
            <div class="col-xs-12 col-sm-6 col-md-6" style="padding-left: 0px;">
                <div class="new-customer-box">
                    <h4><?php _e('NEW CUSTOMERS',PTS_DOMAIN); ?></h4>
                    <div class="nc-body">
                        <div><?php _e('By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.',PTS_DOMAIN); ?> </div>
                    </div>
                    <div class="login-action"><a class="btn btn-danger btn-large btn-fill" href="<?php echo ot_get_option('pts_registration_url'); ?>">Create an account</a><div class="clearfix"></div></div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="login-box">
                    <h4><?php _e('REGISTERED CUSTOMERS',PTS_DOMAIN); ?></h4>
                    <div class="rc-body">
                        <p style="font-weight: bold; color: <?php echo ot_get_option('pts_accent_color'); ?>"><?php _e('If you have an account with us, please log in.',PTS_DOMAIN); ?></p>
                        <div> <?php echo pts_get_loginform(); ?></div>
                    </div>
                    <div class="login-action"><a href="<?php echo $_SERVER["REQUEST_URI"].'?lost-pass=1'; ?>" style="padding-top:10px; float: left; margin-left: 14px;">Forgot Your Password?</a> <button class="btn btn-info btn-large btn-fill" id="login-submit">Login</button><div class="clearfix"></div></div>
                </div>
            </div>
        <?php }elseif($_GET['lost-pass']!='' && $_GET['lost-pass']=='1'){ ?>
            <div class="col-xs-12 col-sm-12 col-md-12" style="padding-left: 0px;">
                <?php echo pts_get_lostpasswordform(); ?>
            </div>
        <?php } ?>
        </div>

    </div>
<?php get_footer(); ?>