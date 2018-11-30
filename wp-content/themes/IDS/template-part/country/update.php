<?php
  if($validationError === true){
    echo $titleError;
  }
  echo $message;
?>   
<div class="wrap">
  <h1 class="wp-heading-inline">update Country</h1> 
  <form method="post">
    <table class="form-table">
      <tbody>
        <?php
          generalAddField(
            'text',
            'title' , 
            'Country' , 
            empty($row[0]->title) ? '' : $row[0]->title ,
            'Enter New Country Name');
          generalAddtextField(
            'description' , 
            'Description' , 
            empty($row[0]->description) ? '' : $row[0]->description , 
            'Enter Description');      
        ?>
      </tbody>
    </table>
     <?php generalbutton('update' , 'Save Changes'); ?>    
  </form>  
</div>