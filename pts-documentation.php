<?php
/**
 * Template Name: Documentation Template
 */
get_header();

$feat_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
$select_styles ='';
if(!empty($feat_image)){
    $select_styles = ' background-image:URL('.$feat_image.'); background-repeat: no-repeat; background-size:cover;';
};

?>
    <div class="container-wrap">
        <div class="container-fluid" style="background: #949494; <?php echo $select_styles; ?>">
            <div class="container no-15">
                <div style="margin: 40px 0;">
                        <select class="select-theme" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="">Select Theme</option>
                            <?php
                            $args = array (
                                'post_type' => 'documentation',
                                'post_per_page' => -1
                            );

                            // The Query
                            $docs = new WP_Query( $args );
                            if ( $docs->have_posts() ) {
                                while ( $docs->have_posts() ) {
                                    $docs->the_post();
                                    if($_GET['doc'] == $post->ID) {
                                        $select = ' selected';
                                    }else{
                                        $select = '';
                                    }
                                    echo '<option value="?doc='.get_the_ID().'"'.$select.'>'.get_the_title().'</option>';
                                }
                            }
                            wp_reset_postdata();
                            ?>
                        </select>
                </div>
            </div>
        </div>
        <div class="container-fluid borderbottom">
            <div class="page-excerpt container" style="text-align: center;">
                <h3><?php echo get_the_title(); ?></h3>
                <?php //pts_breadcrumbs(); ?>
                <?php echo theme_excerpts(); ?>
            </div>
        </div>

        <?php if(empty($_GET['doc'])) { ?>
        <div class="container"><div class="row">
            <?php
                if (have_posts()) :
                    // Start the Loop.
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                endif; ?>
        </div></div>
        <?php
            }else{

                /*if(pts_has_shortcode('vc_row',$_GET['doc'])){
                    $set_container = pts_main_wrap();
                }
                else
                {
                    $set_container = 'container no-15';
                }*/

    ?>
    <div class="container"><div class="row">
        <?php
                // WP_Query arguments
                $args = array (
                    'p'                      => $_GET['doc'],
                    'post_type'              => 'documentation',
                );

                // The Query
                $query = new WP_Query( $args );
                // The Loop
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();

                        if(pts_has_shortcode('vc_row', $_GET['doc'])){
                            $ele_start_content_container = '<div class="container">';
                            $ele_end_content_container = '</div>';
                        }
                        else
                        {
                            $ele_start_content_container = '<div class="container no-15">';
                            $ele_end_content_container = '</div>';
                        }

                        echo $ele_start_content_container;
                        echo '<h3 style="text-align: center;">'.$post->post_title.'</h3>';
                        the_content();
                        echo $ele_end_content_container;
                    }
                }
                else {
                    echo '<h2>No Theme With This ID</h2>';
                }
                // Restore original Post Data
                wp_reset_postdata();
            }
            ?>
        </div>
    </div></div>
<?php get_footer(); ?>