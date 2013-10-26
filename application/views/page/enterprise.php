<?php if(isset($error)): ?>
<div class="alert alert-error"><?=$error;?></div>
<?php elseif(isset($success)): ?>
<div class="alert alert-success"><?=$success;?></div>
<?php endif; ?>

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
            <div class="caption text-center">
            	<a href="#upload_enterprise_image" role="button" data-toggle="modal"><?php if($enterprise->enterprise_image): ?>change<?php else: ?>upload<?php endif; ?> image</a>
            </div>
         </div>
    </div>
    
    <div class="span9 well well-small" id="description">
    	<h5 class="border-bottom">
        	Enterprise Name <small><a href="#edit-enterprise-name" class="pull-right btn-link" data-toggle="modal"><i class="icon-edit"></i> Edit</a></small>
        </h5>
		<div class="margin-bottom" id="enterprise_name"><?=$enterprise->enterprise_name;?></div>
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
			<?php if ($artisans = $enterprise->artisans) : ?>
			<div class="row-fluid">            
            <ul>
            <?php
				foreach ($artisans as $artisan) {
					echo '<li>';
					echo '<a href="' . site_url('artisans/details/'.$artisan->artisan_id) . '" title="{$artisan->artisan_name}" name="{$artisan->artisan_name}">' . $artisan->artisan_name . '</a> ';
					if ($artisan->artisan_status) {
						$status = "Published";	
					}
					else if ($artisan->artisan_status == 0) {
						$status = "Unpublished";
					}
					echo '<small>('.$status.')</small>';
					echo '</li>';
				}
			?>
            </ul>
			</div>
			<?php else: ?>
            <div> No Artisans Available </div>
            <?php endif; ?>
        </div>
        
        <br />
        <h5 class="border-bottom">
            Enterprise Article 
            <small>
                <?php if($enterprise->article && !empty($enterprise->article)): ?>
                <a href="<?=site_url('articles/update/'.$enterprise->article_id);?>" class="pull-right btn-link"><i class="icon-edit"></i> Edit Enterprise</a>
                <?php else: ?>
                <a href="<?=site_url('articles/enterprise/'.$enterprise->enterprise_id.'/create');?>" class="pull-right btn-link"><i class="icon-plus"></i> Create Article</a>
                <?php endif; ?>
            </small>
        </h5>
        <div id="enterprise_article">
            <?php if($enterprise->article && !empty($enterprise->article)): ?>
            <h4 class="article-title no-margin-top"><?=$enterprise->article->title;?> <small>by <?=$enterprise->article->firstname.' '.$enterprise->article->lastname;?></small></h4>
            <div class="article-body"><?=$enterprise->article->body;?></div>
            <?php else: ?>
            <p class="alert alert-warning">No Article for this enterprise.</p>
            <?php endif; ?>
        </div>
    </div>
</div>