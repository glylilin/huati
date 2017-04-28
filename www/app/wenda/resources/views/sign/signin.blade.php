<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Transitional//EN" "http://www.w3.org/tr/xhtml1/Dtd/xhtml1-transitional.dtd">
<html>
<head>
	<title>话题|男性约会_恋爱_聊天问答_生活方式-浪迹教育</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="IE=edge, chrome=1">
<link rel="stylesheet" type="text/css" href="{{asset('static/css/sign.css')}}">
<script type="text/javascript" src="{{asset('static/js/jquery-1.8.2.min.js')}}"></script>
<script type="text/javascript" src='{{asset("static/js/header.js")}}'></script>
</head>
<body>
<div class='sign_red'></div>
<img src="{{asset('static/images/sign_dialog.png')}}" class='sign_desc_title'>
<div class='login_register'>
	<div class='login_head'>
		<span id='login' class='now'>登录</span>
		<span id='register'>注册</span>
	</div>
	<div class='login_main'>
		
		<dl>
			<dt>手机号码</dt>
			<dd><input type='text' name='mobile' class='require login_phone' placeholder="请输入手机号码"/></dd>
			<dt>密码</dt>
			<dd><input type='password' name='password' class='require login_password' placeholder="请输入密码（不少于6位）" /></dd>
			<dd><span class='login_btn'>登录</span></dd>
			<dd class='clearfix'><span class='forget'>忘记密码?</span></dd>
			<dd class='down_load'><span class='down_load_btn'>下载浪迹教育App</span></dd>
		</dl>
		
	</div>
	<div class='register_main'>
		<dl>
			<dt>手机号码</dt>
			<dd><input type='text' class='require  register_phone' placeholder="请输入手机号码"/></dd>
			<dt>验证码</dt>
			<dd class='show_code'><input type='text' class='code_name'  placeholder="请输入收到的验证码"/><span class='getCode '>点击获取验证码</span></dd>
			<dt>密码</dt>
			<dd><input type='password' class='require register_password'  placeholder="请输入密码（不少于6位）"/></dd>
			<dd><span class='register_btn'>注册</span></dd>
			<dd class='link'>点击"注册",即表示您同意并愿意遵守<span >《浪迹教育协议》</span></dd>

			<dd class='down_load'><span class='down_load_btn'>下载浪迹教育App</span></dd>
		</dl>
	</div>
	<div class='update_main'>
		<dl>
			<dt>手机号码</dt>
			<dd><input type='text' name='mobile' class='require  update_phone' placeholder="请输入手机号码"/></dd>
			<dt>验证码</dt>
			<dd class='update_show_code'><input type='text' class='update_code_name'  placeholder="请输入收到的验证码"/><span class='update_getCode'>点击获取验证码</span></dd>
			<dt>新密码</dt>
			<dd><input type='password' class='require update_password'  placeholder="请输入密码（不少于6位）"/></dd>
			<dt>确认密码</dt>
			<dd><input type='password' class='require update_repassword'  placeholder="请输入密码（不少于6位）"/></dd>
			<dd><span class='update_btn'>确定</span></dd>
		</dl>
	</div>

</div>
</body>
</html>