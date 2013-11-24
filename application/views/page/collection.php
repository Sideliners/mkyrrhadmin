<?php echo (isset($response))? $response : ''; ?>

<div class="clearfix">
	<div class="pull-left">
    	<?php if($collection->collection_status > 0): ?>
        <a role="button" class="btn btn-mini status-button" data-status="0" data-status-type="collection"  data-status-id="<?=$collection->collection_id;?>"><i class="icon-remove"></i> Unpublish this collection</a>
        <?php else: ?>
    	<a role="button" class="btn btn-mini btn-success status-button" data-status="1" data-status-type="collection"  data-status-id="<?=$collection->collection_id;?>"><i class="icon-ok"></i> Publish this collection</a>
        <?php endif; ?>
        <a href="#delete-collection" data-toggle="modal" role="button" class="btn btn-mini btn-warning delete-collection" data-artisan-id="<?=$collection->collection_id;?>"><i class="icon-trash"></i>Delete this collection</a>
    </div>
</div>
<br />

<div class="clearfix row-fluid">    
    <div class="span9 well well-small" id="description">
    	<h5 class="border-bottom">
        	Collection Name <small><a href="#edit-collection-name" class="pull-right btn-link" data-toggle="modal" role="button"><i class="icon-edit"></i> Change name</a></small>
        </h5>
		<div class="margin-bottom" id="collection_name"><h3><?=$collection->collection_name;?></h3></div>
        
        <br />
        <h5 class="border-bottom">
            Collection of Products 
        </h5>
        <div class="margin-bottom">
        	<?php if ($collection_product):
					foreach($collection_product as $product) : ?>
                    	<div><a href="<?=site_url("product/{$product->product_id}")?>"><?=$product->product_name?></a></div>
          	<?php 
					endforeach;
			else: ?>
            	<p class="alert alert-warning">No Products.</p>
			<?php endif; ?>
        </div>
        
        <br />
        <h5 class="border-bottom">
            Collection of Artisans 
        </h5>
        <div class="margin-bottom">
        	<?php if ($collection_artisan):
					foreach($collection_artisan as $artisan) : ?>
                    	<div><a href="<?=site_url("artisan/details/{$artisan->artisan_id}")?>"><?=$artisan->artisan_name?></a></div>
          	<?php 
					endforeach;
			else: ?>
            	<p class="alert alert-warning">No Artisans.</p>
			<?php endif; ?>
        </div>
 
        <br />
        <h5 class="border-bottom">
            Collection of Enterprises 
        </h5>
        <div class="margin-bottom">
        	<?php if ($collection_enterprise):
					foreach($collection_enterprise as $enterprise) : ?>
                    	<div><a href="<?=site_url("enterprise/details/{$enterprise->enterprise_id}")?>"><?=$enterprise->enterprise_name?></a></div>
          	<?php 
					endforeach;
			else: ?>
            	<p class="alert alert-warning">No Enterprises.</p>
			<?php endif; ?>
        </div>
 
    </div>
</div>