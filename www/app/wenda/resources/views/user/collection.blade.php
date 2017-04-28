@extends('layout')
@section('main_left')
<link rel="stylesheet" type="text/css" href="{{asset('static/css/collection.css')}}">
<script type="text/javascript" src='{{asset("static/js/index_left.js")}}'></script>
<script type="text/javascript" src='{{asset("static/js/detail.js")}}'></script>
<script type="text/javascript" src='{{asset("static/js/teacher_column_care.js")}}'></script>
<div class='main_left'>
@include("user/header")

	<!--主题详情开始-->
	<div class="topic_main_list">
		@include("user/nav")

		<!--我的关注-->
		<ul class="per_list_detail">
			@if($list)
			@foreach($list as $v)
			<li class="per_list_detail_li">

				<div class="detail_right">
					<!--话题展示開始-->
					<div class="teacher_topic">
						<div class="topic_list_head">
						@if($v['qa']['type'] == 1)
							<a href="/detail/{{$v['qa']['id']}}">
								<h2 class='topic_list_title'>{{$v['ans']['title']}}</h2>
							</a>
						@else
							<a href="/detail/{{$v['ans']['id']}}/1/{{$v['qa']['id']}}">
								<h2 class='topic_list_title'>{{$v['ans']['title']}}</h2>
							</a>
						@endif
							<font class='this_topic_answer_time'>{{format_date($v['add_time'])}}</font></div>
						@if($v['qa']['content'])
						<div class="topic_list_desc">
							<div class="topic_brief">{{mb_substr(strip_tags($v['qa']['content']),0,140)}}</div>
						</div>
						@endif
						<dl class="topic_add_ons">
								<dd class="this_topic_answer_make_agree_or_disagree">
									<span class="this_topic_answer_make_agree">{{$v['qa']['like']}} 赞</span>
									<span class="this_topic_answer_make_disagree">{{$v['qa']['dislike']}} 踩</span>
								</dd>
								<dd class="stop_comment" data="{{$v['qa']['id']}}">{{$v['qa']['comment']}}评论
								</dd>
								<dd class="share_topic">分享</dd>
								<dd class="no_collect_topic" data="{{$v['qa']['id']}}">
									@if($v['qa']['type'] == 1)
									取消收藏问题
									@else
									取消收藏问答
									@endif
								</dd>
								
						</dl>
						<div class="topic_comment_list">
							<div class="comment_topic_main">
								<input type='text'class='comment_content' data="{{$v['qa']['id']}}" />
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
			@endif
		</ul>
		@if($page_list['page_total'] >1)
		<div class="main_page">
								@if($page > 1)
								<a href="/col/{{$uid}}/{{$page-1}}">上一页</a>
								@else
									<a>上一页</a>
								@endif
								@foreach($page_list['pages'] as $p)
									@if($p == $page)
									<a class='active'>{{$p}}</a>
									@else
									<a href="/col/{{$uid}}/{{$p}}">{{$p}}</a>
									@endif
								@endforeach
								@if($page < $page_list['page_total'])
								<a href="/col/{{$uid}}/{{$page+1}}">下一页</a>
								@else
								<a>下一页</a>
								@endif
		</div>
		@endif
	</div>
	
</div>
<script type="text/javascript">
$(".no_collect_topic").click(function(){
	var id = $(this).attr('data');
	if(!id){
		return;
	}
var This = $(this);
	$.ajax({
			url:"/dcreate",
			type:"post",
			data:{'rel_id':id,"status":1},
			dataType:"JSON",
			success:function(obj){
				if(obj.status){
					$(This).parents('.per_list_detail_li').remove();
						
				}
			}
		});
});
</script>
@stop
