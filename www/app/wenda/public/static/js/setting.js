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
	$("#file_upload").ajaxSubmit({
                dataType:'json',
                beforeSend: function() {
                   
                },
                complete: function(xhr, status, $form){
                    window.location.reload();
                }
            });
});

$('.username_sex_able').blur(function(){
	var name = $(this).attr('data');
	var value = $(this).val();
	if(!value){
		return;
	}
	var This = $(this);
	$.ajax({
		url:"/updatei",
		type:"POST",
		data:{"name":1,"value":value},
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
	$.ajax({
		url:"/updatei",
		type:"POST",
		data:{"name":2,"value":value},
		dataType:"JSON",
		success:function(obj){
			if(obj.status){
				$(This).removeClass("edit_able");
           		$(This).attr('disabled','disabled');
			}
		}
	});
});

$(".update_password_code").click(function(){
	if($(this).hasClass('update_password_code_end')){
		return;
	}
	var This = $(this);
	$.ajax({
		url:"/supcode",
		type:"POST",
		data:{},
		dataType:"JSON",
		success:function(mes){
			if(mes.status){
				$(This).addClass("update_password_code_end");
				setting_timer = setInterval("setting_run()",1000);
			}
		}
	});
});

$('.updatepassword').blur(function(){
	var password = $(this).val();
	var code = $(".update_code").val();
	
	if(!code){
		alert("验证码不能为空");
		return;
	}
	if(!password){
		alert("密码不能为空");
		return;
	}
	if(password.length < 6){
		alert("面长度不得小于6位");
		return;
	}
	var This = $(this);
	$.ajax({
		url:"/updatepassword",
		type:"POST",
		data:{"code":code,"password":password},
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