<?php

function enqueue_custom_color_stylesheet() {

    wp_enqueue_style('kidsa-style', get_stylesheet_uri());

    // Retrieve theme color options with fallbacks
    $theme_body_color   = cs_get_option('theme_body_color') ?: '#FFFFFF';
    $theme_black_color  = cs_get_option('theme_black_color') ?: '#000000';
    $theme_white_color  = cs_get_option('theme_white_color') ?: '#FFFFFF';
    $theme_color_1      = cs_get_option('theme_color_1') ?: '#F39F5F';
    $theme_color_2      = cs_get_option('theme_color_2') ?: '#70A6B1';
    $theme_header_color = cs_get_option('theme_header_color') ?: '#385469';
    $theme_text_1_color   = cs_get_option('theme_text_1_color') ?: '#5C707E';
    $theme_text_2_color   = cs_get_option('theme_text_2_color') ?: '#ffffffcc';
    $theme_border_color = cs_get_option('theme_border_color') ?: '#E5E5E5';
    $theme_border_color_2 = cs_get_option('theme_border_color_2') ?: '#242449';
    $theme_bg_1_color     = cs_get_option('theme_bg_1_color') ?: '#F4EEE5';
    $theme_bg_2_color     = cs_get_option('theme_bg_2_color') ?: '#EFF5F6';
    $theme_bg_3_color     = cs_get_option('theme_bg_3_color') ?: '#70A6B1';

    wp_enqueue_style('custom-color-theme', get_template_directory_uri() . '/inc/theme-stylesheets/theme-color.css');

    // Inline CSS for theme colors
    $custom_css = "
    :root {
        --body: " . esc_attr($theme_body_color) . ";
        --black: " . esc_attr($theme_black_color) . ";
        --white: " . esc_attr($theme_white_color) . ";
        --theme: " . esc_attr($theme_color_1) . ";
        --theme2: " . esc_attr($theme_color_2) . ";
        --header: " . esc_attr($theme_header_color) . ";
        --text: " . esc_attr($theme_text_1_color) . ";
        --text2: " . esc_attr($theme_text_2_color) . ";
        --border: " . esc_attr($theme_border_color) . ";
        --border-2: " . esc_attr($theme_border_color_2) . ";
        --bg: " . esc_attr($theme_bg_1_color) . ";
        --bg2: " . esc_attr($theme_bg_2_color) . ";
        --bg3: " . esc_attr($theme_bg_3_color) . ";
    }";

    wp_add_inline_style('custom-color-theme', $custom_css);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_color_stylesheet');
?>