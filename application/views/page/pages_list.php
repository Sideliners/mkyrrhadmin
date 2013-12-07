<?php if(!empty($pages)): ?>

<?php echo (isset($response))? $response : ''; ?>

<?php $attr = array('id' => 'pagelist', 'method' => 'post'); ?>
<div>
<?php echo form_open('', $attr); ?>
    <div class="clearfix margin-bottom" id="collection-controlpanel">
        <div class="form-inline pull-left input-append">
            <select name="batch_actions" id="batch_actions">
                <option value=""></option>
                <optgroup label="Batch action">
                    <option value="1">Publish</option>
                    <option value="0">Unpublish</option>
                </optgroup>
            </select>
            <button type="submit" class="btn btn-primary btn-mini" name="do_batch_action">Submit</button>            
        </div>        
        <div class="pull-right">
            <a href="<?=site_url('page/create');?>" class="btn btn-warning btn-mini"><i class="icon-user"></i> Add Page</a>
        </div>
    </div>
        <div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="30">
                            <center>
                                <input type="checkbox" id="check_all" class="ace" onchange="checkAll('pagelist')" />
                                <span class="lbl"></span>
                            </center>
                        </th>
                        <th>Page</th>
                        <th>Date Created</th>
                        <th>Last Modified</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach($pages as $page) { ?>
                        <tr class="checkboxes">
                            <td>
                                <center>
                                    <input type="checkbox" id="<?=$page->page_id?>" name="page_item[]" value="<?=intval($page->page_id);?>" class="ace page_item"/>
                                    <span class="lbl"></span>
                                </center>
                            </td>
                            <td><a href="<?=site_url('page/details/'.$page->page_id)?>"><?=$page->page_name;?></a></td>
                            <td><?=$page->date_created?></td>
                            <td><?=$page->last_modified?></td>
                            <td><?php echo ($page->page_status != 0)? '<span class="text-success">published</span>' : '<span class="muted">unpublished</span>'; ?></td>
                            <td>
                                <div class="text-center">
                                    <?php if($page->page_status != 0): ?>
                                    <a role="button" class="btn btn-minier update-page-status" data-action="0" data-name="<?=$page->page_name;?>" data-item="<?=intval($page->page_id);?>" title="Unpublish"><i class="icon-chevron-down"></i></a>
                                    <?php else: ?>
                                    <a role="button" class="btn btn-minier btn-success update-page-status" data-action="1" data-name="<?=$page->page_name;?>" data-item="<?=intval($page->page_id);?>" title="Publish"><i class="icon-chevron-up"></i></a>
                                    <?php endif; ?>
                                    <a role="button" class="btn btn-minier delete-item" data-action="2" data-name="<?=$page->page_name;?>" data-item="<?=intval($page->page_id);?>" title="Delete"><i class="icon-remove"></i></a>
                                </div>
                            </td>
                        </tr>
                	<?php } ?>
                </tbody>
            </table>
        </div>
<?php echo form_close(); ?>
</div>
<div class="pagination">
    <?=$pagination;?>
</div>
<?php else: ?>
<p class="alert alert-info">No Pages, <a href="<?=site_url('page/create')?>">Add Now</a></p>
<?php endif; ?>

<?=$this->load->view('template/modals/page_modal')?>