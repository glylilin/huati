<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Transitional//EN" "http://www.w3.org/tr/xhtml1/Dtd/xhtml1-transitional.dtd">
<html>
<head>
	<title>话题|男性约会_恋爱_聊天问答_生活方式-浪迹教育</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="IE=edge, chrome=1">
	<link rel="stylesheet" type="text/css" href="{{asset('static/css/main.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('static/css/main_right.css')}}">
	<script type="text/javascript" src="{{asset('static/js/jquery-1.8.2.min.js')}}"></script>

	<script type="text/javascript" src='{{asset("static/js/header.js")}}'></script>
	<script type="text/javascript" src='{{asset("static/js/share.js")}}'></script>
</head>
<body>
<div class="header">
@include("main_nav")
</div>
<div class='main_content clearfix'>
@yield('main_left')

@include("main_right")
</div>
<div class="main_bottom">
	<h2>Copyright 2016 实战pua社区-浪迹教育 All Rights Reserved.</h2>
</div>

<div class="share_dialog">
	<ul class="share_ul">
		<li class='sina'><img src='{{asset("static/images/sina.png")}}'><span>新浪微博</span></li>
<!-- 		<li class='ten'><img src='images/ten.png'><span>腾讯微博</span></li>
		<li class='qq'><img src='images/qq.png'><span>QQ空间</span></li>
		<li class='rr'><img src='images/rr.png'><span>人人网</span></li> -->
	</ul>
</div>
</body>
</html>
