jQuery(document).ready(function(){
  calling('city');
  calling('level');
  calling('course');
  calling('start_date'); 
  calling('long_date');
  calling('accommodation');
  calling('airport_transfer');
  calling('special_course');   
  function calling(id){
   jQuery("#"+id).keypress(function(){
    autoCompleteMethod(id);
  });   
  }
  function autoCompleteMethod(fieldId){
    jQuery("#"+fieldId ).autocomplete({
      //source: "search.php?type="+fieldId+"",
      source: ajaxurl + "?action=custom-ajax&type=" +fieldId+"",
    });    
  }
  // This method is used to first dropdown select Value
  // Then fetch the data   
    jQuery('#country').on('change',function(){
    // This method is used to get the drop down select value
      var country = '';
      jQuery("#state1").hide();
      jQuery('#state_id').show();
      jQuery.each(jQuery("#country option:selected"), function(){            
        country = jQuery(this).val();     
        jQuery('#state').removeAttr("disabled");
        jQuery('#district').removeAttr("disabled");
        jQuery('#district1 #district').attr("disabled",'');
      });
      if(country == ''){
        jQuery('#state').attr("disabled",'');
        jQuery('#district').attr("disabled",'');
        jQuery('#district1 #district').attr("disabled",'');
        return; 
      }
      if(country != ''){
        jQuery.ajax({
          type: "post",
          url:  "state.php",
          data: {CountryId:country},          
          success: function(data){
            jQuery('#state').html(data);
          },
          error: function(){
            alert('Something is wrong !');
          },       
        });
      }
    });
    jQuery('#state').on('change',function(){
    // This method is used to get the drop down select value
      jQuery("#district_id").show();
      jQuery("#district1").hide();
      var state = '';
      jQuery.each(jQuery("#state option:selected"), function(){            
        state = jQuery(this).val();
      });  
      console.log(state); 
      if(state == ''){
        return jQuery('#district').attr("disabled",''); 
      }  
      if(state != ''){  
        jQuery('#district').removeAttr("disabled");
        jQuery.ajax({
          type: "post",
          url:  "state.php",
          data: {stateId:state},         
          success: function(data){
            jQuery('#district').html(data);
          },
          error: function(){
            alert('Something is wrong !');
          },                    
        });
      }    
    }); 
    jQuery('#state1 #state').on('change',function(){
    // This method is used to get the drop down select value
      jQuery("#district_id").show();
      jQuery("#district1").hide();
      var state = '';
      jQuery.each(jQuery("#state1 #state option:selected"), function(){            
        state = jQuery(this).val();
      });  
      console.log(state); 
      if(state == ''){
        return jQuery('#district_id #district').attr("disabled",''); 
      }  
      if(state != ''){  
        jQuery('#district_id #district').removeAttr("disabled");
        jQuery.ajax({
          type: "post",
          url:  "state.php",
          data: {stateId:state},         
          success: function(data){
            jQuery('#district_id #district').html(data);
          },
          error: function(){
            alert('Something is wrong !');
          },                    
        });
      }    
    });        
});