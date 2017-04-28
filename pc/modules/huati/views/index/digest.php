<?php
use pc\config\FileUtils;
use yii\helpers\Url;
use pc\config\CommonUtils; 
use yii\web\View;
$this->registerCssFile(FileUtils::getFilePath('css',"huati", "digest.css"));
$this->title="回答-浪迹教育";
?>
<div class='main_left'>
	<div class="topic_desc">
		<ul class="topic_csd">
	       <?php if($digest):?>
			<li class="checked_now">推荐</li>
		<?php endif;?>
		<?php if($hot) :?>
			<li>热门</li>
			<?php endif;?>
		</ul>
	</div>

	<!--主题详情开始-->
	<div class="topic_main_list">
	<?php if($digest) :?>
		<ul class="per_list_detail show_topic_list">
		<?php foreach ($digest as $v) :?>
			<li class="per_list_detail_li"><a href="<?=Url::to(["/info/".$v['id'].".html"])?>"><span class="remmend_topic_title"><?=$v['title']?></span></a><img
				src="<?=FileUtils::getFilePath("images", 'huati', "logout.png")?>"
				class='remmend_topic_del'>
				<div class="remmend_topic_time_answer_care">
					<span><?=CommonUtils::formatDate($v['add_time'])?></span> <span><?=$v['answer']?> 回答</span> <span><?=$v['follow']?> 关注</span> <span><?=$v['view']?> 浏览</span>
				</div></li>
		<?php endforeach;?>
			
		</ul>
    <?php endif;?>
    <?php if($hot) :?>
		<ul class="per_list_detail">
		  <?php foreach ($hot as $v) :?>
			<li class="per_list_detail_li"><a href="<?=Url::to(["/info/".$v['id'].".html"])?>"><span class="remmend_topic_title"><?=$v['title']?></span></a><img
				src="<?=FileUtils::getFilePath("images", 'huati', "logout.png")?>"
				class='remmend_topic_del'>
				<div class="remmend_topic_time_answer_care">
					<span><?=CommonUtils::formatDate($v['add_time'])?></span> <span><?=$v['answer']?> 回答</span> <span><?=$v['follow']?> 关注</span> <span><?=$v['view']?> 浏览</span>
				</div></li>
		<?php endforeach;?>
		
		</ul>
<?php endif;?>
	</div>
	<!--主题详情结束-->
</div>
