<?php 
use pc\config\FileUtils;
use yii\helpers\Url;
?>
<div class="logining clearfix">
			<span><?=$user['nickname']?>
		
			<img src="<?=FileUtils::getFilePath('images', 'huati', "login_down_icon.png")?>" class='login_down_icon'>
		
			<ul class='logining_down'>
				<li><a href="<?=Url::to(["/".Yii::$app->user->id.'/dynamic'])?>" class="user_center"><?=yii::t("TOPIC", "USER_CENTER")?></a></li>
				<!-- 
				<li><a href="<?=Url::to(['/topic/user/dynamic'])?>" class="user_notice user_noticed"><?=yii::t("TOPIC", "USER_NOTICE")?></a></li>
				 -->
				<li><a href="<?=Url::to(['/huati/user/setting'])?>" class="user_setting"><?=yii::t("TOPIC", "USER_SETTING")?></a></li>
				<li><a href="<?=Url::to(['/huati/login/logout'])?>" class='user_logout'><?=yii::t("TOPIC", "LOGOUT")?></a></li>
			</ul>
			</span>
			
			<?php if(isset($user['avatar_info']) && $user['avatar_info']):?>
			<img src="<?=$user['avatar_info']['path']?>">
			<?php else:?>
			<img src='<?=FileUtils::getFilePath('images', 'huati', "header.png")?>'>
			<?php endif;?>
		</div>