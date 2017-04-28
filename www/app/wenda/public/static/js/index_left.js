$(function(){

$('.stop_comment').click(function(){
	if($(this).hasClass('open_comment')){
		$(this).removeClass('open_comment');
		$(this).html($(this).attr("flag"));
		$(this).attr("flag","");
		$(this).parent().next(".topic_comment_list").hide();
	}else{
		$(this).addClass('open_comment');
		$(this).attr("flag",$(this).text());
		$(this).html('收起评论<img src="/static/images/single.png" class="top_img"/>');
		$(this).parent().next(".topic_comment_list").show();
		
		if(!$(this).hasClass('comment_loading')){
			var loading ='<img id="loading_img" src="http://file.iheima.com/static/ihm/527a74/images/loading.gif" nofollow="nofollow">';
			$(this).parents(".topic_add_ons").next().find('.comment_info').html(loading);
			$(this).addClass('comment_loading');
			var qa_id =$(this).attr('data');
			var uid = $(".header_main").attr('uid');
			var This = $(this);
			$.ajax({
			url:"/commentqalistpage",
			type:"post",
			data:{'qa_id':qa_id,"page":1},
			dataType:"JSON",
			success:function (obj) {
				if(obj.status){
					var list = obj.list.data;
					var page = obj.list.pages;
					var html = "";
					$.each(list,function(k,val){
						var temp = val.user;
						html+='<li>';
						html +='<div class="user_for_comment">';
						if(temp){
							if(temp.avatarPath){
								html +='<img src="'+temp.avatarPath+'" class="userHeader">';
							}else{
								html +='<img src="/static/images/header.png" class="userHeader">';
							}
						}else{
							html +='<img src="/static/images/header.png" class="userHeader">';
						}
						html +='<div class="user_for_comment_time">';
						if(temp){
							if(temp.nickname){
							html +='<a class="user_name" href="">'+temp.nickname+'</a>';
							}else{
								html +='<a class="user_name" href="">'+temp.mobile+'</a>';
							}	
						}else{
							html +='<a class="user_name" href="">匿名用户</a>';
						}
						
						html +='<div class="user_for_comment_down">';
						html +='<span class="comment_time">'+val.add_time+'</span>';
						html +='<span class="agree_comment_num" data="'+val.id+'">'+val.like+'</span>';
						html +='<span class="stop_comment_num" data="'+val.id+'" relid="'+val.rel_id+'">'+val.number+'</span>';
						
						html +='</div></div></div>';
						html +='<div class="repaly_comment_list">';
						html +='<div class="replay_detail">'+val.content+'</div>';
						html +='<div class="second_replay"><dl>';
						if(val.comments){
							var comment_html = '';
								$.each(val.comments,function(kk,cc){
									comment_html +='<dd><div class="second_replay_user">';
									var cache_temp = cc.user;
									if(cache_temp){
										if(cache_temp.avatarPath){
											comment_html +='<img src="'+cache_temp.avatarPath+'" class="second_replay_user_head">';
										}else{
											comment_html +='<img src="/static/images/header.png" class="second_replay_user_head">';
										}
									}else{
										comment_html +='<img src="/static/images/header.png" class="second_replay_user_head">';
									}
									comment_html +='<div class="second_replay_user_right"><span class="second_user_name">';
									if(cache_temp){
										if(cache_temp.nickname){
											comment_html +=cache_temp.nickname;
										}else{
											comment_html +=cache_temp.mobile;
										}	
									}else{
										comment_html +='匿名用户';
									}
									comment_html +='</span><p class="second_user_name_down">';
									comment_html +='<span>'+cc.add_time+'</span>';
									if(cache_temp.id == uid){
										comment_html += '<span data="'+cc.id+'" class="del_user_second_replay">删除</span>';
									}										
									comment_html +='</p></div></div><div class="replay_ideal">';
									comment_html +=cc.content;
									comment_html +='</div></dd>';
								});
													
							html +=comment_html;
						}
						html +='</dl></div></div></li>';
					});
					$(This).parents(".topic_add_ons").next().find('.comment_info').html(html);
					$(This).parents(".topic_add_ons").next().find(".comment_page").html(page);
					
				}else{
					$(This).parents(".topic_add_ons").next().find('.comment_info').html("");
				}
				
			}
		});
	}
		
	}
});
$(".send_comment").click(function(){
	var content = $(this).prev(".comment_content").val();
	if(!content){
		return ;
	}
	var rel_id = $(this).prev(".comment_content").attr('data');
	var This = $(this);
	$.ajax({
		url:"/scomment",
		type:"post",
		data:{"rel_id":rel_id,"content":content,'comment_id':0},
		dataType:"JSON",
		success:function(obj){
			if(obj.status){
				var html='<li>';
				html +='<div class="user_for_comment">';
				if(obj.mes.user.avatarPath){
					html +='<img src="'+obj.mes.user.avatarPath+'" class="userHeader">';
				}else{
					html +='<img src="/static/images/header.png" class="userHeader">';
				}
				

				html +='<div class="user_for_comment_time">';
				if(obj.mes.user.nickname){
					html +='<a class="user_name" href="">'+obj.mes.user.nickname+'</a>';
				}else{
					html +='<a class="user_name" href="">'+obj.mes.user.mobile+'</a>';
				}
				
				html +='<div class="user_for_comment_down">';
				html +='<span class="comment_time">'+obj.mes.add_time+'</span>';
				html +='<span class="agree_comment_num" data="'+obj.mes.id+'">0</span>';
				html +='<span class="stop_comment_num" data="'+obj.mes.id+'" relid="'+obj.mes.rel_id+'">0</span>';
			
				html +='</div></div></div>';
				html +='<div class="repaly_comment_list">';
				html +='<div class="replay_detail">'+content+'</div>';
				html +='<div class="second_replay"><dl></dl></div></div></li>';
				$(This).parent().next(".comment_info").prepend(html);
				var cobj = $(This).parents('.topic_comment_list').prev().find(".stop_comment").eq(0);
				var flag =cobj.attr('flag');
					flag = parseInt(flag) +1;
					cobj.attr('flag',flag+"评论");
					$(This).prev(".comment_content").val("");
			}else{
				alert(obj.message);
			}
		}
	});
	
});

//重置回复
$(".replay_reset").on('click',function(){
	$(this).parent().find(".textarea_content").val('');
});
//刪除評論的回复
$(".del_user_second_replay").on('click',function(){
	var comment_id = $(this).attr('data');
	if(!comment_id){
		return;
	}
	var This = $(this);
	$.ajax({
		url:"/dcomment",
		type:"post",
		data:{'id':comment_id},
		dataType:"JSON",
		success:function(obj){
			if(obj.status){
				$(This).parents("dd").remove();
				var num = $(This).parents('.repaly_comment_list').prev().find(".stop_comment_num").eq(0).text();
				num  =parseInt(parseInt(num)-1);
				$(This).parents('.repaly_comment_list').prev().find(".stop_comment_num").eq(0).text(num+"");
			}else
			{
				alert(obj.message);
			}
			
		}
		});

});
//发表
$(".replay_sub").on('click',function(){
	var content = $(this).prev().val();
	var rel_id = $(this).attr("relid");
	var comment_id = $(this).attr("commentid");
	if(!content){
		return ;
	}
	if(!rel_id || !comment_id){
		return ;
	}
	var This = $(this);
	$.ajax({
		url:"/scomment",
		type:"post",
		data:{"rel_id":rel_id,"content":content,'comment_id':comment_id},
		dataType:"JSON",
		success:function(obj){
			if(obj.status){
				var html = '<dd><div class="second_replay_user">';
				if(obj.mes.user.avatarPath){
					html +='<img src="'+obj.mes.user.avatarPath+'" class="second_replay_user_head">';
				}else{
					html +='<img src="/static/images/header.png" class="second_replay_user_head">';
				}


				html +='<div class="second_replay_user_right">';

				if(obj.mes.user.nickname){
					html +='<span class="second_user_name">'+obj.mes.user.nickname+'</span>';
				}else{
					html +='<span class="second_user_name">'+obj.mes.user.mobile+'</span>';
				}
			

				html +='<p class="second_user_name_down">';
				html +='<span>'+obj.mes.add_time+'</span><span class="del_user_second_replay" data="'+obj.mes.id+'">删除</span>';
				html +='</p></div></div>';
				html +='<div class="replay_ideal">';
				html +=content;
				html +='</div></dd>';
				$(This).parent().prev().append(html);
				$(This).prev().val("");
				var num = $(This).parents('.repaly_comment_list').prev().find(".stop_comment_num").eq(0).text();
					num =parseInt(parseInt(num)+1);
				$(This).parents('.repaly_comment_list').prev().find(".stop_comment_num").text(num+"");
			}else{
				alert(obj.message);
			}
		}
	});
});		
			//评论点赞
	$('.agree_comment_num').on("click",function(){
		if($(this).hasClass("pointer_end")){
			return;
		}
		var commentid = $(this).attr("data");
		console.log(commentid);
		if(!commentid){
			return;
		}
		var This = $(this);
		$.ajax({
			url:"/plike",
			type:"post",
			data:{'comment_id':commentid},
			dataType:"JSON",
			success:function(obj){
				if(obj.status){
					$(This).text(obj.mes);
					$(This).addClass("pointer_end");
				}
			}
		});
	});	

	$(".stop_comment_num").on('click',function(){
		
		var obj = $(this).parents('.user_for_comment').next(".repaly_comment_list").find(".second_replay");
		if(!$(this).hasClass("append_second_replay")){
			var rel_id = $(this).attr('relid');
			var comment_id = $(this).attr('data');
			$(".send_double_textarea").remove();
			$(".second_replay").hide();
			var html = '<div class="send_double_textarea"><input type="text" class="textarea_content" /><span class="replay_sub" relid="'+rel_id+'" commentid="'+comment_id+'">评论</span><span class="replay_reset">取消</span></div>';
			$(obj).append(html);
			$(this).addClass("append_second_replay")
		}
		
		if($(obj).hasClass('open_send_replay_list')){
			$(obj).hide();
			$(obj).removeClass("open_send_replay_list");
			$(obj).find('.send_double_textarea').hide();
		}else{
			$(obj).show();
			$(obj).addClass("open_send_replay_list");
			$(obj).find('.send_double_textarea').show();
		}
		
	});

//关注话题问题
$('.agree').click(function(){
	
	var qa_id = $(this).attr('data');
	if(!qa_id){
		return ;
	}
	var This = $(this);
	var url ="";
	if($(this).hasClass("pointer_end")){
		url = "/minuslike";
	}else{
		url="/like";
	}
		$.ajax({
			url:url,
			type:"post",
			data:{'id':qa_id},
			dataType:"JSON",
			success:function(obj){
				if(obj.status){
					$(This).find(".detail_like_num").text(obj.mes)
					if($(This).hasClass("pointer_end")){
						$(This).removeClass("pointer_end");
						$(This).find('.detail_like_img').attr("src","/static/images/topic_agree_0.png");
					}else{
						$(This).addClass("pointer_end");
						$(This).find('.detail_like_img').attr("src","/static/images/topic_agree_1.png");
					}
				}
			}
		});
});
//踩
$('.disagree').click(function(){
	
	var qa_id = $(this).attr('data');
	if(!qa_id){
		return ;
	}
	var This = $(this);
	var url ="";
	if($(this).hasClass("pointer_end")){
		url ="/minusdislike";
	}else{
		url ="/dislike";
	}
		$.ajax({
			url:url,
			type:"post",
			data:{'id':qa_id},
			dataType:"JSON",
			success:function(obj){
				if(obj.status){
					$(This).find(".detail_like_num").text(obj.mes)
					if($(This).hasClass("pointer_end")){
						$(This).removeClass("pointer_end");
						$(This).find('.detail_like_img').attr("src","/static/images/topic_disagree_0.png");
					}else{
						$(This).addClass("pointer_end");
						$(This).find('.detail_like_img').attr("src","/static/images/topic_disagree_1.png");
					}
				
				}
			}
		});
});
//关注人
$(".cate_it").on("click",function(){
	var rel_user_id = $(this).attr('data');
	if(!rel_user_id){
		return;
	}
	var This = $(this);
	$.ajax({
			url:"/follow",
			type:"post",
			data:{'rel_user_id':rel_user_id},
			dataType:"JSON",
			success:function(obj){
				if(obj.status){
					$(This).addClass("reset");
					$(This).removeClass("cate_it");
					$(This).text("取消关注");
				}
			}
		});
});
//取消关注
$(".reset").on("click",function(){
	var rel_user_id = $(this).attr('data');
	if(!rel_user_id){
		return;
	}
	var This = $(this);
	$.ajax({
			url:"/delete",
			type:"post",
			data:{'rel_user_id':rel_user_id},
			dataType:"JSON",
			success:function(obj){
				if(obj.status){
					$(This).removeClass("reset");
					$(This).addClass("cate_it");
					$(This).text("关注TA");
				}
			}
		});
});

//关注话题
$(".follow_topic").on("click",function(){
	var rel_id = $(this).attr('data');
	if(!rel_id){
		return;
	}
	var This = $(this);
	$.ajax({
			url:"/fcreate",
			type:"post",
			data:{'rel_id':rel_id,"status":1},
			dataType:"JSON",
			success:function(obj){
				if(obj.status){
					$(This).removeClass("follow_topic");
					$(This).addClass("delete_topic");
					if($(This).attr("flag")){
						$(This).text("已收藏");
					}else{
						$(This).text("已关注话题");
					}
					
				}
			}
		});
});

//取消关注话题
$(".delete_topic").on("click",function(){
	var rel_id = $(this).attr('data');
	if(!rel_id){
		return;
	}
	var This = $(this);
	$.ajax({
			url:"/dcreate",
			type:"post",
			data:{'rel_id':rel_id,"status":1},
			dataType:"JSON",
			success:function(obj){
				if(obj.status){
					$(This).addClass("follow_topic");
					$(This).removeClass("delete_topic");
					if($(This).attr("flag")){
						$(This).text("收藏");
					}else{
						$(This).text("关注话题");
					}
				}
			}
		});
});
//异步分页
$(".comment_page span").on("click",function(){
	var qa_id =$(this).attr('data');
	var page = $(this).attr("page");
	if(!page){
		return;
	}
	var This = $(this);
	var uid = $(".header_main").attr('uid');
	$.ajax({
		url:"/commentqalistpage",
		type:"post",
		data:{'qa_id':qa_id,"page":page},
		dataType:"JSON",
		success:function (obj) {
			if(obj.status){
				var list = obj.list.data;
				var page = obj.list.pages;
				var html = "";
				$.each(list,function(k,val){
					var temp = val.user;
					html+='<li>';
					html +='<div class="user_for_comment">';
					if(temp){
						if(temp.avatarPath){
							html +='<img src="'+temp.avatarPath+'" class="userHeader">';
						}else{
							html +='<img src="/static/images/header.png" class="userHeader">';
						}
						
					}else{
						html +='<img src="/static/images/header.png" class="userHeader">';
					}
					html +='<div class="user_for_comment_time">';
					if(temp){
						if(temp.nickname){
						html +='<a class="user_name" href="">'+temp.nickname+'</a>';
						}else{
							html +='<a class="user_name" href="">'+temp.mobile+'</a>';
						}	
					}else{
						html +='<a class="user_name" href="">匿名用户</a>';
					}
					
					
					html +='<div class="user_for_comment_down">';
					html +='<span class="comment_time">'+val.add_time+'</span>';
					html +='<span class="agree_comment_num" data="'+val.id+'">'+val.like+'</span>';
					html +='<span class="stop_comment_num" data="'+val.id+'" relid="'+val.rel_id+'">'+val.number+'</span>';
					
					html +='</div></div></div>';
					html +='<div class="repaly_comment_list">';
					html +='<div class="replay_detail">'+val.content+'</div>';
						html +='<div class="second_replay"><dl>';
					if(val.comments){
						var comment_html = '';
							$.each(val.comments,function(kk,cc){
								comment_html +='<dd><div class="second_replay_user">';
								var cache_temp = cc.user;
								if(cache_temp){
									if(cache_temp.avatarPath){
										comment_html +='<img src="'+cache_temp.avatarPath+'" class="second_replay_user_head">';
									}else{
										comment_html +='<img src="/static/images/header.png" class="second_replay_user_head">';
									}
								}else{
									comment_html +='<img src="/static/images/header.png" class="second_replay_user_head">';
								}
								comment_html +='<div class="second_replay_user_right"><span class="second_user_name">';
								if(cache_temp){
									if(cache_temp.nickname){
										comment_html +=cache_temp.nickname;
									}else{
										comment_html +=cache_temp.mobile;
									}	
								}else{
									comment_html +='匿名用户';
								}
								comment_html +='</span><p class="second_user_name_down">';
								comment_html +='<span>'+cc.add_time+'</span>';
								if(cache_temp.id == uid){
									comment_html += '<span data="'+cc.id+'" class="del_user_second_replay">删除</span>';
								}										
								comment_html +='</p></div></div><div class="replay_ideal">';
								comment_html +=cc.content;
								comment_html +='</div></dd>';
							});
												
						html +=comment_html;
					}
					html +='</dl></div></div></li>';
				});
				$(This).parents(".topic_comment_list").find('.comment_info').html(html);
				$(This).parent().html(page);
				
			}
			
		}
	});

});


$(".show_all").click(function(){
	$(this).parent().hide();
	$(this).parent().next().show();
});
$(".close_all").click(function(){
	$(this).parent().hide();
	$(this).parent().prev().show();
});


$(window).scroll(function() {
	var len  = $(".detail_right").length;
		var document_top  = $(document).scrollTop();//滚动的高度
	for (var i = 0; i <len; i++) {
		var obj = $(".detail_right").eq(i);
		var offset_top = $(obj).offset().top;//相对文档顶部的高度
		var add_height = $(obj).find('.topic_list_desc').height() + $(obj).find('.topic_list_head').height() + $(obj).find('.teacher_info').height();
		var end_height = offset_top+add_height-36;
		if(document_top < offset_top){
			$(obj).prev().css("top",0);
		}else if(offset_top <=document_top && document_top <= end_height){
			$(obj).prev().css("top",document_top - offset_top);
		}else{
			$(obj).prev().css("top",end_height - document_top);
		}
		
	};

	var comment_len = $(".topic_comment_list").length;
	for (var i = 0; i < comment_len; i++) {
		var obj = $(".topic_comment_list").eq(i);

		if($(obj).is(":visible")){
			
			var offset_top = $(obj).offset().top- $(obj).prev().height();
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

$('.topic_type').find('li').mouseover(function(){
	if(!$(this).hasClass("current")){
		$(this).addClass('current_temp');
	}

});
$('.topic_type').find('li').mouseout(function(){
	if(!$(this).hasClass("current")){
		$(this).removeClass('current_temp');
	}

});

$(".goTop").click(function(){
		$("html,body").animate({scrollTop:0},500);
	})
});