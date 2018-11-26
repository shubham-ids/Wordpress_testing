<?php
  if($validationError === true){
    echo $titleError;
  }
  echo $message;
?>   
<div class="wrap">
  <h1 class="wp-heading-inline">Add New Country</h1> 
  <form method="post">
    <table class="form-table">
      <tbody>
        <?php
          generalAddField('title' , 'Country' , empty($country) ? '' : $country,'Enter New Country');
          generalAddtextField('description' , 'Description' , empty($description) ? '' : $description,'Enter Description');      
        ?>
      </tbody>
    </table>
     <?php generalbutton('register' , 'Save'); ?>    
  </form>  
</div>