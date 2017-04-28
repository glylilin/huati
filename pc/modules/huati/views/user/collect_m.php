<?php
use pc\modules\huati\widgets\UserWapCenterWidget;
use pc\modules\huati\widgets\WapPageWidget;
$this->title =$seotitle;
$this->registerMetaTag(['name'=>'keywords','content'=>$seokeyword]);
$this->registerMetaTag(['name'=>'description','content'=>$seodescriotion]);
?>
<?=UserWapCenterWidget::widget(['uid'=>$uid])?>
<div class="tab_title">
        <p class="current"><a href="/<?=$uid?>/col">问题</a></p>
        <p><a href="/<?=$uid?>/ctopic">话题</a></p>
        <p><a href="/<?=$uid?>/cuser">用户</a></p>
    </div>

    <ul class="huati_fenli" flag='col'>
    <?php if($data):?>
        <?php foreach ($data as $v):?>
            <li data-id='<?=$v["id"]?>'>
             <div class="left">
        <?php if(isset($v['aid'])) : ?>
                    <a href="/info/<?=$v['aid']?>.html">
        <?php else:?>
                   <a href="/info/<?=$v['id']?>.html">
       <?php endif;?>
                        <p><?=$v['title']?></p>
                        <div><?php if(isset($v['aid'])):?>
                        <span class="font_grey">回答</span>
                            <?php else:?>
                        <span class="font_grey">提问</span>
                        <?php endif;?><span class="span2"><?=$v['answer']?>回答</span>·<span class="span2"><?=$v['follow']?>关注</span></div>
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