<?php 
use pc\config\FileUtils;
use yii\helpers\Url;
$this->title="导师专栏-浪迹教育";
$this->registerCssFile(FileUtils::getFilePath('css', "huati", 'column.css'));
?>
<div class='main_left'>
	<div class="topic_desc">
		<span class="topic_title">导师专栏</span>
	</div>
	<!--主题详情开始-->
	<div class="topic_main_list">
	<?php if($column):?>
		<ul class="per_list_detail">
		<?php foreach ($column as $v) :?>
			<li class="per_list_detail_li" uid="<?=$v['id']?>">
			     <a href="<?=Url::to("/".$v['id'].'/dynamic')?>">
			     <?php if($v['avatar_info'] && $v['avatar_info']['path']):?>
					<img  originalSrc="<?=$v['avatar_info']['path'];?>" src="<?=FileUtils::getFilePath('images', 'huati', "header.png");?>" class="teacher_column_header lazy" />
					<?php else :?>
					<img  src="<?=FileUtils::getFilePath('images', 'huati', "header.png");?>" class="teacher_column_header"/>
					<?php endif;?>
				</a>
				<div class="teacher_column_info">
					<p class='teacher_info_top'>
					  <a href="<?=Url::to("/".$v['id'].'/dynamic')?>">
					<span class='teacher_column_info_name'>
					<?php if($v['nickname']) :?>
						<?=$v['nickname']?>
						<?php else :?>
						<?=CommonUtils::format_phone($v['mobile'])?>
					<?php endif;?>
					</span>
					</a>
					<span class="ticon"></span></p>
					<?php if($v['userCount']) :?>
					<p class='teacher_info_brief'><span><?=$v['userCount']['answer']?>回答</span><span><?=$v['userCount']['question']?>提问</span><span><?=$v['userCount']['follower']?>关注</span></p>
					<?php endif;?>
				</div>
				<?php if(in_array($v['id'],$following)):?>
				<span class="nocare">取消关注</span>
				<?php else:?>
				<span class="nocare caring">关注</span>
				<?php endif;?>
			</li>
		<?php endforeach;?>
			
		</ul>
	<?php endif;?>
	</div>
	<!--主题详情结束-->
</div>

