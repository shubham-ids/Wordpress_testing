<?php
/*
* Database table name
*/
define(COUNTRY  , 'country');
define(STATE    , 'state');
define(DISTRICT , 'district');
define(CITY     , 'city');
define(COURSE   , 'courses');

if(!class_exists('WP_List_Table')){
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
 
 
/*
* Function Name : debug
* Parameter     : $variable -> Enter the variable name and variable value is olny array
*/
function debug($variable){
  echo "<pre>";
    print_r($variable);
  echo "</pre>";
}

/*
* THis method is used to add the custom JS / CSS file
*/
add_action( 'wp_enqueue_scripts', 'custom_child', 10 );
function custom_child() {
  wp_enqueue_style( 'twentysixteen', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'custom-child', get_stylesheet_directory_uri() . '/style.css' );
}

add_action( 'admin_enqueue_scripts', 'custom_css' );
function custom_css(){
 wp_enqueue_style( 'custom-child', get_stylesheet_directory_uri() . '/style.css' );
 wp_enqueue_style( 'jquery-ui','//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' );
 wp_enqueue_script( 'jquery-ui', '//code.jquery.com/ui/1.12.1/jquery-ui.js' );
 wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/custom-js.js' ); 
}

/**
 * Register a custom menu page.
 */
function wpdocs_register_my_custom_menu_page() {
  add_menu_page(
    'Custom Menu Title',        // Title page
    'Country',          // Menu Name
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

/**
 * Register a custom menu page.
 */
function wpdocs_register_my_custom_menu_Course() {
  add_menu_page(
    'Course',               // Title page
    'courses',              // Menu Name
    'manage_options',       // Capability
    'add-course',           // Slug
    'addNew_course',        // Function Name
    'dashicons-welcome-learn-more', // Icon
    5
  );   
 
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_Course' );

function addNew_course(){
  global $wpdb;
  if($_REQUEST['action'] == 'add'){
    include_once('Course/phpCode/add.php');
    include_once('Course/register.php');
    return;
  }
  if(!isset($_REQUEST['action'])){
    include_once('Course/phpCode/list.php');
    include_once('Course/listing.php');
    return;
   }
  if($_REQUEST['action'] == 'deleted'){
    include_once('Course/phpCode/list.php');
    include_once('Course/listing.php');
    return;
   }  
  if($_REQUEST['action'] == 'edit'){
    include_once('Course/phpCode/edit.php');
    include_once('Course/update.php');
    return;
  }  
}


function addNew_page(){
  global $wpdb;
  if($_REQUEST['action'] == 'add'){
    include_once('template-part/country/phpCode/add.php');
    include_once('template-part/country/register.php');
    return;
  }
  if(!isset($_REQUEST['action'])){
    include_once('template-part/country/phpCode/list.php');
    include_once('template-part/country/listing.php');
    return;
   }
  if($_REQUEST['action'] == 'deleted'){
    include_once('template-part/country/phpCode/list.php');
    include_once('template-part/country/listing.php');
    return;
   }  
  if($_REQUEST['action'] == 'edit'){
    include_once('template-part/country/phpCode/edit.php');
    include_once('template-part/country/update.php');
    return;
  }
}

/**
 * Display callback for the submenu page.
 */
function state_ref_page_callback() { 
  global $wpdb;
  if($_REQUEST['action'] == 'add'){
    include_once('template-part/state/phpCode/add.php');
    include_once('template-part/state/register.php'); 
    return;
  }
  if(!isset($_REQUEST['action'])){
    include_once('template-part/state/phpCode/list.php');
    include_once('template-part/state/listing.php');
    return;
   }
  if($_REQUEST['action'] == 'edit'){
    include_once('template-part/state/phpCode/edit.php');
    include_once('template-part/state/update.php');
    return;
  }
}
function district_ref_page_callback(){
  global $wpdb;
  if($_REQUEST['action'] == 'add'){
    include_once('template-part/district/phpCode/add.php');
    include_once('template-part/district/register.php'); 
    return;
  }
  if(!isset($_REQUEST['action'])){
    include_once('template-part/district/phpCode/list.php');
    include_once('template-part/district/listing.php');
    return;
   }
  if($_REQUEST['action'] == 'edit'){
    include_once('template-part/district/phpCode/edit.php');
    include_once('template-part/district/update.php');
    return;
  }
} 
function city_ref_page_callback(){
  global $wpdb;
  if($_REQUEST['action'] == 'add'){
    include_once('template-part/city/phpCode/add.php');
    include_once('template-part/city/register.php'); 
    return;
  }
  if(!isset($_REQUEST['action'])){
    include_once('template-part/city/phpCode/list.php');
    include_once('template-part/city/listing.php');
    return;
   }
  if($_REQUEST['action'] == 'edit'){
    include_once('template-part/city/phpCode/edit.php');
    include_once('template-part/city/update.php');
    return;
  }
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
* Function Name : addInputField
* Parameter     : $name -> Enter the field of name
                : $placeholder -> Enter the text in placeholder
                : $value -> Enter the input field value
*/
function addInputField($name , $placeholder , $value){ ?>
  <div  class="titlewrap contentField"> 
    <input type="text" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" size="30" id="title" spellcheck="true" autocomplete="off" value="<?php echo $value; ?>">
  </div>  
<?php }

/*
* Function Name : addTextArea
* Parameter     : $name -> Enter the field of name
                : $placeholder -> Enter the text in placeholder
                : $value -> Enter the textarea field value
*/
function addTextArea($name , $placeholder , $value){ ?>
  <div id="titlewrap">
    <textarea class="wp-editor-area" style="width: 100%; height: 300px;" autocomplete="off" cols="40" id="content" name="<?php echo $name; ?>" placeholder="<?php echo $placeholder; ?>"><?php echo $value; ?></textarea>
  </div>  
<?php }

/*
* Fuction Name :
*
*/
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
/*
 * Function Name : DeleteAction
 * Parameter     : $tableName -> write the table name from database
                 : $id        -> Send the delete record  id
 * Return        : deleteQuery
*/
  function DeleteAction( $tableName , $id){
// This method is used to multiple record delete in databases    
    global $wpdb;
    $table = $wpdb->prefix . $tableName;
    $deleteQuery = $wpdb->delete($table , array('id' => $id) , array('%d'));
    return $deleteQuery;                 
  } 

/*
* Function Name : renderTableHead
* parameter     : $tableHeadName -> write the database table column name
                    and write the name from user table head name using in array key value
*               : $odder         -> set the default order value in assending and dessending value
*               : $currentPage   -> set the current page value
* Return        : ture           -> Return the true value when accept the parameter value
                : false          -> Return  the false value when not accept the parameters
*/
  function renderTableHead( $tableHeadName , $order  ){ ?>
 <?php   foreach($tableHeadName as $key => $value){
 ?>
      <th scope="col" id="<?php echo $key; ?>" class="manage-column column-<?php echo $key; ?>">
        <?php echo $value; ?>
      </th>
<?php 
    }
    return false;
  }

/*
* Function Name : addBulkactionField
*
*/
  function addBulkactionField($setField , $addoption , $fieldName ,$rowCount){ ?>
    <div class="tablenav <?php echo $setField; ?>">
      <div class="alignleft actions bulkactions">
        <label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label>
        <select name="<?php echo $fieldName; ?>" id="bulk-action-selector-top">
          <?php
            foreach($addoption as $key => $value){
          ?>
            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
          <?php } ?>
        </select>
        <input type="submit" id="doaction" class="button action" value="Apply">
      </div>
      <div class="tablenav-pages one-page">
        <span class="displaying-num"><?php echo $rowCount; ?> items</span>
      </div>
      <br class="clear">
    </div>  
 <?php }  
 /*
 *
 *
 */
   function addSearchField($name , $value){ ?>
    <p class="search-box">
      <label class="screen-reader-text" for="post-search-input">Search Posts:</label>
      <input 
        type="text" 
        id="post-search-input" 
        name="<?php echo $name; ?>" 
        value="<?php echo $value; ?>">
      <input type="submit" id="search-submit" class="button" value="Search Posts">
    </p> 
<?php }
/*
*
*
*/
  function generalAddField($type ,$name , $displayName ,$value){ ?>
    <tr>
      <th scope="row"><label for="blogname"><?php echo $displayName; ?><span class="star-requiredField">*</span></label></th>
      <td>
        <input name="<?php echo $name; ?>" type="<?php echo $type; ?>" id="blogname" value="<?php echo $value; ?>" class="regular-text custom_text" placeholder="Enter <?php echo $displayName; ?>">
      </td>
    </tr>
<?php  }
/*
*
*
*/
  function generalAddtextField($name , $displayName ,$value , $placeholder){ ?>
    <tr>
      <th scope="row"><label for="blogname"><?php echo $displayName; ?></label></th>
      <td>
        <textarea name="<?php echo $name; ?>" type="text" id="blogname" class="regular-text custom_textarea" placeholder="<?php echo $placeholder; ?>"><?php echo $value; ?></textarea>
      </td>
    </tr>
<?php  } 
/*
*
*
*/
  function generalbutton($name ,$value){ ?>
    <p class="submit">
      <input type="submit" name="<?php echo $name; ?>" id="submit" class="button button-primary" value="<?php echo $value  ?>">
    </p>
<?php  }
/*
*
*
*/
  function generalDropDown($lable,$name,$request){ 
    global $wpdb;
?>
    <tr>
      <th scope="row">
        <label for="default_role"><?php echo $lable; ?></label>
      </th>
      <td>
        <select id="country" class="custom_text" name="<?php echo $name; ?>">
          <option value="">Select</option>
          <?php
            $tableName = $wpdb->prefix . COUNTRY;
            $result = $wpdb->get_results("SELECT * FROM ".$tableName );
            foreach ($result as $fetch) { ?>
              <option <?php echo ($request == $fetch->id) ? 'selected="selected"' : ''  ?> value="<?php echo $fetch->id; ?>"><?php echo $fetch->title; ?></option>
            <?php }
          ?>
        </select>
      </td>
    </tr> 
<?php  }
/*
*
*
*/
  function dependentDropdown($lable , $name ,$fieldId){ ?>
    <tr>
      <th scope="row">
        <label for="default_role"><?php echo $lable; ?></label>
      </th>
      <td>
        <select id="<?php echo $fieldId; ?>" class="custom_text" name="<?php echo $name; ?>" disabled="">
        </select>
      </td>
    </tr> 
<?php  }
/*
 * Function Name : DependentTable
 * Parameter     : $requestName -> Isme server se jo request name aai hai uskol define krna hai.
                 : $tableName -> Enter the table name
                 : $databaseColumn -> Enter the table in which include column name 
                 : $name -> Enter the select dropdown field name
 * Return        : true
 */
function DependentTable($requestName , $tableName , $databaseColumn , $name , $displayName){
  global $wpdb;
  if(!empty($_REQUEST[$requestName])){
    $query = "SELECT * FROM `".$tableName."` WHERE `".$databaseColumn."` = ".$_REQUEST[$requestName];
    $State  =  $wpdb->get_results($query);
    echo "<option value=''>Select ".$displayName."</option>";
    foreach( $State as $fetch ){ ?>
      <option value="<?php echo $fetch->id; ?>" <?php echo ($name == $fetch->id) ? 'selected ="selected" ' : '' ?>><?php echo $fetch->title; ?></option>
<?php 
    }
  } 
  return true; 
}

/*
* Function Name : jqueryAjax
*
*/
  function jqueryAjax(){ ?>
    <script type="text/javascript">
      jQuery(document).ready(function(){
    // This method is used to first dropdown select Value
    // Then fetch the data   
        jQuery('#country').on('change',function(){
        // This method is used to get the drop down select value
          var country = '';
          jQuery.each(jQuery("#country option:selected"), function(){            
            country = jQuery(this).val();
            jQuery('#state').removeAttr("disabled");
            jQuery('#district').removeAttr("disabled");
          });
          if(country == ''){
            jQuery('#state').attr("disabled",'');
            jQuery('#district').attr("disabled",'');
            return; 
          }
          if(country != ''){
            jQuery.ajax({
              type: "post",
              url:  "state.php",
              data: {CountryId:country},          
              success: function(data){
                jQuery('#state').html(data);
              },
              error: function(){
                alert('Something is wrong !');
              },       
            });
          }
        });
        jQuery('#state').on('change',function(){
        // This method is used to get the drop down select value
          var state = '';
          jQuery.each(jQuery("#state option:selected"), function(){            
            state = jQuery(this).val();
          });  
          console.log(state); 
          if(state == ''){
            return jQuery('#district').attr("disabled",''); 
          }  
          if(state != ''){  
            jQuery('#district').removeAttr("disabled");
            jQuery.ajax({
              type: "post",
              url:  "state.php",
              data: {stateId:state},         
              success: function(data){
                jQuery('#district').html(data);
              },
              error: function(){
                alert('Something is wrong !');
              },                    
            });
          }    
        });        
      }); 
    </script>
<?php  }
