<?php echo (isset($response))? $response : ''; ?>

<?php echo form_open_multipart('', array('method' => 'post')); ?>
<div class="clearfix">
	<div class="span3 clearfix" id="thumbnail">
        <label for="collection">Collection</label>
    	 Description for Collection
    </div>
    <div class="span9">
        <div>
            <label for="collection_name">Collection Name</label>
            <div>
                <input type="text" class="input-block-level" id="collection_name" name="collection_name" value="<?php echo set_value('collection_name'); ?>" autofocus required />
            </div>
        </div>
    </div>
</div>
<hr />

<div class="clearfix">
	<div class="pull-right">
    	<button type="button" class="btn" onclick="window.history.back()">Cancel</button>
    	<button type="submit" class="btn btn-primary" name="save_collection"><i class="icon-save"></i> Save</button>    
    </div>
</div>
<?php echo form_close(); ?>
