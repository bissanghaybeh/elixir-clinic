<?php


// The widget class
class Ramadan_widget extends WP_Widget {

	// Main constructor
	public function __construct() {
		parent::__construct(
			'ramadan_widget',
			__( 'Ramadan Widget', 'text_domain' ),
			array(
				'customize_selective_refresh' => true,
			)
		);
        $this->add_actions();
	}
    protected function add_actions()
        {
            add_action('wp_enqueue_scripts', array($this, 'front_scripts'));

        }
        public static function front_scripts()
        {

            wp_register_script(
              'ramadan-widget',
              RAMADANWIDGET_URL . 'assets/ramadan-widget.js',
              '',
              RAMADANWIDGET_VERSION,
              true
            );

            wp_enqueue_script(
              array(
                'jquery',
                'jquery-ui-core',
                'jquery-ui-dialog',
                'jquery-effects-core',
                'ramadan-widget',
              )
            );
            wp_localize_script('ramadan-widget', 'admin_ajax', admin_url( 'admin-ajax.php' ));
        }

	// Display the widget
	public function widget($args, $instance) {
		extract($args);
		// Check the widget options
		$select   = isset($instance['country-dropdown']) ? $instance['country-dropdown'] : '';
		// WordPress core before_widget hook (always include )
		echo $before_widget;
        include_once(RAMADANWIDGET_TEMPLATES_PATH .'template.phtml');
		// WordPress core after_widget hook (always include )
		echo $after_widget;

	}

}
// Register the widget
function ramadan_custom_widget() {
	register_widget( 'Ramadan_widget' );
}
add_action( 'widgets_init', 'ramadan_custom_widget' );
