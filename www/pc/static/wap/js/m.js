var show1=0;
var pai=0;
var comment=0;

$(function(){
	var bodyH=parseInt($(document).height());
//返回顶部
	$(window).scroll(function(){
		if($(window).scrollTop()>300){
			$(".m_goTop").show();
		}else{
			$(".m_goTop").hide();
		}
	})
	$(".m_goTop").click(function(){
		$("html,body").animate({scrollTop:0},500);
	})
//分类
	if($(".m_classify").length>0){
		var topH=parseInt($(".m_classify dl").offset().top+$(".m_classify dl").height()+2);
		$(".m_classify div").height(bodyH-topH);	
		$(".m_classify dt").click(function(){
			if(show1==0){
				$(".m_classify div").show();
				show1=1;
			}else{
				$(".m_classify div").hide();
				show1=0;
			}
		})
	}
//介绍
	var con=0;
	$(".show_btn").click(function(){
		if(con==0){
			$(this).find("img").attr("src",$(this).find("img").attr("hideT"));
			$(this).prev().addClass("con_show");
			con=1;
		}else if(con==1){
			$(this).find("img").attr("src",$(this).find("img").attr("showT"));
			$(this).prev().removeClass("con_show");
			con=0;
		}
	})
//注册验证码
	var countdown=60;
	var down_time=null;
	$(".yanzhengma").click(function(){
		var This=this;
		if($(This).hasClass("forbidden")){
			return;
		}
		var mobile = $(".register_mobile").val();
		if(!mobile){
    		$('.error_s').html("<font style='color:red;'>手机号不能为空</font>");
    		return false;
    	}else{
    		var pattern = /^1[3|4|5|7|8][0-9]{9}$/;
			if(!pattern.test(mobile)){

				$('.error_s').html("<font style='color:red;'>电话号码格式不正确</font>");
				$('.register_mobile').val("");
				return false;
			}
    	}
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data = "{'mobile':'"+mobile+"','"+csrf_param+"':'"+csrf_token+"'}";
		data = eval('(' + data + ')');
		var url = "/huati/login/scode";
		$(This).addClass("forbidden");
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				down_time=setInterval(function(){
					if(countdown>1){
						countdown--;
						$(This).text(countdown+"s后重发");
					}else{
						$(This).removeClass("forbidden");
						$(This).text("获取验证码");
						clearInterval(down_time);
						countdown=60;
						down_time=null;
					}			
				}, 1000);
			}
		});
		
		
	})
	//注册
	$(".register_btn_register").click(function(){
		var mobile = $(".register_mobile").val();
		var code = $(".register_code").val();
		var password = $(".register_password").val();
		if(!mobile){
    		$('.error_s').html("<font style='color:red;'>手机号不能为空</font>");
    		return false;
    	}else{
    		var pattern = /^1[3|4|5|7|8][0-9]{9}$/;
			if(!pattern.test(mobile)){

				$('.error_s').html("<font style='color:red;'>电话号码格式不正确</font>");
				$('.register_mobile').val("");
				return false;
			}
    	}
		if(!code){
			$('.error_s').html("<font style='color:red;'>验证码不能为空</font>");
    		return false;
		}
		if(!password){
			$('.error_s').html("<font style='color:red;'>密码不能为空</font>");
    		return false;
		}
		if(password.toString().length < 6 || password.toString().length > 20){
			$('.error_s').html("<font style='color:red;'>密码长度为6到20位</font>");
			$('.register_password').val("");
			return false;
		}
		$("#register_form").submit();
	});
	
	$("#register_form").find("input").focus(function(){
		$('.error_s').html("");
	});
	
	
	$('.forget_btn').click(function(){
		var mobile = $(".register_mobile").val();
		var code = $(".forget_code").val();
		var password = $(".forget_password").val();
		var repassword = $(".forget_repassword").val();
		if(!mobile){
    		$('.error_s').html("<font style='color:red;'>手机号不能为空</font>");
    		return false;
    	}else{
    		var pattern = /^1[3|4|5|7|8][0-9]{9}$/;
			if(!pattern.test(mobile)){

				$('.error_s').html("<font style='color:red;'>电话号码格式不正确</font>");
				$('.register_mobile').val("");
				return false;
			}
    	}
		if(!code){
			$('.error_s').html("<font style='color:red;'>验证码不能为空</font>");
    		return false;
		}
		if(!password){
			$('.error_s').html("<font style='color:red;'>密码不能为空</font>");
    		return false;
		}
		if(password.toString().length < 6 || password.toString().length > 20){
			$('.error_s').html("<font style='color:red;'>密码长度为6到20位</font>");
			$('.register_password').val("");
			return false;
		}
		if(password != repassword){
			$('.error_s').html("<font style='color:red;'>两次密码不一致</font>");
			$('.register_password').val("");
			return false;
		}
		$("#forget_form").submit();
	});
//排序方式
	$(".huida_title dd .pai").click(function(){
		if(pai==0){
			$(this).next().fadeIn();
			pai=1;
		}else{
			$(this).next().fadeOut();
			pai=0;
		}
	})
	
//内容伸缩
	$(".huati_huida_list").on('click','.con>.show',function(){
		$(this).parent().fadeOut();
		$(this).parent().next().fadeIn();
	})
	$(".huati_huida_list .con_all .hide").click(function(){
		$("html,body").animate({scrollTop:$(this).parent().parent().offset().top},200);
		$(this).parent().fadeOut();
		$(this).parent().prev().fadeIn();
	})
//评论
	var this_html;
	$(".huati_huida_list").on('click','.comment > p',function(){
		if($(this).hasClass('open')){//收拢
			$(this).html(this_html);
			$(this).find("i").hide();
			$(this).parent().next(".comment_hide_box").fadeOut();
			$(this).removeClass('open');
		}else{//展开
			this_html=$(this).html();
			$(this).html("收起评论<i></i>");
			$(this).find("i").show();
			$(this).parent().next(".comment_hide_box").fadeIn();
			if(!$(this).hasClass("loaded")){
				var id = $(this).parents("li").attr("data-id");
				var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
				var csrf_token = $("meta[name='csrf-token']").attr("content");
				var data ="{'id':"+id+",'"+csrf_param+"':'"+csrf_token+"'}";
				data = eval('(' + data + ')');
				var url ="/huati/comment/index"
				var This =this;
				$.ajax({
					url:url,
					data:data,
					type:"POST",
					success:function(res){
						$(".comment_hide_box").html(res);
						$(This).addClass("loaded");
					}
				});
			}
			$(this).addClass('open');
		}
		
	})
//编辑框
	$(".edit_form textarea").focus(function(){
		$(".edit_bottom dt").show();
	}).blur(function(){
		$(".edit_bottom dt").hide();
	})
	$(".edit_bottom dt").click(function(){
		$(this).hide();
	})
	$(".edit_bottom dd span").click(function(){
		$(this).toggleClass("current");
		if($(this).hasClass("current")){
			$(".anonymous_radio").val(1);
		}else{
			$(".anonymous_radio").val(0);
		}
	})
//选择分类
	$(".huati_all>dd>span").click(function(){
		$(this).toggleClass("current");
		if($(this).hasClass("current")){
			$(".huati_choose dd label").hide();
			var topic_ids = $(this).attr('data-id');
			var topic_tags = $(this).text();
			var html = "<input type='hidden' name='topic_ids[]' value='"+topic_ids+"'/>";
				html +="<input type='hidden' name='topic_tags[]' value='"+topic_tags+"'/>";
				$(".huati_choose dd").append("<span rel='"+$(this).text()+"'>"+$(this).text()+""+html+"</span>");
		}else{
			$(".huati_choose dd span[rel="+$(this).text()+"]").remove();
		}
		
		if($(".huati_choose dd span").length>0){
			$(".huati_choose dt").show();
		}else{
			$(".huati_choose dt").hide();
			$(".huati_choose dd label").show();
		}
	})
	$(".huati_choose dt").click(function(){
		$(this).hide();
		$(".huati_choose dd span").remove();
		$(".huati_choose dd label").show();
		$(".huati_all>dd>span").removeClass("current");
	})
	$(".huati_choose dd").on('click','span',function(){
		$(this).remove();
		$(".huati_all dd span[rel="+$(this).text()+"]").removeClass("current");
		if($(".huati_choose dd span").length>0){
			$(".huati_choose dt").show();
		}else{
			$(".huati_choose dt").hide();
			$(".huati_choose dd label").show();
		}
	})
})

$(document).bind("touchend",function(e){
	var target = $(e.target);
	if(target.closest(".m_classify div ul,.m_classify dt").length == 0){
		$(".m_classify div").fadeOut();
		show1=0;
	};
	if(target.closest(".huida_title dd .pai").length == 0){
		$(".huida_title dd div").fadeOut();
		pai=0;
	};
})

