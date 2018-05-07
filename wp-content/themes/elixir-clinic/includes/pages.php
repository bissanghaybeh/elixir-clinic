<?php
/**
 * Create Pages
 *
 * PHP version 7
 * @author   Bissan Ghaybeh <bissan.gh@gmail.com>
 */

/**
 * Create ELIXIR Pages
 *
 * @param type $page page title
 * @param type $parent_page_id page ID
 * @return integer
 */
function elixir_create_page($page, $parent_page_id = 0)
{
    $args = array(
        'post_title'      => $page,
        'post_status'     => 'publish',
        'post_type'       => 'page',
        'comment_status'  => 'closed',
        'post_parent'     => $parent_page_id,
    );

    $page_id = wp_insert_post($args);

    if (!$page_id) {
        wp_die('Error creating template page');
    }
    return $page_id;
}

/**
 * Set page template
 *
 * @param type $page_slug page slug
 * @param type $page_id page ID
 */
function set_page_template($page_slug, $page_id = 0)
{
    //Assign page templates
    $pageName       = 'page-' . $page_slug . '.php';
    $templateExists = locate_template($pageName);
    if ($page_id && $templateExists) {
        update_post_meta(
            $page_id,
            '_wp_page_template',
            $pageName
        );
    }
}

/**
 * Create Elixir Pages.
 */
function elixir_create_pages()
{
    $pages    = Array(
        'HomePage'          => array(),
        'About us'          => array(),
        'Services'          => array(),
        'Elixir blog'       => array(),
        'Locations'         => array(),
        'Franchise'         => array(),
        'Contact us'        => array(),
        'FAQ'               => array(),
        'Terms of service'  => array(),
        'Privacy policy'    => array(),
        'Sitemap'           => array(),
        'Request a booking' => array()
    );

    foreach ($pages as $page => $sub_pages) {
        $page_slug      = sanitize_title($page);
        $existing_page  = get_page_by_path($page_slug);
        $parent_page_id = 0;

        if (empty($existing_page)) {
            $parent_page_id = elixir_create_page($page);
        } else {
            $parent_page_id = $existing_page->ID;
        }

        set_page_template($page_slug, $parent_page_id);

        if (!empty($sub_pages)) {
            foreach ($sub_pages as $sub_page) {
                $sub_page_slug     = sanitize_title($sub_page);
                $existing_sub_page = get_page_by_path( $page_slug ."/". $sub_page_slug );
                if (empty($existing_sub_page)) {
                    $subpage_id = elixir_create_page($sub_page, $parent_page_id);
                    set_page_template($sub_page_slug, $subpage_id);
                }
            }
        }

        if ('Home' == $page) :
            update_option('page_on_front', $parent_page_id);
            update_option('show_on_front', 'page');
        endif;
    }
}

if (is_multisite()){
    if (get_current_blog_id() == 1) {
        add_action('after_setup_theme', 'elixir_create_pages');
    }
} else {
    add_action('after_setup_theme', 'elixir_create_pages');
}

