<?php if(isset($error)): ?>
<div class="alert alert-error"><?=$error;?></div>
<?php elseif(isset($success)): ?>
<div class="alert alert-success"><?=$success;?></div>
<?php endif; ?>

<?=form_open_multipart('', array('method' => 'post', 'role' => 'form')); ?>
<div class="clearfix">
    <div class="span3 clearfix" id="thumbnail">
    	<label for="artisan_image">Primary Image</label>
        <div class="clearfix">
            <div class="ace-file-input clearfix"><input type="file" id="artisan_image" name="artisan_image" accept="image/*" /></div>
        </div>
    </div>
    
    <div class="span9">
        <div>
            <label for="artisan_name">Artisan Name</label>
            <div>
                <input type="text" class="input-block-level" id="artisan_name" name="artisan_name" value="<?php echo set_value('artisan_name'); ?>" autofocus />
            </div>
        </div>
    
        <div>
            <label for="artisan_description">About the Artisan</label>
            <div>
                <textarea class="form-control input-block-level limited" maxlength="500" id="artisan_description" name="artisan_description" rows="5" required><?php echo set_value('artisan_description'); ?></textarea>
            </div>
        </div>
        
        <div>
            <label for="category_name">Enterprise</label>
            <div>
                <select id="enterprise_id" name="enterprise_id[]" class="input-xxlarge chosen-select tag-input-style" multiple="" style="display: none;" data-placeholder="Choose Enterprise...">
					<?php foreach($enterprises as $ent): ?>
                    <option value="<?=$ent->enterprise_id;?>" <?php echo set_select('enterprise_id', $ent->enterprise_id);?>><?=$ent->enterprise_name;?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    
</div>
<hr />

<div class="clearfix">
    <div class="pull-right">
        <a href="<?=site_url('artisan/listings');?>" class="btn">Cancel</a>
        <button type="submit" class="btn btn-primary" name="save_artisan"><i class="icon-save"></i> Save</button>
    </div>
</div>
<?=form_close();?>
