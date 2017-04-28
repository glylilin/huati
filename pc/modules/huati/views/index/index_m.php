<?php 
use pc\config\FileUtils;
use pc\config\CommonUtils;
use pc\modules\huati\widgets\WapItemWidget;
use pc\modules\huati\widgets\WapPageWidget;
$this->title =$seotitle;
$this->registerMetaTag(['name'=>'keywords','content'=>$seokeyword]);
$this->registerMetaTag(['name'=>'description','content'=>$seodescriotion]);
?>
<div class="m_top">
	<label><a href="javascript:history.go(-1)"><img src="<?=FileUtils::getWapCommonFilePath('images', "back2.png")?>"/>返回</a></label>
	<p>话题</p><!--对应页面标题-->
	<span class="icon3">
	<?php if(Yii::$app->user->id) :?>
	<a href="/huati/qa/submit"><img src="<?=FileUtils::getWapCommonFilePath('images', "edit.png")?>"></a>
	<?php else :?>
	<a href="javascript: void(0);" onclick="login();"><img src="<?=FileUtils::getWapCommonFilePath('images', "edit.png")?>"></a>
	<?php endif;?>
	</span><!--这个span只在话题首页有，其他页面没有-->
	<!-- <span class="icon2"><a href="setting.php"><img src="../m_img/setting.png"></a></span> --><!--这个span只在课程首页有，其他页面没有-->
</div>

<div class="m_goTop"><img src="<?=FileUtils::getWapCommonFilePath('images', "right_top2.png")?>"><br/>顶部</div>
<?php if(!$current_topic):?>
    <div class="huati_search">
        <p><img src="<?=FileUtils::getWapCommonFilePath('images', "search.png")?>"/>搜索话题、问答或导师</p>
        <form><input type="text" name="" autocomplete="off"></form>
    </div>
	<ul class="huati_nav">
        <li><a href="/tag"><i class="nav1"></i><p>话题分类</p></a></li>
        <li><a href="/huati/index/digest"><i class="nav2"></i><p>回答</p></a></li>
        <li><a href="huati/index/column"><i class="nav3"></i><p>导师专栏</p></a></li>
    </ul>

    <dl class="column_title1">
        <dt><span>每日推荐</span></dt>
        <dd><a><img src="<?=FileUtils::getWapCommonFilePath('images', "icon_huan.png")?>"/>换一批</a></dd>
    </dl>
<?php else:?>
     <dl class="huati_lei">
        <dt><img src="<?=FileUtils::getWapCommonFilePath('images', "11.png")?>"/></dt>
        <dd>
            <p>#<?=$current_topic['name']?></p>
            <div><i><?=$current_topic['question']?>问题</i><i><?=$current_topic['answer']?>回答</i><i><?=$current_topic['follow']?>关注</i></div>
            <span>
            <?php if(in_array($current_topic['id'],$favorite_topic)) : ?>
            <a class="about_topic current" data-id='<?=$current_topic['id']?>'>已关注话题</a>
            <?php else:?> 
            <a class="about_topic" data-id='<?=$current_topic['id']?>'>关注话题</a>
            <?php endif;?>
            </span>
        </dd>
     </dl>
  
     <dl class="huati_toutiao">
       <?php if($hot || $top) :?>
        <dt><img src="<?=FileUtils::getWapFilePath('images','huati',"toutiao.png")?>"/></dt>
        <dd>
            <a href="/info/<?=$top['id']?>.html" title="<?=$top['title']?>"><i>置顶</i><?=$top['title']?></a>
            <a href="/info/<?=$hot['id']?>.html" title="<?=$hot['title']?>"><i>热议</i><?=$hot['title']?></a>
        </dd>
      <?php endif;?>
     </dl>

     
 <?php endif;?>   
    <?php if($qa_list_data):?>
    <ul class="huati_list1">
        <?php foreach ($qa_list_data as $k=>$v):?>
            <?=WapItemWidget::widget(['item'=>$v])?>
        <?php endforeach;?>
    </ul>
    
    <div class="pages">
        <?=WapPageWidget::widget(['currentPage'=>$currentPage,'options'=>$options,'totalCount'=>$totalCount])?>
    </div>    
    <?php endif;?>
    <div class="bot_div"></div>
