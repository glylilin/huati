<?php
use pc\config\FileUtils;
use pc\modules\huati\widgets\ItemWidget;
use pc\modules\huati\widgets\PageWidget;
use yii\helpers\Url;
$this->title =$seotitle;
$this->registerMetaTag(['name'=>'keywords','content'=>$seokeyword]);
$this->registerMetaTag(['name'=>'description','content'=>$seodescriotion]);
$this->registerCssFile(FileUtils::getFilePath('css',"huati", "main_left.css"));
?>
<div class='main_left'>
	<ul class='topic_type clearfix'>
		<li <?php if(!$topic_id):?> class="current" <?php endif;?>><a href="<?=Url::to(["/"])?>"><?=Yii::t("TOPIC", "TOPIC_ALL")?></a></li>
		<?php foreach($topic_type_list as $v) : ?>
		<li <?php if($v['id'] == $topic_id):?> class="current" <?php endif;?>><a href="<?= Url::to(['/tag/'.$v['id']])?>"><?=$v['name']?></a></li>
		<?php endforeach;?>
	</ul>
	<?php if($current_topic) :?>
	<div class="topic_desc">
		<span class="topic_title"><?=$current_topic['name']?></span>
		<ul class="topic_csd">
			<li><?=$current_topic['question']?>问题</li>
			<li><?=$current_topic['answer']?>回答</li>
			<li><?=$current_topic['follow']?>关注</li>
		</ul>
	</div>
	<?php endif;?>
	<div class="topic_remmend">
		<img originalSrc="<?=FileUtils::getFilePath("images", "huati",'hot.png')?>" class='topic_hot_img lazy' />
		<dl class="topic_hot_desc">
		  <?php if($top) :?>
			<dd>
				<span>【置顶】</span><a href="<?=Url::to(["/info/".$top['id'].".html"])?>"><?=$top['title']?></a>
			</dd>
			<?php endif;?>
		  <?php if($hot) :?>
			<dd>
				<span>【热议】</span><a href="<?=Url::to(["/info/".$hot['id'].".html"])?>"><?=$hot['title']?></a>
			</dd>
			<?php endif;?>
		</dl>
	</div>
	<!--主题详情开始-->
	<div class="topic_main_list">
		<ul class="per_list_detail">
		<?php foreach ($qa_list_data as $k =>$v):?>
			<li class="per_list_detail_li">		
                <?=ItemWidget::widget(['item'=>$v])?>
			</li>
		<?php endforeach;?>
		</ul>
		<div class="main_page">
		<?=PageWidget::widget(['currentPage'=>$currentPage,'actionClass'=>'active','isA'=>true,'options'=>$options,'totalCount'=>$totalCount])?>
		
		</div>
	</div>
	<!--主题详情结束-->
</div>