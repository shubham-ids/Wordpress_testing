<?php
  try{
    $message = "";
    $tableName = $wpdb->prefix . DISTRICT;
    if(isset($_REQUEST['update'])){
      $country     = $_REQUEST['title'];
      $description = $_REQUEST['description'];
      $countryId   = $_REQUEST['country_id'];
      $stateId     = $_REQUEST['state_id'];

     
      $validationError = false;
      if(empty($country) || empty($description) || empty($countryId) || empty($stateId)){
        $titleError = requiredMessage("error","Please fill the blank field");
        $validationError = true;
      } 

      if($validationError === false){
        $id = $_REQUEST['post'];
        $query = "SELECT * FROM `".$tableName."` WHERE `title` = '".$country."' AND `id` <> '".$id."' ";
        $row       = $wpdb->get_results($query);
        $rowCount  =  $wpdb->num_rows;
        if( $rowCount < 1 ){          
          $data = [
            'title'       => $country,
            'description' => $description,
            'country_id'  => $countryId,
            'state_id'    => $stateId             
          ];
          $updateRecord = $wpdb->update($tableName , $data , array('id' => $id ) ,array('%s','%s','%d','%d') , array('%d'));
          if($updateRecord !== false){
            $message = requiredMessage("updated","Data updated.");
          }else{
            $message = requiredMessage("error","Data is not updated.");
          }
        }else{
          $message = requiredMessage("error","<strong>".$country. "</strong> is already exists");
        }  
      }
    }     
    $row = $wpdb->get_results("SELECT * FROM ".$tableName." WHERE id =".$_REQUEST['post'] );
  }catch(PDOException $e){
    //echo "Not display the record contact the developer";
    echo $e->getMessage();
  }
?>