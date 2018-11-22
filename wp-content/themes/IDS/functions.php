<?php
add_action( 'wp_enqueue_scripts', 'custom_child', 1000 );
function custom_child() {
  wp_enqueue_style( 'twentysixteen', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'custom-child', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'admin_enqueue_scripts', 'custom_css' );
function custom_css(){
 wp_enqueue_style( 'custom-child', get_stylesheet_directory_uri() . '/style.css' ); 
}
/**
 * Register a custom menu page.
 */
function wpdocs_register_my_custom_menu_page() {
  add_menu_page(
      'Custom Menu Title', // Title page
      'Country',      //  Menu Name
      'manage_options',   // Capability
      'register.php',// Slug
      'addNew_page', // Function Name
      'dashicons-admin-site',//Icon
      4
  );
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );
function addNew_page(){
  include_once('template-part/country/register.php');
}