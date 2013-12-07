<div class="clearfix margin-bottom" id="prod-controlpanel">
    <div class="pull-left"><h4 class="text-info">Results for '<strong><?=$string;?></strong>'</h4></div>
    <div class="pull-right">Number of results : <strong><?=count($pages); ?></strong></div>
</div>
<?php if($pages): ?>
<div>
    <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Page</th>
                        <th>Date Created</th>
                        <th>Last Modified</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach($pages as $page) { ?>
                        <tr>                            
                            <td><a href="<?=site_url('page/details/'.$page->page_id)?>"><?=$page->page_name;?></a></td>
                            <td><?=$page->date_created?></td>
                            <td><?=$page->last_modified?></td>
                            <td><?php echo ($page->page_status != 0)? '<span class="text-success">published</span>' : '<span class="muted">unpublished</span>'; ?></td>                            
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
<p><a href="<?=site_url('page/create');?>" class="btn btn-warning btn-small">Add Page</a></p>
<?php endif; ?>
