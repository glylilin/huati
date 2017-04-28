$(function(){
	$(".submitSeach").click(function(){
		var content = $(".seach_input").val();
		if(content){
			$(this).parents(".main_nav_form").submit();
		}
	});
	$('.topic_add_ons').mouseover(function(){
		if(!$(this).find('.share_topic').hasClass("isOIP")){
			$(".share_dialog").hide();
		}
		$('.topic_add_ons').find('.hiddens').hide();
		$(this).find('.hiddens').show();
	});
	$('.topic_add_ons').mouseout(function(){
		if(!$('.share_topic').hasClass("isOIP")){
			$(this).find('.hiddens').hide();
		}
	});
	
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
	$(".require").focus(function(){
		$(".require").removeClass('blur');
		$(this).addClass("blur");
		$(this).next().text("");
	});
	$(".require").blur(function(){
		var content = $(this).val();
		if(!content){
			$(this).next().text("*此项为必填项*");
			$(this).parents(".form_main").attr('send',false);
			return;
		}
		var flag = $(this).attr("flag");
		if(flag == "mobile"){
			var pattern = /^1[3|4|5|7|8][0-9]{9}$/;
			if(!pattern.test(content)){
				$(this).next().text("电话号码格式不正确");
				$(this).val("");
				$(this).parents(".form_main").attr('send',false);
				return;
			}
		}else if(flag == "password"){
			if(content.toString().length < 6 || content.toString().length > 20){
				$(this).next().text("密码长度为6到20位");
				$(this).val("");
				$(this).parents(".form_main").attr('send',false);
				return;
			}
		}else if(flag == "repassword"){
			if(content.toString().length < 6 || content.toString().length > 20){
				$(this).next().text("密码长度为6到20位");
				$(this).val("");
				$(this).parents(".form_main").attr('send',false);
				return;
			}
			var update_password =$(".update_password").val();
			if(content != update_password){
				$(this).next().text("两次密码不一致");
				$(this).val("");
				$(this).parents(".form_main").attr('send',false);
				return;
			}
		}
		$(this).parents(".form_main").attr('send',true);
	});
	$(".login_btn").click(function(){
		var This = this;
		$(".login_main").find('.require').each(function(i,obj){
			var temp = $(obj).val();
			if( !temp || temp =="undefined"){
				$(this).next().text("*此项为必填项*");
				$(This).parents(".form_main").attr('send',false);
			}
		});
		var send = $(this).parents(".form_main").attr('send');
		if(!send){
			return;
		}
		var mobile = $(".login_mobile").val();
		var password = $(".login_password").val();
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var url =$(this).parents(".form_main").attr('url');
		var data = "{'UserForm[mobile]':'"+mobile+"','UserForm[password]':'"+password+"','"+csrf_param+"':'"+csrf_token+"'}";
		data = eval('(' + data + ')');
		sendJsonAjax(url,data,loginCallBackFunction);
	});
	//发送验证码
	$('.getCode').click(function(){
		if($(this).hasClass("sending")){
			return;
		}
		var mobile =  $(".register_mobile").val();
		if(!mobile){
			$(".register_mobile").next().text("*此项为必填项*");
			return;
		}
		var pattern = /^1[3|4|5|7|8][0-9]{9}$/;
		if(!pattern.test(mobile)){
			$(".register_mobile").next().text("电话号码格式不正确");
			return;
		}
	
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data = "{'mobile':'"+mobile+"','"+csrf_param+"':'"+csrf_token+"'}";
		data = eval('(' + data + ')');
		var url = "/huati/login/scode";
		$(this).addClass("sending");
		startTimer("freshCodeTimer()");
		sendJsonAjax(url,data,sendCodeCallBackFunction);
	});
	//发送验证码
	$('.update_getCode').click(function(){
		if($(this).hasClass("sending")){
			return;
		}
		var mobile =  $(".update_mobile").val();
		if(!mobile){
			$(".update_mobile").next().text("*此项为必填项*");
			return;
		}
		var pattern = /^1[3|4|5|7|8][0-9]{9}$/;
		if(!pattern.test(mobile)){
			$(".update_mobile").next().text("电话号码格式不正确");
			return;
		}
	
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data = "{'mobile':'"+mobile+"','"+csrf_param+"':'"+csrf_token+"'}";
		data = eval('(' + data + ')');
		var url = "/huati/login/scode";
		$(this).addClass("sending");
		startTimer("updateCodeTimer()");
		sendJsonAjax(url,data,updateCodeCallBackFunction);
	});
	
	
	$(".register_btn").click(function(){
		var This = this;
		$(".register_main").find('.require').each(function(i,obj){
			var temp = $(obj).val();
			if( !temp || temp =="undefined"){
				$(this).next().text("*此项为必填项*");
				$(This).parents(".register_main").attr('send',false);
			}
		});
		var code = $('.register_main').find(".code_name").val();
		if(!code){
			$('.register_main').find(".show_code").find('p').text('验证码必须填写');
			return;
		}
		var send = $(this).parents(".register_main").attr('send');
		if(!send){
			return;
		}
		var mobile = $(".register_mobile").val();
		var password = $(".register_password").val();
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var url =$(this).parents(".register_main").attr('url');
		var data = "{'UserForm[mobile]':'"+mobile+"','UserForm[password]':'"+password+"','UserForm[code]':'"+code+"','"+csrf_param+"':'"+csrf_token+"'}";
		data = eval('(' + data + ')');
		sendJsonAjax(url,data,registerCallBackFunction);
	});
	
	$(".update_btn").click(function(){
		var This = this;
		$(".update_main").find('.require').each(function(i,obj){
			var temp = $(obj).val();
			if( !temp || temp =="undefined"){
				$(this).next().text("*此项为必填项*");
				$(This).parents(".update_main").attr('send',false);
			}
		});
		var code = $('.update_main').find(".update_code_name").val();
		if(!code){
			$('.update_main').find(".update_code_name").find('p').text('验证码必须填写');
			$(".update_main").attr('send',false);
			return;
		}
		var send = $(this).parents(".update_main").attr('send');
		if(!send){
			return;
		}
		var mobile = $(".update_mobile").val();
		var password = $(".update_password").val();
		var repassword = $(".update_repassword").val();
		if(password != repassword){
			$(".update_repassword").next().text("两次密码不一致")
			$(".update_main").attr('send',false);
			return;
		}
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var url =$(this).parents(".update_main").attr('url');
		var data = "{'UserForm[mobile]':'"+mobile+"','UserForm[password]':'"+password+"','UserForm[code]':'"+code+"','UserForm[repassword]':'"+repassword+"','"+csrf_param+"':'"+csrf_token+"'}";
		data = eval('(' + data + ')');
		sendJsonAjax(url,data,updateCallBackFunction);
	});
	
	//获取评论
	
	$(".per_list_detail").on("click",".stop_comment",function(){
		if($(this).hasClass("comment_opened")){
			$(this).find('img').hide();
			$(this).parent(".topic_add_ons").next(".topic_comment_list").hide();
			$(this).removeClass("comment_opened");
		}else{
			if(!$(this).hasClass("add_data_ed")){
				var id = $(this).parents(".detail_right").attr("id");
				var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
				var csrf_token = $("meta[name='csrf-token']").attr("content");
				var data ="{'id':"+id+",'"+csrf_param+"':'"+csrf_token+"'}";
				data = eval('(' + data + ')');
				var This = $(this);
				var url="/huati/comment/index";
				$.ajax({
					url:url,
					data:data,
					type:"POST",
					success:function(data){
						$(This).parent(".topic_add_ons").next(".topic_comment_list").html(data);
						$(This).find('img').show();
						$(This).parent(".topic_add_ons").next(".topic_comment_list").show();
						$(This).addClass("comment_opened");
						$(This).addClass("add_data_ed");
					}
				});
			}else{
				$(this).find('img').show();
				$(this).parent(".topic_add_ons").next(".topic_comment_list").show();
				$(this).addClass("comment_opened");
			}
			
		}
	});
	
	//发表问题评论
	$(".per_list_detail").on('click',".send_comment",function(){
		var content = $(this).prev().val();
		if(!content){
			return;
		}
		var id = $(this).parents(".detail_right").attr("id");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'id':"+id+",'"+csrf_param+"':'"+csrf_token+"','content':'"+content+"'}";
		data = eval('(' + data + ')');
		var url="/huati/comment/add";
		var This = $(this);
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(data){
				if(data.status){
					$(This).parents('.comment_topic_main').next().prepend(data.html);
					$(This).parents('.detail_right').find('.stop_comment').text(data.qa_comment_qa+"评论");
					 $(This).prev().val("");
				}else{
					if(data.message=='no_sign'){
						login();
					}
				}
			}
		});
	});
	//展示评论的评论
	$(".per_list_detail").on('click',".stop_comment_num",function(){
		$('.repaly_comment_list').find('dl').hide();
		$('.repaly_comment_list').find('.send_double_textarea').hide();
		$(this).parents('.user_for_comment').next('.repaly_comment_list').find('dl').show();
		$(this).parents('.user_for_comment').next('.repaly_comment_list').find('.send_double_textarea').show();
	})
	
	//评论点
	$(".per_list_detail").on('click',".agree_comment_num",function(){
		var comment_id = $(this).parents(".user_for_comment").next().attr('id');
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'"+csrf_param+"':'"+csrf_token+"','id':'"+comment_id+"'}";
		data = eval('(' + data + ')');
		var This = $(this);
		var url="/huati/comment/like";
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(data){
				if(data.status){
					$(This).text(data.message);
				}else{
					if(data.message=='no_sign'){
						login();
					}
				}
			}
		});
		
	})
	
	//取消评论的评论
	$(".per_list_detail").on('click',".replay_reset",function(){
		$(this).prev().prev().val("");
	})
	//发表评论的评论
	$(".per_list_detail").on('click',".replay_sub",function(){
		var content = $(this).prev().val();
		if(!content){
			return ;
		}
		var id = $(this).parents(".detail_right").attr('id');
		var comment_id = $(this).parents(".repaly_comment_list").attr('id');
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'id':"+id+",'"+csrf_param+"':'"+csrf_token+"','content':'"+content+"','comment_id':'"+comment_id+"'}";
		data = eval('(' + data + ')');
		var This = $(this);
		var url="/huati/comment/qdd";
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(data){
				if(data.status){
					$(This).parents('.send_double_textarea').prev().prepend(data.html);
					$(This).parents('.repaly_comment_list').prev().find('.stop_comment_num').text(data.qa_comment_qa);
					 $(This).prev().val("");
				}else{
					if(data.message=='no_sign'){
						login();
					}
				}
			}
		});
	})
	//评论的评论的发表
	$(".per_list_detail").on('click',"span",function(){
		if($(this).parent().hasClass("comment_page")){
			var data = $(this).attr('data');
			if(data==0 || !data){
				return ;
			}
		
			var id = $(this).parents(".detail_right").attr("id");
			var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
			var csrf_token = $("meta[name='csrf-token']").attr("content");
			var data ="{'id':"+id+",'"+csrf_param+"':'"+csrf_token+"','page':'"+data+"'}";
			data = eval('(' + data + ')');
			var This = $(this);
			var url="/huati/comment/index";
			$.ajax({
				url:url,
				data:data,
				type:"POST",
				success:function(data){
					$(This).parents(".topic_comment_list").html(data);
				}
			});
		}
		
	});
	//删除评论的评论
	$(".per_list_detail").on('click',".del_user_second_replay",function(){
		var id = $(this).parents("dd").attr("id");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'id':"+id+",'"+csrf_param+"':'"+csrf_token+"'}";
		data = eval('(' + data + ')');
		var url="/huati/comment/delete";
		var This = $(this);
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(data){
				if(data.status){
					var number = $(This).parents(".repaly_comment_list").prev().find('.stop_comment_num').text();
					number = parseInt(number);
					number -= 1;
					$(This).parents(".repaly_comment_list").prev().find('.stop_comment_num').text(number);
					$(This).parents("dd").remove();
				}else{
					if(data.message=='no_sign'){
						login();
					}
				}
			}
		});
	});
	
	//详情页面滚动结果
	$(window).scroll(function(){
		var len = $(".detail_right").length;
		var document_top  = $(document).scrollTop();//滚动的高度
		for (var i = 0; i <len; i++) {
			var obj = $(".detail_right").eq(i);
			var offset_top = $(obj).offset().top +20 + $(obj).find('.teacher_info').height() ;//相对文档顶部的高度
			var add_height = $(obj).find('.teacher_topic').height();
			var end_height = offset_top+add_height-126 - $(obj).find(".topic_comment_list").height();
			if(document_top < offset_top){
				$(obj).find(".detail_left").css("top",0);
			}else if(offset_top <=document_top && document_top <= end_height){
				$(obj).find(".detail_left").css("top",document_top - offset_top);
			}else{
				$(obj).find(".detail_left").css("top",end_height - document_top);
			}
			
		};
		
		
		var comment_len = $(".topic_comment_list").length;
		for (var i = 0; i < comment_len; i++) {
			var obj = $(".topic_comment_list").eq(i);
			if($(obj).is(":visible")){
				var offset_top = $(obj).offset().top-$(obj).prev().height();
				var end_height = $(obj).prev().height() + $(obj).height()+offset_top;
			
				if(document_top < offset_top){
					$(obj).prev().css("top",0);
					$(obj).prev().find('.top_img').show();
				}else if(offset_top <=document_top && document_top <= end_height){
					$(obj).prev().css("top",document_top - offset_top);
					$(obj).prev().find('.top_img').hide();
				}else{
					$(obj).prev().css("top",end_height - document_top);
					$(obj).prev().find('.top_img').hide();
				}
			}
		};
	});
	//显示全部
	$('.per_list_detail').on('click',".show_all",function(){
		$(this).parent().hide();
		$(this).parent().next().show();
		var len = $(this).parent().next().find('img').length;
		for(var i=0;i<len;i++){
			var imgs = $(this).parent().next().find('img').attr("originalsrc");
			$(this).parent().next().find('img').eq(i).attr('src',imgs);
		}
	});
	//收起回答
	$('.per_list_detail').on('click',".close_all",function(){
		$(this).parent().hide();
		$(this).parent().prev().show();
	});
	
	$('.topic_brief').each(function(i,v){
		var height = $(v).height();
		if(height < 40){
			$(v).find(".show_all").remove();
			$(v).next(".topic_brief_all").remove();
		}
	});
	
	//点赞
	$('.agree').click(function(){
		if($(this).hasClass("pointer_end")){return;}
		var id = $(this).parents(".detail_right").attr("id");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'id':"+id+",'"+csrf_param+"':'"+csrf_token+"','like':111}";
		data = eval('(' + data + ')');
		var url ="/huati/qa/like";
		var This= this;
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				if(res['status']){
					var parent = $(This).parent();
					if($(parent).hasClass("detail_left")){
						var num = $(This).find(".detail_like_num").text();
						num = parseInt(num)+1;
						$(This).find("img").attr("src","http://wenda.puamap.com/static/images/topic_agree_1.png");
						$(This).find(".detail_like_num").text(num);
					}else{
						var num = $(This).text();
						num = parseInt(num)+1;
						$(This).text(num+" 赞");
					}
					
					$(This).addClass("pointer_end");
				}else{
					if(res['message']=="no_sign"){
						login();
					}
				}
			}
		});
	});
	$('.disagree').click(function(){
		if($(this).hasClass("pointer_end")){return;}
		var id = $(this).parents(".detail_right").attr("id");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'id':"+id+",'"+csrf_param+"':'"+csrf_token+"','like':1}";
		data = eval('(' + data + ')');
		var url ="/huati/qa/like";
		var This= this;
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				if(res['status']){
					var parent = $(This).parent();
					if($(parent).hasClass("detail_left")){
						var num = $(This).find(".detail_like_num").text();
						num = parseInt(num)+1;
						$(This).find("img").attr("src","http://wenda.puamap.com/static/images/topic_disagree_1.png");
						$(This).find(".detail_like_num").text(num);
					}else{
						var num = $(This).text();
						num = parseInt(num)+1;
						$(This).text(num+" 踩");
					}
					
					$(This).addClass("pointer_end");
				}else{
					if(res['message']=="no_sign"){
						login();
					}
				}
			}
		});
	});
	//关注用户
	$('.teacher_info').on('click',".cate_it",function(){
		if($(this).hasClass("cared")){
			return;
		}
		var userid = $(this).parents('.teacher_info').attr("id");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'userid':"+userid+",'"+csrf_param+"':'"+csrf_token+"','like':1}";
		data = eval('(' + data + ')');
		var url ="/huati/user/following";
		var This= this;
		$(this).addClass("cared");
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				if(res['status']){
					$(This).addClass('reset');
					$(This).removeClass("cate_it");
					$(This).text("取消关注");
				}else{
					if(res['message']=="no_sign"){
						login();
					}
					
				}
				$(This).removeClass("cared");
			}
		});
		
	});
	//导师专栏关注用户
	$(".per_list_detail_li").on('click','.nocare',function(){
		var userid = $(this).parents('.per_list_detail_li').attr("uid");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'userid':"+userid+",'"+csrf_param+"':'"+csrf_token+"','like':1}";
		data = eval('(' + data + ')');
		if($(this).hasClass("caring")){
			var url ="/huati/user/following";
			var This= this;
			$(this).addClass("cared");
			$.ajax({
				url:url,
				data:data,
				type:"POST",
				dataType:"JSON",
				success:function(res){
					if(res['status']){
						$(This).removeClass("caring");
						$(This).text("取消关注");
					}else{
						if(res['message']=="no_sign"){
							login();
						}
						
					}
					$(This).removeClass("cared");
				}
			});
		}else{
			var url ="/huati/user/dfollow";
			var This= this;
			$(this).addClass("cared");
			$.ajax({
				url:url,
				data:data,
				type:"POST",
				dataType:"JSON",
				success:function(res){
					if(res['status']){
						$(This).addClass('caring');
						$(This).text("关注");
					}else{
						if(res['message']=="no_sign"){
							login();
						}
						
					}
					$(This).removeClass("cared");
				}
			});
		}
	});
	//取消關注用户
	$('.teacher_info').on('click',".reset",function(){
		if($(this).hasClass("cared")){
			return;
		}
		var userid = $(this).parents('.teacher_info').attr("id");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'userid':"+userid+",'"+csrf_param+"':'"+csrf_token+"','like':1}";
		data = eval('(' + data + ')');
		var url ="/huati/user/dfollow";
		var This= this;
		$(this).addClass("cared");
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				if(res['status']){
					$(This).addClass('cate_it');
					$(This).removeClass("reset");
					$(This).text("关注TA");
				}else{
					if(res['message']=="no_sign"){
						login();
					}
					
				}
				$(This).removeClass("cared");
			}
		});
		
	});
	
	//收藏問題
	$('.topic_add_ons').on("click",".follow_topic,.collect_topic",function(){
		if($(this).hasClass("collected")){
			return ;
		}
		var rel_id = $(this).parents(".detail_right").attr("id");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'rel_id':"+rel_id+",'"+csrf_param+"':'"+csrf_token+"','like':1}";
		data = eval('(' + data + ')');
		var url ="/huati/user/favorite";
		$(this).addClass("collected");
		var This = $(this);
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				if(res['status']){
					if($(This).hasClass("follow_topic")){
						$(This).text("已关注话题");
						$(This).addClass("delete_topic");
						$(This).removeClass("follow_topic");
					}else if($(This).hasClass("collect_topic")){
						$(This).text("已收藏");
						$(This).addClass("delete_collect");
						$(This).removeClass("collect_topic");
					}
				}else{
					if(res['message']=="no_sign"){
						login();
					}
				}
				$(This).removeClass("collected");
			}
		});
	});
	//取消收藏
	$('.topic_add_ons').on("click",".delete_topic,.delete_collect",function(){
		if($(this).hasClass("collected")){
			return ;
		}
		var rel_id = $(this).parents(".detail_right").attr("id");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'rel_id':"+rel_id+",'"+csrf_param+"':'"+csrf_token+"','like':1}";
		data = eval('(' + data + ')');
		var url ="/huati/user/dfavorite";
		$(this).addClass("collected");
		var This = $(this);
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				if(res['status']){
					if($(This).hasClass("delete_topic")){
						$(This).text("关注话题");
						$(This).addClass("follow_topic");
						$(This).removeClass("delete_topic");
					}else if($(This).hasClass("delete_collect")){
						$(This).text("收藏");
						$(This).addClass("collect_topic");
						$(This).removeClass("delete_collect");
					}
				}else{
					if(res['message']=="no_sign"){
						login();
					}
				}
				$(This).removeClass("collected");
			}
		});
	});
	
	
	//提问页面js
	$(".topic_csd li").click(function(){
		if($(this).hasClass("checked_now")){
			return ;
		}
		$(".topic_csd li").removeClass("checked_now");
		$(this).addClass("checked_now");
		var index = $(this).index();
		$(".per_list_detail").removeClass("show_topic_list");
		$(".per_list_detail").eq(index).addClass("show_topic_list");
	});
	$(".remmend_topic_del").click(function(){
		$(this).parent().remove();
	});

	//忽略要进行后台处理
	$(".ignore_topic").click(function(){
		$(this).parent().remove();
	});
	//删除提问
	$(".ignore_question").click(function(){
		if($(this).hasClass('deleted')){
			return;
		}
		var id = $(this).attr("id");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'id':"+id+",'"+csrf_param+"':'"+csrf_token+"'}";
		data = eval('(' + data + ')');
		var url ="/huati/qa/delqa";
		var This = $(this);
		$(this).addClass('deleted');
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				$(This).removeClass("deleted");
				if(res['status']){
					$(This).parent().remove();
				}else{
					if(res['message']=="no_sign"){
						login();
					}
				}
			}
		});
	});
	
	$(".second_tab_top").find('span').click(function(){
		if($(this).hasClass("active_care")){
			return;
		}
		var index = $(this).index();
		$(".second_tab_top").find('span').removeClass("active_care");
		$(".check_list_care").addClass("current_now");
		$(".check_list_care").eq(index).removeClass("current_now");
		$(this).addClass("active_care");
	});
	
	$('.tabs_list').find(".tab").mouseover(function(){
		if($(this).hasClass('pointer')){
			return;
		}
		$(this).addClass("pointers");
	});
	$('.tabs_list').find(".tab").mouseout(function(){
		if($(this).hasClass('pointer')){
			return;
		}
		$(this).removeClass("pointers");
	});
	
	
	
	$(".per_list_detail").on("click",".del_self_item",function(){
		var id = $(this).parents(".detail_right").attr("id");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'id':"+id+",'"+csrf_param+"':'"+csrf_token+"'}";
		data = eval('(' + data + ')');
		var This = $(this);
		var url="/huati/qa/delans";
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				if(res['status']){
					$(This).parents(".per_list_detail_li").remove();
				}else{
					if(res['message']=="no_sign"){
						login();
					}
				}
			}
		});
	});
});

function login(){
	$('.login_register_dialog').show();
	$(".login_register").show();
	$('#register').removeClass("now");
	$("#login").addClass('now');
	$('.login_main').show();
	$('.register_main').hide();
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
	$("#login").show();
	$('.login_main').show();
	$('#register').removeClass("now");
	$('.register_main').hide();
	$('#login').text("登录");
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
	$('#register').hide();
	$('.login_main').hide();
	$('.register_main').hide();
	$('.update_main').show();
	
	$("#login").show();
	$("#login").text("忘记密码");
	$("#login").addClass('now');
}
//登录回调
function loginCallBackFunction(data){
	if(data.status){
		refresh();
	}else{
		if(data.message.mobile){
			$(".login_mobile").next().text(data.message.mobile);
		}
		if(data.message.password){
			$(".login_password").next().text(data.message.password);
		}
		
	}
}


function sendJsonAjax(url,data,callBack){
	$.post(url,data,callBack,'json');
}

function sendCodeCallBackFunction(data){
}

function updateCodeCallBackFunction(data){}

var setTimer = 60;
var timer = null;
function startTimer(callback){
	timer = null;
	setTimer =60;
	timer = setInterval(callback,1000);
}

function freshCodeTimer(){
	setTimer--;
	if(setTimer <= 0){
		clearInterval(timer);
		timer = null;
		setTimer =60;
		$('.getCode').text("点击获取验证码");
		$('.getCode').removeClass('sending');
	}else{
		$('.getCode').text(setTimer+"s后重新点击");
	}
}

function updateCodeTimer(){
	setTimer--;
	if(setTimer <= 0){
		clearInterval(timer);
		timer = null;
		setTimer =60;
		$('.update_getCode').text("点击获取验证码");
		$('.update_getCode').removeClass('sending');
	}else{
		$('.update_getCode').text(setTimer+"s后重新点击");
	}
}
 function registerCallBackFunction(data){
	if(data.status){
		refresh();
	}else{
		if(data.message.mobile){
			$(".register_mobile").next().text(data.message.mobile);
		}
		if(data.message.code){
			$(".register_main").find('.show_code').find('p').text(data.message.code);
		}
		if(data.message.password){
			$(".register_password").next().text(data.message.password);
		}
		
	}
}

function updateCallBackFunction(data){
	if(data.status){
		refresh();
	}else{
		if(data.message.mobile){
			$(".update_mobile").next().text(data.message.mobile);
		}
		if(data.message.code){
			$(".update_main").find('.update_show_code').find('p').text(data.message.code);
		}
		if(data.message.password){
			$(".update_password").next().text(data.message.password);
		}
		if(data.message.repassword){
			$(".update_repassword").next().text(data.message.repassword);
		}
	}
}
function refresh(){window.location.reload();}


