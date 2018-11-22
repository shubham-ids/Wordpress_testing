<?php
  if($validationError === true){
    echo $titleError;
  }
  echo $message;
?>   
<form method="post">
  <div class="wrap">
    <h1 class="wp-heading-inline">Add New Country</h1>   
    <div id="poststuff">
      <div id="post-body" class="metabox-holder columns-2">      
        <div id="post-body-content" style="position: relative;">
          <div id="titlediv">
            <?php
              addInputField('title' , 'Enter Country Name' , empty($country) ? '' : $country);
              addTextArea('description' ,'Enter Discription' ,empty($description) ? '' : $description );
            ?>               
          </div>        
        </div>
        <?php publishButton('Publish :' , 'register' , 'Publish'); ?>
      </div>       
     </div>
  </div>
</form> 




