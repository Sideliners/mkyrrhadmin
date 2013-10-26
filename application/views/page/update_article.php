<?php echo (isset($response))? $response : ''; ?>

<?php echo form_open_multipart('', array('method' => 'post')); ?>
<div class="clearfix">
	<div class="span3 clearfix" id="thumbnail">
        <label for="article_title">Primary Image</label>
    	<div class="clearfix">
            <?php if(!is_null($article->article_image)): ?>
            <div class="thumbnail margin-bottom">
                <img src="<?=base_url('uploads/images/articles/'.$article->article_image);?>" />
            </div>
            <?php endif; ?>
            <div class="ace-file-input clearfix">
                <input type="file" id="article_image_update" name="article_image" accept="image/*" />
            </div>
         </div>
    </div>
    <div class="span9">
        <div>
            <label for="article_title">Article Title</label>
            <div>
                <input type="text" class="input-block-level" id="article_title" name="article_title" value="<?php echo (set_value('article_title'))? set_value('article_title') : $article->article_title; ?>" autofocus required/>
            </div>
        </div>

        <div>
            <label for="prod_desc">Description</label>
            <div>
                <textarea class="input-block-level" id="article_body" name="article_body"><?php echo (set_value('article_body')) ? set_value('article_body') : $article->article_body; ?></textarea><br />
            </div>
        </div> <!-- title and body -->

        <div>
            <label>Assign to Collection</label>
            <div>
                <select id="theme_name" name="collection" data-placeholder="Choose collection" class="input-xxlarge chosen-select tag-input-style theme_name" required>
                    <option value=""></option>
                    <?php foreach($collections as $row): ?>
                    <option value="<?=$row->collection_id;?>" <?php echo set_select('collection', $row->collection_id);?> <?php echo ($row->collection_id == $article->collection_id)? 'selected="selected"' : '';?>><?=$row->collection_name;?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="clearfix">
	<div class="pull-right">
        <?php
        switch($this->uri->segment(3)){
            case 'product' :
                $url = 'product/'.$this->uri->segment(4);
                break;
            case 'artisan' :
                $url = 'artisan/details/'.$this->uri->segment(3);
                break;
            case 'enterprise' :
                $url = 'enterprise/details/'.$this->uri->segment(3);
                break;
        }
        ?>
        <a href="<?=site_url($url);?>" class="btn" role="button">Cancel</a>
    	<button type="submit" class="btn btn-primary" name="save_article"><i class="icon-save"></i> Save</button>
        <input type="hidden" name="product_id" value="<?=$article->article_id;?>" />
    </div>
</div>
<?php echo form_close(); ?>
