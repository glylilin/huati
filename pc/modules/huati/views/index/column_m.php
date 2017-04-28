<?php
use pc\config\FileUtils;
use pc\config\CommonUtils;
?>
<div class="m_top">
	<label><a href="javascript:history.go(-1)"><img src="<?=FileUtils::getWapCommonFilePath('images', "back2.png")?>"/>返回</a></label>
	<p>导师列表</p><!--对应页面标题-->
	
</div>
    <ul class="daoshi_list">
       <?php if($column):?>
            <?php foreach ($column as $v) :?>
                   <li data-id="<?=$v['id']?>">
                       <div class="ds_head">
                           <div><span>
                           <a href="#">
                           <?php if($v['avatar_info'] && $v['avatar_info']['path']) :?>
                            <img src="<?=$v['avatar_info']['path']?>" alt=""/>
                           <?php else:?>
                            <img src="<?=FileUtils::getWapCommonFilePath('images', "mentor1.jpg")?>" alt=""/>
                           <?php endif;?>
                          
                           </a>
                           </span><i class="v6"></i></div>
                           <p>
                               <span><a href="#">
                               <?php if($v['nickname']) :?>
                               <?=$v['nickname']?>
                               <?php else:?>
                               <?=CommonUtils::format_phone($v['mobile'])?>
                               <?php endif;?>
                               <img src="<?=FileUtils::getWapCommonFilePath('images', "ds.png")?>"/></a></span>
                               <?php if($v['userCount']) :?>
                               <label><?=$v['userCount']['follower']?>关注</label><label><?=$v['userCount']['answer']?>回答</label>
                               <?php endif;?>
                            </p>
                       </div>
                       <?php if(in_array($v['id'],$following)) :?>
                       <p class="gz"><span class="current">已关注</span></p>
                       <?php else:?>
                       <p class="gz"><span>+ 关注</span></p>
                       <?php endif;?>
                   </li>
            <?php endforeach;?>
       <?php endif;?>
      
    </ul> 