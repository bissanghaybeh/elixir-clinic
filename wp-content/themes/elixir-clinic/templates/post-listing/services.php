<?php
$service_title     = $post->post_title;
$service_image_id  = get_post_thumbnail_id($post);
$service_content   = $post->post_content;
$permalink         = get_permalink($post);
?>
<div class="col-sm-3 col-xs-12 service">
    <div class="service-image">
        <a href="<?php echo $permalink;?>">
            <?php echo responsive_image_attachments(
                $service_image_id,
                $service_image_id,
                'services_thumbnail',
                'services_thumbnail_xp',
                'services_thumbnail_2x'
            );
            ?>
        </a>
    </div>
    <div class="service-info">
        <h3 class="subtitle"><a href="<?php echo $permalink;?>"><?php echo $service_title; ?></a></h3>
        <p class="paragraph">
            <?php echo $service_content; ?>
        </p>
        <a class="link" href="<?php echo $permalink;?>">
            <?php _e('Know more'); ?>
            <i class="fa fa-chevron-right"></i>
            <i class="fa fa-chevron-right"></i>
        </a>
    </div>
</div>
