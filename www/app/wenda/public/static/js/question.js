$(function(){


$(".alert_del").click(function(){close_teacher();});
$(".checked_teacher_reset").click(function(){
	clear_teacher();
});
$(".alert_main").find('i').live("click",function(e){

	if($(this).hasClass('tchecked')){
		$(this).removeClass('tchecked');
	}else{
		$(this).addClass('tchecked');
	}
	e.stopPropagation();
	e.stopImmediatePropagation();
});
$(".checked_teacher_submit").click(function(){
	var len = $(".alert_main").find('i').length;
	html = "";
	for (var i = 0; i < len; i++) {
		var obj = $(".alert_main").find('i').eq(i);
		if($(obj).hasClass('tchecked')){
			var tid = $(obj).attr('data');
			var tname = $(obj).parent().next().find(".teacher_name").eq(0).text();
			html += '<li><span>@'+tname+'</span><span class="del">X</span><input type="hidden" name="teacher[]" value="'+tid+'"></li>';
		}
	};
	if(html !== ''){
		$(".request_teacher").html(html);
	}
	close_teacher();
});

$(".my_request").click(function(){
	show_teacher();
});
//删除邀请导师
$(".request_teacher").find(".del").live("click",function(){
	$(this).parent().remove();
});

//展开话题分类选择
$('.show_down').click(function(){
	if($(this).hasClass("opending")){
		close_type();
		$(this).removeClass("opending");
	}else{
		$(this).next().show();
		$(this).addClass("opending");
	}
	
});
//选择分类
$('.topic_list_detail').find('li').click(function(){
	if($(this).hasClass("current")){
		$(this).removeClass("current");
	}else{
		$(this).addClass('current');
	}
});
$('.make_true_topic').click(function(){
	var len = $('.topic_list_detail').find('li').length;
	var html ="";
	for (var i = 0; i < len; i++) {
		var temp = $('.topic_list_detail').find('li').eq(i);
		if($(temp).hasClass("current")){
			var topic_name = $(temp).text();
			var topic_id = $(temp).attr('data');
			html +='<span>'+topic_name+'</span>';
			html +='<input  name="topic_tags[]" type="hidden" value="'+topic_name+'">';
			html +='<input  name="topic_ids[]" type="hidden" value="'+topic_id+'">';
 		}
	};
	$(".show_type_list").html(html);
	close_type();
});

$('.make_false_topic').click(function(){
	$('.topic_list_detail').find('li').removeClass("current");
});

//热门选择
$('.remment_hot_topic').find('li').click(function(){
	var topic_id = $(this).attr('data');
	var topic_name = $(this).text();
	var html ='<span>'+topic_name+'</span>';
		html +='<input  name="topic_tags[]" type="hidden" value="'+topic_name+'">';
		html +='<input  name="topic_ids[]" type="hidden" value="'+topic_id+'">';
		var text_content = $(".show_type_list").text();
		if(text_content == "请选择你要发布的话题分类(必填)"){
			$(".show_type_list").html(html);
		}else{
			$(".show_type_list").append(html);
		}
	
});
$('.question_submit').click(function(){
	var topic_title = $('.add_topic_title').val();
	var topic_content = $(".add_topic_content").val();
	if(!topic_title){
		$('.add_topic_title').attr("placeholder","标题不能为空");
		return;
	}
	if(!topic_content){
		$(".add_topic_content").attr("placeholder","内容能为空");
		return;
	}

	$("#addForm").submit();
});
//处理匿名发布选择
	$(".cryptonym").find("span").click(function(){
		$(".cryptonym").find("span").removeClass('isTrue');
		$('.no_name').attr('checked',false);
		$(this).addClass('isTrue');
		$(this).find(".no_name").attr('checked',true);
	});
});

function close_teacher(){
	$('.teacher_dialog').hide();
	$(".teacher_alert").hide();
}

function clear_teacher(){
	$(".alert_main").find('i').removeClass("tchecked");
}

function show_teacher(){
	$('.teacher_dialog').show();
	$(".teacher_alert").show();
}
//收起分类
function close_type(){
	$('.topic_list_detail').hide();
}


