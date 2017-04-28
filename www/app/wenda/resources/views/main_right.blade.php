<div class="main_right">
	<h2 class='center_self'>个人中心</h2>
	
	<div class='center_info'>
		@if(isset($uid) && $uid == $baseinfo['id'])
				<a @if(isset($class) && $class == "careuser") class='care ahover' @else class='care'  @endif href="/careuser">我的关注</a>
				<a @if(isset($class) && $class=='question') class='question ahover' @else class='question' @endif href="/ask/{{$baseinfo['id']}}">我的提问</a>
				<a @if(isset($class) && $class=='answer') class='answer  ahover' @else class='answer' @endif  href="/cans/{{$baseinfo['id']}}">我的回答</a>
				<a @if(isset($class) && $class=='collection') class='collection  ahover' @else class='collection' @endif href="/col">我收藏的话题</a>
				<a @if(isset($class) && $class=='notice') class='invite ahover'  @else class='invite' @endif  href="/notice/{{$baseinfo['id']}}">邀请我回答的话题</a>
		@else
			@if(isset($baseinfo) && $baseinfo)
				<a class='care' href="/careuser">我的关注</a>
				<a class='question' href="/ask/{{$baseinfo['id']}}">我的提问</a>
				<a class='answer'   href="/cans/{{$baseinfo['id']}}">我的回答</a>
				<a class='collection' href="/col">我收藏的话题</a>
				<a class='invite'  href="/notice/{{$baseinfo['id']}}">邀请我回答的话题</a>
			@endif
		@endif
	
	</div>
	@if(isset($rightlist['info']) && $rightlist['info'])
	<div class="base_hot_topic">
		<h2>最热话题</h2>
		<!-- <span class="change_hot">换一批</span> -->
	</div>
	@endif
	<div class="base_hot_topic_list">
			<ul>
			@foreach($rightlist['info'] as $ri)
				<li><b></b><a href="/detail/{{$ri['id']}}" title="{{$ri['title']}}">{{$ri['title']}}</a></li>
			@endforeach
			</ul>

		</div>
		<div class="app_info">
			<img src="{{asset('static/images/index_right_tag.png')}}" class='topic_right_tag'>
			<span class='puamap_app_title'>浪迹教育APP</span>
			<span class='puamap_app_desc'>从屌丝蜕变男神神器</span>
			<img src="{{asset('static/images/app.png')}}" class="app_img">
			<div class="index_right_wechat_download">
			<img src="{{asset('static/images/logo.png')}}" class="puamap_logo">
			
			<span class='puamap_detail'>扫码下载</span>
			</div>
		</div>
</div>