<?php
add_action( 'wp_enqueue_scripts', 'twentysixteen_child_enqueue_styles', 1000 );
function twentysixteen_child_enqueue_styles() {
	wp_enqueue_style( 'twentysixteen-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css');
    
}
