<?php
/*
* Database table name
*/
define(COUNTRY,'country');
 
/*
* Function Name : debug
* Parameter     : $variable -> Enter the variable name and variable value is olny array
*/
function debug($variable){
  echo "<pre>";
    print_r($variable);
  echo "</pre>";
}

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
    'Custom Menu Title',        // Title page
    'Manage Location',          // Menu Name
    'manage_options',           // Capability
    'manage-location-option',   // Slug
    'addNew_page',              // Function Name
    'dashicons-admin-site',     // Icon
    4
  );

/**
 * Adds a submenu page under a custom post type parent.
 */

  add_submenu_page(
    'manage-location-option',   // parent_slug
    'Manage location',          // Page Title
    'Country',                  // Menu title
    'manage_options',           // capability
    'add-new-country',          // sub menu slug
    'country_ref_page_callback' // function name
  );

  add_submenu_page(
    'manage-location-option', // parent_slug
    'Manage location',        // Page Title
    'State',                  // Menu title
    'manage_options',         // capability
    'add-new-state',          // sub menu slug
    'state_ref_page_callback' // function name
  );  

  add_submenu_page(
    'manage-location-option',     // parent_slug
    'Manage location',           // Page Title
    'District',                  // Menu title
    'manage_options',            // capability
    'add-new-district',          // sub menu slug
    'district_ref_page_callback' // function name
  ); 

  add_submenu_page(
    'manage-location-option', // parent_slug
    'Manage location',       // Page Title
    'City',                  // Menu title
    'manage_options',        // capability
    'add-new-city',          // sub menu slug
    'city_ref_page_callback' // function name
  );    
 
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );

function addNew_page(){
  global $wpdb;
  include_once('template-part/country/listing.php');
  return;
}

/**
 * Display callback for the submenu page.
 * This function is used to add of the new country
 * Parameter : null
 * Return    : true
 */
function country_ref_page_callback() { 
  global $wpdb; 
  include_once('template-part/country/phpCode/add.php');
  include_once('template-part/country/register.php'); 
  return;
}

/**
 * Display callback for the submenu page.
 */
function state_ref_page_callback() { 
    ?>
    <div class="wrap">
        <h1>Add new State</h1>
        <p>Stuff Here</p>
    </div>
    <?php
}
function All_countries(){
      ?>
    <div class="wrap">
        <h1>All countries</h1>
        <p>Stuff Here</p>
    </div>
    <?php
} 
/*
 * Function Name : requiredMessage()
 * Parameter     : $status -> Enter the wordpress classs name for updated / error.
                 : $text -> Display your text 
 * Return        : $message                
 */
  function requiredMessage($status , $text){
    $message = "<div class='".$status." notice'><p>".$text."</p></div>";
    return $message;
  }
/*
*
*
*/
function addInputField($name , $placeholder , $value){ ?>
  <div  class="titlewrap contentField"> 
    <input type="text" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" size="30" id="title" spellcheck="true" autocomplete="off" value="<?php echo $value; ?>">
  </div>  
<?php }

function addTextArea($name , $placeholder , $value){ ?>
  <div id="titlewrap">
    <textarea class="wp-editor-area" style="width: 100%; height: 300px;" autocomplete="off" cols="40" id="content" name="<?php echo $name; ?>" placeholder="<?php echo $placeholder; ?>"><?php echo $value; ?></textarea>
  </div>  
<?php }
function publishButton($lable , $name ,$value){ ?>
  <div id="postbox-container-1" class="postbox-container">
    <div id="side-sortables" class="meta-box-sortables ui-sortable" style="">
      <div id="submitdiv" class="postbox ">
        <h2 class="hndle ui-sortable-handle"><span><?php echo $lable ?></span></h2>
        <div class="inside">
          <div class="submitbox" id="submitpost">
            <div id="major-publishing-actions">
              <div id="publishing-action">
                <span class="spinner"></span>
                <input type="submit" name="<?php echo $name; ?>" id="publish" class="button button-primary button-large" value="<?php echo $value; ?>">
              </div>
              <div class="clear"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php }