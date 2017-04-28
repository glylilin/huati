<?php
use pc\modules\huati\widgets\UserWapCenterWidget;
use pc\modules\huati\widgets\WapPageWidget;
use pc\modules\huati\widgets\WapUserItemWidget;
$this->title =$seotitle;
$this->registerMetaTag(['name'=>'keywords','content'=>$seokeyword]);
$this->registerMetaTag(['name'=>'description','content'=>$seodescriotion]);
?>
<?=UserWapCenterWidget::widget(['uid'=>$uid])?>
    <ul class="daoshi_list no_marTop">
    <?php if($care_me) :?>
     <?php foreach ($care_me as $v):?>
       <?=WapUserItemWidget::widget(['uid'=>$v['user_id']])?>
       <?php endforeach;?>
    <?php endif;?>
</ul>
 <div class="pages">
        <?=WapPageWidget::widget(['currentPage'=>$currentPage,'options'=>$options,'totalCount'=>$totalCount])?>
</div>  