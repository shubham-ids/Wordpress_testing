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
        $row = [
          'title'       => $country,
          'description' => $description
        ];
        $tableName = $wpdb->prefix . COUNTRY;
        $insertCountry = $wpdb->insert($tableName , $row ,array('%s'));
        if($insertCountry !== false){
          $message = requiredMessage("updated","Data Insert");
        }else{
          $message = requiredMessage("error","Data Not inserted");
        }
      }    
    }    
  }catch(PDOException $e){
    echo "<h3 class='text-red'><i class='icon fa fa-ban'></i> your record is not insert please contact the developer</h3>";
    //echo $e->getMessage();
  }
