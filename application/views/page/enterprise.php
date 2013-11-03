<?php echo (isset($response))? $response : ''; ?>

<div class="clearfix">
	<div class="pull-left">
    	<?php if($enterprise->enterprise_status > 0): ?>
        <a role="button" class="btn btn-mini status-button" data-status="0" data-status-type="enterprise" data-status-id="<?=$enterprise->enterprise_id;?>"><i class="icon-remove"></i> Unpublish this enterprise</a>
        <?php else: ?>
    	<a role="button" class="btn btn-mini btn-success status-button" data-status="1" data-status-type="enterprise" data-status-id="<?=$enterprise->enterprise_id;?>"><i class="icon-ok"></i> Publish this enterprise</a>
        <?php endif; ?>
        <a href="#delete-enterprise" data-toggle="modal" role="button" class="btn btn-mini btn-warning delete-enterprise" data-enterprise-id="<?=$enterprise->enterprise_id;?>"><i class="icon-trash"></i>Delete this enterprise</a>
    </div>
</div>
<br />

<div class="clearfix row-fluid">
	<div class="span3" id="thumbnail">
    	<div class="thumbnail">
        	<img src="<?=base_url('uploads/images/enterprises/'.$enterprise->enterprise_image);?>" />
            <div class="caption"><?php echo ($enterprise->enterprise_status > 0)? '<label class="label label-success arrowed-right"><i class="icon-check"></i> Published</label>' : '<label class="label label-grey arrowed-right"><i class="icon-check"></i> Unpublished</label>'; ?></div>
         </div>
    </div>
    
    <div class="span9 well well-small" id="description">
    	<h5 class="border-bottom">
        	Enterprise Name <small><a href="#edit-enterprise-name" class="pull-right btn-link" data-toggle="modal"><i class="icon-edit"></i> Edit</a></small>
        </h5>
		<div class="margin-bottom" id="enterprise_name"><h3><?=$enterprise->enterprise_name;?></h3></div>
        <br />
        <h5 class="border-bottom">
            About the Enterprise <small><a href="#edit-enterprise-description" class="pull-right btn-link" data-toggle="modal"><i class="icon-edit"></i> Edit</a></small>
        </h5>
        <div class="margin-bottom" id="enterprise_description"><?=($enterprise->enterprise_description)? $enterprise->enterprise_description : 'No description available';?></div>
        
        <br />
        <h5 class="border-bottom">
           Artisans
        </h5>
        <div class="margin-bottom" id="art_prod">
			<?php if (!empty($artisans)): ?>
			<div class="row-fluid">            
                <ul>
                <?php foreach ($artisans as $row): ?>
                    <li><a href="<?=site_url('artisan/details/'.$row->artisan_id)?>"><?=$row->artisan_name;?></a></li>
                <?php endforeach; ?>
                </ul>
			</div>
			<?php else: ?>
            <div> No Artisans Available </div>
            <?php endif; ?>
        </div>
        
        <br />
        <h5 class="border-bottom">
            In Collections 
            <small></small>
        </h5>
        <div id="prod_article">
            <?php if(!empty($collections)): ?>
                <ul class="">
                    <?php foreach($collections as $collection): ?>
                    <li><?=$collection->collection_name;?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
            <p class="alert alert-warning">Not in any Collection.</p>
            <?php endif; ?>
        </div>
        
        <br />
        <h5 class="border-bottom">
            Enterprise Article 
            <small>
            	<?php if(!empty($article)): ?>
                <a href="<?=site_url('article/'.$article->article_id.'/enterprise/'.$enterprise->enterprise_id.'/update');?>" class="pull-right btn-link"><i class="icon-edit"></i> Update Article</a>
                <?php else: ?>
                <a href="<?=site_url('article/enterprise/'.$enterprise->enterprise_id.'/create');?>" class="pull-right btn-link"><i class="icon-plus"></i> Create Article</a>
                <?php endif; ?>
            </small>
        </h5>
        <div id="enterprise_article">
            <?php if(!empty($article)): ?>
            <h4 class="article-title no-margin-top"><a href="<?=site_url('article/'.$article->article_id);?>"><?=$article->article_title;?></a> <small><em>by <?=$article->firstname.' '.$article->lastname;?></em></small></h4>
            <?php else: ?>
            <p class="alert alert-warning">No Article for this enterprise.</p>
            <?php endif; ?>
        </div>
        
        <br />
        <h5 class="border-bottom">
        	Photos
            <small><a href="#upload_enterprise_image" class="pull-right btn-link" data-toggle="modal" role="button"><i class="icon-edit"></i> Add photo</a></small>
        </h5>
        <div id="enterprise_photos">
            <?php if(!empty($album)): ?>
                <ul class="inline">
                    <?php foreach($album as $row): ?>
                    <li class="thumbnail album-li"><div class="center-cropped" style="background-image: url('<?=base_url('uploads/images/enterprises/'.$row->enterprise_image);?>');"></div></li>
                    <?php endforeach; ?>
                </ul>
                <?php else: ?>
                <p class="alert">No Photos</p>
                <?php endif; ?>
        </div>
    </div>
</div>
<?=$this->load->view('template/modals/single_enterprise_modal');?>