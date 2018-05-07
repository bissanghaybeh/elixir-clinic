<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="list-service flex">
        <div class="block-image">
            <?php
            echo responsive_image_attachments(
                $icon['id'],
                $icon['id'],
                'service_icon',
                'service_icon_2x',
                'service_icon_2x'
            );
            ?>
        </div>
        <div class="block-details">
            <h3 class="subtitle"><?php echo get_the_title(); ?></h3>
            <p class="paragraph"><?php echo get_the_content(); ?></p>
            <a class="link" href="<?php echo get_permalink(); ?>">
            <?php _e('Know more', ELIXIR_TEXT_DOMAIN); ?>
                <i class="fa fa-chevron-right"></i>
                <i class="fa fa-chevron-right"></i>
            </a>

        </div>
    </div>
</div>