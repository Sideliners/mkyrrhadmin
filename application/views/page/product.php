<?php echo (isset($response))? $response : ''; ?>

<?php if(!empty($product)): ?>
    <div class="clearfix">
        <div class="pull-left">
            <?php if($product->product_status > 0): ?>
            <a href="#" data-toggle="modal" role="button" class="btn btn-mini status-button" data-status="0" data-status-type="product" data-status-id="<?=$product->product_id;?>"><i class="icon-remove"></i> Unpublish this product</a>
            <?php else: ?>
            <a href="#" data-toggle="modal" role="button" class="btn btn-mini btn-success status-button" data-status="1" data-status-type="product" data-status-id="<?=$product->product_id;?>"><i class="icon-ok"></i> Publish this product</a>
            <?php endif; ?>
            <a href="#delete-product" data-toggle="modal" role="button" class="btn btn-mini btn-warning delete-product" data-product-id="<?=$product->product_id;?>"><i class="icon-trash"></i>Delete this product</a>
            <a href="<?=site_url('product/create');?>" role="button" class="btn btn-success btn-mini"><i class="icon-tag"></i> Add Product</a>
        </div>
    
        <div class="pull-right">
            <label>
                Highlight&nbsp;
                <?php if($product->is_highlighted > 0): ?>
                <input type="checkbox" class="ace ace-switch ace-switch-4" name="is_highlight" id="is_highlight" checked />
                <?php else: ?>
                <input type="checkbox" class="ace ace-switch ace-switch-4" name="is_highlight" id="is_highlight" />
                <?php endif; ?>
                <span class="lbl"></span>
            <label>
        </div>
    </div>
    <hr />
          
    <div class="clearfix row-fluid">
        <div class="span3" id="thumbnail">
            <div class="thumbnail">
                <img src="<?=base_url('uploads/images/products/'.$product->product_image);?>" />
                <div class="caption text-center"><a href="#upload_prod_image" role="button" data-toggle="modal"><?php if($product->product_image): ?>change<?php else: ?>upload<?php endif; ?> image</a></div>
             </div>
        </div>

        <div class="span9 well well-small" id="description">
            <h5 class="border-bottom">
                Name <small><a href="#update_prod_name" data-toggle="modal" role="button" class="pull-right btn-link"><i class="icon-edit"></i> Edit</a></small>
            </h5>
            <div class="margin-bottom" id="prod_name"><strong><?=$product->product_name;?></strong></div>
        
            <br />
            <h5 class="border-bottom">
                Description <small><a href="#edit_prod_desc" data-toggle="modal" role="button" class="pull-right btn-link"><i class="icon-edit"></i> Edit</a></small>
            </h5>
            <div class="margin-bottom clearfix" id="prod_description"><?=$product->product_description;?></div>
                                
            <br />
            <h5 class="border-bottom">Product Details <small><a href="#update_details_modal" data-toggle="modal" role="button" class="pull-right btn-link"><i class="icon-edit"></i> Edit</a></small></h5>
            <div id="prod_details">
                <dl class="dl-horizontal">
                    <dt>Price</dt>
                    <dd><?=$product->price;?></dd>
                    <dt>Weight (kg)</dt>
                    <dd><?=$product->weight;?></dd>
                    <dt>Height (cm)</dt>
                    <dd><?=$product->height;?></dd>
                    <dt>SKU</dt>
                    <dd><?=$product->product_quantity;?></dd>                        
                    <dt>Last modified</dt>
                    <dd><?php echo date('M j, Y g:i A', strtotime($product->last_modified));?></dd>
                </dl>
            </div>
    		
            <h5 class="border-bottom">
                Artisans and Enterprise
            </h5>
            <div id="prod_article">
                <ul>
                	<?php foreach($artisans as $row): ?>
                    <li><a href="<?=site_url('artisan/details/'.$row->artisan_id);?>"><?=$row->artisan_name;?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <br />
            <h5 class="border-bottom">
                Article 
                <small>
                    <?php if(!empty($article)): ?>
                    <a href="<?=site_url('article/'.$product->article_id.'/product/'.$product->product_id.'/update');?>" class="pull-right btn-link"><i class="icon-edit"></i> Update Article</a>
                    <?php else: ?>
                    <a href="<?=site_url('article/product/'.$product->product_id.'/create');?>" class="pull-right btn-link"><i class="icon-plus"></i> Create Article</a>
                    <?php endif; ?>
                </small>
            </h5>
            <div id="prod_article">
                <?php if(!empty($article)): ?>
                <h4 class="article-title no-margin-top"><a href="<?=site_url('article/'.$article->article_id);?>"><?=$article->article_title;?></a> <small><em>by <?=$article->firstname.' '.$article->lastname;?></em></small></h4>
                <?php else: ?>
                <p class="alert alert-warning">No Article for this product.</p>
                <?php endif; ?>
            </div>
            
            <br />
            <h5 class="border-bottom">
                Photos 
                <small>
                    <a href="#upload_product_image" data-toggle="modal" role="button" class="pull-right btn-link"><i class="icon-plus"></i> Add Photos</a>
                </small>
            </h5>
            <div id="prod_photos">
                <?php if(!empty($album)): ?>
                <ul class="inline">
                    <?php foreach($album as $row): ?>
                    <li class="thumbnail album-li"><div class="center-cropped" style="background-image: url('<?=base_url('uploads/images/products/'.$row->product_image);?>');"></div></li>
                    <?php endforeach; ?>
                </ul>
                <?php else: ?>
                <p class="alert">No Photos</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <?=$this->load->view('template/modals/single_product_modal');?>
<?php else: ?>
	<p class="alert alert-info">No product available</p>
<?php endif; ?>
