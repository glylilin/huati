<?php
use pc\config\FileUtils;
use pc\config\CommonUtils;
use yii\helpers\Url;
?>
<?php if($user_info):?>
	<li class="per_list_detail_li no_margin_top clearfix" uid="<?=$user_info['id']?>">
	<a href="<?=Url::to(["/".$user_info['id']."/dynamic"])?>">
<?php if($user_info['avatar_info'] && $user_info['avatar_info']['path']):?>
	<img  src="<?=$user_info['avatar_info']['path'];?>" class="teacher_column_header" />
		<?php else :?>
	<img  src="<?=FileUtils::getFilePath('images', 'huati', "header.png");?>" class="teacher_column_header"/>
<?php endif;?>
</a>
	<div class="teacher_column_info">
		<p class='teacher_info_top'>
		<a href="<?=Url::to(["/".$user_info['id']."/dynamic"])?>">
		<span class='teacher_column_info_name'>
		<?php if($user_info['nickname']) :?>
			<?=$user_info['nickname']?>
			<?php else :?>
			<?=CommonUtils::format_phone($user_info['mobile'])?>
		<?php endif;?>
		</span>
		</a>
		<span class="ticon"></span>
		</p>
		<?php if($user_info['userCount']) :?>
			<p class='teacher_info_brief'><span><?=$user_info['userCount']['answer']?>回答</span><span><?=$user_info['userCount']['question']?>提问</span><span><?=$user_info['userCount']['follower']?>关注</span></p>
		<?php endif;?>
		</div>
		<span class="reset">取消关注</span>	
		</li>
<?php endif;?>