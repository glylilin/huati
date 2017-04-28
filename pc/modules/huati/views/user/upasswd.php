<?php
use pc\config\FileUtils;
?>
<div class="m_top">
	<label><a href="/huati/user/setting"><img src="<?=FileUtils::getWapCommonFilePath('images', "back2.png")?>"/>返回</a></label>
	<p>修改密码</p><!--对应页面标题-->
</div>
	<form action='/huati/user/upasswd' method='post' id="update_passwd">
	<ul class="signin_form">
		<li><input type="password" name="password" class="update_password" placeholder="请输入新密码"></li>
		<li><input type="password" name="repassword" class="update_repassword" placeholder="请再次输入新密码"></li>
	</ul>
        <input type='hidden' name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>">
	</form>
    <p class='error_s'><?=$message?></p>
	<button class="signin_btn update_passwd">提交</button>