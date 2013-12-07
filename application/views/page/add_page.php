<?php if(isset($response)) echo $response;?>
<?php echo form_open_multipart('', array('method' => 'post', 'role' => 'form')); ?>
<div class="clearfix">
    <div class="span3">
        <div class="">
            <label>Page details</label>
            <p>Write a name and description, and provide a body for this page.</p>
        </div>
    </div>
    <div class="span9">
        <div>
            <label for="page_name">Page Name <?=form_error('page_name','<span class="label label-danger arrowed">', '</span>');?></label>
            <div>
                <input type="text" class="input-block-level clean-name" clean-name-output="page_uri" id="page_name" name="page_name" value="<?php echo set_value('page_name'); ?>" autofocus  />
            </div>
        </div>
		<div>
            <label for="page_uri">Page URI <strong><span id="display-url"></span></strong> <?=form_error('page_uri','<span class="label label-danger arrowed">', '</span>');?></label>
            <div>				
                <input type="text" class="input-block-level" id="page_uri" name="page_uri" value="<?php echo set_value('page_uri'); ?>" />
            </div>
        </div>
        <div>
            <label for="page_description">Description <?=form_error('page_description','<span class="label label-danger arrowed">', '</span>');?></label>
            <div>
                <textarea class="form-control input-block-level" id="page_description" name="page_description" rows="5" ><?php echo set_value('page_description'); ?></textarea>
            </div>
        </div> <!-- name and description -->
        
        <div>
            <label for="page_body">Body <?=form_error('page_body','<span class="label label-danger arrowed">', '</span>');?></label>
            <div>
                <textarea class="form-control input-block-level" id="page_body" name="page_body" rows="5" ><?php echo set_value('page_body'); ?></textarea>
            </div>
        </div> <!-- body -->
    </div>
</div>
<hr />

<div class="clearfix">
	<div class="pull-right">
    	<button type="button" class="btn" onclick="window.history.back()">Cancel</button>
    	<button type="submit" class="btn btn-primary" name="save_page"><i class="icon-save"></i> Save</button>
    </div>
</div>
<?php echo form_close(); ?>
