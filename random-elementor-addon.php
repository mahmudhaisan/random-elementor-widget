<?php

/**
 * Plugin Name: Elementor Random
 * Description: Random ELementor post type on click.
 * Plugin URI:  https://github.com/mahmudhaisan
 * Version:     1.0.0
 * Author:      Mahmud Haisan
 * Author URI:  https://github.com/mahmudhaisan
 * Text Domain: elemrandom 
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


define('PLUGIN_DIR', __DIR__);


/**
 * Register Random Control.
 *
 * Include control file and register control class.
 *
 * @since 1.0.0
 * @param \Elementor\Controls_Manager $controls_manager Elementor controls manager.
 * @return void
 */
function register_random_control($controls_manager) {

    require_once(__DIR__ . '/controls/random.php');

    $controls_manager->register(new \Random_Elementor_Control());
}
add_action('elementor/controls/register', 'register_random_control');




/**
 * Register Random Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_random_widget($widgets_manager) {

    require_once(__DIR__ . '/widgets/random-widget.php');


    $widgets_manager->register(new \Random_Elementor_Widget());
}
add_action('elementor/widgets/register', 'register_random_widget');
