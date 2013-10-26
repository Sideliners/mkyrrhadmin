<?php if(!empty($enterprises)): ?>
<?php if(isset($success)): ?>
<div class="alert alert-success"><?=$success;?></div>
<?php elseif(isset($error)): ?>
<div class="alert alert-error"><?=$error;?></div>
<?php elseif(isset($noupdate)): ?>
<div class="alert alert-info"><?=$noupdate;?></div>
<?php endif; ?>
<?php $attr = array('id' => 'enterpriselist', 'method' => 'post'); ?>
<div>
<?php echo form_open('', $attr); ?>
    <div class="clearfix margin-bottom" id="enterprise-controlpanel">
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
           <a href="<?=site_url('enterprises/create');?>" class="btn btn-warning btn-mini"><i class="icon-user"></i> Add Enterprise</a>
        </div>
    </div>
    <div class="well well-small"><a role="button" class="btn-link" onclick="checkAll('enterpriselist')">Select all / none</a></div>
    <hr />
    <div>
    <div class="row-fluid" id="article-list">
        <ul class="thumbnails"> 
            <?php foreach($enterprises as $row): ?>
            <li class="span3" style="margin-left: 0px; margin-right: 1.5%;">
                <div class="thumbnail">
	                <div class="enterprise_checkbox"><input type="checkbox" class="ace enterprise-item" name="enterprise_item[]" value="<?=$row->enterprise_id;?>" /><span class="lbl"></span></div>
                    <img src="<?=base_url('uploads/images/enterprises/'.$row->enterprise_image);?>" />
                    <div class="caption">
                        <h5><?=$row->enterprise_name;?><br /><small>(<?php echo ($row->enterprise_status == 1) ? "Published" : "Unpublished"; ?>)</small></h5>
                        <p>
                        	<small>
							<?php 
								echo ($row->enterprise_description) ? substr(strip_tags($row->enterprise_description), 0, 150).'...' : 'No Description';
							?>
                            </small>
                         </p>
                        <div><a href="<?=site_url('enterprises/details/'.$row->enterprise_id);?>" class="label label-lg label-pink arrowed-right"><i class="icon-edit"></i> Details</span></a>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php echo form_close(); ?>
</div>
<div class="pagination">
    <?=$pagination;?>
</div>
<?php else: ?>
<p class="alert alert-info">No Enterprises, <a href="<?=site_url('enterprises/create')?>">Add Now</a></p>
<?php endif; ?>    