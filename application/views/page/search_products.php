<div class="clearfix margin-bottom" id="prod-controlpanel">
    <div class="pull-left"><h4 class="text-info">Results for '<strong><?=$string;?></strong>'</h4></div>
</div>
<?php if($products): ?>
<div>
    <div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
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
    <div>
</div>
<div class="pagination">
    <?=$pagination;?>
</div>
<?php else: ?>
<p class="alert alert-info">No results found for '<strong><?=$string;?></strong>'</p>
<p>
    <a href="<?=site_url('product/lists');?>">&laquo; Back to Products</a>
</p>
<?php endif; ?>
