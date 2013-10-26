<?php if(!empty($articles)): ?>
<div>
    <div class="well well-small" id="article-list">
        <div class="clearfix row-fluid">
            <?php foreach($articles as $row): ?>
            <div class="media clearfix">                
                <a href="<?=site_url('article/'.$row->article_id);?>" class="pull-left thumbnail">
                    <img src="<?=base_url('uploads/images/articles/'.$row->article_image);?>" style="max-width: 64px;" />
                </a>
                <div class="media-body">
                    <h4 class="no-margin-top"><a href="<?=site_url('article/'.$row->article_id);?>"><?=$row->article_title;?></a> <small>(<?=($row->article_status > 0)? 'published' : 'unpublished';?>)</small></h4>
                    <?=substr(strip_tags($row->article_body), 0, 150).'...';?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="pagination">
    <?=$pagination;?>
</div>
<?php else: ?>
<p class="alert alert-info"><strong>No Articles</strong></p>
<?php endif; ?>
