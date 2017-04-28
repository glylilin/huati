@extends('layout')
@section('main_left')
<link rel="stylesheet" type="text/css" href="{{asset('static/css/setting.css')}}">
<script type="text/javascript" src='{{asset("static/js/setting.js")}}'></script>
<script type="text/javascript" src='{{asset("static/js/jquery.form.js")}}'></script>
<script type="text/javascript" src='{{asset("static/js/upload/plupload.full.min.js")}}'></script>

<div class='main_left'>
	<div class="topic_desc">
		@if($userinfo['avatarPath'])
		<img src="{{$userinfo['avatarPath']}}" class='user_icon'>
		@else
		<img src="{{asset('static/images/header.png')}}" class="user_icon">
		@endif
		<div class="user_icon_dialog">
			<img src="{{asset('static/images/setting_dialog.png')}}" class="setting_dialog_img" id="update_header">
		
			<span class="setting_dialog_font">修改我的头像</span>
		</div>
		
		<div class='reduction'>
			<input  class="username_sex_able makeable" disabled="disabled" ata='1' value="{{$userinfo['nickname']}}" />
			<span class="controller_able"><img src="{{asset('static/images/update_username.png')}}" class='update_able_img'><font>修改昵称</font></span>
		</div>
		<a href="/dynamic/{{$baseinfo['id']}}"><span class='go_back_user_center'>返回我的个人中心</span></a>
	</div>

	<!--主题详情开始-->
	<div class="topic_main_list">
		<ul class='setting_list'>
			<li><span class="detail_info">电话号码</span><span class="make_phone_edit_able">{{$userinfo['mobile']}}（不可修改）</span></li>
			<li><span class="detail_info">微信号</span>
				<input class="wechat makeable" disabled="disabled" data='2' value="{{$userinfo['weixin']}}"/>
				<span class="controller_able">
					<img src="{{asset('static/images/update_username.png')}}" class='update_able_img'><font>修改微信</font>
				</span>
			</li>
			<li><span class="detail_info">验证码</span>
				<input type='text' class="password update_code" value="" />
				<span class="controller_able update_password_code">
					获取验证码
				</span>
			</li>
			<li><span class="detail_info">密码</span>
				<input class="password makeable updatepassword" type='password' disabled="disabled" value="" />
				<span class="controller_able">
					<img src="{{asset('static/images/update_username.png')}}" class='update_able_img'>
					<font>修改密码</font>
				</span>
			</li>
		</ul>

	</div>
	<!--主题详情结束-->
</div>
<form id='file_upload' action="{{$updateAvatarUrl}}" method='post'>
	<input type='file' class="hidden_file" name='file' />
</form>

@stop
