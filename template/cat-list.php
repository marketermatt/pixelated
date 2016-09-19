<div class="list">
    
    <?php 
        if ( have_posts() ) :
            // Start the Loop.
            while ( have_posts() ) : the_post(); ?>
                <div class="list-item">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h4><?php the_title(); ?></h4></a>
                            <div class="meta" style="marin-top:10px;"><?php echo pts_posted_on('1','1'); ?></div>
                            <div class="clearfix"></div>
                            <?php if ( has_post_thumbnail() ) { ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <div class="list-image">
                                        <?php the_post_thumbnail('full'); ?>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            <?php } ?>
                    <div class="list-content">
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="btn btn-xs btn-default btn-readmore">Read more</a>
                    </div>
                    <div class="clearfix"></div>
                    </div>
            <?php endwhile;
        endif;
    ?>
    <ul class="post-index-pagination pager">
        <li class="previous"><?php next_posts_link( __( 'Newer', PTS_DOMAIN ) ); ?></li>
        <li class="next"><?php previous_posts_link( __( 'Older', PTS_DOMAIN ) ); ?></li>
    </ul>
</div>