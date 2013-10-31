<div id="update-account-modal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Update Information</h3>
    </div>
    <div class="modal-body">
        <div>
            <?=form_open('', array('method' => 'post', 'role' => 'form'));?>
            <?=form_close();?>
        </div>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="button" id="save_profile" name="save_profile" class="btn btn-primary btn-mini">Save</button>
    </div>
</div>
