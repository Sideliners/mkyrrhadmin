<?php echo (isset($response))? $response : ''; ?>

<?php echo form_open_multipart('', array('method' => 'post')); ?>
<div class="clearfix">
	<div class="span3 clearfix" id="thumbnail">
        <label for="article_title">Primary Image</label>
    	<div class="clearfix">
            <div class="ace-file-input clearfix"><input type="file" id="article_image" name="article_image" accept="image/*" /></div>
         </div>
    </div>
    <div class="span9">
        <div>
            <label for="article_title">Article Title</label>
            <div>
                <input type="text" class="input-block-level" id="article_title" name="article_title" value="<?php echo set_value('article_title'); ?>" autofocus required />
            </div>
        </div>

        <div>
            <label for="prod_desc">Description</label>
            <div>
                <textarea class="input-block-level" id="article_body" name="article_body"><?php echo set_value('article_body'); ?></textarea><br />
            </div>
        </div> <!-- title and body -->
    </div>
</div>
<hr />

<div class="clearfix">
	<div class="pull-right">
    	<a role="button" class="btn" href="<?=site_url('article/listings');?>">Cancel</a>
    	<button type="submit" class="btn btn-primary" name="save_article"><i class="icon-save"></i> Save</button>
        <input type="hidden" name="id" value="<?=$this->uri->segment(3);?>" />        
    </div>
</div>
<?php echo form_close(); ?>
