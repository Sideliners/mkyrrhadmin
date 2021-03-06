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
        <textarea class="input-block-level limited" id="artisan_description" name="artisan_description" rows="5"><?php echo $artisan->artisan_description; ?></textarea>
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
    	<div class="margin-bottom">
            <label for="is_primary">
                <input type="checkbox" id="is_primary" name="is_primary" value="1" class="ace" />
                <span class="lbl">&nbsp;Primary Image</span>
             </label>
        </div>
    	<div class="margin-top clearfix" style="min-height: 200px;">
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


<!-- photo -->
<div id="add-product-modal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add product</h3>
    </div>
    <?=form_open_multipart('', array('method' => 'post', 'class' => 'no-margin'));?>
    <div class="modal-body">
    	<div>Choose a product of this Artisan</div>
        <div>
        	<select id="product_list" name="product_list[]" multiple="multiple" data-placeholder="Choose collection" class="chosen-select tag-input-style" required>
				<?php foreach($product_list as $product): ?>
                <option value="<?=$product->product_id;?>" <?php echo set_select('product_list[]', $product->product_id);?>><?=$product->product_name;?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="submit" id="save_artisan_product" name="save_artisan_product" class="btn btn-primary btn-mini">Submit</button>
    </div>
    <?=form_close();?>
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

<div id="delete-artisan" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete  <font style="font-style: italic;">'<?=$artisan->artisan_name; ?>'</font></h3>
    </div>
    <div class="modal-body">
    	<label for="artisan_name">        
        	<p>Do you really want to delete this artisan?</p>
	        <p class="alert"><strong>WARNING!</strong> Related products and articles will also be deleted!</p>
         </label>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="delete-msg"></div>
        </div>
        <div class="pull-right">
        	<div id="modal-buttons">
        		<button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">No</button>
        		<button type="button" id="btn_del_art" name="btn_del_art" class="btn btn-primary btn-mini" data-artisan-id="<?=$artisan->artisan_id;?>">Yes</button>
                <button type="button" id="close_btn" class="btn btn-mini" data-dismiss="modal" aria-hidden="true" style="display: none;">Close</button>
            </div>
        </div>
    </div>
</div>