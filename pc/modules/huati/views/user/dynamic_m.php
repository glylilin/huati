<?php
use pc\config\FileUtils;
use pc\modules\huati\widgets\UserCenterWidget;
use pc\config\CommonUtils;
use yii\helpers\Url;
use pc\modules\huati\widgets\PageWidget;
use pc\modules\huati\widgets\UserWapCenterWidget;
use pc\modules\huati\widgets\WapItemWidget;
use pc\modules\huati\widgets\WapPageWidget;
$this->title =$seotitle;
$this->registerMetaTag(['name'=>'keywords','content'=>$seokeyword]);
$this->registerMetaTag(['name'=>'description','content'=>$seodescriotion]);
?>
<?=UserWapCenterWidget::widget(['uid'=>$uid])?>
  <ul class="huati_list1">
        <?php foreach ($data as $k=>$v):?>
            <?=WapItemWidget::widget(['item'=>$v])?>
        <?php endforeach;?>
    </ul>
      
    <div class="pages">
        <?=WapPageWidget::widget(['currentPage'=>$currentPage,'options'=>$options,'totalCount'=>$totalCount])?>
    </div>     