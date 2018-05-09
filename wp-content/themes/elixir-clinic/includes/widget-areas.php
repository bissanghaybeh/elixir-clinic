<?php
/**
 * Register widgets areas
 *
 * PHP version 7
 * @author   Bissan Ghaybeh <bissan.gh@gmail.com>
 */

function elixir_widgets_init()
{
    register_sidebar(
        array(
            'name' => __('Appointment Banner'),
            'id' => 'appointment_banner',
        )
    );
    register_sidebar(
        array(
            'name' => __('Banner'),
            'id' => 'banner',
        )
    );
    register_sidebar(
        array(
            'name' => __('extras'),
            'id' => 'extras',
        )
    );
}

add_action('widgets_init', 'elixir_widgets_init');
