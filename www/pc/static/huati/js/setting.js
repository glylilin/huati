var setting_secode = 60;
var setting_timer = null;
$(function(){
	$('.user_icon').mouseover(function(){
		$('.user_icon_dialog').show();
	});
	$('.user_icon_dialog').mouseout(function(){
		$(this).hide();
	});
	$(".update_able_img").click(function(){
		$('.makeable').removeClass("edit_able");
		$('.makeable').attr('disabled','disabled');
		$(this).parent().prev().addClass("edit_able");
		$(this).parent().prev().attr('disabled',false);
		var text = $(this).parent().prev().val();
		$(this).parent().prev().val("").focus().val(text);
		
	});
	

	
$(".user_icon_dialog").click(function(){
	$('.hidden_file').click();
});
$(".hidden_file").change(function(){
	var formData = new FormData($('#file_upload')[0]);
	var url = $("#file_upload").attr('url');
	$.ajax({
	    url:url,
	    cache: false,
	    data: formData,
	    dataType:"JSON",
	    type:"POST",
	    processData: false,
	    contentType: false
	}).done(function(res) {
		if(res['isSuccessful']){
			$('.user_icon').attr('src',res.data.user.avatarPath);
		}
	}).fail(function(res) {});
});

$('.username_sex_able').blur(function(){
	var name = $(this).attr('data');
	var value = $(this).val();
	if(!value){
		return;
	}
	var This = $(this);
	var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
	var csrf_token = $("meta[name='csrf-token']").attr("content");
	var data = "{'nickname':'"+value+"','"+csrf_param+"':'"+csrf_token+"',type:1}";
	data = eval('(' + data + ')');
	$.ajax({
		url:"/huati/user/unickname",
		type:"POST",
		data:data,
		dataType:"JSON",
		success:function(obj){
			if(obj.status){
				$(This).removeClass("edit_able");
           		$(This).attr('disabled','disabled');
			}
		}
	});
});

$('.wechat').blur(function(){
	var name = $(this).attr('data');
	var value = $(this).val();
	if(!value){
		return;
	}
	var This = $(this);
	var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
	var csrf_token = $("meta[name='csrf-token']").attr("content");
	var data = "{'weixin':'"+value+"','"+csrf_param+"':'"+csrf_token+"',type:2}";
	data = eval('(' + data + ')');
	$.ajax({
		url:"/huati/user/unickname",
		type:"POST",
		data:data,
		dataType:"JSON",
		success:function(obj){
			if(obj.status){
				$(This).removeClass("edit_able");
           		$(This).attr('disabled','disabled');
			}
		}
	});
});

$('.updatepassword').blur(function(){
	var password = $(this).val();
	if(!password){
		alert("密码不能为空");
		return;
	}
	if(password.length < 6){
		alert("密码长度不得小于6位");
		return;
	}
	var This = $(this);
	var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
	var csrf_token = $("meta[name='csrf-token']").attr("content");
	var data = "{'password':'"+password+"','"+csrf_param+"':'"+csrf_token+"',type:3}";
	data = eval('(' + data + ')');
	$.ajax({
		url:"/huati/user/unickname",
		type:"POST",
		data:data,
		dataType:"JSON",
		success:function(mes){
			if(!mes.status){
				alert(mes.message);
			}else{
				$(This).removeClass("edit_able");
           		$(This).attr('disabled','disabled');
			}

		}

	});

});
});

function setting_run(){
	setting_secode--;
	if(setting_secode > 0){
		$('.update_password_code').text(setting_secode+"重新获取");
		$('.update_password_code').addClass("update_password_code_end");
	}else{
		$('.update_password_code').text("获取验证码");
		$('.update_password_code').removeClass("update_password_code_end");
		if(setting_timer){
			clearInterval(setting_timer);
			setting_timer = null;
		}
	}
}