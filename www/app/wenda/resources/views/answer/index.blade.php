@extends('layout')
@section('main_left')
<link rel="stylesheet" type="text/css" href="{{asset('static/css/index_answer_left.css')}}">
<script type="text/javascript" src="{{asset('static/js/index_answer.js')}}"></script>
<div class='main_left'>
	
	<div class="topic_desc">
		
		<ul class="topic_csd">
			<li class="checked_now">推荐</li>
			<li>热门</li>
			<!-- <li>邀请</li> -->
		</ul>
	</div>

	<!--主题详情开始-->
	<div class="topic_main_list">
	
		<ul class="per_list_detail show_topic_list">
		@if($remend)
			@foreach($remend as $r)
			<li class="per_list_detail_li">
				<a href="/detail/{{$r['id']}}"><span class="remmend_topic_title">{{$r['title']}}</span></a>
				<img src="{{asset('static/images/logout.png')}}" class='remmend_topic_del'>
				<div class="remmend_topic_time_answer_care">
					<span>{{date('Y.m.d',$r['add_time'])}}</span>
					<span>{{$r['answer']}} 回答</span>
					<span>{{$r['view']}} 浏览</span>
				</div>
			</li>
			@endforeach
		@endif
		
		</ul>
		
		
		<ul class="per_list_detail">
		@if($remend)
			@foreach($hot as $h)
			<li class="per_list_detail_li">
				<a href="/detail/{{$h['id']}}"><span class="remmend_topic_title">{{$h['title']}}</span></a>
				<img src="{{asset('static/images/logout.png')}}" class='remmend_topic_del'>
				<div class="remmend_topic_time_answer_care">
					<span>{{date('Y.m.d',$h['add_time'])}}</span>
					<span>{{$h['answer']}} 回答</span>
					<span>{{$h['view']}} 浏览</span>
				</div>
			</li>
			@endforeach
		@else
			<li>暂时没有数据</li>
		@endif
		</ul>
		
		<!-- <ul class="per_list_detail">
			<li class="per_list_detail_li_one">
				<span class="remmend_topic_reduction">邀请我回答的问题</span>
			</li>
			<li class="per_list_detail_li">
				<span class="remmend_topic_title">有没有什么很中二又很装逼的语句？有没有什么很中二又很装逼的语句？有没有什么很中二又很装逼的语句？有没有什么很中二又很装逼的语句</span>
				<div class="remmend_topic_time_answer_care">
					<span>1小时前</span>
					<span><font>赛琳娜</font> 邀请你回答</span>
					<span>50 回答</span>
					<span>13 关注</span>
				</div>
				<span class='ignore_topic'>忽略</span>
			</li>
			<li class="per_list_detail_li">
				<span class="remmend_topic_title">有没有什么很中二又很装逼的语句？有没有什么很中二又很装逼的语句？有没有什么很中二又很装逼的语句？有没有什么很中二又很装逼的语句</span>
				<div class="remmend_topic_time_answer_care">
					<span>1小时前</span>
					<span><font>赛琳娜</font> 邀请你回答</span>
					<span>50 回答</span>
					<span>13 关注</span>
				</div>
				<span class='ignore_topic'>忽略</span>
			</li>
			<li class="per_list_detail_li">
				<span class="remmend_topic_title">有没有什么很中二又很装逼的语句？有没有什么很中二又很装逼的语句？有没有什么很中二又很装逼的语句？有没有什么很中二又很装逼的语句</span>
				<div class="remmend_topic_time_answer_care">
					<span>1小时前</span>
					<span><font>赛琳娜</font> 邀请你回答</span>
					<span>50 回答</span>
					<span>13 关注</span>
				</div>
				<span class='ignore_topic'>忽略</span>
			</li>
			<li class="per_list_detail_li">
				<span class="remmend_topic_title">有没有什么很中二又很装逼的语句？有没有什么很中二又很装逼的语句？有没有什么很中二又很装逼的语句？有没有什么很中二又很装逼的语句</span>
				<div class="remmend_topic_time_answer_care">
					<span>1小时前</span>
					<span><font>赛琳娜</font> 邀请你回答</span>
					<span>50 回答</span>
					<span>13 关注</span>
				</div>
				<span class='ignore_topic'>忽略</span>
			</li>
		</ul> -->
	</div>
	<!--主题详情结束-->
</div>
@stop

