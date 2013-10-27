<div id="upload_enterprise_image" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Upload image</h3>
    </div>
    <?=form_open_multipart('', array('method' => 'post', 'class' => 'no-margin'));?>
    <div class="modal-body">
    	<div class="clearfix" style="min-height: 200px;">
        	<div class="ace-file-input clearfix">
                <input type="file" id="enterprise_image" name="enterprise_image" accept="image/*" />
            </div>
        </div>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="submit" id="save_enterprise_image" name="save_enterprise_image" class="btn btn-primary btn-mini">Save</button>
    </div>
    <?=form_close();?>
</div>

<div id="edit-enterprise-name" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Change Name</h3>
    </div>
    <div class="modal-body">
    	<label for="enterprise_name">Enterprise name</label>
        <input type="text" class="input-block-level" id="enterprise_name" name="enterprise_name" value="<?php echo $enterprise->enterprise_name; ?>" autofocus />
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="button" id="save_enterprise_name" name="save_enterprise_name" class="btn btn-primary btn-mini" data-enterprise-id="<?=$enterprise->enterprise_id;?>">Save</button>
    </div>
</div>

<div id="edit-enterprise-description" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Edit Description</h3>
    </div>
    <div class="modal-body">
    	<label for="enterprise_name">Description</label>
        <textarea class="input-block-level autosize-transition" id="enterprise_description" name="enterprise_description"><?php echo $enterprise->enterprise_description; ?></textarea>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="button" id="save_enterprise_description" name="save_enterprise_description" class="btn btn-primary btn-mini" data-enterprise-id="<?=$enterprise->enterprise_id;?>">Save</button>
    </div>
</div>

<div id="delete-enterprise" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete <font style="font-style: italic;">'<?=$enterprise->enterprise_name; ?>'</font></h3>
    </div>
    <div class="modal-body">
    	<label for="enterprise_name">        
        	<p>Do you really want to delete this enterprise?</p>
	        <p class="alert"><strong>WARNING!</strong> Related artisans, products and articles will also be deleted!</p>
         </label>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="delete-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">No</button>
        <button type="button" id="btn_del_enterprise" name="btn_del_enterprise" class="btn btn-primary btn-mini" data-enterprise-id="<?=$enterprise->enterprise_id;?>">Yes</button>
    </div>
</div>