<section class="gallery-section">
    <div class="container">
        <h2 class="title text-center"><?php _e('Treatment Videos', ELIXIR_TEXT_DOMAIN); ?></h2>
        <div class="slider-for hidden-xs">
            <?php
            foreach ($gallery as $slide) :
                $slider_type  = $slide['slider_type'];
                if ($slider_type == 'image') {
                    $slider_image = $slide['slider_image']['id'];
                } else {
                    $video_id     = $slide['slider_video_id'];
                    $video_type   = $slide['video_type'];
                }
                ?>
                <div class="slider">
                    <?php
                    if ($slider_type == 'image') :
                        ?>
                        <div class="image-slide">
                            <?php echo responsive_image_attachments(
                                    $slider_image,
                                    $slider_image,
                                    'services_hero',
                                    'services_hero_xp',
                                    'services_hero'
                                );
                            ?>
                        </div>
                        <?php
                    else :
                        if ($video_type === 'youtube') :
                            ?>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/<?php echo $video_id; ?>" allowfullscreen></iframe>
                            </div>
                            <?php
                        else :
                            ?>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe id="brandVideo" class="embed-responsive-item"
                                        src="https://player.vimeo.com/video/<?php echo $video_id; ?>"
                                        frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen >
                                </iframe>
                            </div>
                        <?php
                        endif;
                    endif;
                    ?>
                </div>
                <?php
            endforeach;
            ?>
        </div>
        <div class="slider-nav gallery-slider">
            <?php
            foreach ($gallery as $slide) :
                $slider_type  = $slide['slider_type'];
                $slider_name  = $slide['slider_name'];
                if ($slider_type == 'image') {
                    $slider_image = $slide['slider_image']['id'];
                } else {
                    $video_id     = $slide['slider_video_id'];
                    $video_type  = $slide['video_type'];
                }
                $slider_title = $slide['slider_name'];
                ?>
                <div class="slide">
                    <?php
                    if ($slider_type == 'image') :
                        ?>
                        <div class="image-slide">
                            <?php echo responsive_image_attachments(
                                    $slider_image,
                                    $slider_image,
                                    'slider_thumbnail',
                                    'slider_thumbnail',
                                    'slider_thumbnail'
                                );
                            ?>
                        </div>
                        <?php
                    else :
                        if ($video_type === 'youtube') :
                            ?>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/<?php echo $video_id; ?>" allowfullscreen></iframe>
                            </div>
                            <?php
                        else :
                            ?>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe id="brandVideo" class="embed-responsive-item"
                                        src="https://player.vimeo.com/video/<?php echo $video_id; ?>"
                                        frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen >
                                </iframe>
                            </div>
                        <?php
                        endif;
                    endif;
                    ?>
                    <h3 class="video-title text-center"><?php echo $slider_name;?></h3>
                </div>
                <?php
            endforeach;
            ?>
        </div>
    </div>
</section>