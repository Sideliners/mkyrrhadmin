<?php if(!empty($articles)): ?>
<?php if(isset($success)): ?>
<div class="alert alert-success"><?=$success;?></div>
<?php elseif(isset($error)): ?>
<div class="alert alert-error"><?=$error;?></div>
<?php elseif(isset($noupdate)): ?>
<div class="alert alert-info"><?=$noupdate;?></div>
<?php endif; ?>
<?php $attr = array('id' => 'articles', 'method' => 'post'); ?>
<div>
<?php echo form_open('articles/listings', $attr); ?>
    <div class="clearfix margin-bottom" id="prod-controlpanel">
        <div class="form-inline pull-left input-append">
            <select name="batch_actions" id="batch_actions">
                <option value=""></option>
                <optgroup label="Batch action">
                    <option value="1">Publish</option>
                    <option value="0">Unpublish</option>
                    <!--<option value="3">Archive</option>-->
                </optgroup>
            </select>
            <button type="submit" class="btn btn-primary btn-mini" name="do_batch_action">Submit</button>
        </div>
    </div>

    <div class="well well-small"><a role="button" class="btn-link" onclick="checkAll('articles')">Select all / none</a></div>
    
    <div class="well well-small">
        <div class="clearfix row-fluid">
            <?php foreach($articles as $row): ?>
            <div class="media clearfix">
                <div class="article_checkbox"><input type="checkbox" class="ace" name="article[]" value="<?=$row->article_id;?>" /><span class="lbl"></span></div>
                <a href="<?=site_url('articles/view/'.$row->article_id);?>" class="pull-left thumbnail">
                    <img src="<?=base_url('uploads/images/articles/'.$row->article_image);?>" style="max-width: 64px;" />
                </a>
                <div class="media-body">
                    <h4 class="no-margin-top"><a href="<?=site_url('articles/view/'.$row->article_id);?>"><?=$row->title;?></a> <small>(<?=($row->status > 0)? 'published' : 'unpublished';?>)</small></h4>
                    <?=substr(strip_tags($row->body), 0, 150).'...';?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php echo form_close(); ?>
</div>
<div class="pagination">
    <?=$pagination;?>
</div>
<?php else: ?>
<p><a href="<?=site_url('articles/listings');?>" class="btn-link" role="button">&laquo; Back to articles list</a></p>
<p class="alert alert-info"><strong>No results for '<?=$this->input->post('search');?>'</strong></p>
<?php endif; ?>
