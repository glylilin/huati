@extends('layout')
@section('main_left')
	<link rel="stylesheet" type="text/css" href="{{asset('static/css/teacher_column.css')}}">
	<script type="text/javascript" src="{{asset('static/js/teacher_column_care.js')}}"></script>

<div class='main_left'>

	<div class="topic_desc">
		<span class="topic_title">导师专栏</span>
	
	</div>

	<!--主题详情开始-->
	<div class="topic_main_list">
		<ul class="per_list_detail">
			@if($totur_list)
			@foreach($totur_list as $t)
			<li class="per_list_detail_li">
				<a href="/dynamic/{{$t['id']}}">
				@if($t['avatarPath'])
				<img class="teacher_column_header" src="{{$t['avatarPath']}}">
				@else
				<img class="teacher_column_header" src="{{asset('static/images/header.png')}}">
				@endif
				</a>
				<div class="teacher_column_info">
					<p class='teacher_info_top'>
						<a href="/dynamic/{{$t['id']}}">
					<span class='teacher_column_info_name'>
						@if($t['nickname'])
						{{$t['nickname']}}
						@else
						{{$t['level']['name']}}
						@endif
					</span>
					</a>
					<span class="ticon"></span></p>
					<p class='teacher_info_brief'>
					<span>{{$t['userCount']['answer']}}回答</span>
					<span>{{$t['userCount']['question']}}提问</span>
					<span class="care_num_it">{{$t['userCount']['follower']}}关注</span>
					</p>
						
				</div>
				@if($t['isFollow'])
				<span class="nocare" data="{{$t['id']}}">取消关注</span>
				@else
				<span class="nocare caring" data="{{$t['id']}}">关注</span>
				@endif
			</li>
			@endforeach
			@endif
			
		</ul>
	
	</div>
	<!--主题详情结束-->
</div>
@stop