<?php echo (isset($response))? $response : ''; ?>

<div class="clearfix">
	<div class="pull-left">
    	<?php if($artisan->artisan_status > 0): ?>
        <a role="button" class="btn btn-mini status-button" data-status="0" data-status-type="artisan"  data-status-id="<?=$artisan->artisan_id;?>"><i class="icon-remove"></i> Unpublish this artisan</a>
        <?php else: ?>
    	<a role="button" class="btn btn-mini btn-success status-button" data-status="1" data-status-type="artisan"  data-status-id="<?=$artisan->artisan_id;?>"><i class="icon-ok"></i> Publish this artisan</a>
        <?php endif; ?>
        <a href="#delete-artisan" data-toggle="modal" role="button" class="btn btn-mini btn-warning delete-artisan" data-artisan-id="<?=$artisan->artisan_id;?>"><i class="icon-trash"></i>Delete this artisan</a>
    </div>
</div>
<br />

<div class="clearfix row-fluid">
	<div class="span3" id="thumbnail">
    	<div class="thumbnail">
        	<?php if(!empty($photo->artisan_image)): ?>
        	<img src="<?=base_url('uploads/images/artisans/'.$photo->artisan_image);?>" />
            <?php endif; ?>
            <div class="caption text-center">Primary Image</div>
         </div>
    </div>
    
    <div class="span9 well well-small" id="description">
    	<h5 class="border-bottom">
        	Artisan Name <small><a href="#edit-artisan-name" class="pull-right btn-link" data-toggle="modal" role="button"><i class="icon-edit"></i> Change name</a></small>
        </h5>
		<div class="margin-bottom" id="artisan_name"><h3><?=$artisan->artisan_name;?></h3></div>
        <br />
        <h5 class="border-bottom">
            About the Artisan <small><a href="#edit-artisan-desc" class="pull-right btn-link" data-toggle="modal"><i class="icon-edit"></i> Edit</a></small>
        </h5>
        <div class="margin-bottom" id="art_description"><?=($artisan->artisan_description)? $artisan->artisan_description : 'No description available';?></div>
        
        <br />
        <h5 class="border-bottom">
           Enterprise <small><a href="#edit-artisan-entr" class="pull-right btn-link" data-toggle="modal" role="button"><i class="icon-edit"></i> Edit</a></small>
        </h5>
        <div class="margin-bottom" id="art_entr">
        	<?php if($enterprises): ?>
            <ul>
				<?php foreach($enterprises as $row): ?>
                <li><a href="#"><?=$row->enterprise_name;?></a></li>
                <?php endforeach; ?>
            </ul>
            <?php else: ?>
            <p class="alert alert-warning">No Enterprise</p>
            <?php endif; ?>
        </div>
        
        <br />
        <h5 class="border-bottom">
           Products
           <small><a href="#add-product-modal" class="pull-right btn-link" data-toggle="modal" role="button"><i class="icon-edit"></i> Add product</a></small>
        </h5>
        <div class="margin-bottom" id="art_prod">
			<div class="row-fluid">      
            <?php if($products): ?>
            <ul>
            	<?php foreach($products as $row): ?>
                <li><a href="<?=site_url('product/'.$row->product_id);?>"><?=$row->product_name;?></a></li>
                <?php endforeach; ?>
            </ul>
            <?php else: ?>
            <p class="alert alert-warning">No Products</p>
            <?php endif; ?>
			</div>
        </div>
        
        <br />
        <h5 class="border-bottom">
            Artisan Article 
            <small>
            </small>
        </h5>
        <div id="artisan_article">
			<h5><a href="#"><?=$artisan->article_title;?></a></h5>
        </div>
        
        <br />
        <h5 class="border-bottom">
            Artisan's Photos 
            <small><a href="#upload_artisan_image" class="pull-right btn-link" data-toggle="modal" role="button"><i class="icon-edit"></i> Add photo</a></small>
        </h5>
        <div id="artisan_photos">
            <ul class="inline">
            	<?php foreach($album as $row): ?>
                <li class="thumbnail album-li"><div class="center-cropped" style="background-image: url('<?=base_url('uploads/images/artisans/'.$row->artisan_image);?>');"></div></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<?=$this->load->view('template/modals/single_artisan_modal')?>
