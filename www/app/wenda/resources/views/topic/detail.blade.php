@extends('layout')
@section('main_left')

<link rel="stylesheet" type="text/css" href="{{asset('static/css/detail_left.css')}}">
<script type="text/javascript" src='{{asset("static/js/detail.js")}}'></script>
<script type="text/javascript" src='{{asset("static/js/index_left.js")}}'></script>

<link rel="stylesheet" type="text/css" href="{{asset('static/simditor/styles/font-awesome.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('static/simditor/styles/simditor.css')}}" />

<div class='main_left'>
@if($topic_info)
	@if(isset($topic_info['topic']))
	<div class='detail_type_list'>
		@foreach($topic_info['topic'] as $k=>$vi)
		<a href="/s/{{$topic_info['topic_ids'][$k]}}">{{$vi}}</a>
		@endforeach
	</div>
	@endif
	<ul class='per_list_detail clearfix'>
		<li class="per_list_detail_li">
				<div class="detail_top_right">
					<!--话题导师介绍信息开始-->
					@if($topic_info['user'])
					<div class="teacher_info_0">
						@if(!$topic_info['anonymous'])
							<a href="/dynamic/{{$topic_info['user']['id']}}">
							@if($topic_info['user']['avatarPath'])
							<img src="{{$topic_info['user']['avatarPath']}}" class="teacher_header">
							@else
							<img src="{{asset('static/images/header.png')}}" class="teacher_header">
							@endif
							</a>
						@else
							<img src="{{asset('static/images/header.png')}}" class="teacher_header">
						@endif
						<dl class="teacher_info_desc">
							<dd class='teacher_info_one'>
								@if(!$topic_info['anonymous'])
									<a href="/dynamic/{{$topic_info['user']['id']}}">
									<span class='teacher_info_name'>
									@if($topic_info['user']['nickname'])
										{{$topic_info['user']['nickname']}}
									@else
										{{sub_html($topic_info['user']['mobile'])}}
									@endif
									</span>
									</a>
								@else
									<span class='teacher_info_name'>
									匿名
									</span>
								@endif
								@if($topic_info['user']['type'] == 4)
									<span class="ticon"></span>
								@endif
							</dd>
							<dd class='teacher_info_req_ans'>
								<span>{{$topic_info['user']['userCount']['answer']}}回答</span>
								<span>{{abs($topic_info['user']['userCount']['question'])}}提问</span>
								<span>{{$topic_info['user']['userCount']['follower']}}关注者</span>
								
							</dd>
							@if($topic_info['user']['id'] != $baseinfo['id'])
								@if(in_array($topic_info['user']['id'],$following))
								<b class='reset' data="{{$topic_info['user']['id']}}">取消关注</b>
								@else
								<b class='cate_it' data="{{$topic_info['user']['id']}}">关注TA</b>
								@endif
							@endif
						</dl>
					</div>
					@endif
					<!--话题导师介绍信息介绍-->
					<!--话题展示開始-->
					<div class="teacher_topic">
						<div class="topic_list_head"><h2 class='topic_list_title'>{{$topic_info['title']}}</h2></div>
						<div class="topic_list_desc_top">
							<?=decode_content($topic_info['content'])?>
						</div>
						<dl class="topic_add_ons topic_add_ons_0">
								@if($topic_info["isFavorite"])
								<dd class="delete_topic" data='{{$topic_info["id"]}}'>已关注话题</dd>
								@else
								<dd class="follow_topic" data='{{$topic_info["id"]}}'>关注话题</dd>
								@endif
								<dd>发布于{{date("Y-m-d",$topic_info['add_time'])}}</dd>
								<dd>浏览 {{$topic_info['view']}}次</dd>
								<dd class="stop_comment" data="{{$topic_info['id']}}">{{$topic_info['comment']}}评论
								</dd>
								<dd class="share_topic">分享</dd>
								@if($baseinfo['id'] ==$topic_info['user_id'])
								<dd class='update'><a href="/updateq/{{$topic_info['id']}}">修改</a></dd>
								@endif
								
						</dl>
						<div class="topic_comment_list">
							<div class="comment_topic_main">
								<input type='text'class='comment_content' data="{{$topic_info['id']}}" />
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
	</ul>
	@endif
<!------------------------------------------------------------------>

	<div class="topic_desc">
		@if($topic_info['answer'])
		<span class="topic_title">	
			{{$topic_info['answer']}}个回答
		</span>
		@endif
		<ul class="topic_csd">
			@if($sort == 1)
			<li><a class='active_current'>最热</a></li>
			@else
			<li><a href="/detail/{{$id}}">最热</a></li>
			@endif

			@if($sort == 2)
			<li><a class='active_current'>最新</a></li>
			@else
			<li><a href="/detail/{{$id}}/2">最新</a></li>
			@endif

			@if($sort != 2 && $sort != 1)
			<li><a class='active_current'>时间</a></li>
			@else
			<li><a href="/detail/{{$id}}/3">时间</a></li>
			@endif
			
		</ul>
	</div>

	<!--主题详情开始-->
	<div class="topic_main_list">
		<ul class="per_list_detail">

			@if($list)
			@foreach($list as $v)
			<li class="per_list_detail_li move_current_{{$v['id']}}">
					<!--话题导师介绍信息开始-->
					@if($v['user'])
					<div class="teacher_info">
						<a href="/dynamic/{{$v['user']['id']}}">
						@if($v['user']['avatarPath'])
						<img src="{{$v['user']['avatarPath']}}" class="teacher_header">
						@else
						<img src="{{asset('static/images/header.png')}}" class="teacher_header">
						@endif
						</a>
						<dl class="teacher_info_desc">
							<dd class='teacher_info_one'>
								<a href="/dynamic/{{$v['user']['id']}}">
								<span class='teacher_info_name'>
									@if($v['user']['nickname'])
									{{$v['user']['nickname']}}
									@else
									{{sub_html($v['user']['mobile'])}}
									@endif
								</span>
								</a>
							@if($v['user']['type'] == 4)
							<span class="ticon"></span>
							@endif
							@if($v['user']['id'] != $baseinfo['id'])
								@if(in_array($v['user']['id'],$following))
								<b class='reset' data="{{$v['user']['id']}}">取消关注</b>
								@else
								<b class='cate_it' data="{{$v['user']['id']}}">关注TA</b>
								@endif
								@endif
						</dd>
							<dd class='teacher_info_req_ans'>
								<span>{{$v['user']['userCount']['answer']}}回答</span>
								<span>{{abs($v['user']['userCount']['question'])}}提问</span>
								<span>{{$v['user']['userCount']['follower']}}关注者</span>
								
							</dd>
						</dl>
					</div>
					@endif
					<!--话题导师介绍信息介绍-->
				<div class="detail_left" data="{{$v['id']}}">
					<span class="agree" data="{{$v['id']}}">
						<img src="{{asset('static/images/topic_agree_0.png')}}" class="detail_like_img">
						<span class="detail_like_num">{{$v['like']}}</span>
					</span>
					<span class="disagree" data="{{$v['id']}}">
						<img src="{{asset('static/images/topic_disagree_0.png')}}" class="detail_like_img">
						<span class="detail_like_num">{{$v['dislike']}}</span>
					</span>
				</div>
				<div class="detail_right">
				
					<!--话题展示開始-->
					<div class="teacher_topic">
				
						<div class="topic_list_desc">
							
							<div class="topic_brief">{{mb_substr(strip_tags(decode_content($v['content'])),0,134)}}<span class="show_all">【显示全部】</span></div>

							<div class="topic_brief_all"><?=decode_content($v['content']);?><span class="close_all">收起回答</span></div>
						</div>
						<dl class="topic_add_ons">
								
								<dd>回答时间 {{date('Y-m-d H:i',$v['add_time'])}}</dd>
								<dd class="stop_comment" data="{{$v['id']}}">{{$v['comment']}}评论
								</dd>
								<dd class="share_topic">分享</dd>
								@if($v["isFavorite"])
								<dd class="delete_topic" data='{{$v["id"]}}' flag="1">已收藏</dd>
								@else
								<dd class="follow_topic" data='{{$v["id"]}}' flag="1">收藏</dd>
								@endif
								@if($baseinfo['id'] ==$v['user_id'])
								<dd class='update'><a href="/qupdate/{{$v['id']}}">修改</a></dd>
								@endif
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
					
				</div>
			</li>
			@endforeach
			@endif
			
		</ul>

	</div>
	<div class="answer_the_question">
		
		<textarea id="editor" class="editor"></textarea>
		<div class="detail_reply_submit">
			<span class='answer_submit' data="{{$topic_info['id']}}">提交</span>
		</div>
	
	</div>
<script type="text/javascript" src="{{asset('static/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('static/simditor/scripts/js/simditor-all.js')}}"></script>
	<script type="text/javascript">
 $(function(){
    toolbar = [ 'title', 'bold', 'italic', 'underline',
            'color', '|', 'ol', 'ul', 'blockquote', 'table', '|',
             'image', 'hr','indent', 'outdent' ];
    var editor = new Simditor( {
        textarea : $('#editor'),
        placeholder : '',
        toolbar : toolbar,  //工具栏
        defaultImage : '', //编辑器插入图片时使用的默认图片
        upload : {
            url : '{{$upload_url}}', //文件上传的接口地址
            params: null, //键值对,指定文件上传接口的额外参数,上传的时候随文件一起提交
            fileKey: 'file', //服务器端获取文件数据的参数名
            connectionCount:1 ,
            leaveConfirm: '正在上传文件'
        },
      
    });
   })
	 $('.answer_submit').click(function(){
	 	var qa_id = $(this).attr("data");
	 	if(!qa_id){
	 		return;
	 	}
	 	var content = $('#editor').val();
	 	if(!content){
	 		return;
	 	}
	 	$.ajax({
	 		url:"/qans",
	 		type:"POST",
	 		data:{'qa_id':qa_id,'content':content},
	 		dataType:"JSON",
	 		success:function(mes){
	 			if(mes.status){
	 				window.location.reload();
	 			}else{
	 				alert(obj.message);
	 			}
	 		}
	 	});
	 });
	 $(function(){
	 	if("{{$page}}" !=''){
	 		var scrolltop= $(".move_current_{{$page}}").offset().top-50;
			$("html,body").animate({scrollTop:scrolltop},500);
	 	}
	 });
	</script>
</div>
@stop
