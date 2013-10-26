<!-- name -->
<div id="edit-artisan-name" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Change name</h3>
    </div>
    <div class="modal-body">
    	<label for="artisan_name">Artisan name</label>
        <input type="text" class="input-block-level" id="artisan_name" name="artisan_name" value="<?=$artisan->artisan_name; ?>" autofocus />
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="button" id="save_art_name" name="save_art_name" class="btn btn-primary btn-mini" data-artisan="<?=$artisan->artisan_id;?>">Save</button>
    </div>
</div>

<!-- desc -->
<div id="edit-artisan-desc" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Edit description</h3>
    </div>
    <div class="modal-body">
    	<label for="artisan_name">Description</label>
        <textarea class="input-block-level autosize-transition" id="artisan_description" name="artisan_description"><?php echo $artisan->artisan_description; ?></textarea>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="button" id="save_art_desc" name="save_art_desc" class="btn btn-primary btn-mini" data-artisan="<?=$artisan->artisan_id;?>">Save</button>
    </div>
</div>

<!-- photo -->
<div id="upload_artisan_image" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Upload image</h3>
    </div>
    <?=form_open_multipart('', array('method' => 'post', 'class' => 'no-margin'));?>
    <div class="modal-body">
    	<div class="clearfix" style="min-height: 200px;">
        	<div class="ace-file-input clearfix">
                <input type="file" id="artisan_image" name="artisan_image" accept="image/*" />
            </div>
        </div>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="submit" id="save_artisan_image" name="save_artisan_image" class="btn btn-primary btn-mini">Save</button>
    </div>
    <?=form_close();?>
</div>