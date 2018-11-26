<div class="wrap">
  <h1 class="wp-heading-inline">
    Country
  </h1>
  <a href="<?php echo admin_url('?page=manage-location-option','admin'); ?>&action=add" class="page-title-action">Add New</a>
  <hr class="wp-header-end">
    <h2 class="screen-reader-text">
      Filter posts list
    </h2>
    <ul class="subsubsub">
      <li class="all"><a href="edit.php?post_type=post" class="current" aria-current="page">All <span class="count">(<?php echo $rowCount; ?>)</span></a> |</li>
    </ul>
    <form id="posts-filter" method="post">
      <?php echo $message; ?>
      <?php 
        addSearchField('searchBar' , $searchBar);
        $addOption = [
          ''        => 'Bulk Actions',
          'deleted' => 'Move to Trash'
        ];
        addBulkactionField('top' , $addOption , 'multiAction' , $rowCount);
      ?>      
      <table class="wp-list-table widefat fixed striped posts">
        <thead>
          <tr>
            <td id="cb" class="manage-column column-cb check-column">
              <label class="screen-reader-text" for="cb-select-all-1">Select All</label>
              <input id="cb-select-all-1" type="checkbox">
            </td>         
            <th 
              scope="col" 
              id="title" 
              class="manage-column column-title column-primary sortable desc">
              <a href="<?php echo admin_url('admin.php?page=manage-location-option','admin')?>&order-by=title&order=<?php echo $order == 'desc'?'asc':'desc'; ?>">
              <span>Countries</span>
              <span class="sorting-indicator"></span>
              </a>
            </th>              
            <?php ; 
              $tableHead = [
                'author'      => 'Author',
                'description' => 'Description'
              ];
              renderTableHead($tableHead , $order);  
            ?>   

           <th scope="col" id="date" class="manage-column column-date sortable asc">
            <a href="http://localhost/wordpress/wp-admin/edit.php?orderby=date&amp;order=desc"><span>Date</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>          
          </tr>
        </thead>
        <tbody id="the-list">
          <?php 
            foreach( $result as $row ){
          ?>
          <tr id="post-1" class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry category-uncategorized">
            <th scope="row" class="check-column"> 
              <label class="screen-reader-text" for="cb-select-<?php echo $row->id; ?>""></label>
              <input id="cb-select-<?php echo $row->id; ?>" type="checkbox" name="users[]" value="<?php echo $row->id; ?>">
            </th>
             <td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
                <strong>
                  <a class="row-title" href="<?php echo admin_url('?page=manage-location-option','admin'); ?>&post=<?php echo $row->id; ?>&amp;action=edit"><?php echo $row->title; ?></a>
                </strong>

                <div class="row-actions">
                  <span class="edit"><a href="<?php echo admin_url('?page=manage-location-option','admin'); ?>&post=<?php echo $row->id; ?>&amp;action=edit">Edit</a> | </span>
                  <span class="trash">
                    <a href="<?php echo admin_url('admin.php?page=manage-location-option','admin'); ?>&task=delete&post=<?php echo $row->id; ?>" class="submitdelete">Trash
                    </a>
                  </span>
                </div>
              </td>
              <td class="author column-author" data-colname="Author">
                <a href="edit.php?post_type=post&amp;author=1">shubham kumar</a>
              </td>
              <td class="categories column-categories" data-colname="Categories">
                <a href="edit.php?category_name=uncategorized">
                  <?php $string = $row->description; echo mb_strimwidth($string, 0, 30, "....."); ?>
                </a>
              </td>
              <td class="date column-date" data-colname="Date">
                <abbr title="<?php echo $row->create_on; ?>"><?php echo $row->create_on; ?></abbr>
              </td>   
          </tr>
        <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <td id="cb" class="manage-column column-cb check-column">
              <label class="screen-reader-text" for="cb-select-all-1">Select All</label>
              <input id="cb-select-all-1" type="checkbox">
            </td>     
            <?php renderTableHead($tableHead , $order); ?>
            <th 
              scope="col" 
              id="title" 
              class="manage-column column-title column-primary sortable desc">
              <a href="<?php echo admin_url('admin.php?page=manage-location-option','admin')?>&order-by=title&order=<?php echo $order == 'desc'?'asc':'desc'; ?>">
              <span>Countries</span>
              <span class="sorting-indicator"></span>
              </a>
            </th>                         
          </tr>
        </tfoot>
      </table>
      <?php 
        addBulkactionField('bottom' , $addOption , 'multiAction' , $rowCount);
      ?>
      <div class='pagination'>
       <?php 
          for($j=1; $j <= $totalpages; $j++){ 
            $className  = ($j == $currentPage)? 'current' : '';
            $linkOnload = ($j == $currentPage)? '#' : '';
         ?>
        <span class="<?php echo $className; ?>">
          <a href="<?php echo admin_url('admin.php?page=manage-location-option','admin'); ?>&searchBar=<?php echo $searchBar; ?>&pageNo=<?php echo $j.$linkOnload; ?>"><?php echo $j; ?></a>
        </span>
      <?php } ?>              
<!--        <span class='current'>1</span>
       <a href="https://kriesi.at/blog/page/2">2</a>
       <a href="https://kriesi.at/blog/page/3">3</a>
       <a href="https://kriesi.at/blog/page/2">›</a>
       <a href="https://kriesi.at/blog/page/12">»</a> -->
      </div>      
  </form>  
</div>