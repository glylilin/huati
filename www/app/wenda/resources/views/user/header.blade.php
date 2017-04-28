@if($userinfo)
	<div class="topic_desc">
		@if($userinfo['avatarPath'])
		<img src="{{$userinfo['avatarPath']}}" class='user_icon'>
		@else
		<img src="{{asset('static/images/header.png')}}" class='user_icon'>
		@endif
		<div class='reduction'>
			<!-- <span class="username_sex women"> -->
			<span class="username_sex">
				@if($userinfo['nickname'])
					{{$userinfo['nickname']}}
				@else
					{{$userinfo['mobile']}}
				@endif
			</span>
			<p class="information">
				@if($userinfo['remark'])
				{{$userinfo['remark']}}
				@else
				我相信，明天会更好。
				@endif
			</p>
			<p class='fans_caring'>
				<span>粉丝<font>{{$userinfo['userCount']['follower']}}</font></span>
				<span>关注<font>{{$userinfo['userCount']['following']}}</font></span>
			</p>
		</div>
	</div>
	@endif