var paixu=0;
$(function(){
//排序
	$(".huida_tt dd").click(function(){
		if(paixu==0){
			$(this).find("div").fadeIn();
			$(this).find("p i").removeClass("fa-angle-down");
			$(this).find("p i").addClass("fa-angle-up");
			paixu=1;
		}else{
			$(this).find("div").fadeOut();
			$(this).find("p i").removeClass("fa-angle-up");
			$(this).find("p i").addClass("fa-angle-down");
			paixu=0;
		}
	})
//内容展开
	$(".huida_list li .con .show").click(function(){
		$(this).parent().fadeOut();
		$(this).parent().next(".con_all").fadeIn();
	})
	$(".huida_list li .con_all .hide").click(function(){
		$("html,body").animate({scrollTop:$(this).parent().parent().offset().top},200);
		$(this).parent().fadeOut();
		$(this).parent().prev(".con").fadeIn();
	})
})

$(document).bind("touchend",function(e){
	var target = $(e.target);
	if(target.closest(".huida_tt dd").length == 0){
		$(".huida_tt dd div").fadeOut();
		$(".huida_tt dd p i").removeClass("fa-angle-up");
		$(".huida_tt dd p i").addClass("fa-angle-down");
		paixu=0;
	};
})