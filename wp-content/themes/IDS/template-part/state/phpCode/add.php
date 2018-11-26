<?php
  try{
    $message = ""; 
    if(isset($_REQUEST['register'])){
      $country     = $_REQUEST['title'];
      $description = $_REQUEST['description'];
      $countryId   = $_REQUEST['country_id'];
     
      $validationError = false;
      if(empty($country) || empty($description) || empty($countryId)){
        $titleError = requiredMessage("error","Please fill the blank field");
        $validationError = true;
      }

      if($validationError === false){
        $tableName = $wpdb->prefix . STATE;
        $query = "SELECT * FROM `".$tableName."` WHERE `title` = '".$country."' AND `country_id` = '".$countryId."' ";
        $row       = $wpdb->get_results();
        $rowCount  =  $wpdb->num_rows;
        if( $rowCount < 1 ){        
          $row = [
            'title'       => $country,
            'description' => $description,
            'country_id'  => $countryId
          ];
          $insertCountry = $wpdb->insert($tableName , $row ,array('%s' , '%s' ,'%d'));
          if($insertCountry !== false){
            $message = requiredMessage("updated","Data Insert.");
          }else{
            $message = requiredMessage("error","Data Not inserted.");
          }
        }else{
          $message = requiredMessage("error","<strong>".$country. "</strong> is already include for".$countryId);
        } 
      }    
    }    
  }catch(PDOException $e){
    echo "<h3 class='text-red'>your record is not insert please contact the developer</h3>";
    //echo $e->getMessage();
  }
