var timer = null;
var startSecond = 60;
var timer_Code = null;
var startSecondCode = 60;
$(function(){
	$(".login,#login").click(function(){login();});
	$(".register,#register").click(function(){register();});
	$("#logout_login").click(function(){logout();});
	
	$('.logining span').mouseover(function(){
			show_down();

	});
	$('.logining span').mouseout(function(){
		show_up();
	});

	$('.forget').click(function(){
		changeupdate();
	});

	$(".login_phone,.login_password,.register_phone,.register_password,.update_phone,.update_password,.update_repassword").focus(function(){
		$(this).addClass("blur");
	});

	$(".code_name,.update_code_name").focus(function(){
		$(this).parent().addClass("blur");
	});
	$(".code_name,.update_code_name").blur(function(){
		var code = $(this).val();
		$(this).parent().removeClass("blur");
		if(!code){
			$(this).attr("placeholder","请输出验证码");
		}

	});

	$(".login_phone,.login_password").blur(function(){
		$(this).removeClass("blur");
		var val = $(this).val();
		if(!val){
			if($(this).hasClass("login_phone")){
				$(this).attr("placeholder","手机号码不能为空");
			}else{
				$(this).attr("placeholder","密码不能为空");
			}
			return ;
		}else{
			if($(this).hasClass("login_phone")){
				var reg = /^1[34578]\d{9}$/;
				if(!reg.test(val)){
					$(this).val("");
					$(this).attr("placeholder","手机号码格式错误");
					return;
				}
			}else{
				if(val.length < 6){
					$(this).val("");
					$(this).attr("placeholder","请输入密码（不少于6位）");
					return;
				}
			}
		}
	});

	$(".login_btn").click(function(){
		var login_phone = $(".login_phone").val();
		var login_password = $(".login_password").val();
		if(login_phone == ""){
			$(".login_phone").attr("placeholder","手机号码不能为空");
			return;
		}
		var reg = /^1[34578]\d{9}$/;
		if(!reg.test(login_phone)){
			$(".login_phone").val('');
			$(".login_phone").attr("placeholder","手机号码格式错误");
			return;
		}
		if(login_password.length < 6){
			 $(".login_password").val('');
			$(".login_password").attr("placeholder","请输入密码（不少于6位）");
			return;
		}
		$.ajax({
			url:"/",
			type:"POST",
			data:{"mobile":login_phone,"password":login_password},
			dataType:"JSON",
			success:function(message){
				if(message.status){
					window.location.href="/s"; 
				}else{
					switch(message.field){
						case "mobile":
							$(".login_phone").val('');
							$(".login_phone").attr("placeholder",message.message);
						break;
						case "password":
							$(".login_password").val("");
							$(".login_password").attr("placeholder",message.message);
						break;
						default:
						$(".login_password").val("");
						$(".login_password").attr("placeholder",message.message);
						break;
					}
					return;
				}
			}
		});

	});
	

var register_flag = false;
	$(".register_phone").blur(function(){
		$(this).removeClass("blur");
		var register_phone = $(this).val();
		if(register_phone == ""){
			$(this).attr("placeholder","手机号码不能为空");
			return;
		}
		var reg = /^1[34578]\d{9}$/;
		if(!reg.test(register_phone)){
			$(this).attr("placeholder","手机号码格式错误");
			return;
		}
		$.ajax({
			url:"vmobile",
			type:"POST",
			data:{"mobile":register_phone},
			dataType:"JSON",
			success:function(message){
				if(message.status){
					$(".register_phone").val("");
					$(".register_phone").attr("placeholder","手机号码已经注册");
				}else{
					register_flag = true;
				}
			}
		});
	});

	$(".register_password").blur(function(){
		$(this).removeClass("blur");
		var register_password = $(this).val();
		if(register_password == ""){
			$(this).attr("placeholder","密码不能为空");
			return;
		}
		if(register_password.length < 6){
			 $(this).val('');
			$(this).attr("placeholder","请输入密码（不少于6位）");
			return;
		}
	});



	$(".getCode").click(function(){
		
		if($(this).hasClass('sending') || !register_flag){
			return;
		}
		clearInterval(timer);
		timer= null;
		var register_phone = $(".register_phone").val();
		if(register_phone == ""){
			$(".register_phone").attr("placeholder","手机号码不能为空");
			return;
		}
		var reg = /^1[34578]\d{9}$/;
		if(!reg.test(register_phone)){
			$(".register_phone").attr("placeholder","手机号码格式错误");
			return;
		}
		
		$.ajax({
			url:"svcode",
			type:"POST",
			data:{"mobile":register_phone},
			dataType:"JSON",
			success:function(message){
				if(message.status){
					timer = setInterval("runSecond()",1000);
				}
			}
		});
	});

	$('.register_btn').click(function(){
		var register_phone = $(".register_phone").val();
		if(register_phone == ""){
			$(".register_phone").attr("placeholder","手机号码不能为空");
			return;
		}
		var reg = /^1[34578]\d{9}$/;
		if(!reg.test(register_phone)){
			$(".register_phone").val("");
			$(".register_phone").attr("placeholder","手机号码格式错误");
			return;
		}
		var code_name = $('.code_name').val();
		if(code_name == ""){
			$(".code_name").attr("placeholder","验证码不能为空");
			return;
		}
		var register_password = $('.register_password').val();
		if(register_password.length < 6){
			$('.register_password').val('');
			$(".register_password").attr("placeholder","请输入密码（不少于6位）");
			return;
		}
		$.ajax({
			url:"signup",
			type:"POST",
			data:{"mobile":register_phone,'code':code_name,'password':register_password},
			dataType:"JSON",
			success:function(message){
				if(message.status){
					window.location.reload(); 
				}else{
					switch(message.field){
						case "mobile":
							$(".register_phone").val('');
							$(".register_phone").attr("placeholder",message.message);
						break;
						case "password":
							$(".register_password").val("");
							$(".register_password").attr("placeholder",message.message);
						break;
						case 'code':
							$(".code_name").val("");
							$(".code_name").attr("placeholder",message.message);
						break;
					}
					return;
				}
			}
		});
	});


//重置密码发送验证码
$(".update_getCode").click(function(){
	if($(this).hasClass('sending')){
			return;
	}
	clearInterval(timer_Code);
	timer_Code = null;
	var update_phone = $(".update_phone").val();
	if(update_phone == ""){
			$(".update_phone").attr("placeholder","手机号码不能为空");
			return;
	}
	var reg = /^1[34578]\d{9}$/;
	if(!reg.test(update_phone)){
			$(".update_phone").attr("placeholder","手机号码格式错误");
			return;
	}
	$.ajax({
			url:"svcode",
			type:"POST",
			data:{"mobile":update_phone},
			dataType:"JSON",
			success:function(message){
				if(message.status){
					timer_Code = setInterval("runSecondcode()",1000);
				}
			}
		});
});

$('.update_password,.update_repassword').blur(function(){
	$(this).removeClass('blur');
	var password = $(this).val();
	if(password == '' || password.length < 6){
		 $(this).attr("placeholder","请输入密码（不少于6位）");
		 return;
	}
});
	$(".update_phone").blur(function(){
		$(this).removeClass("blur");
		var val = $(this).val();
		if(!val){
			$(this).attr("placeholder","手机号码不能为空");

		}else{
			var reg = /^1[34578]\d{9}$/;
			if(!reg.test(val)){
					$(this).val("");
					$(this).attr("placeholder","手机号码格式错误");
			}
		}
	});
//重置密码发送
$('.update_btn').click(function(){
	var update_phone = $(".update_phone").val();
	if(update_phone == ""){
			$(".update_phone").attr("placeholder","手机号码不能为空");
			return;
	}
	var reg = /^1[34578]\d{9}$/;
	if(!reg.test(update_phone)){
		
			$(".update_phone").attr("placeholder","手机号码格式错误");
			return;
	}
	var update_code_name = $(".update_code_name").val();
	if(update_code_name == ''){
		$(".update_code_name").attr("placeholder","请输入收到的验证码");
		return;
	}
	var update_password = $(".update_password").val();
	var update_repassword = $('.update_repassword').val();
	if(update_password == '' || update_password.length < 6){
		 $(".update_password").attr("placeholder","请输入密码（不少于6位）");
		 return;
	}
	if(update_repassword == '' || update_repassword.length < 6){
		 $(".update_repassword").attr("placeholder","请输入密码（不少于6位）");
		 return;
	}
	if(update_password != update_repassword){
		$(".update_repassword").attr("placeholder","两次密码不一致");
		 return;
	}
	$.ajax({
		url:"rpassword",
		type:"POST",
		data:{"mobile":update_phone,'code':update_code_name,'password':update_password,'update_repassword':update_repassword},
		dataType:"JSON",
		success:function(message){
			if(message.status){
				window.location.reload(); 
			}else{
				switch(message.field){
						case "mobile":
							$(".update_phone").val("");
							$(".update_phone").attr("placeholder",message.message);
						break;
						case "password":
							$(".update_password").val("");
							$(".update_password").attr("placeholder",message.message);
						break;
						case 'code':
							$(".update_code_name").val("");
							$(".update_code_name").attr("placeholder",message.message);
						break;
						case "repassword":
							$(".update_repassword").val("");
							$(".update_repassword").attr("placeholder",message.message);
						break;
					}
				return;
			}
		}
	});
});


$('.submitSeach').click(function(){
	var content = $(this).prev('.seach_input').val();
	if(content){
		$("#main_nav_form").submit();
	}
});

});
function runSecond(){
		startSecond--;
		if(startSecond > 0){
			$('.getCode').addClass('sending');
			$('.getCode').text(startSecond+"s后重新点击");
		}else{
			$('.getCode').removeClass('sending');
			startSecond = 60;
			$('.getCode').text("点击获取验证码");

			clearInterval(timer);
			timer= null;
		}
		
}

function runSecondcode(){
		startSecondCode--;
		if(startSecondCode > 0){
			$('.update_getCode').addClass('sending');
			$('.update_getCode').text(startSecondCode+"s后重新点击");
		}else{
			$('.update_getCode').removeClass('sending');
			startSecondCode = 60;
			$('.update_getCode').text("点击获取验证码");

			clearInterval(timer_Code);
			timer_Code = null;
		}
		
}
function login(){
	if(!$("#login").hasClass('updateforget')){
		$('.login_register_dialog').show();
		$(".login_register").show();
		$('#register').removeClass("now");
		$("#login").addClass('now');
		$('.login_main').show();
		$('.register_main').hide();
	}
	
}

function register(){
	$('.login_register_dialog').show();
	$(".login_register").show();
	$('#login').removeClass("now");
	$("#register").addClass('now');
	$('.login_main').hide();
	$('.register_main').show();
}

function logout(){
	$('.login_register_dialog').hide();
	$(".login_register").hide();
	$("#login").addClass('now');
	$('#register').show();
	$("#login").text("登录");
	$("#login").show();
	$('.login_main').show();
	$('#register').removeClass("now");
	$('.register_main').hide();


	$('.update_main').hide();
}
//展现下拉
function show_down(){
	$('.login_down_icon').show();
	$('.logining_down').show();


}

//下拉收起
function show_up(){
	$('.logining_down').hide();
	$('.login_down_icon').hide();
}
//修换修改页面
function changeupdate(){
	$('#register').removeClass("now");
	$("#login").addClass('now');
	$("#login").addClass('updateforget');
	$('#register').hide();
	$("#login").text("修改密码");
	$('.login_main').hide();
	$('.register_main').hide();
	$('.update_main').show();
}


