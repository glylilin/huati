@extends('layout')
@section('main_left')
<link rel="stylesheet" type="text/css" href="{{asset('static/css/user_center_ask_question.css')}}">
<script type="text/javascript" src='{{asset("static/js/teacher_column_care.js")}}'></script>
<script type="text/javascript" src='{{asset("static/js/user_center_ask_question.js")}}'></script>
<div class='main_left'>
	@include("user/header")
	<!--主题详情开始-->
	<div class="topic_main_list">
		@include("user/nav")
		<!--我的提问-->
	<ul class="per_list_detail">
		@if($cache_total['question_total'])
		@foreach($data as $d)
			<li class="per_list_detail_li">
				<a href="/detail/{{$d['id']}}"><span class="remmend_topic_title">{{$d['title']}}</span></a>
				<div class="remmend_topic_time_answer_care">
					<span>{{format_date($d['add_time'])}}</span>
					<span>{{$d['answer']}} 回答</span>
					<span>{{$d['view']}} 浏览</span>
				</div>
				<a class='ignore_question' data="{{$d['id']}}">删除提问</a>
			</li>
		@endforeach
		@else
		<li>暂时没有数据</li>
		@endif
		</ul>
	@if($pages_info['page_total'] > 1)
	<div class="main_page">
		@if($page > 1)
		<a href="/ask/{{$uid}}/{{$page-1}}">上一页</a>
		@else
		<a>上一页</a>
		@endif
		@foreach($pages_info['pages'] as $pi)
			@if($page == $pi)
			<a class='active'>{{$pi}}</a>
			@else
			<a  href="/ask/{{$uid}}/{{$pi}}">{{$pi}}</a>
			@endif
		@endforeach
		@if($page < $pages_info['page_total'])
		<a href="/ask/{{$uid}}/{{$page+1}}">下一页</a>
		@else
		<a>下一页</a>
		@endif
		
	</div>
	@endif
	</div>
	<!--主题详情结束-->
</div>

@stop

