<div class="clearfix margin-bottom" id="prod-controlpanel">
    <div class="pull-left"><h4 class="text-info">Results for '<strong><?=$string;?></strong>'</h4></div>
    <div class="pull-right">Number of results : <strong><?=count($collections); ?></strong></div>
</div>
<?php if($collections): ?>
<div>
    <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Collection</th>                        
                        <th>Date Created</th>
                        <th>Last Modified</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach($collections as $collection) { ?>
                        <tr>                            
                            <td><a href="<?=site_url('collection/details/'.$collection->collection_id)?>"><?=$collection->collection_name;?></a></td>
                            <td><?=$collection->date_created?></td>
                            <td><?=$collection->last_modified?></td>
                            <td><?php echo ($collection->collection_status != 0)? '<span class="text-success">published</span>' : '<span class="muted">unpublished</span>'; ?></td>                            
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
<p><a href="<?=site_url('collection/create');?>" class="btn btn-warning btn-small">Add Collection</a></p>
<?php endif; ?>
