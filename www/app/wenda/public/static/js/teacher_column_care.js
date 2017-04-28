$(function(){
	$(".nocare").click(function(){
		var rel_user_id = $(this).attr('data');
		if(!rel_user_id){
			return;
		}
		var This = $(this);
		var url ="";
		if($(this).hasClass('caring')){//还未关注
			url  ="/follow";
		}else{ //已关注
			url  ="/delete";

		}
		$.ajax({
			url:url,
			type:"post",
			data:{'rel_user_id':rel_user_id},
			dataType:"JSON",
			success:function(obj){
				if(obj.status){
					var temp = $(This).prev().find('.care_num_it').eq(0);
					var um = parseInt($(temp).text());
					if($(This).hasClass('caring')){//还未关注
						um += 1;
						$(temp).text(um+"关注");
						$(This).removeClass('caring');
						$(This).text("取消关注");
					}else{ //已关注
						um -= 1;
						$(temp).text(um+"关注");
						$(This).addClass('caring');
						$(This).text("关注");
					}
					
				}
			}
		});
	});
	//取消话题关注
	$(".nocare_topic").click(function(){
		$(this).parents(".per_list_detail_li_topic").remove();
	});
	//顶级切换效果
	$('.tab').mouseover(function(){
		if(!$(this).hasClass('pointer')){
			$(this).addClass("pointers");
		}
	});
	$('.tab').mouseout(function(){
		if(!$(this).hasClass('pointer')){
			$(this).removeClass("pointers");
		}
	});
	//切换
	$('.second_tab_top').find('span').click(function(){
		if($(this).hasClass("active_care")){
			return;
		}else{
			$('.second_tab_top').find('span').removeClass("active_care");
			$(".per_list_detail").removeClass("current_now");
			$(this).addClass("active_care");
			var index = $(this).index();
			$('.per_list_detail').eq(index).addClass("current_now");

		}
	});
});