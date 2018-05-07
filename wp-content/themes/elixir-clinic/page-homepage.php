<?php
/**
 * Homepage
 *
 * @author   Bissan Ghaybeh <bissan.gh@gmail.com>
 * Template Name: Home
 */
global $post;
global $wp_query;
$homepage_video             = get_field('homepage_video_id');
$homepage_video_type        = get_field('video_type');
$homepage_video_image       = get_field('video_image');
$image                      = $homepage_video_image['sizes']['hp_video_image'];
$about_text                 = get_field('about_text');
$custom_service_title       = get_field('custom_service_title');
$custom_service_subtitle    = get_field('custom_service_subtitle');
$custom_service_description = get_field('custom_service_description');
$custom_service_advantages  = get_field('custom_service_advantages');
$registered_trademark       = get_field('registered_trademark');
$menu_background            = get_field('menu_background');
$mobile_menu_background     = get_field('mobile_menu_background');
$menu_image                 = get_field('menu_image');
$menu_image_id              = $menu_image['id'];
$menu                       = get_field('menu');
$treatment_videos           = get_field('treatment_videos');
$stories                    = get_field('stories');
$stories_title              = get_field('stories_section_title');
$stories_subtitle           = get_field('stories_section_subtitle');
$booking_form_shortcode     = get_field('booking_form_shortcode');
$clinic_section_subtitle    = get_field('clinic_section_subtitle');
$emirates_clinic_address    = get_field('emirates_clinic_address');
$england_clinic_address     = get_field('england_clinic_address');
get_header();
?>
<style>
    .branding-video {
        background-image: url('<?php echo $image; ?>');
    }
    .menu-download {
        background-image: url('<?php echo $menu_background['sizes']['menu_background']; ?>');
    }
    @media  screen and (max-width: 767px) {
        .menu-download {
            background-image: url('<?php echo $mobile_menu_background['sizes']['menu_background_xp']; ?>');
        }
    }xf
</style>
<?php
if ($homepage_video) :
?>
    <section class="homepage-video">
        <div class="branding-video">
            <a href="#videoModal" class="play-btn" data-toggle="modal">
                <i class="fa fa-play"></i>
            </a>
            <div id="videoModal" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <?php
                            if ($homepage_video_type == 'youtube') :
                                ?>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/<?php echo $homepage_video;  ?>" allowfullscreen></iframe>
                                </div>
                                <?php
                            else :
                                ?>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe id="brandVideo" class="embed-responsive-item"
                                        src="https://player.vimeo.com/video/<?php echo $homepage_video;  ?>"
                                        frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen >
                                    </iframe>
                                </div>
                                <?php
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
endif;
if ($about_text || $custom_service_advantages) :
    ?>
    <section class="about-section">
        <?php
        if ($about_text) :
            ?>
            <div class="container about">
                <div class="about-content">
                    <h2 class="title text-center">
                        <?php _e('About us', ELIXIR_TEXT_DOMAIN); ?>
                    </h2>
                    <p class="paragraph text-center">
                        <?php echo $about_text; ?>
                    </p>
                    <a class="link" href="/about-us">
                        <?php _e("Know more"); ?>
                        <i class="fa fa-chevron-right"></i>
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
            </div>
            <?php
        endif;
        if ($custom_service_advantages) :
            ?>
            <div class="container">
                <div class="custom-service">
                    <h2 class="title text-center">
                        <span> <?php echo $custom_service_title; ?> </span>
                        <?php
                        if ($registered_trademark) :
                            ?>
                            <span class="registered_trademark">	&reg;</span>
                            <?php
                        endif;
                        ?>
                    </h2>
                    <h3 class="subtitle text-center">
                        <?php echo $custom_service_subtitle; ?>
                    </h3>
                    <span class="description text-center">
                        <?php echo $custom_service_description; ?>
                    </span>
                    <div class="advantages">
                        <?php
                        foreach ($custom_service_advantages as $advantage) :
                            $descriptive_title = $advantage['descriptive_title'];
                            $descriptive_text  = $advantage['descriptive_text'];
                            $advantage_image_id   = $advantage['descriptive_image']['id'];
                            ?>
                            <div class="advantage">
                                <div class="descriptive-image">
                                    <?php echo responsive_image_attachments(
                                        $advantage_image_id,
                                        $advantage_image_id,
                                        'custom_service',
                                        'custom_service_xp',
                                        'custom_service_xs'
                                    );
                                    ?>
                                </div>
                                <div class="descriptive-details">
                                    <h4><?php echo $descriptive_title;?></h4>
                                    <p class="paragraph">
                                        <?php echo $descriptive_text;?>
                                    </p>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                    <a class="button" href="#">
                        <?php _e('Request a booking', ELIXIR_TEXT_DOMAIN); ?>
                    </a>
                </div>
                <?php
            endif;
            ?>
        </div>
    </section>
    <?php
endif;
if ($menu) :
    ?>
    <section class="menu-download">
        <div class="container">
            <div class="menu-info">
                <?php echo responsive_image_attachments(
                    $menu_image_id,
                    $menu_image_id,
                    'menu_image',
                    'menu_image',
                    'menu_image'
                );
                ?>
                <a class="download-link" href="<?php echo $menu['url']; ?>" download>
                    <?php _e('Download our menu', ELIXIR_TEXT_DOMAIN); ?>
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
    <?php
endif;
// alternative way: Use relationship custom field
$post_type = 'service';
$args = array(
    'posts_per_page'   => '8',
    'post_type'        => $post_type,
    'post_status'      => 'publish',
    'post_parent' => 0,
);
$the_query = new WP_Query($args);
if ($the_query->have_posts()) :
    ?>
    <section class="services">
        <div class="container">
            <h2 class="title text-center"><?php _e('Services', ELIXIR_TEXT_DOMAIN); ?></h2>
            <div class="row">
                <?php
                while ($the_query->have_posts()) :
                    $the_query->the_post();
                    global $post;
                    include (TEMPLATEPATH . '/templates/post-listing/services.php');
                endwhile;
                wp_reset_query();
                ?>
            </div>
        </div>
    </section>
    <?php
endif;
if ($treatment_videos) :
    ?>
    <section class="gallery-section videos">
        <div class="container">
            <h2 class="title text-center"><?php _e('Treatment Videos', ELIXIR_TEXT_DOMAIN); ?></h2>
            <div class="slider-for  hidden-xs">
                <?php
                foreach($treatment_videos as $video) :
                    $video_title = $video['video_title'];
                    $video_id    = $video['video_id'];
                    $video_type  = $video['video_type'];
                    ?>
                    <div class="video-slide slider ">
                        <?php
                        if ($video_type === 'youtube') :
                            ?>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/<?php echo $video_id;  ?>" allowfullscreen></iframe>
                            </div>
                            <?php
                        else :
                            ?>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe id="brandVideo" class="embed-responsive-item"
                                    src="https://player.vimeo.com/video/<?php echo $video_id;  ?>"
                                    frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen >
                                </iframe>
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                    <?php
                endforeach;
                ?>
            </div>
            <div class="slider-nav">
                <?php
                foreach($treatment_videos as $video) :
                    $video_title = $video['video_title'];
                    $video_id    = $video['video_id'];
                    $video_type  = $video['video_type'];
                    ?>
                    <div class="video-slide slider">
                        <?php
                        if ($video_type == 'youtube') :
                            ?>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/<?php echo $video_id;  ?>" allowfullscreen></iframe>
                            </div>
                            <?php
                        else :
                            ?>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe id="brandVideo" class="embed-responsive-item"
                                    src="https://player.vimeo.com/video/<?php echo $video_id;  ?>"
                                    frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen >
                                </iframe>
                            </div>
                            <?php
                        endif;
                        ?>
                        <h3 class="video-title text-center"><?php echo $video_title;?></h3>
                    </div>
                    <?php
                endforeach;
                ?>
            </div>
        </div>
    </section>
    <?php
endif;
include locate_template('templates/widgets/appointment-banner.php');
include locate_template('templates/widgets/banner.php');
$args  = array(
    'post_type'  => 'post',
    'orderby'    => 'date',
    'order'      => 'DESC',
    'posts_per_page'   => '2'
);
$orig_query = $wp_query;
$wp_query = new WP_Query($args);
if ($wp_query->have_posts()) :
    ?>
    <section class="elixir-blog">
        <div class="container">
            <h2 class="title text-center"><?php _e('Elixir blog', ELIXIR_TEXT_DOMAIN); ?></h2>
            <div class="row">
                <?php
                while ($wp_query->have_posts()) :
                    $wp_query->the_post();
                    include locate_template('templates/post-listing/blog-posts.php');
                endwhile;
                ?>
            </div>
            <a class="button" href="/elixir-blog"><?php _e('View blog', ELIXIR_TEXT_DOMAIN); ?></a>
        </div>
    </section>
    <?php
endif;
if ($stories) :
    ?>
    <section class="stories">
        <div class="container">
            <h2 class="title text-center"><?php echo $stories_title; ?></h2>
            <h3 class="subtitle text-center"><?php echo $stories_subtitle;?></h3>
            <div class="stories-slider">
                <?php
                foreach ($stories as $story) :
                    $story_image_id = $story['story_image']['id'];
                    $story_title     = $story['story_title'];
                    $story_subtitle   = $story['story_subtitle'];
                    ?>
                    <div class="story slide">
                        <div class="story-image">
                            <?php echo responsive_image_attachments(
                                $story_image_id,
                                $story_image_id,
                                'stories',
                                'stories_2x',
                                'stories_xp'
                            );
                            ?>
                        </div>
                        <div class="story-info">
                            <h3 class="story-title text-center"><?php echo $story_title;?></h3>
                            <h3 class="story-subtitle text-center"><?php echo $story_subtitle;?></h3>
                        </div>
                    </div>
                    <?php
                endforeach;
                ?>
            </div>
        </div>
    </section>
    <?php
endif;
if ($booking_form_shortcode) :
    include (TEMPLATEPATH . '/templates/partials/booking-form.php');
endif;
$args  = array(
    'post_type'  => 'sponsor',
    'orderby'    => 'date',
    'order'      => 'DESC',
);
$orig_query = $wp_query;
$wp_query = new WP_Query($args);
if ($wp_query->have_posts()) :
    ?>
    <section class="sponsors">
        <div class="container">
            <h2 class="title text-center"><?php _e('Featured in', ELIXIR_TEXT_DOMAIN); ?></h2>
            <div class="sponsors-container">
                <?php
                while ($wp_query->have_posts()) :
                    $wp_query->the_post();
                    $sponsor_image_id = get_post_thumbnail_id($post);
                    $sponsor_url      = get_field('sponsor_url', $post->ID);
                    if ($sponsor_image_id) :
                        ?>
                        <div class="sponsor">
                            <a href="<?php echo $sponsor_url;?>" rel="nofollow" target="_blank">
                                <?php echo responsive_image_attachments(
                                        $sponsor_image_id,
                                        $sponsor_image_id,
                                        'sponsor_logo',
                                        'sponsor_logo',
                                        'sponsor_logo'
                                    );
                                ?>
                            </a>
                        </div>
                        <?php
                    endif;
                endwhile;
                ?>
            </div>
        </div>
    </section>
<?php
endif;
?>
<?php
get_footer();