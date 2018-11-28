<?php
  include_once('../wp-config.php');
  global $wpdb;
  $t1 = $wpdb->prefix . STATE;
  $t2 = $wpdb->prefix . DISTRICT;

  DependentTable('CountryId' , $t1 , 'country_id' , $_REQUEST['state_id'] , 'State');
  DependentTable('stateId' , $t2 , 'state_id' , $_REQUEST['state_id'] , 'District');
?>