<div class="container<?php //echo set_container(); ?>">
    <?php
    if (have_posts()) :
        // Start the Loop.
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
</div>