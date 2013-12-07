<!-- name -->
<div id="edit-page-name" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Change name</h3>
    </div>
    <div class="modal-body">
    	<label for="page_name">Page name</label>
        <input type="text" class="input-block-level" id="page_name" name="page_name" value="<?=$page_data->page_name; ?>" autofocus />
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="button" id="save_page_name" name="save_page_name" class="btn btn-primary btn-mini" data-page="<?=$page_data->page_id;?>">Save</button>
    </div>
</div>

<!-- description -->
<div id="edit-page-description" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Change description</h3>
    </div>
    <div class="modal-body">
    	<label for="page_description">Page description</label>
        <textarea class="form-control input-block-level" id="page_description" name="page_description" rows="5" ><?=$page_data->page_description; ?></textarea>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="button" id="save_page_description" name="save_page_description" class="btn btn-primary btn-mini" data-page="<?=$page_data->page_id;?>">Save</button>
    </div>
</div>

<!-- body -->
<div id="edit-page-body" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Change body</h3>
    </div>
    <div class="modal-body">
    	<label for="page_body">Page body</label>
        <textarea class="form-control input-block-level" id="page_body" name="page_body" rows="3" ><?=$page_data->page_body;?></textarea>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="button" id="save_page_body" name="save_page_body" class="btn btn-primary btn-mini" data-page="<?=$page_data->page_id;?>">Save</button>
    </div>
</div>

<div id="status-modal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"></h3>
    </div>
    <div class="modal-body">
	    <div id="modal-message">
        	<label>
    	    	<p>Do you really want to change current status of this <span id="update-status-type"></span>?</p>
                <h5 class="alert">
                    <strong> WARNING! </strong>
                    <span> Related Items will also be affected.
                    </span>
                </h5>
            </label>
        </div>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="label-msg"></div>
        </div>
        <div id="action-btns">
	        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">No</button>
    	    <button type="button" id="btn-status-yes" name="btn-status-yes" class="btn btn-primary btn-mini">Yes</button>
        </div>
    </div>
</div>

<div id="delete-page" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete  <font style="font-style: italic;">'<?=$page_data->page_name; ?>'</font></h3>
    </div>
    <div class="modal-body">
    	<label for="page_name">        
        	<p>Do you really want to delete this page?</p>
	        <p class="alert"><strong>WARNING!</strong> Related items will also be deleted!</p>
         </label>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="delete-msg"></div>
        </div>
        <div class="pull-right">
        	<div id="modal-buttons">
        		<button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">No</button>
        		<button type="button" id="btn_del_page" name="btn_del_page" class="btn btn-primary btn-mini" data-page-id="<?=$page_data->page_id;?>">Yes</button>
                <button type="button" id="close_btn" class="btn btn-mini" data-dismiss="modal" aria-hidden="true" style="display: none;">Close</button>
            </div>
        </div>
    </div>
</div>