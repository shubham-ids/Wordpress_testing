<?php
  try{
    $task         = isset($_REQUEST['task'])         ? $_REQUEST['task']        : '';
    $multiAction  = isset($_REQUEST['multiAction'])  ? $_REQUEST['multiAction'] : '';
    $user         = (isset($_REQUEST['users']))      ? $_REQUEST['users']       : '';
    $orderBy      = isset($_REQUEST['order-by'])     ? $_REQUEST['order-by']    : "";
    $order        = isset($_REQUEST['order'])        ? $_REQUEST['order']       : 'DESC';    
    $searchBar    = (isset($_REQUEST['searchBar']) ) ? $_REQUEST['searchBar']   : '';   
    $country  = $wpdb->prefix . COUNTRY; 
    $state    = $wpdb->prefix . STATE; 
    $district = $wpdb->prefix . DISTRICT; 
    $city     = $wpdb->prefix . CITY;
  // This custom function is used to delete of the multiple records
    if($multiAction == 'deleted'){
      foreach( $user as $id ){
        $multidelete =  DeleteAction( CITY , $id); 
        if($multidelete !== false){
          $message = requiredMessage("updated","MultiRecords are Delete Successfull.");
        }else{
          $message = requiredMessage("error","Records are not deleted.");
        }
      }
    }  
  // This method is used to delete of the single record     
    if( $task== 'delete' ){
      $deleteQuery =  DeleteAction( CITY , $_REQUEST['post']);
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
      `".$city."`.`title` LIKE '%".$searchBar."%'
    OR
      `".$district."`.`title` LIKE '%".$searchBar."%'
    OR
      `".$country."`.title    LIKE '%".$searchBar."%' 
    OR
      `".$state."`.title      LIKE '%".$searchBar."%'   
    ";
  } 
// This method is used to Ascending / Descending Order  
  if(!empty($orderBy)){
    $orderPart = " ORDER BY `$orderBy` $order ";
  }
  $query = "
    SELECT
    SQL_CALC_FOUND_ROWS
    `".$city."`.*,
    `".$country."`.title as cTitle,
    `".$state."`.title as sTitle,
    `".$district."`.title as dTitle
    FROM
      `".$city."`
    INNER JOIN  
      `".$country."`
    ON  
      `".$city."`.country_id = `".$country."`.id
    INNER JOIN  
      `".$state."`
    ON  
      `".$city."`.state_id = `".$state."`.id
    INNER JOIN  
      `".$district."`
    ON  
      `".$city."`.district_id = `".$district."`.id            
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