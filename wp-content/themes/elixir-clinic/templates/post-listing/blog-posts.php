<?php
$post_title             = $post->post_title;
$content                = $post->post_content;
$featured_image_id      = get_post_thumbnail_id($post);
$permalink              = get_permalink($post);

?>
<div class="col-sm-12 col-xs-12 blog-post flex">
    <div class="blog-image">
        <a href="<?php echo $permalink;?>">
            <?php echo responsive_image_attachments(
                    $featured_image_id,
                    $featured_image_id,
                    'blog_thumbnail',
                    'blog_thumbnail',
                    'blog_thumbnail'
                );
            ?>
        </a>
    </div>
    <div class="blog-info">
        <div class="info-container">
            <span><?php echo the_category();?></span>
            <h2 class="subtitle"><a href="<?php echo $permalink;?>"><?php  echo $post_title; ?></a></h2>
            <a href="<?php echo $permalink; ?>" class="link">
                <?php _e('Read More'); ?>
                <i class="fa fa-chevron-right"></i>
                <i class="fa fa-chevron-right"></i>
            </a>
        </div>
    </div>
</div>