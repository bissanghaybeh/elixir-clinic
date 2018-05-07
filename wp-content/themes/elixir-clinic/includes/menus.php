<?php
/**
 * Create Menus
 * @author  Bissan Ghaybeh <bissan.gh@gmail.com>
 */

/*
 * Adding menus to the theme
 */
register_nav_menus(
    array(
        'primary'   => __('Primary Menu', ELIXIR_TEXT_DOMAIN),
        'secondary' => __('Secondary Menu', ELIXIR_TEXT_DOMAIN),
    )
);

/*
 * Adding Menus items
 */
function register_menu_items()
{
    $check_once = 'menu_check_elixir';
    $run_once   = get_option($check_once);
    if (!$run_once) {
        $headerMenuName = 'Header Menu';
        $headerMenu_id  = wp_create_nav_menu($headerMenuName);
        $headerMenu     = get_term_by('name', $headerMenuName, 'nav_menu');
        $headerMenuId   = $headerMenu->term_id;

        $footerMenuName = 'Footer Menu';
        $footerMenu_id  = wp_create_nav_menu($footerMenuName);
        $footerMenu     = get_term_by('name', $footerMenuName, 'nav_menu');
        $footerMenuId   = $footerMenu->term_id;

        wp_update_nav_menu_item(
            $headerMenuId,
            0,
            array(
                'menu-item-title'     => __('Nos Livres'),
                'menu-item-classes'   => 'header-menu-nos-livres',
                'menu-item-status'    => 'publish',
                'menu-item-url'       => home_url('/nos-livres/'),
                'menu-item-parent-id' => 0,
            )
        );
        wp_update_nav_menu_item(
            $headerMenuId,
            0,
            array(
                'menu-item-title'     => __('About us'),
                'menu-item-classes'   => 'header-menu-about-us',
                'menu-item-status'    => 'publish',
                'menu-item-url'       => home_url('/about-us/'),
                'menu-item-parent-id' => 0,
            )
        );
        wp_update_nav_menu_item(
            $headerMenuId,
            0,
            array(
                'menu-item-title'     => __('Services'),
                'menu-item-classes'   => 'header-menu-services',
                'menu-item-status'    => 'publish',
                'menu-item-url'       => home_url('/services/'),
                'menu-item-parent-id' => 0,
            )
        );
        wp_update_nav_menu_item(
            $headerMenuId,
            0,
            array(
                'menu-item-title'     => __('Elixir Blog'),
                'menu-item-classes'   => 'header-menu-blog',
                'menu-item-status'    => 'publish',
                'menu-item-url'       => home_url('/elixir-blog/'),
                'menu-item-parent-id' => 0,
            )
        );
        wp_update_nav_menu_item(
            $headerMenuId,
            0,
            array(
                'menu-item-title'     => __('Locations'),
                'menu-item-classes'   => 'header-menu-locations',
                'menu-item-status'    => 'publish',
                'menu-item-url'       => home_url('/locations/'),
                'menu-item-parent-id' => 0,
            )
        );
        wp_update_nav_menu_item(
            $headerMenuId,
            0,
            array(
                'menu-item-title'     => __('Franchise'),
                'menu-item-classes'   => 'header-menu-franchise',
                'menu-item-status'    => 'publish',
                'menu-item-url'       => home_url('/franchise/'),
                'menu-item-parent-id' => 0,
            )
        );
        wp_update_nav_menu_item(
            $headerMenuId,
            0,
            array(
                'menu-item-title'     => __('Contact us'),
                'menu-item-classes'   => 'header-menu-contact',
                'menu-item-status'    => 'publish',
                'menu-item-url'       => home_url('/contact-us/'),
                'menu-item-parent-id' => 0,
            )
        );

        wp_update_nav_menu_item(
            $footerMenuId,
            0,
            array(
                'menu-item-title'     => __('FAQ'),
                'menu-item-classes'   => 'header-menu-faq',
                'menu-item-status'    => 'publish',
                'menu-item-url'       => home_url('/faq/'),
                'menu-item-parent-id' => 0,
            )
        );
        wp_update_nav_menu_item(
            $footerMenuId,
            0,
            array(
                'menu-item-title'     => __('Nos Selections'),
                'menu-item-classes'   => 'header-menu-nos-selections',
                'menu-item-status'    => 'publish',
                'menu-item-url'       => home_url('/nos-selections/'),
                'menu-item-parent-id' => 0,
            )
        );
        wp_update_nav_menu_item(
            $footerMenuId,
            0,
            array(
                'menu-item-title'     => __('Terms of service'),
                'menu-item-classes'   => 'header-menu-terms',
                'menu-item-status'    => 'publish',
                'menu-item-url'       => home_url('/terms-of-service/'),
                'menu-item-parent-id' => 0,
            )
        );
        wp_update_nav_menu_item(
            $footerMenuId,
            0,
            array(
                'menu-item-title'     => __('Privacy policy'),
                'menu-item-classes'   => 'header-menu-privecy-policy',
                'menu-item-status'    => 'publish',
                'menu-item-url'       => home_url('/privecy-policy/'),
                'menu-item-parent-id' => 0,
            )
        );
        wp_update_nav_menu_item(
            $footerMenuId,
            0,
            array(
                'menu-item-title'     => __('Sitemap'),
                'menu-item-classes'   => 'header-menu-sitemap',
                'menu-item-status'    => 'publish',
                'menu-item-url'       => home_url('/sitemap/'),
                'menu-item-parent-id' => 0,
            )
        );
        wp_update_nav_menu_item(
            $footerMenuId,
            0,
            array(
                'menu-item-title'     => __('Conatact us'),
                'menu-item-classes'   => 'header-menu-contact',
                'menu-item-status'    => 'publish',
                'menu-item-url'       => home_url('/contact/'),
                'menu-item-parent-id' => 0,
            )
        );
        wp_update_nav_menu_item(
            $footerMenuId,
            0,
            array(
                'menu-item-title'     => __('Request a booking'),
                'menu-item-classes'   => 'header-menu-booking',
                'menu-item-status'    => 'publish',
                'menu-item-url'       => home_url('/request-a-booking/'),
                'menu-item-parent-id' => 0,
            )
        );

        $locations              = get_theme_mod('nav_menu_locations');
        $locations['primary']   = $headerMenuId;
        $locations['secondary'] = $footerMenuId;
        set_theme_mod('nav_menu_locations', $locations);

        //update the menu_check option to make sure this code only runs once
        update_option($check_once, true);
    }
}

add_action('init', 'register_menu_items');
