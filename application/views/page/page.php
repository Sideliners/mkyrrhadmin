<?php echo (isset($response))? $response : ''; ?>

<div class="clearfix">
	<div class="pull-left">
    	<?php if($page_data->page_status > 0): ?>
        <a role="button" class="btn btn-mini status-button" data-status="0" data-status-type="page"  data-status-id="<?=$page_data->page_id;?>"><i class="icon-remove"></i> Unpublish this page</a>
        <?php else: ?>
    	<a role="button" class="btn btn-mini btn-success status-button" data-status="1" data-status-type="page"  data-status-id="<?=$page_data->page_id;?>"><i class="icon-ok"></i> Publish this page</a>
        <?php endif; ?>
        <a href="#delete-page" data-toggle="modal" role="button" class="btn btn-mini btn-warning delete-page" data-collection-id="<?=$page_data->page_id;?>"><i class="icon-trash"></i>Delete this page</a>
    </div>
</div>
<br />

<div class="clearfix row-fluid">    
    <div class="span9 well well-small" id="description">
    	<h5 class="border-bottom">
        	Page Name <small><a href="#edit-page-name" class="pull-right btn-link" data-toggle="modal" role="button"><i class="icon-edit"></i> Change name</a></small>
        </h5>
		<div class="margin-bottom" id="page_name"><h3><?=$page_data->page_name;?></h3></div>
        
        <br />
        <h5 class="border-bottom">
            Page Description <small><a href="#edit-page-description" class="pull-right btn-link" data-toggle="modal" role="button"><i class="icon-edit"></i> Change description</a></small>
        </h5>
        <div class="margin-bottom">
        	<?php if ($description = $page_data->page_description): ?>
                  <div><?=$description?></div>
			<?php else: ?>
            	<p class="alert alert-warning">No Description.</p>
			<?php endif; ?>
        </div>
        
        <br />
        <h5 class="border-bottom">
            Page Body <small><a href="#edit-page-body" class="pull-right btn-link" data-toggle="modal" role="button"><i class="icon-edit"></i> Change body</a></small>
        </h5>
        <div class="margin-bottom">
        	<?php if ($body = $page_data->page_body): ?>
                  <div><?=$body?></div>
			<?php else: ?>
            	<p class="alert alert-warning">No Body.</p>
			<?php endif; ?>
        </div> 
    </div>
</div>
<?=$this->load->view('template/modals/single_page_modal')?>