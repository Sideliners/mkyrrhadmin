<?php echo (isset($response))? $response : ''; ?>

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
                <textarea class="form-control input-block-level limited" id="enterprise_description" name="enterprise_description" maxlength="500" rows="5"><?php echo set_value('enterprise_description'); ?></textarea>
            </div>
        </div>
        
        <div>
            <div class="margin-bottom">
                <label for="theme_name">Theme(s)</label>
                <div>
                    <select id="theme_name" name="theme_name[]" multiple="multiple" data-placeholder="Choose theme" class="input-xxlarge chosen-select tag-input-style">
                        <?php foreach($collections as $collection): ?>
                        <option value="<?=$collection->collection_id;?>" <?php echo set_select('theme_name[]', $collection->collection_id);?>><?=$collection->collection_name;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
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