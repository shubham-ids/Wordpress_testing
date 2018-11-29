<?php
  try{
    $message = ""; 
    if(isset($_REQUEST['register'])){
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
      // if(empty($city) || empty($level) || empty($course) || empty($start_time) ){
      //   $titleError = requiredMessage("error","Please fill the blank field");
      //   $validationError = true;
      // } 
      // if(empty($long_time) || empty($accommodation) || empty($airport_transfer) || empty($special_course) ){
      //   $titleError = requiredMessage("error","Please fill the blank field");
      //   $validationError = true;
      // }                            
      if($validationError === false){
        $tableName = $wpdb->prefix .COURSE;     
        $row = [
          'city'              => $city,
          'level'             => $level,
          'course'            => $course,
          'start_date'        => $start_time,
          'long_date'         => $long_time,
          'accommodation'     => $accommodation,
          'airport_transfer'  => $airport_transfer,
          'special_course'    => $special_course                       
        ];
        $responce = $wpdb->insert($tableName , $row ,array('%s','%s','%s','%s','%s','%s','%s','%s'));
        if($responce !== false){
          $message = requiredMessage("updated","Data inserted.");
        }else{
          $message = requiredMessage("error","Data Not inserted.");
        } 
      }  
    }    
  }catch(PDOException $e){
    echo "<h3 class='text-red'>your record is not insert please contact the developer</h3>";
   // echo $e->getMessage();
  }
