<div class="wrap">
  <h1 class="wp-heading-inline">Countries</h1>
  <a href="<?php echo admin_url('?page=manage-location-option','admin'); ?>&&amp;action=add" class="page-title-action">Add New</a>
  <hr class="wp-header-end">
    <h2 class="screen-reader-text">Filter posts list</h2>
    <ul class="subsubsub">
      <li class="all"><a href="edit.php?post_type=post" class="current" aria-current="page">All <span class="count">(2)</span></a> |</li>
  <li class="publish"><a href="edit.php?post_status=publish&amp;post_type=post">Published <span class="count">(2)</span></a></li>
</ul>
<form id="posts-filter" method="get">
  <?php echo $message; ?>
  <p class="search-box">
    <label class="screen-reader-text" for="post-search-input">Search Posts:</label>
    <input type="search" id="post-search-input" name="s" value="">
    <input type="submit" id="search-submit" class="button" value="Search Posts"></p> 
  <div class="tablenav top">
    <div class="alignleft actions bulkactions">
      <label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label><select name="action" id="bulk-action-selector-top">
      <option value="-1">Bulk Actions</option>
      </select>
      <input type="submit" id="doaction" class="button action" value="Apply">
    </div>

    <div class="tablenav-pages one-page">
      <span class="displaying-num">2 items</span>
    </div>
    <br class="clear">
  </div>

  <table class="wp-list-table widefat fixed striped posts">
    <thead>
    <tr>
      <td id="cb" class="manage-column column-cb check-column">
        <label class="screen-reader-text" for="cb-select-all-1">Select All</label>
        <input id="cb-select-all-1" type="checkbox">
      </td>
      <th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
        <a href="<?php echo admin_url('admin.php?page=manage-location-option','admin')?>?orderby=title&amp;order=asc">
          <span>Countries</span>
          <span class="sorting-indicator"></span>
        </a>
      </th>
      <th scope="col" id="author" class="manage-column column-author">Author</th>
      <th scope="col" id="categories" class="manage-column column-categories">Description</th>
      <th scope="col" id="date" class="manage-column column-date sortable asc">
        <a href="http://localhost/wordpress/wp-admin/edit.php?orderby=date&amp;order=desc"><span>Date</span>
          <span class="sorting-indicator"></span>
        </a>
      </th> 
    </tr>
    </thead>
<?php
  foreach($result as $row){ ?>
    <tbody id="the-list">
        <tr id="post-1" class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry category-uncategorized">
        <th scope="row" class="check-column"> 
          <label class="screen-reader-text" for="cb-select-1">Select Hello world!</label>
          <input id="cb-select-1" type="checkbox" name="post[]" value="1">
        </th>
          <td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
            <div class="locked-info">
              <span class="locked-avatar"></span> 
              <span class="locked-text"></span>
            </div>
            <strong>
              <a class="row-title" href="<?php echo admin_url('?page=manage-location-option','admin'); ?>&post=<?php echo $row->id; ?>&amp;action=edit" aria-label="“Hello world!” (Edit)"><?php echo $row->title; ?></a>
            </strong>
            <div class="hidden" id="inline_1">
              <div class="post_title">Hello world!</div><div class="post_name">hello-world</div>
              <div class="post_format">
                
              </div>
            </div>
            <div class="row-actions">
              <span class="edit"><a href="<?php echo admin_url('?page=manage-location-option','admin'); ?>&post=<?php echo $row->id; ?>&amp;action=edit" aria-label="Edit “Hello world!”">Edit</a> | </span>
              <span class="trash">
                <a href="<?php echo admin_url('admin.php?page=manage-location-option','admin'); ?>&task=delete&post=<?php echo $row->id; ?>" class="submitdelete" aria-label="Move “Hello world!” to the Trash">Trash
                </a>
              </span>
            </div>
            <button type="button" class="toggle-row">
              <span class="screen-reader-text">Show more details</span>
            </button>
          </td>
          <td class="author column-author" data-colname="Author">
            <a href="edit.php?post_type=post&amp;author=1">shubham kumar</a>
          </td>
          <td class="categories column-categories" data-colname="Categories">
            <a href="edit.php?category_name=uncategorized">
              <?php $string = $row->description; echo mb_strimwidth($string, 0, 30, "....."); ?>
            </a>
          </td>
          <td class="date column-date" data-colname="Date">Published<br>
            <abbr title="2018/11/20 7:13:02 am"><?php echo $row->create_on; ?></abbr>
          </td>
        <?php } ?>           
      </tr>
    </tbody>
    <tfoot>
    <tr>
      <td class="manage-column column-cb check-column">
        <label class="screen-reader-text" for="cb-select-all-2">Select All</label>
        <input id="cb-select-all-2" type="checkbox">
      </td>
      <th scope="col" class="manage-column column-title column-primary sortable desc">
        <a href="http://localhost/wordpress/wp-admin/edit.php?orderby=title&amp;order=asc">
          <span>Title</span>
          <span class="sorting-indicator"></span>
        </a>
      </th>
      <th scope="col" class="manage-column column-author">Author</th>
      <th scope="col" class="manage-column column-categories">Description</th>
      <th scope="col" class="manage-column column-date sortable asc">
        <a href="http://localhost/wordpress/wp-admin/edit.php?orderby=date&amp;order=desc">
          <span>Date</span>
          <span class="sorting-indicator"></span>
        </a>
      </th>
    </tr>
    </tfoot>
  </table>
  <div class="tablenav bottom">
    <div class="alignleft actions bulkactions">
      <label for="bulk-action-selector-bottom" class="screen-reader-text">Select bulk action</label>
      <select name="action2" id="bulk-action-selector-bottom">
        <option value="">Select</option>
        <option value="deleted">Bulk Actions</option>
      </select>
      <input type="submit" id="doaction2" class="button action" value="Apply">
    </div>
    <div class="alignleft actions"></div>
    <div class="tablenav-pages one-page">
      <span class="displaying-num">2 items</span>
    </div>
    <br class="clear">
  </div>
</form>