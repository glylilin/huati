<?php
use pc\modules\huati\widgets\UserWapCenterWidget;
use pc\modules\huati\widgets\WapPageWidget;
use pc\config\CommonUtils;
$this->title =$seotitle;
$this->registerMetaTag(['name'=>'keywords','content'=>$seokeyword]);
$this->registerMetaTag(['name'=>'description','content'=>$seodescriotion]);
?>
<?=UserWapCenterWidget::widget(['uid'=>$uid])?>
 <ul class="huati_fenli2 no_marTop">
 <?php if($data) :?>
    <?php foreach ($data as  $v):?>
        <li data-id="<?=$v['id']?>">
            <div class="left">
                <a href="/info/<?=$v['id']?>.html">
                    <p><?=$v['title']?></p>
                    <div><span class="span2 no_marL"><?=$v['answer']?>回答</span>·<span class="span2"><?=$v['follow']?>关注</span><span class="span3"><?=CommonUtils::format_add_time($v['add_time'])?></span></div>
                </a>
            </div>
            <?php if(Yii::$app->user->id == $v['user_id']) :?>
           <label>删除</label>
           <?php endif;?>
       </li>
       <?php endforeach;?>
    <?php endif;?>
      
    </ul>

     <div class="pages">
        <?=WapPageWidget::widget(['currentPage'=>$currentPage,'options'=>$options,'totalCount'=>$totalCount])?>
    </div>      
	