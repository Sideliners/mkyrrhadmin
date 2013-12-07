<div class="clearfix margin-bottom" id="prod-controlpanel">
    <div class="pull-left"><h4 class="text-info">Results for '<strong><?=$string;?></strong>'</h4></div>
    <div class="pull-right">Number of results : <strong><?=count($products); ?></strong></div>
</div>
<?php if($products): ?>
<div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Stocks</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product) { ?>
                <tr>
                    <td><center><img src="<?=base_url('uploads/images/products/'.$product->product_image);?>" class="thumb" alt="<?=$product->product_image;?>"/></center></td>
                    <td><a href="<?=site_url('product/'.$product->product_id)?>"><?=$product->product_name;?></a></td>
                    <td><?=number_format($product->price, 2);?></td>
                    <td><?php echo ($product->product_quantity > 0)? $product->product_quantity : '<span class="muted">N / A</span>';?></td>
                    <td><?php echo ($product->product_status != 0)? '<span class="text-success">published</span>' : '<span class="muted">unpublished</span>'; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="pagination">
    <?=$pagination;?>
</div>
<?php else: ?>
<p class="alert alert-info">No results found for '<strong><?=$string;?></strong>'</p>
<p><a href="<?=site_url('product/create');?>" class="btn btn-warning btn-small">Add Product</a></p>
<?php endif; ?>
