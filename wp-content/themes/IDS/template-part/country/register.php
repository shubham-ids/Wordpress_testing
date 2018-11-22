<?php
  if(isset($_REQUEST['register'])){
    echo "Here";
  }
?>
<form method="post">
  <div class="wrap">
    <h1 class="wp-heading-inline">Add New Country</h1>
    <div id="poststuff">
      <div id="post-body" class="metabox-holder columns-2">
        <div id="post-body-content" style="position: relative;">
          <div id="titlediv">
            <div  class="contentField"> 
              <input type="text" placeholder="Enter Country Name" name="post_title" size="30" value="" id="title" spellcheck="true" autocomplete="off">
            </div>        
            <div id="titlewrap">
              <textarea class="wp-editor-area" style="width: 100%; height: 300px;" autocomplete="off" cols="40" name="content" id="content" placeholder="Enter Description"></textarea>
            </div>          
          </div>        
        </div>
        <div id="postbox-container-1" class="postbox-container">
          <div id="side-sortables" class="meta-box-sortables ui-sortable" style="">
            <div id="submitdiv" class="postbox ">
              <h2 class="hndle ui-sortable-handle"><span>Publish</span></h2>
              <div class="inside">
                <div class="submitbox" id="submitpost">
                  <div id="major-publishing-actions">
                    <div id="publishing-action">
                      <span class="spinner"></span>
                      <input type="submit" name="register" id="publish" class="button button-primary button-large" value="Publish">
                    </div>
                    <div class="clear"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>       
     </div>
  </div>
</form> 




