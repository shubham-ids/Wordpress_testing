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

add_action( 'admin_enqueue_scripts', 'custom_css' );
function custom_css(){
 wp_enqueue_style( 'custom-child', get_stylesheet_directory_uri() . '/Course/style.css' );
 wp_enqueue_style( 'jquery-ui','//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' );
 wp_enqueue_script( 'jquery-ui', '//code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery') );
 wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/Course/custom-js.js', array('jquery-ui') ); 
}

add_action( 'wp_ajax_custom-ajax', 'ids_ajax_code' );
function ids_ajax_code(){

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
function ids_custom_menu() {
  add_menu_page(
    'Course',               // Title page
    'courses',              // Menu Name
    'manage_options',       // Capability
    'add-course',           // Slug
    'addNewCourse',        // Function Name
    'dashicons-welcome-learn-more', // Icon
    5
  );   
 
}
add_action( 'admin_menu', 'ids_custom_menu' );

function addNewCourse(){
  global $wpdb;


  $cfp = dirname( __FILE__ ) . DIRECTORY_SEPARATOR ; // current folder path
  if($_REQUEST['action'] == 'add'){
    include_once($cfp . 'Crud/add.php');
    include_once($cfp . 'register.php');
    return;
  }
  if(!isset($_REQUEST['action'])){
    include_once($cfp . 'Crud/list.php');
    include_once($cfp . 'listing.php');
    return;
   }
  if($_REQUEST['action'] == 'deleted'){
    include_once($cfp . 'Crud/list.php');
    include_once($cfp . 'listing.php');
    return;
   }  
  if($_REQUEST['action'] == 'edit'){
    include_once($cfp . 'Crud/edit.php');
    require( $cfp .  'update.php');
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
* Function Name : generalAddField
* Parameter     : $type : Enter the field type
                : $name : Enter the field name
                : $displayName : Display of custom name
                : $value : Enter the field value
* This function is used to add of the simple input field
*/
  function generalAddField($name , $displayName ,$value){ ?>
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
  function requiredGeneralAddField($name , $displayName ,$value){ ?>
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