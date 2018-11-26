<?php
  $task         = isset($_REQUEST['task'])        ? $_REQUEST['task'] :'';
  $multiAction  = isset($_REQUEST['multiAction']) ? $_REQUEST['multiAction'] :'';
  $user         = (isset($_REQUEST['users']))     ? $_REQUEST['users']    : '';
  $orderBy      = isset($_REQUEST['order-by'])      ? $_REQUEST['order-by']    : "";
  $order        = isset($_REQUEST['order'])         ? $_REQUEST['order']       : 'DESC';    
  $searchBar    = (isset($_REQUEST['searchBar']) )  ? $_REQUEST['searchBar']   : ''; 
?>