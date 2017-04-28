<?php
use pc\modules\huati\widgets\WapPageWidget;
use pc\modules\huati\widgets\UserWapCenterWidget;
$this->title =$seotitle;
$this->registerMetaTag(['name'=>'keywords','content'=>$seokeyword]);
$this->registerMetaTag(['name'=>'description','content'=>$seodescriotion]);
?>
<?=UserWapCenterWidget::widget(['uid'=>$uid])?>
<div class="tab_title">
         <p><a href="/<?=$uid?>/col">问题</a></p>
        <p class="current"><a href="/<?=$uid?>/ctopic">话题</a></p>
        <p><a href="/<?=$uid?>/cuser">用户</a></p>
    </div>

    <ul class="huati_fenli" flag='topic'>
    <?php if($data) :?>
    <?php foreach ($data as $v):?>
       <li data-id="<?=$v['id']?>">
           <div class="left">
                <a href="/tag/<?=$v['id']?>">
                    <p>#<?=$v['name'] ?></p>
                    <div><span><?=$v['question'] ?>问题</span><span><?=$v['answer'] ?>回答</span><span><?=$v['follow'] ?>关注</span></div>
                </a>
            </div>
            <label>取消关注</label>
       </li>
       <?php endforeach;?>
       <?php endif;?>

    </ul>
 <div class="pages">
        <?=WapPageWidget::widget(['currentPage'=>$currentPage,'options'=>$options,'totalCount'=>$totalCount])?>
</div> 