<?php
  global $wpdb;
  $t1 = $wpdb->prefix . STATE;
  $t2 = $wpdb->prefix . DISTRICT;
  DependentTable(
  	'CountryId' ,
  	$t1 ,
  	'country_id' , 
  	empty($_REQUEST['state_id'] ) ? '' : $_REQUEST['state_id']);
  
  DependentTable(
  	'stateId' ,
  	$t2 , 
  	'state_id' , 
  	'district_id' , 
  	empty($_REQUEST['district_id'] ) ? '' : $_REQUEST['district_id']);
?>