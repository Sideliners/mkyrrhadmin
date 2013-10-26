<!-- name -->
<div id="update_prod_name" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Edit Product Name</h3>
    </div>
    <div class="modal-body">
        <label>Product Name</label> <input type="text" class="input-block-level" id="prod_name" name="prod_name" value="<?=$product->product_name;?>" required />
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="button" name="save_prodname" id="save_prodname" class="btn btn-primary btn-mini" data-product-id="<?=$this->uri->segment(2);?>">Update</button>
    </div>
</div>

<!-- description -->
<div id="edit_prod_desc" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Edit description</h3>
    </div>
    <div class="modal-body">
    	<textarea name="prod_desc" id="prod_desc" class="input-block-level" rows="10"><?=$product->product_description;?></textarea>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="submit" id="save_desc" name="save" class="btn btn-primary btn-mini" data-product-id="<?=$this->uri->segment(2);?>">Save</button>
    </div>
</div>

<!-- details -->
<div id="update_details_modal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Update Product Details</h3>
    </div>
    <div class="modal-body">
        <div>
        	<dl class="dl-horizontal">
            	<dt>Price</dt>
                <dd><input type="text" id="prod_price" name="prod_price" value="<?=$product->price;?>" /></dd>
                <dt>Weight (kg)</dt>
                <dd><input type="text" id="prod_weight" name="prod_weight" value="<?=$product->weight;?>" /></dd>
                <dt>Height (cm)</dt>
                <dd><input type="text" id="prod_height" name="prod_height" value="<?=$product->height;?>" /></dd>
                <dt>SKU</dt>
                <dd><input type="text" id="prod_stock" name="prod_stock" value="<?=$product->product_quantity;?>" /></dd>
            </dl>
        </div>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="button" name="update_artisan" id="update_details" class="btn btn-primary btn-mini" data-product-id="<?=$this->uri->segment(2);?>">Update</button>
    </div>
</div>

<!-- image -->
<div id="upload_prod_image" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Upload image</h3>
    </div>
    <?=form_open_multipart('', array('method' => 'post', 'class' => 'no-margin'));?>
    <div class="modal-body">
        <div class="clearfix" style="min-height: 200px;">
            <div class="ace-file-input clearfix">
                <input type="file" id="product_image" class="product_image" name="product_image" accept="image/*" />
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <div class="pull-left">
            <div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="submit" id="save_prod_image" name="save_prod_image" class="btn btn-primary btn-mini">Save</button>
    </div>
    <?=form_close();?>
</div>

<!-- update status -->
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

<!-- delete modal -->
<div id="delete-product" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete <font style="font-style: italic;">'<?=$product->product_name;?>'</font></h3>
    </div>
    <div class="modal-body">
        <div id="modal-message">
         	<label for="artisan_name">        
    	    	<p>Do you really want to delete this product?</p>
	    	    <p class="alert"><strong>WARNING!</strong> Product article will also be deleted!</p>
	         </label>
        </div>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="delete-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">No</button>
        <button type="button" id="btn_del_product" name="btn_del_product" class="btn btn-primary btn-mini" data-product-id="<?=$this->uri->segment(2);?>">Yes</button>        
    </div>
</div>

<!-- album -->
<div id="upload_product_image" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Upload image</h3>
    </div>
    <?=form_open_multipart('', array('method' => 'post', 'class' => 'no-margin'));?>
    <div class="modal-body">
    	<div class="clearfix" style="min-height: 200px;">
        	<div class="ace-file-input clearfix">
                <input type="file" id="product_album_image" class="product_image" name="product_image" accept="image/*" />
            </div>
        </div>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="submit" id="save_album_image" name="save_album_image" class="btn btn-primary btn-mini">Save</button>
    </div>
    <?=form_close();?>
</div>
