<?php
/*
Plugin Name: Ghosts Flying Around
Description: Simple Halloween WordPress plugin, ghosts flying everywhere in a specific post/page that contains the shortcode [random_ghosts]
Version: 1.0
Author: Julian Muslia
*/

function random_ghosts_enqueue_scripts($atts) {
    // Set the plugin URL for images
    $plugin_url = plugins_url('img/', __FILE__);

    // Enqueue JavaScript and CSS only when the shortcode is used
    wp_enqueue_script('random-ghosts-script', plugins_url('script.js', __FILE__), array('jquery'), null, true);
    wp_enqueue_style('random-ghosts-style', plugins_url('style.css', __FILE__));

    // Add the inline script to define 'pluginUrl' only when the shortcode is used
    wp_add_inline_script('random-ghosts-script', 'var pluginUrl = "' . esc_url($plugin_url) . '";');
}

function random_ghosts_shortcode($atts) {
    // Enqueue scripts and styles
    random_ghosts_enqueue_scripts($atts);

}
add_shortcode('random_ghosts', 'random_ghosts_shortcode');
