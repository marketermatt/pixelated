<div class="container no-15">
    <div class="row">

        <?php if(ot_get_option('pts_footer_widgets') == '2'):
                $class = 'col-xs-12 col-sm-6 col-md-6';
            elseif(ot_get_option('pts_footer_widgets') == '3'):
                $class = 'col-xs-12 col-sm-4 col-md-4';
            elseif(ot_get_option('pts_footer_widgets') == '4'):
                $class = 'col-xs-12 col-sm-3 col-md-3';
            else:
                $class = 'col-xs-12 col-sm-3 col-md-3';
            endif; ?>

        <div class="<?php echo $class; ?>">
            <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('first_footer_widget')): ?>
            <?php endif; ?>	
        </div>

        <div class="<?php echo $class; ?>">
            <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('second_footer_widget')): ?>
            <?php endif; ?>	
        </div>

        <?php if(ot_get_option('pts_footer_widgets') == '3'): ?>
        <div class="<?php echo $class; ?>">
            <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('third_footer_widget')): ?>
            <?php endif; ?>	
        </div>
        <?php endif; ?>

        <?php if(ot_get_option('pts_footer_widgets') == '4'): ?>
        <div class="<?php echo $class; ?>">
            <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('fourth_footer_widget')): ?>
            <?php endif; ?>	
        </div>
        <?php endif; ?>
    </div>
</div>