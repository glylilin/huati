<?php 
use pc\config\FileUtils;
use yii\helpers\Url;
use pc\config\CommonUrl;
$this->registerCssFile(FileUtils::getFilePath('css',"huati", "setting.css"));
$this->registerJsFile(FileUtils::getFilePath('js',"huati", "setting.js"));
?>

<div class='main_left'>
<?php if($user_info):?>
	<div class="topic_desc">
	   <?php if($user_info['avatar_info'] && $user_info['avatar_info']['path']) :?>
		<img src="<?=$user_info['avatar_info']['path']?>" class='user_icon'>
		<?php else :?>
		<img src="<?=FileUtils::getFilePath('images', 'huati', 'header.png')?>" class="user_icon">
		<?php endif;?>
		<div class="user_icon_dialog">
			<img src="<?=FileUtils::getFilePath('images', 'huati', 'setting_dialog.png')?>" class="setting_dialog_img" id="update_header">
		
			<span class="setting_dialog_font">修改我的头像</span>
		</div>
		
		<div class='reduction'>
		 
			<input  class="username_sex_able makeable" disabled="disabled" ata='1' value="<?=$user_info['nickname']?>" />
			<span class="controller_able"><img src="<?=FileUtils::getFilePath('images', 'huati', 'update_username.png')?>" class='update_able_img'><font>修改昵称</font></span>
		</div>
		<a href="<?=Url::to(['/'.Yii::$app->user->id.'/dynamic'])?>"><span class='go_back_user_center'>返回我的个人中心</span></a>
	</div>

	<!--主题详情开始-->
	<div class="topic_main_list">
		<ul class='setting_list'>
			<li><span class="detail_info">电话号码</span><span class="make_phone_edit_able"><?=$user_info['mobile']?>（不可修改）</span></li>
			<li><span class="detail_info">微信号</span>
				<input class="wechat makeable" disabled="disabled" data='2' value="<?=$user_info['weixin']?>"/>
				<span class="controller_able">
					<img src="<?=FileUtils::getFilePath('images', 'huati', 'update_username.png')?>" class='update_able_img'><font>修改微信</font>
				</span>
			</li>
		
			<li><span class="detail_info">密码</span>
				<input class="password makeable updatepassword" type='password' disabled="disabled" value="" />
				<span class="controller_able">
					<img src="<?=FileUtils::getFilePath('images', 'huati', 'update_username.png')?>" class='update_able_img'>
					<font>修改密码</font>
				</span>
			</li>
		</ul>

	</div>
	<!--主题详情结束-->
	<?php endif;?>
</div>
<form id='file_upload' method='post' url="<?=CommonUrl::getUpdateAvatar()."?access_token=".$user_info['access_token']?>">
	<input type='file' class="hidden_file" name='file' />
</form>
<script type="text/javascript" src="/static/js/jquery.min.js"></script>

