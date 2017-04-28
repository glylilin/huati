<?php
use pc\config\FileUtils;
use yii\helpers\Url;
?>
<div class="m_top">
	<label><a href="/huati/login/signin?referer=<?=$referer?>"><img src="<?=FileUtils::getWapCommonFilePath('images', "back2.png")?>"/>返回</a></label>
	<p>注册</p><!--对应页面标题-->
</div>
<form action="<?=Url::to(['/huati/login/register'])?>" method='post' id="register_form">
	<ul class="signin_form">
		<li><input type="tel" name="UserForm[mobile]" class="register_mobile" placeholder="请输入您的手机号"></li>
		<li><p><input type="tel" name="UserForm[code]" class="register_code" placeholder="请输入您收到的验证码"></p><span class="yanzhengma">获取验证码</span></li>
		<li><input type="password" name="UserForm[password]" class="register_password" placeholder="请输入您的密码"></li>
		<li><input type="text" name="UserForm[nickname]" placeholder="请输入您的昵称"></li>
	</ul>
	<input type='hidden' name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>">
	<input type='hidden' name="referer" value="<?=$referer?>">
	</form>
	<p class='error_s'><?=$message?></p>
	<button class="signin_btn register_btn_register">注册</button>
	<div class="signin_other_link">点击“注册”，既表示您同意并愿意遵守<a href="#">《浪迹软件许可及服务协议》</a></div>