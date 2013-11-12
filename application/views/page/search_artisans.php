<?php if(!empty($artisans)): ?>
<div>
    <div class="clearfix">
        <div class="pull-left"><h4 class="text-info">Results for '<strong><?=$string;?></strong>'</h4></div>
    </div>
    <hr  class="no-margin"/>
    <p class="clearfix">
        <div>
            <div class="row-fluid" id="artisan-list">
                <ul class="thumbnails">
                    <?=$artisans;?>
                </ul>
            </div>
        </div>
    </p>
</div>
<div class="pagination">
    <?php echo (isset($pagination))? $pagination : '';?>
</div>
<?php else: ?>
<p class="alert alert-info">No results found for '<strong><?=$string;?></strong>'</p>
<p><a href="<?=site_url('artisan/create');?>" class="btn btn-warning btn-small">Add Artisan</a></p>
<?php endif; ?>
