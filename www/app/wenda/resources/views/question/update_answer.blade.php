@extends('layout')
@section('main_left')
<link rel="stylesheet" type="text/css" href="{{asset('static/css/question_left.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('static/css/main_right.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('static/simditor/styles/font-awesome.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('static/simditor/styles/simditor.css')}}" />
	<div class='main_left'>

	<div class="answer_the_question">
		<textarea id="editor" class="editor"><?=decode_content($info['content'])?></textarea>
		<div class='detail_reply_submit'>
			<span class='answer_submit' data="{{$info['id']}}">提交</span>
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
            fileKey: 'fileData', //服务器端获取文件数据的参数名
            connectionCount:1 ,
            leaveConfirm: '正在上传文件',
            crossDomain:true
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
	 		url:"/qupdate",
	 		type:"POST",
	 		data:{'qa_id':qa_id,'content':content},
	 		dataType:"JSON",
	 		success:function(mes){
	 			if(mes.status){
	 				window.location.href="/detail/{{$info['qa_id']}}";
	 			}else{
	 				alert(obj.message);
	 			}
	 		}
	 	});
	 });
	</script>
</div>

<!--导师弹窗-->
@stop

