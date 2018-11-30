<?php
  try{
    $message = "";
    $tableName = $wpdb->prefix . COURSE;
    if(isset($_REQUEST['update'])){
      $city              = $_REQUEST['city'];
      $level             = $_REQUEST['level'];
      $course            = $_REQUEST['course'];
      $start_time        = $_REQUEST['start_date'];
      $long_time         = $_REQUEST['long_date'];
      $accommodation     = $_REQUEST['accommodation'];
      $airport_transfer  = $_REQUEST['airport_transfer'];
      $special_course    = $_REQUEST['special_course'];  

      $validationError = false;
      if(empty($city)){
        $titleError = requiredMessage("error","Please fill the <span>*</span> field");
        $validationError = true;        
      }

      if($validationError === false){
        $id = $_REQUEST['post'];        
        $data = [
          'city'              => $city,
          'level'             => $level,
          'course'            => $course,
          'start_date'        => $start_time,
          'long_date'         => $long_time,
          'accommodation'     => $accommodation,
          'airport_transfer'  => $airport_transfer,
          'special_course'    => $special_course 
        ];
        $updateRecord = $wpdb->update($tableName , $data , array('id' => $id ) ,array('%s','%s' ,'%s','%s','%s','%s' ,'%s','%s') , array('%d'));
        if($updateRecord !== false){
          $message = requiredMessage("updated","Data updated.");
        }else{
          $message = requiredMessage("error","Data is not updated.");
        } 
      }
    }     
    $row = $wpdb->get_results("SELECT * FROM ".$tableName." WHERE id =".$_REQUEST['post'] );
  }catch(PDOException $e){
    echo "Not display the record contact the developer";
    //echo $e->getMessage();
  }
?>