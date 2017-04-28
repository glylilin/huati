$(function(){
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
});