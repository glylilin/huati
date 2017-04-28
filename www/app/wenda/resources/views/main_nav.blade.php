<div class="header_main" @if(isset($baseinfo) && $baseinfo) uid="{{$baseinfo['id']}}" @endif>
	<a href="http://www.puamap.com"><img class='topic_logo' src="{{asset('static/images/LOGO@2x.png')}}"></a>

		<a href='/s' class="title_logo">话题</a>
		<form method='post' action='/search' id="main_nav_form">
		<div class='seach_main'>
			<input type='text' class='seach_input' name='content' placeholder="搜索你感兴趣的话题…"/>
			<img src="{{asset('static/images/seach.png')}}" class="submitSeach">
		</div>
		</form>
		<ul class="head_quest">
			<li><a @if(isset($navclass) && $navclass=="index") class="active" @endif href="/s">首页</a></li>
			<li><a @if(isset($navclass) && $navclass=="tw") class="active" @endif href="/qadd">提问</a></li>
			<li><a @if(isset($navclass) && $navclass=="wd") class="active" @endif href="/aindex">回答</a></li>
			<li><a @if(isset($navclass) && $navclass=="ds") class="active" @endif href="/column">导师专栏</a></li>
		</ul>
		@if($user['username'])
		<div class="logining clearfix">
			<span>{{$user['username']}}
				<img src="{{asset('static/images/login_down_icon.png')}}" class='login_down_icon'>
			<ul class='logining_down'>
				<li><a href="/dynamic/{{$baseinfo['id']}}" class="user_center">个人中心</a></li>
				<li><a href="/notice/{{$baseinfo['id']}}" class="user_notice user_noticed">通知</a></li>
				<li><a href="/setting" class="user_setting">设置</a></li>
				<li><a href="/signout" class='user_logout'>退出</a></li>
			</ul>
			</span>
			@if($head)
			<img src='{{$head}}'>
			@else
			<img src='{{asset("static/images/header.png")}}'>
			@endif
			

		</div>
		@else
		<div class="login_regist">
			<span class='login'>登录</span>|<span class='register' >注册</span>
		</div>
		@endif
	</div>