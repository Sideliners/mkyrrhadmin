<?php if(!empty($prod_list)): ?>
<?php if(isset($success)): ?>
<div class="alert alert-success"><?=$success;?></div>
<?php elseif(isset($error)): ?>
<div class="alert alert-error"><?=$error;?></div>
<?php elseif(isset($noupdate)): ?>
<div class="alert alert-info"><?=$noupdate;?></div>
<?php endif; ?>
<?php $attr = array('id' => 'productlist', 'method' => 'post'); ?>
<div>
<?php echo form_open('', $attr); ?>
    <div class="clearfix margin-bottom" id="prod-controlpanel">
        <div class="form-inline pull-left input-append">
            <select name="batch_actions" id="batch_actions">
                <option value=""></option>
                <optgroup label="Batch action">
                    <option value="1">Publish</option>
                    <option value="0">Unpublish</option>
                </optgroup>
            </select>
            <button type="submit" class="btn btn-primary btn-mini" name="do_batch_action">Submit</button>
        </div>
        <div class="pull-right"><a href="<?=site_url('product/create');?>" class="btn btn-success btn-mini">Add Product</a></div>
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
                    <th>Category</th>
                    <th>Prices</th>
                    <th>Stocks</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?=$prod_list;?>
            </tbody>
        </table>
    <div>
<?php echo form_close(); ?>
</div>
<div class="pagination">
    <?=$pagination;?>
</div>
<?php else: ?>
<p class="alert alert-info">No Products to Sell, <a href="">Add Now</a></p>
<?php endif; ?>
