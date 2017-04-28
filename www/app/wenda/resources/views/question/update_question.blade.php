@extends('layout')
@section('main_left')
	<link rel="stylesheet" type="text/css" href="{{asset('static/css/question_left.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('static/css/main_right.css')}}">
	<script type="text/javascript" src='{{asset("static/js/question.js")}}'></script>
	<div class='main_left'>

		<div class="topic_desc">
			<span class="topic_title">发起提问</span>
			
		</div>

		<!--主题详情开始-->
		<div class="topic_main_list">
		<form action="/updateq" method="post" id="addForm">
			<dl>
				<dt>问题:</dt>
				<dd><input class='require input add_topic_title' name='topic_title' value="{{$info['title']}}" placeholder="请写下你的问题或相关内容（必填）"/></dd>
				<dt>详细描述:</dt>
				<dd>
					<textarea class='require textarea add_topic_content' name='content'>{{$info['content']}}</textarea>
				</dd>
				<dt>话题分类:</dt>
				<dd>
					<div class='topic_type'>
						<span class="show_type_list">
							@if($info['topic'])
							@foreach($info['topic'] as $k=>$v)
							<span>{{$v}}</span>
							<input name="topic_tags[]" value="{{$v}}" type="hidden">
							<input name="topic_ids[]" value="{{$info['topic_ids'][$k]}}" type="hidden">
						
							@endforeach
							@endif
						</span>
						<span class="show_down"></span>
						
						@if($topic_list)
						<div class='topic_list_detail'>
							<ul class='clearfix'>
							@foreach($topic_list as $t)
							<li data="{{$t['id']}}">{{$t['name']}}</li>
							@endforeach
							</ul>
							<div class="topic_list_detail_bottom">
								<span class='make_true_topic'>确定</span>
								<span class="make_false_topic">取消</span>
							</div>
						</div>
						@endif
					</div>
					<div class="hot_topic">
						<span>热门话题:</span>
						@if($topic_list)
						<ul class="remment_hot_topic">
							@foreach($topic_list as $k=>$t)
								@if($k < 3)
									<li data="{{$t['id']}}">{{$t['name']}}</li>
								@endif
							@endforeach
							
						</ul>
						@endif
					</div>
				</dd>
				<dt class="request clearfix"><span class='teacher'>邀请导师:</span>
					@if($totur_list)
					<ul class="request_teacher clearfix">
						@if($info['invite_ids'])
							@foreach($info['invite_ids'] as $t)
								@foreach($totur_list as $v)
									@if($t == $v['id'])
									<li>
									<span>@ {{$v['nickname']}}</span>
									<span class="del">X</span>
									<input name="teacher[]" value="{{$v['id']}}" type="hidden">
									</li>
									@endif
								@endforeach
							@endforeach
						@endif
					</ul>
					@endif
				
					</dt>
				<dd class="my_request_top"><span class="my_request">我要邀请</span><span class='js'>点击“我要邀请”按钮，选择想邀请的导师对你的提问进行回答，可不选！</span></dd>
				<dt class="cryptonym">
					匿名发布：
					<span  @if($info['anonymous']) class="isTrue" @endif >是
						<input type='radio' value='1' name='anonymous' class='no_name' @if($info['anonymous']) checked="checked" @endif/>
					</span>
					<span @if(!$info['anonymous']) class="isTrue" @endif>否
						<input type='radio' value='0' class='no_name' name='anonymous'  @if(!$info['anonymous']) checked="checked" @endif/>
					</span>
				</dt>
				<dd class='last_sub'><span class="question_submit">确认发布</span><input type='hidden' name='qa_id' value="{{$info['id']}}"></dd>
			</dl>
		</div>
		</form>
		<!--主题详情结束-->
	</div>

<!--导师弹窗-->
<div class='teacher_dialog'></div>
<div class='teacher_alert'>
	<div class="alert_top">
	<span class="show_mess">邀请导师</span>
		<img src='{{asset("static/images/alert_del.png")}}' class="alert_del"/>
	</div>
	<div class="alert_main_dialog">
	</div>
	<div class="alert_main">
		
		@if($totur_list)
		<ul>
			@foreach($totur_list as $v)
			<li>
				<span class="teacher_icon">
					@if($v['avatarPath'])
					<img  src="{{$v['avatarPath']}}">
					@else
					<img  src="{{asset('static/images/header.png')}}">
					@endif
					<i data="{{$v['id']}}"></i>
				</span>
				<div class="teacher_info">
					<div class='teacher_info_top'>
						<span class="teacher_name">{{$v['nickname']}}</span>
						<span class='car'>{{$v['userCount']['follower']}}关注</span>
						<span class='ques'>{{$v['userCount']['question']}}提问</span>
						<span class='ans'>{{$v['userCount']['answer']}}回答</span>
					</div>
					<div class='teacher_desc'>{{$v['remark']}}</div>
				</div>
			</li>
			@endforeach
		</ul>
		@endif
	</div>
	<div class="alert_end">
		<span class="checked_teacher_submit">确定</span>
		<span class="checked_teacher_reset">清除已选</span>
	</div>
</div>
@if($mess)
<script type="text/javascript">
	alert("{{$mess}}");
</script>
@endif
<!--导师弹窗-->
@stop

