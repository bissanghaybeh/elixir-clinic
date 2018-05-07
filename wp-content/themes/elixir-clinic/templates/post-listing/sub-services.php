<?php
$post_title             = $post->post_title;
$service_image_id       = get_post_thumbnail_id($post);
$permalink              = get_permalink($post);
$sections               = get_field('sections', $post->ID);
?>
<div class="col-sm-12 col-xs-12 sub-services" id="<?php echo $post->post_name; ?>">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="icon">
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
            <h2 class="title text-center"><?php echo $post_title;?></h2>
            <div class="sub-service-image ">
                <?php
                echo responsive_image_attachments(
                    $service_image_id,
                    $service_image_id,
                    'sub-service',
                    'sub-service_xs',
                    'sub-service_2x'
                );
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
        if ($sections) :
            foreach($sections as $section) :
                $section_title   = $section['section_title'];
                $section_content = $section['section_content'];
                $class     = 'col-sm-6';
                $sub_class = 'col-sm-12';
                if (count($section_content) > 1) {
                    $class = 'col-sm-12';
                    $sub_class = 'col-sm-4';
                }
                ?>
                <div class="sub-content <?php echo $class;?> ">
                    <div class="section-title-container text-center">
                        <h3 class="subtitle text-center"><?php echo $section_title; ?></h3>
                    </div>
                    <?php
                    if ($section_content) :
                    ?>
                    <div class="row">
                        <?php
                        foreach($section_content as $content) :
                            $title = $content['title'];
                            $text  = $content['text'];
                            ?>
                            <div class="sub-content-section <?php echo $sub_class;?>">
                                <?php
                                if ($title) :
                                    ?>
                                    <h4 class="subtitle"><?php echo $title; ?></h4>
                                    <?php
                                endif;
                                ?>
                                <p class="paragraph"><?php echo $text;?></p>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                    <?php
                    endif;
                    ?>
                </div>
                <?php
            endforeach;
        else :
            ?>
            <div class="text-only col-sm-6">
                <p class="paragraph">
                    <?php echo $post->post_content; ?>
                </p>
            </div>
            <?php
        endif;
        ?>
    </div>
</div>