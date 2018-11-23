<div class="wrap">
  <h1 class="wp-heading-inline">
    Country
  </h1>
  <a href="<?php echo admin_url('?page=manage-location-option','admin'); ?>&&amp;action=add" class="page-title-action">Add New</a>
  <hr class="wp-header-end">
    <h2 class="screen-reader-text">
      Filter posts list
    </h2>
    <ul class="subsubsub">
      <li class="all"><a href="edit.php?post_type=post" class="current" aria-current="page">All <span class="count">(<?php echo $rowCount; ?>)</span></a> |</li>
    </ul>
    <form id="posts-filter" method="post">
      <?php echo $message; ?>
      <p class="search-box">
        <label class="screen-reader-text" for="post-search-input">Search Posts:</label>
        <input 
          type="search" 
          id="post-search-input" 
          name="searchBar" 
          value="<?php echo empty($searchBar) ? '' : $searchBar; ?>">
        <input type="submit" id="search-submit" class="button" value="Search Posts">
      </p> 
      <div class="tablenav top">
        <div class="alignleft actions bulkactions">
          <label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label>
          <select name="multiAction" id="bulk-action-selector-top">
            <option value="">Bulk Actions</option>
            <option value="deleted">Move to Trash</option>
          </select>
          <input type="submit" id="doaction" class="button action" value="Apply">
        </div>
        <div class="tablenav-pages one-page">
          <span class="displaying-num"><?php echo $rowCount; ?> items</span>
        </div>
        <br class="clear">
      </div>  
      <table class="wp-list-table widefat fixed striped posts">
        <thead>
          <tr>
            <?php 
              
              $tableHead = [
                'author'      => 'Author',
                'description' => 'Description'
              ];
              renderTableHead($tableHead , $order); 
              OrderIcon('Countries' , 'title' , $order);
            ?>            
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
          <?php renderTableHead($tableHead , $order); ?>
        </tr>
        </tfoot>
      </table>
<!--     <div class="tablenav bottom">

      <div class="alignleft actions bulkactions">
        <label for="bulk-action-selector-bottom" class="screen-reader-text">Select bulk action</label><select name="action2" id="bulk-action-selector-bottom">
          <option value="-1">Bulk Actions</option>
          <option value="edit" class="hide-if-no-js">Edit</option>
          <option value="trash">Move to Trash</option>
        </select>
        <input type="submit" id="doaction2" class="button action" value="Apply">
      </div>
      <div class="alignleft actions"></div>
      <div class="tablenav-pages one-page">
        <span class="displaying-num">2 items</span>
        <span class="pagination-links">
          <span class="tablenav-pages-navspan" aria-hidden="true">«</span>
        <span class="tablenav-pages-navspan" aria-hidden="true">‹</span>
        <span class="screen-reader-text">Current Page</span>
        <span id="table-paging" class="paging-input">
          <span class="tablenav-paging-text">1 of 
            <span class="total-pages">1</span>
          </span>
        </span>
        <span class="tablenav-pages-navspan" aria-hidden="true">›</span>
        <span class="tablenav-pages-navspan" aria-hidden="true">»</span></span>
    </div>
      <br class="clear">
    </div> -->
  </form>  
</div>