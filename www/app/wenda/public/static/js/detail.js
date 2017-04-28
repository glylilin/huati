$(function(){
	$(".two_level_comment_close").click(function(){
	close_level();
	});
	$('.stop_comment_num').bind('click',function(){
		open_level();
	});
});

function close_level(){
$('.two_level_comment_dialog').hide();
$('.two_level_comment').hide();
}

function open_level(){
$('.two_level_comment_dialog').show();
$('.two_level_comment').show();
}