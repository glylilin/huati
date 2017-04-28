<?php
use pc\config\FileUtils;
?>
<div class="m_top">
	<label><a href="javascript:history.go(-1)"><img src="<?=FileUtils::getWapCommonFilePath('images', "back2.png")?>"/>返回</a></label>
	<p>设置</p><!--对应页面标题-->
	
</div>
	<ul class="member_list">
		<li><a href="/huati/user/pinformation"><p><img src="<?=FileUtils::getWapCommonFilePath('images', "my_icon.png")?>">个人资料</p><span></span></a></li>
		<li><a href="/huati/user/upasswd"><p><img src="<?=FileUtils::getWapCommonFilePath('images', "password_icon.png")?>">密码修改</p><span></span></a></li>
	</ul>
	
    <a href="/huati/login/logout"><button class="signout_btn">退出登录</button></a>