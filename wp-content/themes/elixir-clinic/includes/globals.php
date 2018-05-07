<?php
/**
 * Set global variables used throughout the theme
 *
 * PHP version 5.3
 *
 * @category Keeward
 * @package  Keeward_mytravelbooklist
 * @author   Omaya Noureddine <omaya.noureddine@keeward.com>
 */

/**
 * Create Custom post types
 */
global $ELIXIR_POST_TYPES;
$ELIXIR_POST_TYPES = array(
    'service' => array(
        'singular'    => 'Service',
        'plural'      => 'Services',
        'has_archive' => true,
        'hierarchical'=> true,
        'taxonomies'  => array(),
        'supports'    => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            'revisions',
            'comments',
            'page-attributes',
        ),
    ),
    'sponsor' => array(
        'singular'        => 'Sponsor',
        'plural'          => 'Sponsors',
        'has_archive'     => true,
        'taxonomies'      => array(),
        'supports'        => array(),
    ),
);
