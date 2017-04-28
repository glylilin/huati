<?php
use pc\config\FileUtils;
?>
<div class="m_top">
	<label><a href="javascript:history.go(-1)"><img src="<?=FileUtils::getWapCommonFilePath('images', "back2.png")?>"/>返回</a></label>
	<p>话题分类</p><!--对应页面标题-->
</div>
<ul class="huati_fenli">
<?php if($topic_type_list):?>
    <?php foreach ($topic_type_list as $k=>$v) :?>
       <li>
           <a href="/tag/<?=$v['id']?>">
               <p>#<?=$v['name']?></p>
               <div><span><?=$v['question']?>问题</span><span><?=$v['answer']?>回答</span><span><?=$v['follow']?>关注</span></div>
           </a>
       </li>
       <?php endforeach;?>

       <?php endif;?>
</ul> 

    