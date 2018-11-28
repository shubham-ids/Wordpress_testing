jQuery(document).ready(function(){
  jQuery( "#custom_text" ).autocomplete({
    source: "search.php",
  });
  jQuery( ".custom_text" ).autocomplete({
    source: "search.php",
  });  
});