<?php
  if($validationError === true){
    echo $titleError;
  }
  echo $message;
?>   
<form method="post">
  <div class="wrap">
    <h1 class="wp-heading-inline">update Country</h1>   
    <div id="poststuff">
      <div id="post-body" class="metabox-holder columns-2">      
        <div id="post-body-content" style="position: relative;">
          <div id="titlediv">
            <?php
              addInputField('title' , 'Enter Country Name' , empty($row[0]->title) ? '' : $row[0]->title);
              addTextArea('description' ,'Enter Discription' ,empty($row[0]->description) ? '' : $row[0]->description );
            ?>               
          </div>        
        </div>
        <?php publishButton('Publish :' , 'update' , 'Update'); ?>
      </div>       
     </div>
  </div>
</form> 