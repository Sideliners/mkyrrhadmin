<?php if(isset($error)): ?>
<div class="alert alert-error"><?=$error;?></div>
<?php elseif(isset($success)): ?>
<div class="alert alert-success"><?=$success;?></div>
<?php endif; ?>

<?=form_open_multipart('', array('method' => 'post')); ?>
<div class="clearfix">
    <div class="span3 clearfix" id="thumbnail">
    	<label for="enterprise_image">Primary Image</label>
        <div class="clearfix">
            <div class="ace-file-input clearfix"><input type="file" id="enterprise_image" name="enterprise_image" accept="image/*" /></div>
        </div>
    </div>
    
    <div class="span9">
        <div>
            <label for="enterprise_name">Enterprise Name</label>
            <div>
            <input type="text" class="input-block-level" id="enterprise_name" name="enterprise_name" value="<?php echo set_value('enterprise_name'); ?>" autofocus />
            </div>
        </div>
    
        <div>
            <label for="enterprise_description">About the Enterprise</label>
            <div>
                <textarea class="input-block-level autosize-transition" id="enterprise_description" name="enterprise_description"><?php echo set_value('enterprise_description'); ?></textarea>
            </div>
        </div>
        
    </div>
    
</div>
<hr />

<div class="clearfix">
    <div class="pull-right">
        <a href="<?=site_url('enterprises/listings');?>" class="btn">Cancel</a>
        <button type="submit" class="btn btn-primary" name="save_enterprise"><i class="icon-save"></i> Save</button>
    </div>
</div>
<?=form_close();?>