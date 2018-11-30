<?php
  if($validationError === true){
    echo $titleError;
  }
  echo $message;
?>   
<div class="wrap">
  <h1 class="wp-heading-inline">Update District</h1> 
  <form method="post">
    <table class="form-table">
      <tbody>
        <?php
          generalAddField('text','title' , 'District' , empty($row[0]->title) ? '' : $row[0]->title,'Enter New District');
          generalAddtextField('description' , 'Description' , empty($row[0]->description) ? '' : $row[0]->description,'Enter Description');
          generalDropDown('Select Country','country_id' , empty($row[0]->country_id) ? '' : $row[0]->country_id);
          dependentDropdown('State' , 'state_id' , 'state')      
        ?>               
      </tbody>
    </table>
     <?php generalbutton('update' , 'Save Change'); ?>    
  </form>  
</div>