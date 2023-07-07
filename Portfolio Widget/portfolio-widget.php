<?php

/**
 * Plugin Name: Portfolio Widget
 * Description: Custom Widget For Christi4Miami
 * Version: 1.0
 * Author: Harris Khan
 * Author URI: ##
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function register_porfolio_widget()
{
    require_once plugin_dir_path(__FILE__) . 'widget.php';
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Portfolio_Widget_Final());
}
add_action('elementor/widgets/widgets_registered', 'register_porfolio_widget');