<?php
/**
 * Services page
 *
 * @author   Bissan Ghaybeh <bissan.gh@gmail.com>
 * Template Name: Services
 */

get_header();
$opening_image           = get_field('services_hero_image');
$booking_form_shortcode  = get_field('booking_form_shortcode');
$gallery                 = get_field('gallery');
?>
<div class="services-page">
    <?php
    if ($opening_image) :
        $opening_image_id = $opening_image['id'];
        ?>
        <section class="opening-image">
            <div class="container">
                <div class="hero-image">
                    <?php echo responsive_image_attachments(
                            $opening_image_id,
                            $opening_image_id,
                            'services_hero',
                            'services_hero_xp',
                            'services_hero'
                        );
                    ?>
                </div>
            </div>
        </section>
        <?php
    endif;
    ?>
    <section class="services-list">
        <?php
        $args  = array(
            'post_type'      => 'service',
            'posts_per_page' => -1,
            'post_parent' => 0,
        );
        $orig_query = $wp_query;
        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) :
            ?>
            <div class="anchors-bar-wrapper">
                <nav class="services-nav anchors-bar sticky" id="anchors-spy">
                    <div class="container">
                        <ul class="row nav nav-tabs" role="tablist">
                            <?php
                            while ($wp_query->have_posts()) :
                                $wp_query->the_post();
                                $active_class='';
                                if ($post->post_name === 'diagnostic-testing') {
                                    $active_class='active';
                                }
                                ?>
                                <li class="nav-item <?php echo $post->post_name .' '.$active_class;?>" >
                                    <a href="#<?php echo $post->post_name;?>" class="nav-link">
                                        <span><?php echo $post->post_title; ?></span>
                                    </a>
                                </li>
                                <?php
                            endwhile;
                            ?>
                        </ul>
                    </div>
                </nav>
            </div>
            <?php
        endif;
        ?>
        <div class="services-details">
            <?php
            while ($wp_query->have_posts()) :
                $wp_query->the_post();
                include locate_template('templates/partials/service-details.php');
            endwhile;
            ?>
        </div>
    </section>
    <?php
    if ($booking_form_shortcode) :
        include (TEMPLATEPATH . '/templates/partials/booking-form.php');
    endif;
    if ($gallery) :
        include (TEMPLATEPATH . '/templates/partials/gallery.php');
    endif;
    dynamic_sidebar("clinic_address");
    ?>
</div>
<?php
get_footer();
