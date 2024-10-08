<?php
/*
Plugin Name: Ghosts Flying Around
Description: Simple Halloween WordPress plugin, ghosts flying everywhere in a specific post/page that contains the shortcode [random_ghosts]
Version: 1.0
Author: Julian Muslia
*/

function random_ghosts_enqueue_scripts() {
    // Enqueue JavaScript and CSS with correct paths
    wp_enqueue_script('random-ghosts-script', plugins_url('script.js', __FILE__), array('jquery'), null, true);
    wp_enqueue_style('random-ghosts-style', plugins_url('style.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'random_ghosts_enqueue_scripts');

function enqueue_custom_scripts() {
    wp_enqueue_script(
        'ghosts-flying-script',
        plugin_dir_url(__FILE__) . 'script.js',
        array('jquery'),
        '1.0',
        true
    );

    wp_localize_script(
        'ghosts-flying-script',
        'pluginVars',
        array('pluginUrl' => plugin_dir_url(__FILE__) . 'img/')
    );
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function random_ghosts_shortcode() {
    // Set the plugin URL for images
    $plugin_url = plugins_url('img/', __FILE__);
    wp_add_inline_script('random-ghosts-script', 'var pluginUrl = "' . esc_url($plugin_url) . '";');
}
add_shortcode('random_ghosts', 'random_ghosts_shortcode');
