<?php if(isset($error)): ?>
<div class="alert alert-error"><?=$error;?></div>
<?php elseif(isset($success)): ?>
<div class="alert alert-success"><?=$success;?></div>
<?php endif; ?>

<?php echo form_open_multipart('', array('method' => 'post')); ?>
<div class="clearfix">
    <div class="span3">
        <div class="">
            <label>Product details</label>
            <p>Write a name and description, and provide a type and vendor to categorize this product.</p>
        </div>
    </div>
    <div class="span9">
        <div>
            <label for="product_name">Product Name</label>
            <div>
                <input type="text" class="input-block-level" id="product_name" name="product_name" value="<?php echo set_value('product_name'); ?>" autofocus />
            </div>
        </div>
        <div>
            <label for="prod_desc">Description</label>
            <div>
                <textarea class="input-block-level" id="prod_desc" name="prod_desc"><?php echo set_value('prod_desc'); ?></textarea><br />
            </div>
        </div> <!-- name and description -->
        
        <div class="clearfix">
            <div class="pull-left">
                <label for="category_name">Category / Theme Name</label>
                <div>
                    <select id="category_name" name="category_name[]" multiple="multiple" data-placeholder="" class="input-xxlarge">
                    	<?php foreach($categories as $category): ?>
                        <option value="<?=$category->category_id;?>" <?php echo set_select('category_name', $category->category_id);?>><?=$category->category_name;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="pull-left margin-left">
                <label for="prod_artisan">Artisan</label>
                <div>
                    <select name="prod_artisan" id="prod_artisan">
                        <option value="">-</option>
                        <?php foreach($artisans as $artisan): ?>
                        <option value="<?=$artisan->artisan_id;?>" <?php echo set_select('prod_artisan', $artisan->artisan_id); ?>><?=$artisan->artisan_name;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div><!--  category row -->
        
        <div class="clearfix margin-top">
        	<div class="pull-left">
                <label for="prod_price">Price</label>
                <div>
                    <input type="text" class="" id="product_price" name="product_price" value="<?php echo set_value('product_price'); ?>" />
                </div>
            </div>
        	<div class="pull-left margin-left">
                  <label for="prod_weight">Weight <span class="muted">(kg) - Optional</span></label>
                  <div>
                      <input type="text" class="" id="product_weight" name="product_weight" value="<?php echo set_value('product_weight'); ?>" />
                  </div>
            </div>
            <div class="pull-left margin-left">
                <label for="prod_quantity">SKU <span class="muted">(Stock Keeping Unit)</span></label>
                <div>
                    <input type="text" class="" id="product_quantity" name="product_quantity" value="<?php echo set_value('product_quantity'); ?>" />
                </div>
            </div>
        </div><!-- price, sku and weight row -->
    </div>
</div>
<hr />

<!--<div class="clearfix">
    <div class="span3">
        <div class="">
            <label>Inventory &amp; variants</label>
            <p>Manage inventory, and configure the options for selling this product.</p>
        </div>
    </div>
    <div class="span9">
        <div class="clearfix margin-top">
        	<div class="pull-left">
                <label for="prod_options">
                	<input type="checkbox" class="ace" id="prod_options" /><span class="lbl"></span> This product has multiple options <span class="muted">(e.g. Multiple sizes and/or colors)</span>
                </label>
                <div class="well well-small clearfix" id="options-main-container">
                	<div id="option-container">
                        <div class="pull-left">
                            <label for="option_name">Option Name</label>
                            <div>
                                <input type="text" class="" id="option_name" name="option_name[]" />
                            </div>
                        </div>
                        <div class="pull-left margin-left fluid">
                            <label for="option_value">Option Values</label>
                            <div>
                                <input type="text" class="input-xxlarge" id="option_value" name="option_value[]" />
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<hr />-->

<div class="clearfix">
    <div class="span3">
        <div class="">
            <label>Product Image</label>
            <p>Upload image of this product.</p>
        </div>
    </div>
    <div class="span9">
    	<div class="clearfix">
        	<div class="pull-left"><input type="file" accept="image/*" name="product_image" id="product_image" /></div>
        </div>
    </div>
</div>
<hr />

<div class="clearfix">
	<div class="pull-right">
    	<a href="<?=site_url('dashboard/products');?>" class="btn">Cancel</a>
    	<button type="submit" class="btn btn-primary" name="save_product"><i class="icon-save"></i> Save</button>
    </div>
</div>
<?php echo form_close(); ?>
