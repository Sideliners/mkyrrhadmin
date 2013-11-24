<?php if(!empty($collections)): ?>

<?php echo (isset($response))? $response : ''; ?>

<?php $attr = array('id' => 'collectionlist', 'method' => 'post'); ?>
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
            <a href="<?=site_url('collection/create');?>" class="btn btn-warning btn-mini"><i class="icon-user"></i> Add Collection</a>
        </div>
    </div>
        <div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="30">
                            <center>
                                <input type="checkbox" id="check_all" class="ace" onchange="checkAll('collectionlist')" />
                                <span class="lbl"></span>
                            </center>
                        </th>
                        <th>Collection</th>                        
                        <th>Date Created</th>
                        <th>Last Modified</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach($collections as $collection) { ?>
                        <tr class="checkboxes">
                            <td>
                                <center>
                                    <input type="checkbox" id="prod-<?=$collection->collection_id?>" name="collection_item[]" value="<?=intval($collection->collection_id);?>" class="ace collection_item"/>
                                    <span class="lbl"></span>
                                </center>
                            </td>
                            <td><a href="<?=site_url('collection/details/'.$collection->collection_id)?>"><?=$collection->collection_name;?></a></td>
                            <td><?=$collection->date_created?></td>
                            <td><?=$collection->last_modified?></td>
                            <td><?php echo ($collection->collection_status != 0)? '<span class="text-success">published</span>' : '<span class="muted">unpublished</span>'; ?></td>
                            <td>
                                <div class="text-center">
                                    <?php if($collection->collection_status != 0): ?>
                                    <a role="button" class="btn btn-minier update-collection-status" data-action="0" data-name="<?=$collection->collection_name;?>" data-item="<?=intval($collection->collection_id);?>" title="Unpublish"><i class="icon-chevron-down"></i></a>
                                    <?php else: ?>
                                    <a role="button" class="btn btn-minier btn-success update-collection-status" data-action="1" data-name="<?=$collection->collection_name;?>" data-item="<?=intval($collection->collection_id);?>" title="Publish"><i class="icon-chevron-up"></i></a>
                                    <?php endif; ?>
                                    <a role="button" class="btn btn-minier delete-item" data-action="2" data-name="<?=$collection->collection_name;?>" data-item="<?=intval($collection->collection_id);?>" title="Delete"><i class="icon-remove"></i></a>
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
<p class="alert alert-info">No Collections, <a href="<?=site_url('collection/create')?>">Add Now</a></p>
<?php endif; ?>    
