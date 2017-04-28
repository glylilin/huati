@extends('layout')
@section('main_left')
	<link rel="stylesheet" type="text/css" href="{{asset('static/css/care.css')}}">
	<script type="text/javascript" src='{{asset("static/js/header.js")}}'></script>
	<script type="text/javascript" src='{{asset("static/js/teacher_column_care.js")}}'></script>

<div class='main_left'>
@include('user/header')

	<!--主题详情开始-->
	<div class="topic_main_list">
		@include("user/nav")

		<div class="second_tab_top">
			<span class='active_care'>我关注的人</span>
			<span>关注我的人</span>

		</div>
		<!--我的关注-->
		<ul class="per_list_detail current_now">
		@if($myfollow)
			@foreach($myfollow as $mf)
			<li class="per_list_detail_li">
				<a href="/dynamic/{{$mf['following']['id']}}">
					@if($mf['following']['avatarPath'])
					<img class="teacher_column_header" src="{{$mf['following']['avatarPath']}}">
					@else
					<img class="teacher_column_header" src='{{asset("static/images/header.png")}}'>
					@endif
				</a>
				
				<div class="teacher_column_info">
					<p class='teacher_info_top'>
					<a href="/dynamic/{{$mf['following']['id']}}">
						<span class='teacher_column_info_name'>
						@if($mf['following']['nickname'])
						{{$mf['following']['nickname']}}
						@else
						{{sub_html($mf['following']['mobile'])}}
						@endif
						</span>
					</a>
					
					@if($mf['following']['type'] == 4)
					<span class="ticon"></span>
					@endif
					</p>
					<p class='teacher_info_brief'>
					<span>{{$mf['userCount']['answer']}}回答</span>
					<span>{{abs($mf['userCount']['question'])}}提问</span>
					<span>{{$mf['userCount']['follow']}}关注</span>
					</p>
				</div>
				<span class="nocare_make" data="{{$mf['rel_user_id']}}">取消关注</span>
			</li>
			@endforeach
			@if(count($myfollow) == 15)
				<li><div class="gomore" data="mf" page='1'>加载更多</div></li>
			@endif
		@else
		<li>暂时没有数据</li>
		@endif
		</ul>
		<!--关注我的-->
		<ul class="per_list_detail">
		@if($followme)
			@foreach($followme as $mf)
			<li class="per_list_detail_li">
				<a href="/dynamic/{{$mf['following']['id']}}">
					@if($mf['following']['avatarPath'])
					<img class="teacher_column_header" src="{{$mf['following']['avatarPath']}}">
					@else
					<img class="teacher_column_header" src='{{asset("static/images/header.png")}}'>
					@endif
				</a>
			
				<div class="teacher_column_info">
					<p class='teacher_info_top'>
					<a href="/dynamic/{{$mf['following']['id']}}">
						<span class='teacher_column_info_name'>
						@if($mf['following']['nickname'])
						{{$mf['following']['nickname']}}
						@else
						{{sub_html($mf['following']['mobile'])}}
						@endif
						</span>
					</a>
					
					@if($mf['following']['type'] == 4)
					<span class="ticon"></span>
					@endif
					</p>
					<p class='teacher_info_brief'>
					<span>{{$mf['userCount']['answer']}}回答</span>
					<span>{{abs($mf['userCount']['question'])}}提问</span>
					<span>{{$mf['userCount']['follow']}}关注</span>
					</p>
				</div>
				
			</li>
			@endforeach
			@if(count($followme) == 15)
				<li><div class="gomore" data="fm" page='1'>加载更多</div></li>
			@endif
		@else
			<li>暂时没有数据</li>
		@endif
		</ul>
	
	</div>
	<!--主题详情结束-->
</div>
<script type="text/javascript">
	$(".nocare_make").live("click",function(){
	var rel_user_id = $(this).attr('data');
	if(!rel_user_id){
		return;
	}
	var This = $(this);
	$.ajax({
			url:"/delete",
			type:"post",
			data:{'rel_user_id':rel_user_id},
			dataType:"JSON",
			success:function(obj){
				if(obj.status){
					$(This).parents(".per_list_detail_li").remove();
				}
			}
		});
});
	$(".gomore").click(function(){
		var type = $(this).attr('data');
		var page = $(this).attr('page');
		var This = $(this);
		$.ajax({
			url:"/ajaxfollow",
			type:"post",
			data:{'type':type,"page":page},
			dataType:"JSON",
			success:function(obj){
				if(obj.status){
					var html ="";
					$.each(obj.list,function(k,val){
						html +='<li class="per_list_detail_li">';
						if(val['following']['avatarPath']){
							html +='<img class="teacher_column_header" src="'+mf['following']['avatarPath']+'">';
						}else{
							html +='<img class="teacher_column_header" src="/static/images/header.png">';
						}
						html +='<div class="teacher_column_info">';
						html +="<p class='teacher_info_top'>";
						html +="<span class='teacher_column_info_name'>";
						if(mf['following']['nickname']){
							html +=mf['following']['nickname'];
						}else{
							html +=mf['following']['mobile'];
						}
						html +='</span>';
						if(mf['following']['type'] == 4){
						html +='<span class="ticon"></span>';
						}
						html +="</p><p class='teacher_info_brief'>";
						html +="<span>"+mf['userCount']['answer']+"回答</span>";
						html +="<span>"+math.abs(mf['userCount']['question'])+"提问</span>";
						html +="<span>"+mf['userCount']['follow']+"关注</span>";
						html +="</p></div>";
						html +='<span class="nocare_make" data="'+mf['rel_user_id']+'">取消关注</span></li>';
					});
					$(This).parents(".per_list_detail current_now").append(html);
					$(This).attr("page",obj.page);
					if(obj.total <15){
$(This).parent().remove();
					}
				}else{
					$(This).parent().remove();
				}
			}
		});
	});
</script>
@stop
