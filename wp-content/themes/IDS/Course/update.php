<?php
  if($validationError === true){
    echo $titleError;
  }
  echo $message;
?>   
<div class="wrap">
  <h1 class="wp-heading-inline">Update Course</h1> 
  <form method="post">
    <table class="form-table">
      <tbody>
        <?php
          generalAddField('text' , 'city'             , 'City'             , empty($row[0]->city)             ? '' : $row[0]->city);
          generalAddField('text' , 'level'            , 'Level'            , empty($row[0]->level)            ? '' : $row[0]->level);
          generalAddField('text' , 'course'           , 'Course'           , empty($row[0]->course)           ? '' : $row[0]->course);
          generalAddField('text' , 'start_date'       , 'Start Date'       , empty($row[0]->start_date)       ? '' : $row[0]->start_date);
          generalAddField('text' , 'long_date'        , 'How Long'         , empty($row[0]->long_date)        ? '' : $row[0]->long_date);
          generalAddField('text' , 'accommodation'    , 'Accommodation'    , empty($row[0]->accommodation)    ? '' : $row[0]->accommodation);
          generalAddField('text' , 'airport_transfer' , 'Airport Transfer' , empty($row[0]->airport_transfer) ? '' : $row[0]->airport_transfer);
          generalAddField('text' , 'special_course'   , 'Special Course'   , empty($row[0]->special_course)   ? '' : $row[0]->special_course);                 
        ?>
      </tbody>
    </table>
     <?php generalbutton('update' , 'Save Change'); ?>    
  </form>  
</div>