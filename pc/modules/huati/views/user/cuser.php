<?php
use pc\modules\huati\widgets\UserWapCenterWidget;
use pc\modules\huati\widgets\WapPageWidget;
use pc\modules\huati\widgets\WapUserItemWidget;
$this->title =$seotitle;
$this->registerMetaTag(['name'=>'keywords','content'=>$seokeyword]);
$this->registerMetaTag(['name'=>'description','content'=>$seodescriotion]);
?>
<?=UserWapCenterWidget::widget(['uid'=>$uid])?>
<div class="tab_title">
         <p><a href="/<?=$uid?>/col">问题</a></p>
        <p ><a href="/<?=$uid?>/ctopic">话题</a></p>
        <p class="current"><a href="/<?=$uid?>/cuser">用户</a></p>
    </div>
    <ul class="daoshi_list no_marTop">
    <?php if($care_me) :?>
     <?php foreach ($care_me as $v):?>
       <?=WapUserItemWidget::widget(['uid'=>$v['rel_user_id']])?>
       <?php endforeach;?>
    <?php endif;?>
</ul>
 <div class="pages">
        <?=WapPageWidget::widget(['currentPage'=>$currentPage,'options'=>$options,'totalCount'=>$totalCount])?>
</div>  