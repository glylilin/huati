$(function () {
	$('.ignore_question').click(function(){
		var id = $(this).attr('data');
		if(!id){
			return;
		}
		var This = $(this);
		$.ajax({
			url:"/dqa",
			type:"post",
			data:{'id':id},
			dataType:"JSON",
			success:function(obj){
				if(obj.status){
					$(This).parent().remove();
				}
			}
		});
		
	});
});