<?php
  try{
    $task = isset($_REQUEST['task'])? $_REQUEST['task'] :'';
    if( $task== 'delete' ){
      $deleteQuery =  DeleteAction( COUNTRY , $_REQUEST['post']);
      if($deleteQuery !== false){
        $message = requiredMessage("updated","Record Delete Successfull.");
      }else{
        $message = requiredMessage("error","Record is not deleted.");
      }
    }
   $tableName = $wpdb->prefix . COUNTRY;
   $result = $wpdb->get_results("SELECT * FROM ".$tableName);   
  }catch(PDOException $e){
    echo "Not display the record contact the developer";
    echo $e->getMessage();
  }  
?>