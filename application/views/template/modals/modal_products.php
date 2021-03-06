<div id="update_prod_name" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Edit Product Name</h3>
    </div>
    <div class="modal-body">
    	<div id="progress"></div>
    	<div id="textfield" style="display: none;">
        	<input type="text" id="prod_name" name="prod_name" value="<?=$prod->product_name;?>" />
        </div>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="button" name="save_prodname" id="save_prodname" class="btn btn-primary btn-mini" data-product-id="<?=$this->uri->segment(2);?>">Update</button>
    </div>
</div>

<div id="edit_prod_desc" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Edit description</h3>
    </div>
    <div class="modal-body">
    	<div id="progress"></div>
    	<div id="textfield" style="display: none;">
        	<textarea name="prod_desc" id="prod_desc"></textarea>
        </div>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="submit" id="save_desc" name="save" class="btn btn-primary btn-mini">Save</button>
    </div>
</div>

<div id="add_category_modal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Update Category</h3>
    </div>
    <div class="modal-body">
    	<div id="progress"></div>
        <div>
        	<label for="category_name">Choose a category</label>
            <div>
                <select id="category_name" name="category_name[]" multiple="multiple" data-placeholder="" class="input-xxlarge">
                    <?php foreach($categories as $category): ?>
                    <option value="<?=$category->category_id;?>"><?=$category->category_name;?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="button" name="update_cat" id="update_cat" class="btn btn-primary btn-mini">Update</button>
    </div>
</div>

<div id="update_artisan_modal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Update Product Artisan</h3>
    </div>
    <div class="modal-body">
        <div>
        	<label for="prod_artisan">
            	Select Artisan&nbsp;&nbsp;
            	<select name="prod_artisan" id="prod_artisan">
                      <option value="">-</option>
                      <?php foreach($artisans as $artisan): ?>
                      <option value="<?=$artisan->artisan_id;?>" <?php echo set_select('prod_artisan', $artisan->artisan_id); ?>><?=$artisan->artisan_name;?></option>
                      <?php endforeach; ?>
                  </select>
            </label>
        </div>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="button" name="update_artisan" id="update_artisan" class="btn btn-primary btn-mini">Update</button>
    </div>
</div>

<div id="update_details_modal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Update Product Details</h3>
    </div>
    <div class="modal-body">
        <div>
        	<dl class="dl-horizontal">
            	<dt>Price</dt>
                <dd><input type="text" id="prod_price" name="prod_price" value="<?=$prod->product_price;?>" /></dd>
                <dt>Weight (kg)</dt>
                <dd><input type="text" id="prod_weight" name="prod_weight" value="<?=$prod->weight;?>" /></dd>
                <dt>SKU</dt>
                <dd><input type="text" id="prod_stock" name="prod_stock" value="<?=$prod->stock;?>" /></dd>
            </dl>
        </div>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="button" name="update_artisan" id="update_details" class="btn btn-primary btn-mini">Update</button>
    </div>
</div>

<div id="delete-product" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete <font style="font-style: italic;">'<?=$prod->product_name?>'</font></h3>
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
        <button type="button" id="btn_del_product" name="btn_del_product" class="btn btn-primary btn-mini" data-product-id="<?=$prod->product_id;?>">Yes</button>        
    </div>
</div>

<div id="prod_hl" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Confirm highlight</h3>
    </div>
    <div class="modal-body">
        <div id="modal-message">
        	<p>Are you sure to set this product as highlighted?</p>
            <p class="alert">NOTE : Only one product will become highlighted product.</p>
        </div>
    </div>
    <div class="modal-footer">
    	<div class="pull-left">
        	<div id="save-msg"></div>
        </div>
        <div id="action-btns">
            <button type="button" class="btn btn-mini" data-dismiss="modal" aria-hidden="true">No</button>
            <button type="submit" name="hl_product" id="hl_product" class="btn btn-primary btn-mini" data-product-id="<?=$this->uri->segment(2);?>" data-status="1">Yes</button>
        </div>
    </div>
</div>
