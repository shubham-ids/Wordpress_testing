<?php
/*
* Database table name
*/
define(COURSE   , 'courses');

if(!class_exists('WP_List_Table')){
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
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

add_action( 'wp_ajax_custom-ajax', 'custom_ajax_code' );
function custom_ajax_code(){

  global $wpdb;
// Generate skills data array
  $tablename = $wpdb->prefix .'courses'; 
  $skillData = array();
  $request   = $_REQUEST['type'];
  $value     = $_REQUEST['term'];

  $query = "SELECT * FROM ".$tablename." WHERE `".$request."` LIKE '".$value."%' ";
  $fatchrecord = $wpdb->get_results($query); 
  foreach ($fatchrecord as $row) {
    foreach ($row as $key => $value) {
      if($key === $request){
        $data[] = $value;          
      }
    }    
  }
  // Return results as json encoded array
  echo json_encode($data);

  die;  
}
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
 * Function Name : addSearchField
 * Parameter     : $name : Enter the name of search field
                 : $value : Enter the value of search field
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
* Function Name : requiredGeneralAddField
* Parameter     : $type : Enter the field type
                : $name : Enter the field name
                : $displayName : Display of custom name
                : $value : Enter the field value
* This function is used to add of the simple input field
*/
  function generalAddField($type ,$name , $displayName ,$value){ ?>
    <tr>
      <th scope="row"><label for="blogname"><?php echo $displayName; ?></label></th>
      <td>
        <input name="<?php echo $name; ?>" type="<?php echo $type; ?>" id="<?php echo $name; ?>" value="<?php echo $value; ?>" class="regular-text custom_text" placeholder="Enter <?php echo $displayName; ?>">
      </td>
    </tr>
<?php  }
/*
* Function Name : requiredGeneralAddField
* Parameter     : $type : Enter the field type
                : $name : Enter the field name
                : $displayName : Display of custom name
                : $value : Enter the field value
* This function is used to add of the * required field
*/
  function requiredGeneralAddField($type ,$name , $displayName ,$value){ ?>
    <tr>
      <th scope="row"><label for="blogname"><?php echo $displayName; ?> <span class="star-requiredField">*</span></label></th>
      <td>
        <input name="<?php echo $name; ?>" type="<?php echo $type; ?>" id="<?php echo $name; ?>" value="<?php echo $value; ?>" class="regular-text custom_text" placeholder="Enter <?php echo $displayName; ?>">
      </td>
    </tr>
<?php  }
/*
* Function Name : generalbutton
* Parameter     : $name : Enter the filed name
                : $value : Enter the field of value
*
*/
  function generalbutton($name ,$value){ ?>
    <p class="submit">
      <input type="submit" name="<?php echo $name; ?>" id="submit" class="button button-primary" value="<?php echo $value  ?>">
    </p>
<?php  }