<?php
  if($validationError === true){
    echo $titleError;
  }
  echo $message;
?>   
<div class="wrap">
  <h1 class="wp-heading-inline">Add New City</h1> 
  <form method="post">
    <table class="form-table">
      <tbody>
        <?php
          generalAddField('text','title' , 'City' , empty($city) ? '' : $city,'Enter New City');
          generalAddtextField('description' , 'Description' , empty($description) ? '' : $description,'Enter Description');
          generalDropDown('Select Country','country_id' , empty($_REQUEST['country_id']) ? '' : $_REQUEST['country_id']);
          dependentDropdown('State' , 'state_id' , 'state');
          dependentDropdown('District' , 'district_id' , 'district');      
        ?>                       
      </tbody>
    </table>
     <?php generalbutton('register' , 'Save'); ?>    
  </form>  
</div>