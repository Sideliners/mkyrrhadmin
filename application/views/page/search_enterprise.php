<div class="clearfix margin-bottom" id="prod-controlpanel">
    <div class="pull-left"><h4 class="text-info">Results for '<strong><?=$string;?></strong>'</h4></div>
    <div class="pull-right">Number of results : <strong><?=count($enterprises); ?></strong></div>
</div>
<?php if(!empty($enterprises)): ?>
<hr />
<div>
    <div class="row-fluid" id="article-list">
        <ul class="thumbnails"> 
            <?=$enterprises;?>
        </ul>
    </div>
</div>
<?php echo form_close(); ?>

<div class="pagination">
    <?=$pagination;?>
</div>
<?php else: ?>
<p class="alert alert-info">No results found for '<strong><?=$string;?></strong>'</p>
<p><a href="<?=site_url('enterprise/create');?>" class="btn btn-warning btn-small">Add Enterprise</a></p>
<?php endif; ?>    
