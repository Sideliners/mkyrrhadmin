<div class="clearfix margin-bottom">
    <div class="pull-left">
        <a role="button" onclick="window.history.back()" class="label label-info  arrowed">&laquo Back</a>
    </div>
</div>

<div class="clearfix row-fluid">
    <div class="span3">
        <div class="thumbnail"><img src="<?=base_url('uploads/images/articles/'.$article->article_image);?>" /></div>
    </div>

    <div class="span9">
        <div class="well well-small"><?=$article->article_body;?></div>
    </div>
</div>
