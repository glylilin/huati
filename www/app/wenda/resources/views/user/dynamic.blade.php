@extends('layout')
@section('main_left')
<link rel="stylesheet" type="text/css" href="{{asset('static/css/dynamic.css')}}">
<script type="text/javascript" src='{{asset("static/js/index_left.js")}}'></script>
<script type="text/javascript" src='{{asset("static/js/detail.js")}}'></script>
<script type="text/javascript" src='{{asset("static/js/teacher_column_care.js")}}'></script>

<div class='main_left'>
	@include('user/header')

	<!--主题详情开始-->
	<div class="topic_main_list">
		@include('user/nav')
		<!--我的关注-->
		<ul class="per_list_detail">
			@if($list)
			@foreach($list as $v)
			<li class="per_list_detail_li">
				<div class="detail_right">
					<!--话题展示開始-->
					<div class="teacher_topic">
						<div class="topic_list_head_action">
						<span class='head_action'>
							@if($v['type'] == 1)
							提出问题
							@else
							回答问题
							@endif
						</span>
							<font class='this_topic_answer_time'>{{format_date($v['add_time'])}}</font></div>
						<div class="teacher_info">
							@if(!$v['anonymous'] || $v['user']['id'] == $baseinfo['id'])
								<a href="/dynamic/{{$v['user']['id']}}">
								@if($v['user']['avatarPath'])
									<img src="{{$v['user']['avatarPath']}}" class="teacher_header">
								@else
									<img src="{{asset('static/images/header.png')}}" class="teacher_header">
								@endif
								</a>
							@else
								<img src="{{asset('static/images/header.png')}}" class="teacher_header">
							@endif
							<dl class="teacher_info_desc">
								<dd class='teacher_info_one'>
									@if(!$v['anonymous'] || ($v['user']['id'] == $baseinfo['id']))
										<a href="/dynamic/{{$v['user']['id']}}">
										<span class='teacher_info_name'>
											@if($v['user']['nickname'])
											{{$v['user']['nickname']}}
											@else
											{{sub_html($v['user']['mobile'])}}
											@endif
										</span>
										</a>
									@else 
										<span class='teacher_info_name'>
											匿名
										</span>
									@endif
									@if($v['user']['type'] == 4)
									<span class="ticon"></span>
									@endif
								</dd>
							</dl>
						</div>
						@if($v['title'])
						<div class="topic_list_head">
							@if($v['type'] == 1)
							<a href="/detail/{{$v['id']}}"><h2 class='topic_list_title'>{{trim($v['title'])}}</h2></a>
							@else
							<a href="/detail/{{$v['id']}}/1/{{$v['aid']}}"><h2 class='topic_list_title'>{{trim($v['title'])}}</h2></a>
							@endif
							
						</div>
						@endif
				
					<span class="this_topic_answer_many_agree">
						<span>{{$v['answer']}} 回答</span><span>{{$v['view']}} 浏览</span>
					</span>
					<div class="topic_list_desc">
							<div class="topic_brief">{{mb_substr(strip_tags($v['content']),0,140)}}</div>
					</div>
						<dl class="topic_add_ons">
								<dd class="this_topic_answer_make_agree_or_disagree">
									<span class="this_topic_answer_make_agree">{{$v['like']}} 赞</span>
									<span class="this_topic_answer_make_disagree">{{$v['dislike']}} 踩</span>
								</dd>
								<dd class="stop_comment" data="{{$v['id']}}">{{$v['comment']}}评论
								</dd>
								<dd class="share_topic">分享</dd>
								
						</dl>
						<div class="topic_comment_list">
							<div class="comment_topic_main">
								<input type='text'class='comment_content' data="{{$v['id']}}"/>
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
			@else
			<li>暂时没有动态</li>
			@endif

		</ul>
			@if($page_list['page_total'] > 1)
		<div class="main_page">
								@if($page > 1)
								<a href="/dynamic/{{$uid}}/{{$page-1}}">上一页</a>
								@else
									<a>上一页</a>
								@endif
								@foreach($page_list['pages'] as $p)
									@if($p == $page)
									<a class='active'>{{$p}}</a>
									@else
									<a href="/dynamic/{{$uid}}/{{$p}}">{{$p}}</a>
									@endif
								@endforeach
								@if($page < $page_list['page_total'])
								<a href="/dynamic/{{$uid}}/{{$page+1}}">下一页</a>
								@else
								<a>下一页</a>
								@endif
		</div>
		@endif
	</div>
	<!--主题详情结束-->
</div>


<!--评论的评论-->
@stop