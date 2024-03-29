<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 1/6/15
 * Time: 12:20 PM
 */

/*add_filter('show_admin_bar', '__return_false');*/
add_theme_support( 'post-thumbnails' );
add_action( 'init', 'pts_post_type' );
add_image_size( 'product_thumb', 240, 240, array( 'center', 'top' ) );
function pts_post_type() {
    register_post_type( 'slider',
        array(
            'labels' => array(
                'name' => __( 'Slider' ),
                'singular_name' => __( 'Slider' )
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array( 'title', 'thumbnail' ),
        )
    );

    //Projects post types
    $labels = array(
		'name'                => _x( 'Projects', 'Post Type General Name', PTS_DOMAIN ),
		'singular_name'       => _x( 'Project', 'Post Type Singular Name', PTS_DOMAIN ),
		'menu_name'           => __( 'Projects', PTS_DOMAIN ),
		'parent_item_colon'   => __( 'Parent Item:', PTS_DOMAIN ),
		'all_items'           => __( 'All Projects', PTS_DOMAIN ),
		'view_item'           => __( 'View Project', PTS_DOMAIN ),
		'add_new_item'        => __( 'Add New Project', PTS_DOMAIN ),
		'add_new'             => __( 'Add New', PTS_DOMAIN ),
		'edit_item'           => __( 'Edit Item', PTS_DOMAIN ),
		'update_item'         => __( 'Update Item', PTS_DOMAIN ),
		'search_items'        => __( 'Search Project', PTS_DOMAIN ),
		'not_found'           => __( 'Not found', PTS_DOMAIN ),
		'not_found_in_trash'  => __( 'Not found in Trash', PTS_DOMAIN ),
	);
	$args = array(
		'label'               => __( 'project', PTS_DOMAIN ),
		'description'         => __( 'Your Projects', PTS_DOMAIN ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
		'taxonomies'          => array(  ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-images-alt',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
        'query_var'           => 'project',
		'capability_type'     => 'page',
	);
	register_post_type( 'pts_project', $args );

    //Documentation post types
    $labels = array(
        'name'                => _x( 'Documentation', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Documentation', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Documentation', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Doc:', 'text_domain' ),
        'all_items'           => __( 'All Docs', 'text_domain' ),
        'view_item'           => __( 'View Doc', 'text_domain' ),
        'add_new_item'        => __( 'Add New Doc', 'text_domain' ),
        'add_new'             => __( 'Add Doc', 'text_domain' ),
        'edit_item'           => __( 'Edit Doc', 'text_domain' ),
        'update_item'         => __( 'Update Doc', 'text_domain' ),
        'search_items'        => __( 'Search Doc', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
    );
    $rewrite = array(
        'slug'                => 'doc',
        'with_front'          => true,
        'pages'               => true,
        'feeds'               => false,
    );
    $args = array(
        'label'               => __( 'documentation', 'text_domain' ),
        'description'         => __( 'Theme Documentation', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'revisions', ),
        'taxonomies'          => array( 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-clipboard',
        'can_export'          => false,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => $rewrite,
        'capability_type'     => 'page',
    );
    register_post_type( 'documentation', $args );

    $labels = array(
        'name'                       => _x( 'Project categories', 'Taxonomy General Name', 'PTS_DOMAIN' ),
        'singular_name'              => _x( 'Project Category', 'Taxonomy Singular Name', 'PTS_DOMAIN' ),
        'menu_name'                  => __( 'Project Category', 'PTS_DOMAIN' ),
        'all_items'                  => __( 'All Project Category', 'PTS_DOMAIN' ),
        'parent_item'                => __( 'Parent Project Category', 'PTS_DOMAIN' ),
        'parent_item_colon'          => __( 'Parent Project Category:', 'PTS_DOMAIN' ),
        'new_item_name'              => __( 'New Project Category Name', 'PTS_DOMAIN' ),
        'add_new_item'               => __( 'Add Project Category Item', 'PTS_DOMAIN' ),
        'edit_item'                  => __( 'Edit Project Category', 'PTS_DOMAIN' ),
        'update_item'                => __( 'Update Project Category', 'PTS_DOMAIN' ),
        'separate_items_with_commas' => __( 'Separate Project Category with commas', 'PTS_DOMAIN' ),
        'search_items'               => __( 'Search Project Category', 'PTS_DOMAIN' ),
        'add_or_remove_items'        => __( 'Add or remove Project Category', 'PTS_DOMAIN' ),
        'choose_from_most_used'      => __( 'Choose from the most used Project Category', 'PTS_DOMAIN' ),
        'not_found'                  => __( 'Not Found', 'PTS_DOMAIN' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
    );
    register_taxonomy( 'project_category', array( 'pts_project' ), $args );
}

add_action( 'after_setup_theme', 'pts_theme_features' );
function pts_theme_features() {
    register_nav_menu( 'top', 'Top Menu' );
    register_nav_menu( 'main', 'Main Menu' );
    register_nav_menu( 'mobile', 'Mobile Menu' );
    
	add_theme_support( 'title-tag' );
}

if ( ! isset( $content_width ) )
	$content_width = 800;

function homepage_colums(){
    $elstart = '<div class="row home-colums"><div class="container">';
    $elend = '</div></div>';
        $returns .= '<div class="col-xs-12 col-sm-4 col-md-4 homepage-column-1">
                <div class="icon-area">
                      <i class="fa '.ot_get_option('pts_homepage_column_sections_sec_1_icon').' fa-3x" style="color:#fff;"></i>
                </div>
                <div class="colum-text">
                    '.ot_get_option('pts_homepage_column_sections_sec_1').'
                </div>
                <div class="button-area-1">
                    '.do_shortcode('[button title="'.ot_get_option('pts_homepage_column_sections_sec_1_btn').'" href="'.ot_get_option('pts_homepage_column_sections_sec_1_link').'"]').'
                </div>
        </div>';
    
    $returns .= '<div class="col-xs-12 col-sm-4 col-md-4 homepage-column-2">
                <div class="icon-area">
                      <i class="fa '.ot_get_option('pts_homepage_column_sections_sec_2_icon').' fa-3x" style="color:#fff;"></i>
                </div>
                <div class="colum-text">
                    '.ot_get_option('pts_homepage_column_sections_sec_2').'
                </div>
                <div class="button-area-2">
                    '.do_shortcode('[button title="'.ot_get_option('pts_homepage_column_sections_sec_2_btn').'" href="'.ot_get_option('pts_homepage_column_sections_sec_2_link').'"]').'
                </div>
        </div>';
    $returns .= '<div class="col-xs-12 col-sm-4 col-md-4 homepage-column-3">
                <div class="icon-area">
                      <i class="fa '.ot_get_option('pts_homepage_column_sections_sec_3_icon').' fa-3x" style="color:#fff;"></i>
                </div>
                <div class="colum-text">
                    '.ot_get_option('pts_homepage_column_sections_sec_3').'
                </div>
                <div class="button-area-3">
                    '.do_shortcode('[button title="'.ot_get_option('pts_homepage_column_sections_sec_3_btn').'" href="'.ot_get_option('pts_homepage_column_sections_sec_3_link').'"]').'
                </div>
        </div>';
    
    return $elstart.$returns.$elend;
}

function pts_main_wrap() {
   return 'container-fluid';
}

function set_container() {
    /*if (is_singular() && pts_has_shortcode('vc_row') && get_page_template_slug()!='default') {
		$set_container = pts_main_wrap();
    }
    elseif(class_exists('WooCommerce')){
        if(is_product() && pts_has_shortcode('vc_row')){
            $set_container = pts_main_wrap();
        }
    }
    elseif(get_page_temp() == 'default' && pts_has_shortcode('vc_row')){
        $set_container = 'row';
    }
    else
    {
        $set_container = 'container';
    }*/

    if(pts_has_shortcode('vc_row')&&(get_page_temp()!='default')){
        $set_container = '';
    }
    else{
        $set_container = 'container';
    }
    return $set_container;
}
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.ot_get_option('pts_shop_achive_count').';' ), 20 );

function pts_product_download_link($prod_id) {
    $downloadables = get_post_meta( $prod_id, '_downloadable_files' );
    $link = array();
    foreach($downloadables[0] as $dl)
    {
        $link[] = $dl['file'];
    }
    
    return $link;
}

/*function pts_product_add_meta_box() {

	$screens = array( 'product' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'myplugin_sectionid',
			__( 'Product View Controls', PTS_DOMAIN ),
			'pts_product_meta_box_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'pts_product_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 *
function pts_product_meta_box_callback( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'pts_product_meta_box', 'pts_product_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 *
	$revslider = get_post_meta( $post->ID, '_pts_revslider_extra', true );
	$sampleurl = get_post_meta( $post->ID, '_pts_preview_url', true );

	echo '<label for="pts_rev_slider">';
	_e( 'Revolution Slider', PTS_DOMAIN );
	echo '</label> ';
	echo '<input type="text" id="pts_rev_slider" name="pts_rev_slider" value="' . esc_attr( $revslider ) . '" size="25" />';
    
    echo '<br/>';
    
    echo '<label for="pts_sample">';
	_e( 'Preview URL', PTS_DOMAIN );
	echo '</label> ';
	echo '<input type="text" id="pts_sample" name="pts_sample" value="' . esc_attr( $sampleurl ) . '" size="25" />';
}

function pts_product_meta_box_save( $post_id ) {

	// Check if our nonce is set.
	if ( ! isset( $_POST['pts_product_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['pts_product_meta_box_nonce'], 'pts_product_meta_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	/*if ( ! isset( $_POST['pts_rev_slider'] ) ) {
		return;
	}*

	// Sanitize user input.
	$revs = sanitize_text_field( $_POST['pts_rev_slider'] );
	$urlsamp = sanitize_text_field( $_POST['pts_sample'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, '_pts_revslider_extra', $revs );
	update_post_meta( $post_id, '_pts_preview_url', $urlsamp );
}
add_action( 'save_post', 'pts_product_meta_box_save' );*/

function shop_prod_meta(){
        global $post, $product;
        $cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
            $tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
		?>
        <div class="row text-center" style="margin-bottom:30px; font-size:10px;">
            <div class="col-xs-12 col-sm-12 col-md-12">
	<?php do_action( 'woocommerce_product_meta_start' ); ?>
	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php _e( 'SKU:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span>.</span>

	<?php endif; ?>

	<?php echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $cat_count, 'woocommerce' ) . ' ', '.</span>' ); ?>

	<?php echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) . ' ', '.</span>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
</div>
            <?php }

function theme_excerpts(){
    /*if(class_exists('Woocommerce'))
    {
        if(!is_cart() || !is_checkout() || !is_account_page() || !is_page('cart')) {
            $wc_check = true;
        }
        else {
            $wc_check = false;
        }

        if(is_account_page()) {
            $wc_is_account_page = true;
        }
        else{
            $wc_is_account_page = false;
        }
    }
    if($wc_check) {
        if(!$wc_is_account_page) {
            global $post;
            if ($post->post_excerpt != '') {
                return ($post->post_excerpt);
            }
        }
        else
        {
            global $current_user;
            get_currentuserinfo();

            return '<p class="myaccount_user">'.
            sprintf(
                __( 'Hello <strong>%1$s</strong> (not %1$s? <a href="%2$s">Sign out</a>).', PTS_DOMAIN ) . ' ',
                $current_user->display_name,
                wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) )
            ).' '.

            sprintf( __( 'From your account dashboard you can view your recent orders, manage your shipping and billing addresses and <a href="%s">edit your password and account details</a>.', PTS_DOMAIN ),
                wc_customer_edit_account_url()
            ).'</p>';
        }
    }

    else{
        return;
    }*/
}

add_filter( 'woocommerce_checkout_fields' , 'addBootstrapToCheckoutFields' );

function addBootstrapToCheckoutFields($fields) {
foreach ($fields as &$fieldset) {
  foreach ($fieldset as &$field) {
    // if you want to add the form-group class around the label and the input
    $field['class'][] = 'form-group'; 

    // add form-control to the actual input
    $field['input_class'][] = 'form-control';
  }
}
return $fields;
}


function pts_posted_on($author='1', $cat='1')
    {
    $aid = get_post_field( 'post_author', get_queried_object_id() );
    $ann = get_userdata( $aid );

        $output ='';
    
        if(ot_get_option('pts_posts_meta_date_time'))
            $output .= '<span class="fa fa-calendar" style="margin-right:15px;"> '.get_the_date().'</span>';
        if(ot_get_option('pts_posts_meta_author_name') && $author == 1)
            $output .= '<span class="fa fa-user" style="margin-right:15px;"> '.$ann->user_nicename.'</span>';
        if(ot_get_option('pts_posts_meta_category') && $cat == 1)
            $output .= '<span class="fa fa-edit" style="margin-right:15px;"> '.get_the_category_list( ', ' ).'</span>';
    
    return $output;
    }


if(!function_exists('pts_comments')) {
    function pts_comments($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        if(get_comment_type() == 'pingback' || get_comment_type() == 'trackback') :
            ?>
            
            <li id="comment-<?php comment_ID(); ?>" class="pingback">
                <div class="comment-block row">
                    <div class="col-md-12">
                        <div class="author-link"><?php _e('Pingback:', PTS_DOMAIN) ?></div>
                        <div class="comment-reply"> <?php edit_comment_link(); ?></div>
                        <?php comment_author_link(); ?>

                    </div>
                </div>
				<div class="media">
					<h4 class="media-heading"><?php _e('Pingback:', PTS_DOMAIN) ?></h4>
					
	                <?php comment_author_link(); ?>
					<?php edit_comment_link(); ?>
				</div>
            <?php
            
        elseif(get_comment_type() == 'comment') :
    	$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) ); ?>
        
        
				
			<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
				<div class="media">
					<div class="pull-left">
			            <?php 
			                $avatar_size = 80;
			                echo get_avatar($comment, $avatar_size);
			             ?>
					</div>
					<div class="media-body">
						<h4 class="media-heading"><?php comment_author_link(); ?></h4>
						<div class="meta-comm">
							<?php comment_date(); ?> - <?php comment_time(); ?>
						</div>
						
					</div>
					
	                <?php if ($comment->comment_approved == '0'): ?>
	                    <p class="awaiting-moderation"><?php __('Your comment is awaiting moderation.', PTS_DOMAIN) ?></p>
	                <?php endif ?>
	                
					<?php comment_text(); ?>
					<?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply to comment'),'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
					
					<?php if ( $rating && get_option( 'woocommerce_enable_review_rating' ) == 'yes' ) : ?>
		
						<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="<?php echo sprintf( __( 'Rated %d out of 5', 'woocommerce' ), $rating ) ?>">
							<span style="width:<?php echo ( $rating / 5 ) * 100; ?>%"><strong itemprop="ratingValue"><?php echo $rating; ?></strong> <?php _e( 'out of 5', 'woocommerce' ); ?></span>
						</div>
		
					<?php endif; ?>

		
				</div>

        <?php endif;
    }
}

if(!function_exists('pts_breadcrumbs')) {
    function pts_breadcrumbs() {

      $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
      $delimiter = '<span class="delimeter">/</span>'; // delimiter between crumbs
      $home = __('Home', PTS_DOMAIN); // text for the 'Home' link
      $blogPage = __('Blog', PTS_DOMAIN);
      $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
      $before = '<span class="current">'; // tag before the current crumb
      $after = '</span>'; // tag after the current crumb
      
      global $post;
      $homeLink = home_url();
      if (is_front_page()) {
      
        if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
      
	      } else if (class_exists('bbPress') && is_bbpress()) {
      	$bbp_args = array(
      		'before' => '<div class="breadcrumbs" id="breadcrumb">',
      		'after' => '</div>'
      	);	      
      	bbp_breadcrumb($bbp_args);
      } else {
        do_action('etheme_before_breadcrumbs');
        
        echo '<div class="breadcrumbs">';
        echo '<div id="breadcrumb">';
        echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
      
        if ( is_category() ) {
          $thisCat = get_category(get_query_var('cat'), false);
          if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
          echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
      
        } elseif ( is_search() ) {
          echo $before . 'Search results for "' . get_search_query() . '"' . $after;
      
        } elseif ( is_day() ) {
          echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
          echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
          echo $before . get_the_time('d') . $after;
      
        } elseif ( is_month() ) {
          echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
          echo $before . get_the_time('F') . $after;
      
        } elseif ( is_year() ) {
          echo $before . get_the_time('Y') . $after;
      
        } elseif ( is_single() && !is_attachment() ) {
          if ( get_post_type() == 'etheme_portfolio' ) {
            $portfolioId = etheme_tpl2id('portfolio.php'); 
            $portfolioLink = get_permalink($portfolioId);
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . $portfolioLink . '/">' . $post_type->labels->name . '</a>';
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
          } elseif ( get_post_type() != 'post' ) {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
          } else {
            $cat = get_the_category(); 
            if(isset($cat[0])) {
	            $cat = $cat[0];
	            $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
	            if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
	            echo $cats;
            }
	        if ($showCurrent == 1) echo $before . get_the_title() . $after;
          }
      
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
          $post_type = get_post_type_object(get_post_type());
          echo $before . $post_type->labels->singular_name . $after;
      
        } elseif ( is_attachment() ) {
          $parent = get_post($post->post_parent);
          //$cat = get_the_category($parent->ID); $cat = $cat[0];
          //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
          //echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
          if ($showCurrent == 1) echo ' '  . $before . get_the_title() . $after;
      
        } elseif ( is_page() && !$post->post_parent ) {
          if ($showCurrent == 1) echo $before . get_the_title() . $after;
      
        } elseif ( is_page() && $post->post_parent ) {
          $parent_id  = $post->post_parent;
          $breadcrumbs = array();
          while ($parent_id) {
            $page = get_post($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id  = $page->post_parent;
          }
          $breadcrumbs = array_reverse($breadcrumbs);
          for ($i = 0; $i < count($breadcrumbs); $i++) {
            echo $breadcrumbs[$i];
            if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
          }
          if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      
        } elseif ( is_tag() ) {
          echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
      
        } elseif ( is_author() ) {
           global $author;
          $userdata = get_userdata($author);
          echo $before . 'Articles posted by ' . $userdata->display_name . $after;
      
        } elseif ( is_404() ) {
          echo $before . 'Error 404' . $after;
        }else{
            
            echo $blogPage;
        }
      
        if ( get_query_var('paged') ) {
          if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
          echo ' ('.__('Page') . ' ' . get_query_var('paged').')';
          if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
      
        echo '</div>';
        echo '</div>';
      
      }
    }
}


if(!function_exists('pts_top_cart')) {
	function pts_top_cart() {
        global $woocommerce;
		?>
			<div class="shopping-area hidden-sm hidden-xs">
				<div class="shopping-cart-widget" id='basket'>
					<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="cart-summ" data-items-count="<?php echo $woocommerce->cart->cart_contents_count; ?>">
					<!--<div class="cart-bag">
						<i class='ico-sum'></i>
						<span class="badge-number"><?php /*echo $woocommerce->cart->cart_contents_count; */?></span>
					</div>-->
					
						<span class='shop-text'><i class="fa fa-shopping-cart"></i> </span> <span class="total"><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span>
					</a>
				</div>

				
			</div>
    <?php
	}
}

function pts_get_loginform(){
    $form = '<form name="loginform" id="loginform" class="temp-login-form" action="'.home_url().'/wp-login.php" method="post" _lpchecked="1" role="form" data-toggle="validator">';

    $form .= '<div class="form-group"><label for="user_login" class="control-label">Username</label>
        <input type="text" name="log" id="user_login" class="form-control" value="" size="20" required></div>';

    $form .= '<div class="form-group"><label for="user_pass" class="control-label">Password</label>
        <input type="password" name="pwd" id="user_pass" class="form-control" value="" size="20" required></div>';

    $form .= '<input type="hidden" name="redirect_to" value="'.home_url().'"></form>';

    return $form;
}

function pts_get_lostpasswordform(){
    $form = '<h3>'.__('Lose something?',PTS_DOMAIN).'</h3>';
    $form .= '<p>'.__('Enter your username or email to reset your password',PTS_DOMAIN).'</p>';
    $form .= '<form method="post" action="'.site_url('wp-login.php?action=lostpassword', 'login_post').'" class="wp-user-form">';
    $form .= '<div class="form-group"><label for="user_login" class="hide control-label">'.__('Username or Email',PTS_DOMAIN).': </label>';
    $form .= '<input type="text" class="form-control" name="user_login" value="" size="20" id="user_login" tabindex="1001" required /></div>';
    $form .= '<input type="submit" name="user-submit" value="'.__('Reset my password').'" class="btn btn-info btn-filled" tabindex="1002" />';
    $reset = $_GET['reset'];
    if($reset == true){
        $form .= '<p>A message will be sent to your email address.</p>';
    }
    $form .= '<input type="hidden" name="redirect_to" value="'. $_SERVER['REQUEST_URI'].'?reset=true" />';
    $form .= '<input type="hidden" name="user-cookie" value="1" /></form>';
    $form .= '<br/><a href="'.strtok($_SERVER["REQUEST_URI"],'?').'" class="btn btn-success">'.__('Registered? Login...',PTS_DOMAIN).'</a> ';

    return $form;
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/*add_filter('template_include', 'project_include');
function portfolio_include($template_path) {
    if ( get_post_type() == 'pts_project' ) {
        if ( is_single() ) {
            if ( $theme_file = locate_template( array ( 'single-pts-project.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = get_template_directory() . '/single-pts-project.php';
                echo '1';
            }
        }
    }
    return $template_path;
}*/

?>