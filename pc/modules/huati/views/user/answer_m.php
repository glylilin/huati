<?php
use pc\modules\huati\widgets\UserWapCenterWidget;
use pc\modules\huati\widgets\WapPageWidget;
use pc\config\CommonUtils;
$this->title =$seotitle;
$this->registerMetaTag(['name'=>'keywords','content'=>$seokeyword]);
$this->registerMetaTag(['name'=>'description','content'=>$seodescriotion]);
?>
<?=UserWapCenterWidget::widget(['uid'=>$uid])?>
 <ul class="huati_list2">
  <?php if($data) :?>
    <?php foreach ($data as  $v):?>
         <li data-id="<?=$v['id']?>">
            <?php if(isset($v['aid'])):?>
            <a href="/info/<?=$v['aid']?>">
            <?php else:?>
            <a>
            <?php endif;?>
                <p class="info"><?=CommonUtils::mbsubstr(CommonUtils::format_simple_content($v['content']),0,50)?></p>
                <p class="tt"><?=$v['title']?></p>
            </a>
            <p class="data"><?=$v['like']?> 赞<i>·</i><?=$v['comment']?> 评论</p>
             <?php if(Yii::$app->user->id == $v['user_id']) :?>
           <label class="del">删除</label>
           <?php endif;?>
       </li>
          <?php endforeach;?>
    <?php endif;?>

       
    </ul>


     <div class="pages">
        <?=WapPageWidget::widget(['currentPage'=>$currentPage,'options'=>$options,'totalCount'=>$totalCount])?>
    </div>   
	