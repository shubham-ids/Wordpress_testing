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
});