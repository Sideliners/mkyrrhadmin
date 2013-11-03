<?php if(!empty($enterprises)): ?>

<?php echo (isset($response))? $response : ''; ?>

<?php $attr = array('id' => 'enterpriselist', 'method' => 'post'); ?>
<div>
<?php echo form_open('', $attr); ?>
    <div class="clearfix margin-bottom" id="enterprise-controlpanel">
        <div class="form-inline pull-left input-append">
            <select name="batch_actions" id="batch_actions">
                <option value=""></option>
                <optgroup label="Batch action">
                    <option value="1" <?=set_select('batch_actions', '1');?>>Publish</option>
                    <option value="0" <?=set_select('batch_actions', '0');?>>Unpublish</option>
                </optgroup>
            </select>
            <button type="submit" class="btn btn-primary btn-mini" name="do_batch_action">Submit</button>            
        </div>        
        <div class="pull-right">
           <a href="<?=site_url('enterprise/create');?>" class="btn btn-warning btn-mini"><i class="icon-user"></i> Add Enterprise</a>
        </div>
    </div>
    <div class="well well-small"><a role="button" class="btn-link" onclick="checkAll('enterpriselist')">Select all / none</a></div>
    <hr />
    <div>
    <div class="row-fluid" id="article-list">
        <ul class="thumbnails"> 
            <?=$enterprises;?>
        </ul>
    </div>
</div>
<?php echo form_close(); ?>
</div>
<div class="pagination">
    <?=$pagination;?>
</div>
<?php else: ?>
<p class="alert alert-info">No Enterprises, <a href="<?=site_url('enterprise/create')?>">Add Now</a></p>
<?php endif; ?>    