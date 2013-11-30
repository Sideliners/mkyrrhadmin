<!-- name -->
<div id="edit-collection-name" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Change name</h3>
    </div>
    <div class="modal-body">
    	<label for="collection_name">Collection name</label>
        <input type="text" class="input-block-level" id="collection_name" name="collection_name" value="<?=$collection->collection_name; ?>" autofocus />
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="button" id="save_collection_name" name="save_collection_name" class="btn btn-primary btn-mini" data-collection="<?=$collection->collection_id;?>">Save</button>
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

<div id="delete-collection" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete  <font style="font-style: italic;">'<?=$collection->collection_name; ?>'</font></h3>
    </div>
    <div class="modal-body">
    	<label for="collection_name">        
        	<p>Do you really want to delete this collection?</p>
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
        		<button type="button" id="btn_del_collection" name="btn_del_collection" class="btn btn-primary btn-mini" data-collection-id="<?=$collection->collection_id;?>">Yes</button>
                <button type="button" id="close_btn" class="btn btn-mini" data-dismiss="modal" aria-hidden="true" style="display: none;">Close</button>
            </div>
        </div>
    </div>
</div>