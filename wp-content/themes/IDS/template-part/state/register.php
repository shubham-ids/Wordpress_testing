<?php
  if($validationError === true){
    echo $titleError;
  }
  echo $message;
?>   
<div class="wrap">
  <h1 class="wp-heading-inline">Add New State</h1> 
  <form method="post">
    <table class="form-table">
      <tbody>
        <?php
          generalAddField('title' , 'State' , empty($country) ? '' : $country,'Enter New State');
          generalAddtextField('description' , 'Description' , empty($description) ? '' : $description,'Enter Description');
          generalDropDown('Select Country','country_id' , empty($_REQUEST['country_id']) ? '' : $_REQUEST['country_id']);      
        ?>       
      </tbody>
    </table>
     <?php generalbutton('register' , 'Save'); ?>    
  </form>  
</div>