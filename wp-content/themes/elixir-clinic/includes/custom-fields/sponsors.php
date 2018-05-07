<?php

if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key'                   => 'group_5ae713a7c4f2c',
        'title'                 => 'Sponsors',
        'fields'                => array(
            array(
                'key'               => 'field_5ae713aebf052',
                'label'             => 'Sponsor url',
                'name'              => 'sponsor_url',
                'type'              => 'url',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ),
                'default_value'     => '',
                'placeholder'       => '',
            ),
        ),
        'location'              => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'sponsor',
                ),
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen'        => '',
        'active'                => 1,
        'description'           => '',
    ));

endif;