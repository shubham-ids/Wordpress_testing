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
          generalAddField('title' , 'District' , empty($row[0]->title) ? '' : $row[0]->title,'Enter New District');
          generalAddtextField('description' , 'Description' , empty($row[0]->description) ? '' : $row[0]->description,'Enter Description');
          generalDropDown('Select Country','country_id' , empty($row[0]->country_id) ? '' : $row[0]->country_id);
          dependentDropdown('State' , 'state_id' , 'state');
        ?> 
        <tr id="state1" class="dependentField">
          <th scope="row">
            <label for="default_role">State</label>
          </th>
          <td>
            <select id="country" class="custom_text" name="state_id">
              <?php
                $tableName = $wpdb->prefix . STATE;
                $result = $wpdb->get_results("SELECT * FROM ".$tableName );
                foreach ($result as $fetch) {
                  ?>
                  <option <?php echo ($row[0]->state_id === $fetch->id) ? 'selected="selected" ' : ''  ?> value="<?php echo $fetch->id; ?>"><?php echo $fetch->title; ?></option>
                <?php } ?>
            </select>
          </td>
        </tr>                       
      </tbody>
    </table>
     <?php generalbutton('update' , 'Save Change'); ?>    
  </form>  
</div>