<?php
use pc\config\FileUtils;
use yii\helpers\Url;
?>
<div class="m_top">
	<label><a href="/huati/login/signin?referer=<?=$referer?>"><img src="<?=FileUtils::getWapCommonFilePath('images', "back2.png")?>"/>返回</a></label>
	<p>忘记密码</p><!--对应页面标题-->
</div>
	<form action="<?=Url::to(['/huati/login/forget'])?>" method='post' id="forget_form">
	<ul class="signin_form" >
	<li><input type="tel" name="UserForm[mobile]" class="register_mobile" placeholder="请输入您的手机号"></li>
		<li><p><input type="text" name="UserForm[code]" class="forget_code" placeholder="请输入收到的验证码"></p><span class="yanzhengma">获取验证码</span></li>
		<li><input type="password" name="UserForm[password]" class="forget_password" placeholder="请输入新密码"></li>
		<li><input type="password" name="UserForm[repassword]" class="forget_repassword" placeholder="请再次输入新密码"></li>
	</ul>
	<input type='hidden' name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>">
	<input type='hidden' name="referer" value="<?=$referer?>">
	</form>
	<p class='error_s'><?=$message?></p>
	<button class="signin_btn forget_btn">提交</button>