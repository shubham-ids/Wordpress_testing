<?php
  if($validationError === true){
    echo $titleError;
  }
  echo $message;
?>   
<div class="wrap">
  <h1 class="wp-heading-inline">Update State fbfb</h1> 
  <form method="post">
    <table class="form-table">
      <tbody>
        <?php
          generalAddField('text','title' , 'State' , empty($row[0]->title) ? '' : $row[0]->title,'Enter New State');
          generalAddtextField(
            'description' , 
            'Description' ,
             empty($row[0]->description) ? '' : $row[0]->description,
             'Enter Description');
          generalDropDown('Select Country','country_id' , empty($row[0]->country_id) ? '' : $row[0]->country_id);      
        ?>       
      </tbody>
    </table>
     <?php generalbutton('update' , 'Save Update'); ?>    
  </form>  
</div>