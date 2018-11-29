<?php
  if($validationError === true){
    echo $titleError;
  }
  echo $message;
?>   
<div class="wrap">
  <h1 class="wp-heading-inline">Add Course</h1> 
  <form method="post">
    <table class="form-table">
      <tbody>
        <?php
  requiredGeneralAddField('text' , 'city'             , 'City'             , empty($city)             ? '' : $city);
          generalAddField('text' , 'level'            , 'Level'            , empty($level)            ? '' : $level);
          generalAddField('text' , 'course'           , 'Course'           , empty($course)           ? '' : $course);
          generalAddField('text' , 'start_date'       , 'Start Date'       , empty($start_time)       ? '' : $start_time);
          generalAddField('text' , 'long_date'        , 'How Long'         , empty($long_time)        ? '' : $long_time);
          generalAddField('text' , 'accommodation'    , 'Accommodation'    , empty($accommodation)    ? '' : $accommodation);
          generalAddField('text' , 'airport_transfer' , 'Airport Transfer' , empty($airport_transfer) ? '' : $airport_transfer);
          generalAddField('text' , 'special_course'   , 'Special Course'   , empty($special_course)   ? '' : $special_course);      
        ?>
      </tbody>
    </table>
     <?php generalbutton('register' , 'Save'); ?>    
  </form>  
</div>