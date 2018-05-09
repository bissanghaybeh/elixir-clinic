<?php
/*
Plugin Name: Ramadan Widget
Description: This plugin adds a custom widget.
Version: 1.0
Author: Bissan Ghaybeh
*/
define('RAMADANWIDGET_VERSION',              '0.1');
define('RAMADANWIDGET_DIR',                  plugin_dir_path(__FILE__));
define('RAMADANWIDGET_URL',                  plugin_dir_url(__FILE__));
define('RAMADANWIDGET_PLUGIN_NAME',          plugin_basename(__FILE__));
define('RAMADANWIDGET_TEMPLATES_PATH',       RAMADANWIDGET_DIR . "/templates/");
define('RAMADANWIDGET_INCLUDES_PATH',        RAMADANWIDGET_DIR . "inc/");
define('RAMADANWIDGET_TEXT_DOMAIN',          'ramadan-widget');


require_once(RAMADANWIDGET_INCLUDES_PATH . 'widget.php');
require_once(RAMADANWIDGET_INCLUDES_PATH . 'ajax.php');