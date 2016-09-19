<div class="isotope">
            <?php 
                if ( have_posts() ) :
                    // Start the Loop.
                    while ( have_posts() ) : the_post(); ?>
                        <div class="item"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php 
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('full');
                                } ?>
                            <div class="isocontent">
                                <h4><?php the_title(); ?></h4>
                                <div class="meta" style="marin-top:10px;"><?php echo pts_posted_on('0','0'); ?></div>
                                <?php //the_excerpt(); ?>
                            </div>
                            </a></div>
                    <?php endwhile;
                endif;
            ?>
                
            </div>
<ul class="post-index-pagination pager">
    <li class="previous"><?php next_posts_link( __( 'Newer', PTS_DOMAIN ) ); ?></li>
    <li class="next"><?php previous_posts_link( __( 'Older', PTS_DOMAIN ) ); ?></li>
</ul>