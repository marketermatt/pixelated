<?php if(!is_front_page()): ?>
    <div class="container-fluid borderbottom">
        <div class="page-excerpt container">
            <h3><?php echo get_the_title(); ?></h3>
            <?php pts_breadcrumbs(); ?>
            <?php echo theme_excerpts(); ?>
            <?php
            $extracss = '';
            if(class_exists('Woocommerce')){
                if(!is_shop()){
                    $extracss = 'hidden-overflow';
                }
            }
            ?>
        </div>
    </div>
<?php endif; ?>