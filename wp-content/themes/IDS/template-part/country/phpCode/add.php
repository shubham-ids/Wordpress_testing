<?php
  try{
    $message = ""; 
    if(isset($_REQUEST['register'])){
      $country     = $_REQUEST['title'];
      $description = $_REQUEST['description'];
     
      $validationError = false;
      if(empty($country) || empty($description)){
        $titleError = requiredMessage("error","Please fill the blank field");
        $validationError = true;
      }

      if($validationError === false){
        $tableName = $wpdb->prefix . COUNTRY;
        $row       = $wpdb->get_results("SELECT * FROM `".$tableName."` WHERE `title` = '".$country."'");
        $rowCount  =  $wpdb->num_rows;
        if( $rowCount < 1 ){        
          $row = [
            'title'       => $country,
            'description' => $description
          ];
          $insertCountry = $wpdb->insert($tableName , $row ,array('%s'));
          if($insertCountry !== false){
            $message = requiredMessage("updated","Data Insert.");
          }else{
            $message = requiredMessage("error","Data Not inserted.");
          }
        }else{
          $message = requiredMessage("error","<strong>".$country. "</strong> is already exists");
        } 
      }    
    }    
  }catch(PDOException $e){
    echo "<h3 class='text-red'>your record is not insert please contact the developer</h3>";
    //echo $e->getMessage();
  }
