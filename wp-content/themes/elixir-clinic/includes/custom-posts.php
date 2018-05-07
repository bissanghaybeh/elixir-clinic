<?php
/**
 * Create Custom post types
 *
 * PHP version 7
 * @author   Bissan Ghaybeh <bissan.gh@gmail.com>
 */

if( !function_exists('elixir_post_types')) :

    /**
     * Create My Travel Book List custom post types
     */
    function elixir_post_types()
    {
        global $ELIXIR_POST_TYPES;
        foreach ($ELIXIR_POST_TYPES as $post_type => $post) {
            $plural             = $post['plural'];
            $singular           = $post['singular'];

            $has_archive = true;
            if (isset($post['has_archive']) && !empty($post['has_archive'])) {
                $has_archive = $post['has_archive'];
            }

            $post_slug = $post_type;
            if (isset($post['slug']) && !empty($post['slug'])) {
                $post_slug = $post['slug'];
            }

            $labels   = array(
                'name'               => $singular,
                'singular_name'      => $singular,
                'add_new'            => 'Add New',
                'add_new_item'       => 'Add New ' . $singular,
                'edit_item'          => 'Edit ' . $singular,
                'new_item'           => 'New ' . $singular,
                'all_items'          => 'All ' . $plural,
                'view_item'          => 'View ' . $singular,
                'search_items'       => 'Search ' . $plural,
                'not_found'          => 'No ' . $plural . ' found',
                'not_found_in_trash' => 'No ' . $plural . ' found in Trash',
                'parent_item_colon'  => '',
                'menu_name'          => $singular,
            );

            $supports = array(
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'revisions',
            );

            $args = array(
                'labels'             => $labels,
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array(
                    'slug'       => $post_slug,
                    'with_front' => true
                ),
                'capability_type'    => 'post',
                'has_archive'        => $has_archive,
                'hierarchical'       => false,
                'menu_position'      => null,
                'supports'           => $supports,
                'taxonomies'         => array('category', 'post_tag'),
            );

            // Overriding supports if set from Global array
            if (isset($post['supports']) && !empty($post['supports'])) {
                $args['supports'] = $post['supports'];
            }

            // Overriding supports if set from Global array
            if (isset($post['capability_type']) && !empty($post['capability_type'])) {
                $args['capability_type'] = $post['capability_type'];
            }

            // Overriding supports if set from Global array
            if (isset($post['hierarchical']) && !empty($post['hierarchical'])) {
                $args['hierarchical'] = $post['hierarchical'];
            }

            // Overriding taxonomies if set from Global array
            if (isset($post['taxonomies'])) {
                $args['taxonomies'] = $post['taxonomies'];
            }

            // Overriding public if set from Global array
            if (isset($post['public'])) {
                $args['public'] = $post['public'];
            }

            // Overriding publicly_queryable if set from Global array
            if (isset($post['publicly_queryable'])) {
                $args['publicly_queryable'] = $post['publicly_queryable'];
            }

            register_post_type($post_slug, $args);
        }
    }

    add_action('init', 'elixir_post_types');
endif;
