<?php
  try{
    $message = ""; 
    if(isset($_REQUEST['register'])){
      $city        = $_REQUEST['title'];
      $description = $_REQUEST['description'];
      $countryId   = $_REQUEST['country_id'];
      $stateId     = $_REQUEST['state_id'];
      $districtId  = $_REQUEST['district_id'];

      $validationError = false;
      if(empty($city) || empty($description) || empty($countryId) || empty($stateId) || empty($districtId)){
        $titleError = requiredMessage("error","Please fill the blank field");
        $validationError = true;
      }           
      if($validationError === false){       
        $tableName = $wpdb->prefix . CITY;
        $row       = $wpdb->get_results("SELECT * FROM `".$tableName."` WHERE `title` = '".$city."'");
        $rowCount  =  $wpdb->num_rows;
        if( $rowCount < 1 ){        
          $row = [
            'title'       => $city,
            'description' => $description,
            'country_id'  => $countryId,
            'state_id'    => $stateId,
            'district_id' => $districtId
          ];
          $insertCountry = $wpdb->insert($tableName , $row ,array('%s','%s','%d','%d','%d'));
          if($insertCountry !== false){
            $message = requiredMessage("updated","Data Insert.");
          }else{
            $message = requiredMessage("error","Data Not inserted.");
          }
        }else{
          $message = requiredMessage("error","<strong>".$city. "</strong> is already exists");
        } 
      }    
    }    
  }catch(PDOException $e){
    echo "<h3 class='text-red'>your record is not insert please contact the developer</h3>";
    //echo $e->getMessage();
  }
