@extends('layout')
@section('main_left')

<link rel="stylesheet" type="text/css" href="{{asset('static/css/invitation.css')}}">
<script type="text/javascript" src='{{asset("static/js/teacher_column_care.js")}}'></script>

<div class='main_left'>
@include("user/header")

	<!--主题详情开始-->
	<div class="topic_main_list">
@include("user/nav")

		<!--我的关注-->
		<ul class="per_list_detail">
			@if($cache_total['message'])
			<li class="per_list_detail_li_one">
				<span class="remmend_topic_reduction">邀请我的</span>
			</li>
			@foreach($data as $v)
			<li class="per_list_detail_li">
				<div class="remmend_topic_time_answer_care">
					@if($v['userinfo'])
					<a href="/dynamic/{{$v['userinfo']['id']}}">
					<span><font>
						@if($v['userinfo']['nickname'])
						{{$v['userinfo']['nickname']}}
						@else
						{{sub_html($v['userinfo']['mobile'])}}
						@endif

					</font> 
					邀请你回答
					</span>
					</a>
					@endif
					<span class="invitation_time">{{format_date($v['add_time'])}}</span>

				</div>
				@if($v['topic'])
				<div class="notice_bottom">
					<a href="/detail/{{$v['topic']['id']}}">
						<span class="remmend_topic_title">
						{{$v['topic']['title']}}
						</span>
					</a>
					<span class="del_notice" data="{{$v['id']}}">删除</span>
				</div>
				
				@endif
			</li>
			@endforeach
			@else
			<li>暂时没有数据</li>
			@endif
		</ul>
	@if($page_list['page_total'] > 1)
	<div class="main_page">
		@if($page > 1)
		<a href="/notice/{{$uid}}/{{$page-1}}">上一页</a>
		@else
		<a>上一页</a>
		@endif
		@foreach($page_list['pages'] as $pi)
			@if($page == $pi)
			<a class='active'>{{$pi}}</a>
			@else
			<a  href="/notice/{{$uid}}/{{$pi}}">{{$pi}}</a>
			@endif
		@endforeach
		@if($page < $page_list['page_total'])
		<a href="/notice/{{$uid}}/{{$page+1}}">下一页</a>
		@else
		<a href="">下一页</a>
		@endif
	</div>
	@endif
	</div>
	<!--主题详情结束-->
</div>
<script type="text/javascript">
$(".del_notice").click(function(){
	var id= $(this).attr('data');
	if(!id){
		return ;
	}
	var This = $(this);
	$.ajax({
		url:"/dnotice",
		type:"POST",
		data:{'id':id},
		dataType:"JSON",
		success:function(mes){
			if(mes.status){
				$(This).parents(".per_list_detail_li").remove();
			}
		}
	});
});
</script>

@stop
