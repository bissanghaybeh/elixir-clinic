<?php
/**
 * Exilir Clinic functions.php
 *
 * PHP version 7
 * @author   Bissan Ghaybeh <bissan.gh@gmail.com>
 */

define('ELIXIR_VERSION', '1.0');
define('ELIXIR_TEXT_DOMAIN', 'elixir_clinic');
define("ELIXIR_TEMPLATE_DIRECTORY", get_template_directory());
define("ELIXIR_TEMPLATE_DIRECTORY_URI", get_template_directory_uri());

require_once TEMPLATEPATH . '/includes/pages.php';
require_once TEMPLATEPATH . '/includes/menus.php';
require_once TEMPLATEPATH . '/includes/globals.php';
require_once TEMPLATEPATH . '/includes/custom-posts.php';
require_once TEMPLATEPATH . '/includes/widget-areas.php';

if (!function_exists('elixir_clinic_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * Create your own elixir_clinic_setup() function to override in a child theme.
     *
     * @since mytravelbooklist 1.0
     */
    function elixir_clinic_setup() {
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'custom-logo',
            )
        );

        add_theme_support( 'custom-logo', array(
            'height'      => 140,
            'width'       => 75,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
        ) );

        add_theme_support('post-thumbnails');
        add_image_size('hp_video_image', 1280, 500, true);
        add_image_size('custom_service', 65, 60, true);
        add_image_size('custom_service_2x', 130, 130, true);
        add_image_size('custom_service_xs', 100, 100, true);
        add_image_size('menu_image', 9999, 340, true);
        add_image_size('menu_background', 1280, 330, true);
        add_image_size('menu_background_xp', 700, 400, true);
        add_image_size('services_thumbnail', 270, 200, true);
        add_image_size('services_thumbnail_2x', 540, 400, true);
        add_image_size('services_thumbnail_xp', 400, 400, true);
        add_image_size('blog_thumbnail', 9999, 400, true);
        add_image_size('stories', 250, 250, true);
        add_image_size('stories_2x', 500, 500, true);
        add_image_size('stories_xp', 300, 300, true);
        add_image_size('sponsor_logo', 110, 9999, false);
        add_image_size('services_hero', 1170, 600, true);
        add_image_size('services_hero_xs', 750, 400, true);
        add_image_size('service_icon', 115, 115, true);
        add_image_size('service_icon_2x', 230, 230, true);
        add_image_size('sub-service', 970, 420, true);
        add_image_size('sub-service_2x', 1940, 840, true);
        add_image_size('sub-service_xp', 750, 400, true);
        add_image_size('slider_thumbnail', 346, 195, true);

        /*
         * Enable support for excerpts on pages
         */
        add_post_type_support('page', 'excerpt');

        /*
         * Remove wpautop filter from content
         * (Remove <p> wrapping the text)
         */
        remove_filter('the_content', 'wpautop');

        /*
         * Remove wptexturize filter from content
         * (Replaces common plain text characters into formatted entities)
         */
        remove_filter('the_content', 'wptexturize');
        remove_filter('the_title', 'wptexturize');
    }

endif; // elixir_setup
add_action('after_setup_theme', 'elixir_clinic_setup');

/**
 * Enqueue styles.
 */
function elixir_clinic_styles()
{
    // Load our main stylesheets.
    wp_enqueue_style(
        'elixir_styles',
        get_stylesheet_uri(),
        array(),
        ELIXIR_VERSION
    );
    wp_enqueue_style(
        'bootstrap',
        get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css',
        array(),
        false
    );
    wp_enqueue_style(
        'font-awesome',
        get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css',
        array(),
        false
    );
}

add_action('wp_enqueue_scripts', 'elixir_clinic_styles');


/**
 * Enqueue scripts.
 */
function elixir_clinic_scripts()
{
    wp_enqueue_script(
        'bootstrap',
        get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js',
        array('jquery'),
        false,
        true
    );
    wp_enqueue_script(
        'slick',
        get_template_directory_uri() . '/js/slick.min.js',
        array('jquery'),
        false,
        true
    );
    wp_enqueue_script(
        'selectric',
        get_template_directory_uri() . '/js/jquery.selectric.min.js',
        array('jquery'),
        false,
        true
    );
    wp_enqueue_script(
        'elixir_js',
        get_template_directory_uri() . '/js/elixir.js',
        array('jquery'),
        ELIXIR_VERSION,
        true
    );
}

add_action('wp_enqueue_scripts', 'elixir_clinic_scripts');

/**
 * Return responsive picture by image attachment ID
 *
 * @global array $_wp_additional_image_sizes Registered image sizes
 *
 * @param int    $desktop_attachment_id Desktop attachment ID
 * @param int    $mobile_attachment_id  Mobile attachment ID
 * @param string $desktop_size          Desktop image size
 * @param string $mobile_size           Mobile image size
 * @param string $desktop_retina_size   Desktop retina image size
 *
 * @return string
 */
function responsive_image_attachments(
    $desktop_attachment_id,
    $mobile_attachment_id,
    $desktop_size        = 'post-thumbnail',
    $mobile_size         = '',
    $desktop_retina_size = ''
)
{
    global $_wp_additional_image_sizes;

    if (empty($desktop_retina_size)) {
        $desktop_retina_size = $desktop_size;
    }
    if (empty($mobile_size)) {
        $mobile_size = $desktop_size;
    }

    $desktop_image = wp_get_attachment_image_src(
        $desktop_attachment_id,
        $desktop_size
    );
    $mobile_image  = wp_get_attachment_image_src(
        $mobile_attachment_id,
        $mobile_size
    );
    $retina_image  = wp_get_attachment_image_src(
        $desktop_attachment_id,
        $desktop_retina_size
    );
    $retina_image_density = "2x";
    list($mobile_src, $mobile_width, $mobile_height) = $mobile_image;
    list($desktop_src, $desktop_width, $desktop_height) = $desktop_image;
    list($retina_src, $retina_width, $retina_height) = $retina_image;
    if ($desktop_retina_size !== $desktop_size) {
        $retina_specs = $_wp_additional_image_sizes[$desktop_retina_size];
        $width_condition  = $retina_width === $retina_specs["width"];
        $height_condition = $retina_height === $retina_specs["height"];
        $retina_condition = $width_condition || $height_condition;
        if ($retina_specs["crop"] == true) {
            $retina_condition = $width_condition && $height_condition;
        }
        if (!$retina_condition) {
            list($retina_src, $retina_width, $retina_height) = $desktop_image;
            $retina_image_density = "1x";
        }
    } else {
        $retina_image_density = "1x";
    }

    $attachment = get_post($desktop_attachment_id);
    $title      = trim(strip_tags($attachment->post_title));
    $alt        = trim(strip_tags(
        get_post_meta($desktop_attachment_id, '_wp_attachment_image_alt', true))
    );

    if (empty($alt)) {
        $alt = trim(strip_tags($attachment->post_excerpt));
    }
    if (empty($alt)) {
        $alt = $title;
    }

    $html = "<picture>"
        . "<source media='(max-width: 767px)' srcset='$mobile_src'/>"
        . "<source srcset='$desktop_src 1x";
    if ($retina_image_density !== "1x") {
        $html .= ", $retina_src $retina_image_density";
    }
    $html .= "'/>"
        . "<img class='img-responsive' src='$desktop_src' width='$desktop_width' height='$desktop_height' alt=\"$alt\" title=\"$title\" />"
        . "</picture>";
    return $html;
}
