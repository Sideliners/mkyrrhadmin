<?php if(!empty($products)): ?>

	<?php if(isset($success)): ?>
    <div class="alert alert-success"><i class="icon-ok"></i> <?=$success;?></div>
    <?php elseif(isset($error)): ?>
    <?=$error;?>
    <?php elseif(isset($no_changes)): ?>
    <div class="alert alert-info"><i class="icon-warning-sign"></i> <?=$no_changes;?></div>
    <?php endif; ?>
    
	<div>
		<?php $attr = array('id' => 'productlist', 'method' => 'post'); ?>
		<?php echo form_open('', $attr); ?>
        <div class="clearfix margin-bottom" id="prod-controlpanel">
            <div class="form-inline pull-left input-append">
                <select name="batch_actions" id="batch_actions">
                    <option value=""></option>
                    <optgroup label="Batch action">
                        <option value="1" <?=set_select('batch_actions', '1');?>>Publish</option>
                        <option value="0" <?=set_select('batch_actions', '0');?>>Unpublish</option>
                    </optgroup>
                </select>
                <button type="submit" class="btn btn-primary btn-mini" name="do_batch_action">Submit</button>
            </div>
            <div class="pull-right"><a href="<?=site_url('product/create');?>" class="btn btn-warning btn-mini"><i class="icon-tag"></i> Add Product</a></div>
        </div>
        <div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            <center>
                                <input type="checkbox" id="check_all" class="ace" onchange="checkAll('productlist')" />
                                <span class="lbl"></span>
                            </center>
                        </th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>In Collection</th>
                        <th>Prices</th>
                        <th>Stocks</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach($products as $product) { ?>
                        <tr>
                            <td>
                                <center>
                                    <input type="checkbox" id="prod-<?=$product->product_id?>" name="product_item[]" value="<?=intval($product->product_id);?>" class="ace product_item"/>
                                    <span class="lbl"></span>
                                </center>
                            </td>
                            <td><center><img src="<?=$this->config->item('product_upload_url').$product->product_image;?>" class="thumb" alt="<?=$product->product_image;?>"/></center></td>
                            <td><a href="<?=site_url('product/'.$product->product_id)?>"><?=$product->product_name;?></a></td>
                            <td><?php echo ($product->article_id != 0)? $product->collection_name : '<span class="muted">N / A</span>'; ?></td>
                            <td><?=number_format($product->price, 2);?></td>
                            <td><?php echo ($product->product_quantity > 0)? $product->product_quantity : '<span class="muted">N / A</span>';?></td>
                            <td><?php echo ($product->product_status != 0)? '<span class="text-success">published</span>' : '<span class="muted">unpublished</span>'; ?></td>
                            <td>
                                <div class="text-center">
                                    <?php if($product->product_status != 0): ?>
                                    <a role="button" class="btn btn-minier update-product-status" data-action="0" data-name="<?=$product->product_name;?>" data-item="<?=intval($product->product_id);?>" title="Unpublish"><i class="icon-chevron-down"></i></a>
                                    <?php else: ?>
                                    <a role="button" class="btn btn-minier btn-success update-product-status" data-action="1" data-name="<?=$product->product_name;?>" data-item="<?=intval($product->product_id);?>" title="Publish"><i class="icon-chevron-up"></i></a>
                                    <?php endif; ?>
                                    <a role="button" class="btn btn-minier delete-item" data-action="2" data-name="<?=$product->product_name;?>" data-item="<?=intval($product->product_id);?>" title="Delete"><i class="icon-remove"></i></a>
                                </div>
                            </td>
                        </tr>
                	<?php } ?>
                </tbody>
            </table>
        </div>
    	<?php echo form_close(); ?>
    </div>
    <div class="pagination">
        <?=$pagination;?>
    </div>
<?php else: ?>
	<p class="alert alert-info">No Products to Sell, <a href="<?=site_url('product/create');?>">Add Now</a></p>
<?php endif; ?>
<?=$modal;?>
