@extends('layout')
@section('main_left')
<link rel="stylesheet" type="text/css" href="{{asset('static/css/main_left.css')}}">
<script type="text/javascript" src='{{asset("static/js/index_left.js")}}'></script>
<div class='main_left'>
	<ul class='topic_type clearfix'>
		@if($type == 0)
		<li class="current"><a>全部</a></li>
		@else
		<li><a href="/s">全部</a></li>
		@endif
		@if($type_list)
			@foreach($type_list as $p)
				@if($p['id'] == $type)
				<li class="current"><a>#{{$p['name']}}</a></li>
				@else
				<li ><a href="/s/{{$p['id']}}">#{{$p['name']}}</a></li>
				@endif
			@endforeach
		@endif
	
	</ul>
	<div class="topic_desc">
		
		@if($topic_info)
		<span class="topic_title">狙击挽回</span>
		
		@else
		<span class="topic_title">全部</span>
		
		@endif

		<ul class="topic_csd">
			<li>{{$question}}问题</li>
			<li>{{$answer}}回答</li>
			@if($topic_info)
			<li>{{$topic_info['follow']}}关注</li>
			@endif
		</ul>
	</div>
	@if($hot || $top)
	<div class="topic_remmend">
			<img src="{{asset('static/images/hot.png')}}" class='topic_hot_img'/>
			<dl class="topic_hot_desc">
				<dd><span>【置顶】</span><a href="/detail/{{$top['id']}}">{{$top['title']}}</a></dd>
				<dd><span>【热议】</span><a href="/detail/{{$hot['id']}}">{{$hot['title']}}</a></dd>
			</dl>
	</div>
	@endif
	<!--主题详情开始-->
	<div class="topic_main_list">
		<ul class="per_list_detail">
			@foreach($list as $lo)
				<li class="per_list_detail_li">
				<div class="detail_left">
					<span class="agree" data="{{$lo['id']}}">{{$lo['like']}}<br/>赞同</span>
					<span class="disagree" data="{{$lo['id']}}">{{$lo['dislike']}}<br/>反对</span>
				</div>
				<div class="detail_right">
					<!--话题导师介绍信息开始-->
					@if($lo['user'])
					<div class="teacher_info">
						@if($lo['user']['avatarPath'])
						<img src="{{$lo['user']['avatarPath']}}" class="teacher_header">
						@else
						<img src="{{asset('static/images/header.png')}}" class="teacher_header">
						@endif
						<dl class="teacher_info_desc">
							<dd class='teacher_info_one'><span class='teacher_info_name'>
						@if($lo['user']['nickname'])
							{{$lo['user']['nickname']}}
						@else
							{{$lo['user']['mobile']}}
						@endif
							</span>
						@if($lo['user']['type'] == 4)
							<span class="ticon"></span>
						@endif
							
						</dd>
							<dd class='teacher_info_req_ans'>
								<span>{{$lo['user']['userCount']['answer']}}回答</span>
								<span>{{abs($lo['user']['userCount']['question'])}}提问</span>
								<span>{{$lo['user']['userCount']['follower']}}关注者</span>
								@if($lo['user']['id'] != $baseinfo['id'])
								@if(in_array($lo['user']['id'],$follow))
								<b class='reset' data="{{$lo['user']['id']}}">取消关注</b>
								@else
								<b class='cate_it' data="{{$lo['user']['id']}}">关注他</b>
								@endif
								@endif
							</dd>
						</dl>
					</div>
					@endif
					<!--话题导师介绍信息介绍-->
					<!--话题展示開始-->
					<div class="teacher_topic">
						<div class="topic_list_head">
						@if($lo['digest'])
						<span>精</span>
						@endif
						<a href="/detail/{{$lo['id']}}"><h2 class='topic_list_title'>{{$lo['title']}}</h2></a></div>
						<div class="topic_list_desc">
							<span class='topic_come_from'>来自话题:{{$lo['topic']}}</span>
							<div class="topic_brief">{{$lo['content']}}</div>
						</div>
						<dl class="topic_add_ons">
								@if($lo["isFollow"])
								<dd class="delete_topic" data='{{$lo["id"]}}'>已关注话题</dd>
								@else
								<dd class="follow_topic" data='{{$lo["id"]}}'>关注话题</dd>
								@endif
								<dd class="stop_comment" data="{{$lo['id']}}">{{$lo['comment']}}评论
								</dd>
								<dd class="share_topic">分享</dd>
								@if($baseinfo['id'] == $lo['user_id'])
								<dd class="update_topic"><a href="/updateq/{{$lo['id']}}">修改</a></dd>
								@endif
						</dl>
						<div class="topic_comment_list">
							<div class="comment_topic_main">
								<input type='text'class='comment_content' data="{{$lo['id']}}" />
								<span class="send_comment">
									评论
								</span>
							</div>
							
							<ul class="comment_info">
						
							</ul>
							
							<div class="comment_page">
								
							</div>
							
						</div>
					</div>
					<!--话题展示結束-->
				</div>
			</li>
			@endforeach
				
			
		</ul>
		@if($page_list)
		<div class="main_page">
								@if($page > 1)
								<a href="/s/{{$type}}/{{$page-1}}">上一页</a>
								@else
									<a>上一页</a>
								@endif
								@foreach($page_list['pages'] as $p)
									@if($p == $page)
									<a class='active'>{{$p}}</a>
									@else
									<a href="/s/{{$type}}/{{$p}}">{{$p}}</a>
									@endif
								@endforeach
								@if($page < $page_list['page_total'])
								<a href="/s/{{$type}}/{{$page+1}}">下一页</a>
								@else
								<a>下一页</a>
								@endif
		</div>
		@endif
	</div>
	<!--主题详情结束-->
</div>
<div class="goTop"><a href="#bodytop"><img src="{{asset('static/images/icon_top.png')}}"></a></div>
@stop