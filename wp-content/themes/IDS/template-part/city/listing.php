<?php

/** *************************** RENDER TEST PAGE ********************************
 *******************************************************************************
 * This function renders the admin page and the example list table. Although it's
 * possible to call prepare_items() and display() from the constructor, there
 * are often times where you may need to include logic here between those steps,
 * so we've instead called those methods explicitly. It keeps things flexible, and
 * it's the way the list tables are used in the WordPress core.
 */
    
    //Create an instance of our package class...
    $testListTable = new IDS_District_List_Table();
    //Fetch, prepare, sort, and filter our data...
    $testListTable->prepare_items();
    
    ?>
    <div class="wrap">    
        <div id="icon-users" class="icon32"><br/></div>
          <h1 class="wp-heading-inline">
            Cities
          </h1>
          <?php echo $message; ?>
        <a href="<?php echo admin_url('admin.php?page=add-new-city','admin'); ?>&&amp;action=add" class="page-title-action">Add New</a>
        <!-- Forms are NOT created automatically, so you need to wrap the table in one to use features like bulk actions -->
        <form id="movies-filter" method="post" action="">
            <!-- Now we can render the completed list table -->
            <?php 
              $testListTable->search_box( 'search', 'search_id' );            
            ?>
        </form>
        <form method="post" action="">
            <?php $testListTable->display(); ?> 
        </form>          
        
    </div>