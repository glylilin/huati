$(function(){
    $(".huati_search").click(function(){
        $(this).find("p").hide();
        $(this).find("input").focus();
    })
     $(".huati_search input").blur(function(){
         if($(this).val()==""){
            $(".huati_search").find("p").show(); 
         }
     })
     /**
      * 分页
      */
     $('.pages').find('button').click(function(){
    
    	 var nourl = $(this).attr('nourl');
    	 var url = $(this).attr('url');
    	 var diff = $(this).attr('diff');
    	 var suffix = $(this).attr('suffix');
    	 var page = $(this).prev().val();
    	 var pattren = /^[0-9]*$/;
    	 var goUrl ="";
    	 
    	if(!pattren.test(page)){
    			page = 1;
    	}
    	 if(page <= 1){
    		 goUrl = nourl;
    	 }else{
    		 goUrl = url+diff+page+suffix;
    	 }
    	 window.location.href=goUrl;
     });
     
    /**
     * 关注问题
     */
    $('.huati_list1').on('click','.gz>a',function(){
    	if($(this).hasClass("collected")){
			return ;
		}
    	var url="";
    	if($(this).hasClass("current")){
    		url ="/huati/user/dfavorite"
    	}else{
    		url ="/huati/user/favorite"
    	}
    	var rel_id = $(this).parents("li").attr("data-id");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'rel_id':"+rel_id+",'"+csrf_param+"':'"+csrf_token+"','like':1}";
		data = eval('(' + data + ')');
		var This =this;
		$(this).addClass("collected");
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				if(res['status']){
					if($(This).hasClass("current")){
						$(This).text("关注问题");
						$(This).removeClass("current");
					}else{
						$(This).text("已关注");
						$(This).addClass("current");
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
    
    $('.huida_con').on('click','.qa_view_care_topic',function(){
    	if($(this).hasClass("collected")){
			return ;
		}
    	var url="";
    	if($(this).hasClass("current")){
    		url ="/huati/user/dfavorite"
    	}else{
    		url ="/huati/user/favorite"
    	}
    	var rel_id = $(this).parents(".huida_con").attr("data-id");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'rel_id':"+rel_id+",'"+csrf_param+"':'"+csrf_token+"','like':1}";
		data = eval('(' + data + ')');
		var This =this;
		$(this).addClass("collected");
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				if(res['status']){
					if($(This).hasClass("current")){
						$(This).text("关注问题");
						$(This).removeClass("current");
					}else{
						$(This).text("已关注");
						$(This).addClass("current");
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
    
    /**
     * 换一换
     */
    $(".column_title1").on("click",'a',function(){
    	if($(this).hasClass('pointed')){
    		return;
    	}
    	var url="/huati/index/rand_m";
    	var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'"+csrf_param+"':'"+csrf_token+"'}";
		data = eval('(' + data + ')');
		$(this).addClass('pointed');
		var This =this;
    	$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				if(res.status){
					$('.huati_list1').html(res.message);
				}
				$(This).removeClass('pointed')
			}
		});
    });
    /**
     * 关注话题
     */
    $('.about_topic').click(function(){
    	var url ="";
    	if($(this).hasClass("current")){
    		url ='/huati/user/dtfavorite';
    	}else{
    		url ='/huati/user/tfavorite';
    	}
    	var rel_id = $(this).attr("data-id");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'rel_id':"+rel_id+",'"+csrf_param+"':'"+csrf_token+"'}";
		data = eval('(' + data + ')');
		var This =this;
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				if(res['status']){
					if($(This).hasClass("current")){
						$(This).text("关注话题");
						$(This).removeClass("current");
					}else{
						$(This).text("已关注话题");
						$(This).addClass("current");
					}
				}else{
					if(res['message']=="no_sign"){
						login();
					}
				}
				
			}
		});
    });
    /**
     * 登录
     */
    $('.signin_btn').click(function(){
    	var mobile= $('.login_mobile').val();
    	var password = $('.login_password').val();
    	if(!mobile){
    		$('.login_error').html("<font style='color:red;'>手机号不能为空</font>");
    		return false;
    	}else{
    		var pattern = /^1[3|4|5|7|8][0-9]{9}$/;
			if(!pattern.test(mobile)){

				$('.login_error').html("<font style='color:red;'>电话号码格式不正确</font>");
				$('.login_mobile').val("");
				return false;
			}
    	}
    	
    	if(!password){
    		$('.login_error').html("<font style='color:red;'>密码不能为空</font>");
    		return false;
    	}else{
    		if(password.toString().length < 6 || password.toString().length > 20){
    			$('.login_error').html("<font style='color:red;'>密码长度为6到20位</font>");
    			$('.login_password').val("");
    			return false;
			}
    	}
    	return true;
    });
    $('.login_mobile,.login_password').focus(function(){
    	$(".login_error").html("");
    });
    /**
     * 切换
     */
    $('.m_tab').on('click','li',function(){
    	if($(this).hasClass("current")){
    		return false;
    	}
    	$(".huati_list1").addClass("hidden");
    	$('.m_tab').find('li').removeClass("current");
    	$(this).addClass("current");
    	$(".huati_list1").eq($(this).index()).removeClass('hidden');
    });
    //关注导师
    $('.daoshi_list').find('.gz').on('click','span',function(){
    	if($(this).hasClass('pointed')){
    		return;
    	}
    	var url ="";
    	if($(this).hasClass('current')){
    		url="/huati/user/dfollow";
    	}else{
    		url="/huati/user/following";
    	}
    	var userid = $(this).parents('li').attr("data-id");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'userid':"+userid+",'"+csrf_param+"':'"+csrf_token+"','like':1}";
		data = eval('(' + data + ')');
		var This= this;
		$(this).addClass("pointed");
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				if(res['status']){
					if($(This).hasClass("current")){
						$(This).removeClass("current");
						$(This).text("+ 关注");
					}else{
						$(This).addClass("current");
						$(This).text("已关注");
					}
					
				}else{
					if(res['message']=="no_sign"){
						login();
					}
				}
				$(This).removeClass("pointed");
			}
	    });
    });
    
    //wap中心取消關注
    $('.daoshi_list').find('.gz2').on('click','span',function(){
    	if($(this).hasClass('pointed')){
    		return;
    	}
    	var url ="";
    	if($(this).hasClass('current')){
    		url="/huati/user/dfollow";
    	}else{
    		url="/huati/user/following";
    	}
    	var userid = $(this).parents('li').attr("data-id");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'userid':"+userid+",'"+csrf_param+"':'"+csrf_token+"','like':1}";
		data = eval('(' + data + ')');
		var This= this;
		$(this).addClass("pointed");
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				if(res['status']){
					if($(This).hasClass("current")){
						$(This).removeClass("current");
						$(This).text("关注 TA");
					}else{
						$(This).addClass("current");
						$(This).text("已关注");
					}
					
				}else{
					if(res['message']=="no_sign"){
						login();
					}
				}
				$(This).removeClass("pointed");
			}
	    });
    });
    
    /**
     * 详情页面点赞和踩
     */
    $('.huati_huida_list').on('click','.answer_like_dislike > img',function(){
    	if($(this).hasClass("pointed")){
    		return false;
    	}
    	var url="";
    	var like =1;
    	if($(this).hasClass('answer_like')){
    		like = 111;
    	}else{
    		like = 1;
    	}
    	var id = $(this).parents("li").attr("data-id");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'id':"+id+",'"+csrf_param+"':'"+csrf_token+"','like':'"+like+"'}";
		data = eval('(' + data + ')');
		var url ="/huati/qa/like";
		var This= this;
		var num = parseInt($(this).next().text());
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				if(res['status']){
					if(like > 10){
						$(This).attr('src',"/static/wap/img/hand.png");
					}else{
						$(This).attr('src',"/static/wap/img/hand_down.png");
					}
					$(This).next().text(num+1);
					$(This).addClass("pointed");
				}else{
					if(res['message']=="no_sign"){
						login();
					}
				}
				
			}
	    });
    });
    
    //回答评论
    $(".huati_huida_list").on("click",'.comment_hide_box >.edit_comment > button',function(){
    	var content = $(this).prev().find("input").val();
    	if(!content){
    		return;
    	}
    	var id = $(this).parents("li").attr('data-id');
    	var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'id':"+id+",'"+csrf_param+"':'"+csrf_token+"','content':'"+content+"','wap':1}";
		data = eval('(' + data + ')');
		var url ="/huati/comment/add";
		var This= this;
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				if(res['status']){
					$(This).parents(".comment_hide_box").find('.comment_list').prepend(res.html);
				}else{
					if(res['message']=="no_sign"){
						login();
					}
				}
				
			}
	    });
    });
    //回答评论点赞
    $(".huati_huida_list").on("click",'.huati_huida_list .user_name label img ',function(){
 
    	if($(this).hasClass("pointed")){
    		return;
    	}
    	var id = $(this).parents(".list_div").attr('data-id');
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'id':"+id+",'"+csrf_param+"':'"+csrf_token+"','like':111}";
		data = eval('(' + data + ')');
		var url ="/huati/comment/like";
		var This= this;
		var num = parseInt($(this).next().text());
		var This = this;
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				if(res['status']){
					$(This).attr('src','/static/wap/img/hand.png');
					$(This).next().text(num+1);
					$(This).addClass("pointed");
				}else{
					if(res['message']=="no_sign"){
						login();
					}
				}
			}
	    });
    });
    
    /***
     * 删除回答
     */
    $(".huati_huida_list").on('click','.del_wap_self_ans',function(){
    	var id = $(this).parents('li').attr('data-id');
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
					$(This).parents("li").remove();
				}else{
					if(res['message']=="no_sign"){
						login();
					}
				}
			}
		});
    });
  
    /**
     * 问题 回答
     */
    $(".submit_answer").click(function(){
    	var content = $("#submit_answer_form").find('textarea').val();
    	if(!content){return false;}
    	$("#submit_answer_form").submit();
    });
    
    $(".submit_question").click(function(){
    	var len = $(".huati_all > dd >span").length;
    	var send = false;
    	for(var i = 0; i < len ;i++){
    		if($(".huati_all > dd >span").eq(i).hasClass('current')){
    			send = true;
    		}
    	}
    	if(send){
    		$("#submit_answer_form").submit();
    	}
    	
    });
    
    //取消问题/话题关注会员中心
    $('.huati_fenli').on('click','label',function(){
    	var url ="";
    	var flag = $(this).parents(".huati_fenli").attr('flag');
    	switch(flag){
    	case "col":
    		url ="/huati/user/dfavorite";
    		break;
    	case "topic":
    		url ="/huati/user/dtfavorite";
    		break;
    	}
    	var rel_id = $(this).parents('li').attr("data-id");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'rel_id':"+rel_id+",'"+csrf_param+"':'"+csrf_token+"'}";
		data = eval('(' + data + ')');
		var This =this;
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				if(res['status']){
					$(This).parents('li').remove();
				}else{
					if(res['message']=="no_sign"){
						login();
					}
				}
				
			}
		});
    });
    
    //删除我的提问
    $('.huati_fenli2').on('click','label',function(){
    	var url ="/huati/qa/delqa";
    	
    	var id = $(this).parents('li').attr("data-id");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'id':"+id+",'"+csrf_param+"':'"+csrf_token+"'}";
		data = eval('(' + data + ')');
		var This =this;
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				if(res['status']){
					$(This).parents('li').remove();
				}else{
					if(res['message']=="no_sign"){
						login();
					}
				}
				
			}
		});
    });
    
    //删除我的提问
    $('.huati_list2').on('click','label',function(){
    	var url ="/huati/qa/delans";
    	var id = $(this).parents('li').attr("data-id");
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var data ="{'id':"+id+",'"+csrf_param+"':'"+csrf_token+"'}";
		data = eval('(' + data + ')');
		var This =this;
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				if(res['status']){
					$(This).parents('li').remove();
				}else{
					if(res['message']=="no_sign"){
						login();
					}
				}
				
			}
		});
    });
    //个人信息
    $('.info_btn').click(function(){
    	var nickname =$(".info_nickname").val();
    	var weixin = $('.info_weixn').val();
    	if(!nickname || !weixin){
    		$('.error_s').html("<font style='color:red;'>内容不能为空</font>");
    		return
    	}
    	$("#update_information").submit();
    });
    $('.info_nickname,.info_weixn,.update_password,.update_repassword').focus(function(){
    	$('.error_s').html("");
    });
    //修改密码
    $(".update_passwd").click(function(){
    	var password = $('.update_password').val();
    	var repassword = $('.update_repassword').val();
    	if(!password || !repassword){
    		$('.error_s').html("<font style='color:red;'>内容不能为空</font>");
    		return
    	}
    	if(password.toString().length < 6 || password.toString().length > 20){
			$('.error_s').html("<font style='color:red;'>密码长度为6到20位</font>");
			return false;
		}
    	if(password !=repassword){
    		$('.error_s').html("<font style='color:red;'>两次密码不一致</font>");
    		return
    	}
    	$('#update_passwd').submit();
    });
})

function login(){
	window.location.href='/huati/login/signin';
};