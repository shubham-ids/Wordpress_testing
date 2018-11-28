<?php 
  include_once('../wp-config.php');
  global $wpdb;
// Generate skills data array
  $tablename = $wpdb->prefix .'courses'; 
  $skillData = array();
  $request   = $_REQUEST['type'];
  $value     = $_REQUEST['term'];

  $query = "SELECT * FROM ".$tablename." WHERE `".$request."` LIKE '%".$value."%' ";
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
?>