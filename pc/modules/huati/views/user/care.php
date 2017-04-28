<?php
use pc\modules\huati\widgets\UserCenterWidget;
use pc\modules\huati\widgets\UserItemWidget;
use pc\config\FileUtils;
use pc\config\CommonUtils;
use pc\modules\huati\widgets\PageWidget;
$this->registerCssFile(FileUtils::getFilePath('css',"huati", "column.css"));
$this->registerCssFile(FileUtils::getFilePath('css',"huati", "main_left.css"));
$this->title =$seotitle;
$this->registerMetaTag(['name'=>'keywords','content'=>$seokeyword]);
$this->registerMetaTag(['name'=>'description','content'=>$seodescriotion]);
?>
<div class='main_left'>
<?=UserCenterWidget::widget(['uid'=>$uid])?>

		<div class="second_tab_top border_bottom">
			<span class='active_care'>我关注的人</span>
			<span>关注我的人</span>

		</div>
		<!--我的关注-->
		<ul class="check_list_care per_list_detail">
		<?php 
		if($me_care):
		?>
			<?php foreach($me_care as $v) :?>
			
				<?=UserItemWidget::widget(['uid'=>$v['rel_user_id']]);?>
			
			<?php endforeach; ?>
			<?php if(count($me_care) == 2) : ?>
				<li><div class="gomore" data="mc" page='1'>加载更多</div></li>
			<?php endif; ?>
		<?php else : ?>
		<li>暂时没有数据</li>
		<?php endif; ?>
		</ul>
		<!--关注我的-->
		<ul class="check_list_care per_list_detail current_now">
		<?php if($care_me):?>
			<?php foreach($care_me as $v) : ?>
			
			<?=UserItemWidget::widget(['uid'=>$v['user_id']]);?>
		
			<?php endforeach; ?>
			<?php if(count($care_me) == 15) : ?>
				<li><div class="gomore" data="cm" page='1'>加载更多</div></li>
			<?php endif;?>
		<?php else: ?>
			<li>暂时没有数据</li>
		<?php endif; ?>
		</ul>
	
	</div>
	<!--主题详情结束-->
</div>
<script type="text/javascript" src="/static/js/jquery.min.js"></script>
<script type="text/javascript">
	$('.per_list_detail_li').on('click','.reset',function(){
		if($(this).hasClass("cared")){
			return;
		}
		var userid = $(this).parents('.per_list_detail_li').attr("uid");
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
					$(This).parents('.per_list_detail_li').remove();
				}else{
					if(res['message']=="no_sign"){
						login();
					}
				}
				$(This).removeClass("cared");
			}
		});

	});

		$(".gomore").click(function(){
		var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
		var csrf_token = $("meta[name='csrf-token']").attr("content");
		var type = $(this).attr('data');
		var page = $(this).attr('page');
		var data = "{'type':'"+type+"','page':'"+page+"','"+csrf_param+"':'"+csrf_token+"'}";
		data = eval('(' + data + ')');
		var url ="/huati/user/acare";
		var This = $(this);
		$.ajax({
			url:url,
			type:"POST",
			data:data,
			dataType:"JSON",
			success:function(obj){
				if(obj.status){
					page = parseInt(page)+1;
					$(This).attr('page',page);
					$(This).before(obj.message);
				}else{
					if(obj.message = 'no_message'){
						$(This).remove();
					}else if(obj.message = 'no_sign'){
						login();
					}
					
				}
			}
		});
	});
</script>
