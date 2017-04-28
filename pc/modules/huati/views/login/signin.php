<?php
use pc\config\FileUtils;

?>
<div class="m_top">
	<label><a href="<?=$referer?>"><img src="<?=FileUtils::getWapCommonFilePath('images', "back2.png")?>"/>返回</a></label>
	<p>登录</p><!--对应页面标题-->
<span><a href="/huati/login/register?referer=<?=$referer?>">注册</a></span>
</div>
<form action="" method='post'>
	<ul class="signin_form">
		<li><input type="tel" name="UserForm[mobile]" class="login_mobile" placeholder="手机号"><p></p></li>
		<li><input type="password" name="UserForm[password]" class="login_password" placeholder="登录密码"></li>
	</ul>
	<input type='hidden' name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>">
	<input type='hidden' name="referer" value="<?=$referer?>">
	<p class="login_error"><?=$message?></p>
	<button class="signin_btn">登录</button>
</form>


	
	<div class="signin_other_link"><span><a href="/huati/login/forget?referer=<?=$referer?>">忘记密码?</a></span></div>

<!-- 	<dl class="signin_other_way">
		<dt><span>或第三方账号登录</span></dt>
		<dd><p class="weixin"><a href="#"></a></p></dd>
	</dl> -->