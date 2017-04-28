<?php 
use pc\modules\huati\widgets\WapItemWidget;
use pc\config\FileUtils;
?>
<div class="m_top">
	<label><a href="javascript:history.go(-1)"><img src="<?=FileUtils::getWapCommonFilePath('images', "back2.png")?>"/>返回</a></label>
	<p>话题</p>
	<span class="icon3"><a href="m_edit.php"><img src="<?=FileUtils::getWapCommonFilePath('images', "edit.png")?>"></a></span>
</div>
 <ul class="m_tab">
        <li class="current"><a>热门</a></li>
        <li><a>最新</a></li>
    </ul>
    
    <ul class="huati_list1">
     <?php if($hot) :?>
        <?php foreach ($hot as $k=>$v):?>
            <?=WapItemWidget::widget(['item'=>$v])?>
        <?php endforeach;?>
     <?php endif;?>
    </ul>
    
     <ul class="huati_list1 hidden">
     <?php if($digest) :?>
        <?php foreach ($digest as $k=>$v):?>
            <?=WapItemWidget::widget(['item'=>$v])?>
        <?php endforeach;?>
     <?php endif;?>
    </ul>