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
          generalAddField('title' , 'City' , empty($row[0]->title) ? '' : $row[0]->title,'Enter New City');
          generalAddtextField('description' , 'Description' , empty($row[0]->description) ? '' : $row[0]->description,'Enter Description');
          generalDropDown('Select Country','country_id' , empty($row[0]->country_id) ? '' : $row[0]->country_id);
          dependentDropdown('State' , 'state_id' , 'state');
          dependentDropdown('District' , 'district_id' , 'district');      
        ?>               
      </tbody>
    </table>
     <?php generalbutton('update' , 'Save Change'); ?>    
  </form>  
</div>
<?php jqueryAjax(); ?>