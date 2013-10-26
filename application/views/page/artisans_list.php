<?php if(!empty($artisans)): ?>
<?php if(isset($success)): ?>
<div class="alert alert-success"><?=$success;?></div>
<?php elseif(isset($error)): ?>
<div class="alert alert-error"><?=$error;?></div>
<?php elseif(isset($noupdate)): ?>
<div class="alert alert-info"><?=$noupdate;?></div>
<?php endif; ?>
<?php $attr = array('id' => 'artisanlist', 'method' => 'post'); ?>
<div>
<?php echo form_open('', $attr); ?>
    <div class="clearfix margin-bottom" id="artisan-controlpanel">
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
            <a href="<?=site_url('artisan/create');?>" class="btn btn-warning btn-mini"><i class="icon-user"></i> Add Artisan</a>
        </div>
    </div>
    <div class="well well-small"><a role="button" class="btn-link" onclick="checkAll('artisanlist')">Select all / none</a></div>
    <hr />
    <div>
        <div class="row-fluid" id="artisan-list">
            <ul class="thumbnails">
                <?=$artisans;?>
            </ul>
        </div>
    </div>
<?php echo form_close(); ?>
</div>
<div class="pagination">
    <?=$pagination;?>
</div>
<?php else: ?>
<p class="alert alert-info">No Artisans, <a href="<?=site_url('artisans/create')?>">Add Now</a></p>
<?php endif; ?>    
