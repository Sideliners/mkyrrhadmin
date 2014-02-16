<?php echo (isset($response))? $response : ''; ?>

<?php echo form_open_multipart('', array('method' => 'post', 'role' => 'form')); ?>
<div class="clearfix">
    <div class="span3">
        <div class="">
            <label>Product details</label>
            <p>Write a name and description, and provide a type and vendor to categorize this product.</p>
        </div>
    </div>
    <div class="span9">
        <div>
            <label for="product_name">Product Name <?=form_error('product_name','<span class="label label-danger arrowed">', '</span>');?></label>
            <div>
                <input type="text" class="input-block-level" id="product_name" name="product_name" value="<?php echo set_value('product_name'); ?>" autofocus  />
            </div>
        </div>
        <div class="margin-bottom">
            <label for="prod_desc">Description <?=form_error('prod_desc','<span class="label label-danger arrowed">', '</span>');?></label>
            <div>
                <textarea class="form-control input-block-level limited content-description" id="prod_desc" name="prod_desc" rows="5"  ><?php echo set_value('prod_desc'); ?></textarea>
            </div>
        </div> <!-- name and description -->
        
        <div class="clearfix margin-bottom">
            <div class="margin-bottom">
                <label for="theme_name">Theme(s) <?=form_error('theme_name[]','<span class="label label-danger arrowed">', '</span>');?></label>
                <div>
                    <select id="theme_name" name="theme_name[]" multiple="multiple" data-placeholder="Choose theme" class="input-xxlarge chosen-select tag-input-style" >
                    	<?php foreach($collections as $collection): ?>
                        <option value="<?=$collection->collection_id;?>" <?php echo set_select('theme_name[]', $collection->collection_id);?>><?=$collection->collection_name;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div class="margin-bottom">
                <label for="artisan_name">Artisan(s) <?=form_error('artisan_name[]','<span class="label label-danger arrowed">', '</span>');?></label>
                <div>
                    <select id="artisan_name" name="artisan_name[]" multiple="multiple" data-placeholder="Choose Artisan" class="input-xxlarge chosen-select tag-input-style" >
                    	<?php foreach($artisans as $artisan): ?>
                        <option value="<?=$artisan->artisan_id;?>" <?php echo set_select('artisan_name[]', $artisan->artisan_id);?>><?=$artisan->artisan_name;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div><!--  theme and artisan row -->

        <div class="clearfix margin-top">
        	<div class="pull-left">
                  <label for="prod_height">Width <?=form_error('product_width','<span class="label label-danger arrowed">', '</span>');?></label>
                  <div>
                      <input type="text" class="" id="product_width" name="product_width" value="<?php echo set_value('product_width'); ?>"  />
                  </div>
            </div>
        	<div class="pull-left margin-left">
                  <label for="prod_height">Height <?=form_error('product_height','<span class="label label-danger arrowed">', '</span>');?></label>
                  <div>
                      <input type="text" class="" id="product_height" name="product_height" value="<?php echo set_value('product_height'); ?>"  />
                  </div>
            </div>
        	<div class="pull-left margin-left">
                <label for="prod_length">Length <?=form_error('product_length','<span class="label label-danger arrowed">', '</span>');?></label>
                <div>
                    <input type="text" class="" id="product_length" name="product_length" value="<?php echo set_value('product_length'); ?>"  />
                </div>
            </div>
            <div class="pull-left">
                  <label for="prod_weight">Weight <?=form_error('product_weight','<span class="label label-danger arrowed">', '</span>');?></label>
                  <div>
                      <input type="text" class="" id="product_weight" name="product_weight" value="<?php echo set_value('product_weight'); ?>"  />
                  </div>
            </div>
        </div><!-- length, height and weight row --> 
        
        <div class="clearfix margin-top">
        	<div class="pull-left">
                <label for="prod_price">Price <?=form_error('product_price','<span class="label label-danger arrowed">', '</span>');?></label>
                <div>
                    <input type="text" class="" id="product_price" name="product_price" value="<?php echo set_value('product_price'); ?>"  />
                </div>
            </div>

            <div class="pull-left margin-left">
                <label for="prod_quantity">SKU <span class="muted">(Stock Keeping Unit)</span>  <?=form_error('product_quantity','<span class="label label-danger arrowed">', '</span>');?></label>
                <div>
                    <input type="text" class="" id="product_quantity" name="product_quantity" value="<?php echo set_value('product_quantity'); ?>"  />
                </div>
            </div>
        </div><!-- price, sku and weight row -->
    </div>
</div>
<hr />

<div class="clearfix">
    <div class="span3">
        <div class="">
            <label>Product Image</label>
            <p>Upload image of this product. <br /><small>(Valid image type: <strong>gif, jpg, pjpeg, jpeg, png, x-png</strong>)</small></p>
        </div>
    </div>
    <div class="span9">
    	<div class="clearfix">
        	<div class="pull-left span4">
            	<input type="file" accept="image/*" name="product_image" id="product_image" class="product_image single" />
            </div>
        </div>
    </div>
</div>
<hr />

<div class="clearfix">
	<div class="pull-right">
    	<a role="button" class="btn" href="<?=site_url('product/listings');?>">Cancel</a>
    	<button type="submit" class="btn btn-primary" name="save_product"><i class="icon-save"></i> Save</button>
    </div>
</div>
<?php echo form_close(); ?>
