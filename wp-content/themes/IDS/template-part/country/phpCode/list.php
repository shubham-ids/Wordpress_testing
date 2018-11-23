<?php
  try{
    $task        = isset($_REQUEST['task'])        ? $_REQUEST['task'] :'';
    $multiAction = isset($_REQUEST['multiAction']) ? $_REQUEST['multiAction'] :'';
    $user        = (isset($_REQUEST['users']))     ? $_REQUEST['users']    : '';
  $orderBy      = isset($_REQUEST['order-by'])      ? $_REQUEST['order-by']    : "";
  $order        = isset($_REQUEST['order'])         ? $_REQUEST['order']       : 'DESC';    
   $searchBar    = (isset($_REQUEST['searchBar']) )  ? $_REQUEST['searchBar']   : ''; 
   $tableName = $wpdb->prefix . COUNTRY;  
  // This custom function is used to delete of the multiple records
    if($multiAction == 'deleted'){
      foreach( $user as $id ){
        $multidelete =  DeleteAction( COUNTRY , $id); 
        if($multidelete !== false){
          $message = requiredMessage("updated","MultiRecords are Delete Successfull.");
        }else{
          $message = requiredMessage("error","Records are not deleted.");
        }
      }
    }  
  // This method is used to delete of the single record     
    if( $task== 'delete' ){
      $deleteQuery =  DeleteAction( COUNTRY , $_REQUEST['post']);
      if($deleteQuery !== false){
        $message = requiredMessage("updated","Record Delete Successfull.");
      }else{
        $message = requiredMessage("error","Record is not deleted.");
      }
    }


// This method is used to search of the value form database   
  if(!empty($searchBar)){
    $queryPart = "
    WHERE
      `title` LIKE '%".$searchBar."%'
    ";
  } 
// This method is used to Ascending / Descending Order  
  if(!empty($orderBy)){
    $orderPart = " ORDER BY `$orderBy` $order ";
  }
  $query = "
    SELECT
    SQL_CALC_FOUND_ROWS
     *
    FROM
      `".$tableName."`
      {$queryPart}
      {$orderPart}
    ";  
  //echo $query;
  
   $result    = $wpdb->get_results($query); 
   $rowCount   = $wpdb->get_var('SELECT FOUND_ROWS()'); 
  }catch(PDOException $e){
    echo "Not display the record contact the developer";
    echo $e->getMessage();
  }  
?>