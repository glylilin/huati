<?php 
use pc\config\FileUtils;
use yii\helpers\Url;
use pc\config\CommonUtils;
use pc\modules\huati\widgets\PageWidget;
use pc\modules\huati\widgets\EditorWidget;
$this->registerCssFile(FileUtils::getFilePath('css',"huati", "main_left.css"));
$this->registerCssFile("/static/huati/simditor/styles/font-awesome.css");
$this->registerCssFile("/static/huati/simditor/styles/simditor.css");
$this->registerJsFile(FileUtils::getFilePath('js',"huati", "sort.js"));
$this->title =$seotitle;
$this->registerMetaTag(['name'=>'keywords','content'=>$seokeyword]);
$this->registerMetaTag(['name'=>'description','content'=>$seodescriotion]);
?>
<div class='main_left'>
    <div class="nav_position">
         <a href="http://www.puamap.com">首页</a> > <a href="/">话题</a> <?php if($question_topic_type_list):?> > <a href="<?= Url::to(['/tag/'.$question_topic_type_list[0]['id']])?>"><?=$question_topic_type_list[0]['name']?></a>  <?php endif;?> > <?=$detail['title']?>
    </div>
	<ul class='per_list_detail clearfix'>
		<li class="per_list_detail_li">
			<div class="detail_right" id="<?=$detail['id']?>">
				<!--话题导师介绍信息开始-->
					<?php if($detail['userinfo']):?>
					<div class="teacher_info" id="<?=$detail['userinfo']['id']?>">
					   <?php if(!$detail['anonymous']):?>
    					   <a href='<?=Url::to(['/'.$detail['userinfo']['id']."/dynamic"])?>'>
    						<?php if($detail['userinfo']['avatar_info']) :?>
                    		      <img originalSrc="<?=$detail['userinfo']['avatar_info']['path']?>" class="teacher_header lazy">
                    		<?php else : ?>
                    		       <img originalSrc="<?=FileUtils::getFilePath('images', 'huati', "header.png")?>" class="teacher_header lazy">
                    		<?php endif;?>
                    		</a>
                		<?php else:?>
                		  <img originalSrc="<?=FileUtils::getFilePath('images', 'huati', "header.png")?>" class="teacher_header lazy">
                		<?php endif;?>
						<dl class="teacher_info_desc">
						<dd class='teacher_info_one'>
						   <?php if(!$detail['anonymous']):?>
							<a href='<?=Url::to(['/'.$detail['userinfo']['id']."/dynamic"])?>'>
                    			<?php if ($detail['userinfo']['nickname']):?>
                    			     <span class='teacher_info_name'><?=$detail['userinfo']['nickname']?></span>
                    			<?php else :?>
                    			     <span class='teacher_info_name'><?=CommonUtils::format_phone($detail['userinfo']['mobile'])?></span>
                    			<?php endif;?>
                    		</a>
                    		<?php else :?>
                    		  匿名
                    		<?php endif;?>
							<?php if($detail['userinfo']['type'] == 4):?>
			                 <span class="ticon"></span>
			                <?php endif;?>
			                
							</dd>
							<?php if($detail['userCount']):?>
							<dd class='teacher_info_req_ans'>
							<span><?=$detail['userCount']['answer'];?>回答</span> <span><?=$detail['userCount']['question'];?>提问</span>
							<span><?=$detail['userCount']['follower'];?>关注者</span>
						</dd>
							<?php endif;?>
							<?php if(in_array($detail['user_id'],$following)) :?>
							<b class='reset'>取消关注</b>
							<?php else :?>
							<b class='cate_it'>关注TA</b>
							<?php endif;?>
							
						</dl>
				</div>
					<?php endif;?>
					<!--话题导师介绍信息介绍-->

				<!--话题展示開始-->
				<div class="teacher_topic">
					<div class="topic_list_head">
						<h2 class='topic_list_title'><?=$detail['title']?></h2>
					</div>
					<div class="topic_list_desc_top">
						<?=CommonUtils::formatJsonHtml($detail['content'],$detail['json'])?>
					</div>
	<?php if($question_topic_type_list):?>
    <ul class='topic_type clearfix'>
		<?php foreach($question_topic_type_list as $v) : ?>
		<li><a href="<?= Url::to(['/tag/'.$v['id']])?>"><?=$v['name']?></a></li>
		<?php endforeach;?>
	</ul>
	<?php endif;?>
					<dl class="topic_add_ons topic_add_ons_detail">
					<?php if(in_array($detail['id'],$favorites)):?>
						<dd class="delete_topic">已关注话题</dd>
					<?php else :?>
					      <dd class="follow_topic">关注话题</dd>
					<?php endif;?>
						
						<dd>发布于<?=CommonUtils::formatDate($detail['add_time'])?></dd>
						<dd>浏览<?=$detail['view']?>次</dd>
						<dd class="stop_comment"><?=$detail['comment'] ?>评论<img
								src="<?=FileUtils::getFilePath('images', 'huati', 'single.png')?>"
								class="top_img" />
						</dd>
						<dd class="share_topic">分享</dd>
					</dl>
					<div class="topic_comment_list"></div>
				</div>
				<!--话题展示結束-->
			</div>
		</li>

	</ul>

	<!------------------------------------------------------------------>

	<div class="topic_desc">
		<span class="topic_title"><?=$list['total']?>个回答</span>
		<ul class="topic_csd">
			<li>
			<a class='active_current' data='1'>最新</a>
			</li>
			<li>
			<a data='2'>最热</a>
			</li>
		</ul>
	</div>
	<!--主题详情开始-->
	<?php if($list['list']) :?>
	<div class="topic_main_list">
		<ul class="per_list_detail" id="view_list_sort_id">
		  <?php foreach ($list['list'] as $v):?>
			<li class="per_list_detail_li">
				<div class="detail_right clearfix" id="<?=$v['id']?>">
					<!--话题导师介绍信息开始-->
					 <?php if(isset($v['userinfo']) && $v['userinfo']) :?>
					<div class="teacher_info clearfix auto_height_50" id="<?=$v['userinfo']['id']?>">
					  <?php if(!$v['anonymous']):?>
    						<a href='<?=Url::to(['/'.$v['userinfo']['id']."/dynamic"])?>'>
    					    <?php if($v['userinfo']['avatar_info']):?>
                    		  <img originalSrc="<?=$v['userinfo']['avatar_info']['path']?>"
    							class="teacher_header teacher_header_detail lazy"
    							src="<?=FileUtils::getFilePath('images', 'huati', 'header.png')?>">
                    		<?php else : ?>
                    		  <img
    							src="<?=FileUtils::getFilePath('images', 'huati', 'header.png')?>"
    							class="teacher_header teacher_header_detail">
                    		<?php endif;?>
    						</a>
						<?php else :?>
						  <img
							src="<?=FileUtils::getFilePath('images', 'huati', 'header.png')?>"
							class="teacher_header teacher_header_detail">
						<?php endif;?>
						<dl class="teacher_info_desc float_left">
							<dd class='teacher_info_one nofloat'>
						<?php if(!$v['anonymous']):?>	
    						<?php if ($v['userinfo']['nickname']):?>
                			     <span class='teacher_info_name'><?=$v['userinfo']['nickname']?></span>
                			<?php else :?>
                			     <span class='teacher_info_name'><?=CommonUtils::format_phone($v['userinfo']['mobile'])?></span>
                			<?php endif;?>
                		<?php else :?>
                		  <span class='teacher_info_name'>匿名</span>
                		<?php endif;?>
            			
            			<?php if($v['userinfo']['type'] == 4):?>
            			     <span class="ticon"></span>
            			<?php endif;?>
						<?php if(in_array($v['user_id'],$following)) :?>
							<b class='reset'>取消关注</b>
						<?php else :?>
							<b class='cate_it'>关注TA</b>
						<?php endif;?>
						<?php if($v['userinfo']['userCount']) :?>
						</dd>
							<dd class='teacher_info_req_ans nofloat'>
								<span><?=$v['userinfo']['userCount']['answer']?>回答</span><span><?=$v['userinfo']['userCount']['question']?>提问</span><span><?=$v['userinfo']['userCount']['follower']?>关注者</span>
							</dd>
						</dl>
						<?php endif;?>
					</div>
					<?php endif;?>
					<!--话题导师介绍信息介绍-->
					<div class="detail_left">
						<span class="agree"> <img class="detail_like_img"
							src="http://huati.puamap.com/static/huati/images/topic_agree_0.png"> <span
							class="detail_like_num"><?=$v['like']?></span>
						</span> <span class="disagree"> <img class="detail_like_img"
							src="http://huati.puamap.com/static/huati/images/topic_disagree_0.png">
							<span class="detail_like_num"><?=$v['dislike']?></span>
						</span>
					</div>
					<!--话题展示開始-->
					<div class="teacher_topic set_width_530">
						<div class="topic_list_desc nohidden">
							<div class="topic_brief"><?=CommonUtils::mbsubstr(CommonUtils::format_simple_content($v['content']))?><span
									class="show_all">【显示全部】</span>
							</div>
							<div class="topic_brief_all"><?=CommonUtils::formatJsonHtml($v['content'],$v['json'])?>
								<span class="close_all">收起回答</span>
							</div>
						</div>
						<dl class="topic_add_ons topic_add_ons_detail">
							<dd>回答时间 <?=CommonUtils::formatDate($v['add_time'])?></dd>
							<dd class="stop_comment"><?=$v['comment']?>评论<img
									src="<?=FileUtils::getFilePath('images', 'huati', 'single.png')?>"
									class="top_img" />
							</dd>
							<dd class="share_topic">分享</dd>
							<?php  if(in_array($v['id'],$favorites)) :?>
							<dd class="delete_collect">已收藏</dd>
							<?php else :?>
							<dd class="collect_topic">收藏</dd>
							<?php endif;?>
							<?php if($v['userinfo']['id'] == Yii::$app->user->id) :?>
							<a href="<?=Url::to(['/huati/qa/uanswer','id'=>$v['id']])?>">
								<dd>修改</dd>
							</a>
							<dd class="del_self_item">删除</dd>
							<?php endif;?>
						</dl>
						<div class="topic_comment_list"></div>
					</div>
					<!--话题展示結束-->
				</div>
			</li>
		  <?php endforeach;?>
		</ul>
	</div>
	<?php endif;?>
	<!--主题详情结束-->


	<div class="answer_the_question">
		<textarea id="editor" class="editor"></textarea>
		<div class="detail_reply_submit">
			<span class="answer_submit" data="<?=$detail['id']?>">提交</span>
		</div>
	</div>
    <?=EditorWidget::widget(['id'=>'editor'])?>
	<script type="text/javascript">
   $(".answer_submit").click(function(){
	   if($(this).hasClass('sended')){
		   return;
	   }
	   var content = $('#editor').val();
	   if(!content){
		   return;
	   }
	   var csrf_param = $("meta[name='csrf-param']").attr("content").toString();
	   var csrf_token = $("meta[name='csrf-token']").attr("content");
	   var access_token =<?=$access_token?>;
	   var id ="<?=$detail['id']?>";
	   var url = '<?=Url::to(["/huati/qa/add"])?>';
	   var data = "{'QaForm[qa_id]':'"+id+"','QaForm[content]':'"+content+"','"+csrf_param+"':'"+csrf_token+"','QaForm[access_token]':'"+access_token+"'}";
	   data = eval('(' + data + ')');
	   $(this).addClass('sended');
	   var This =$(this);
	   $.ajax({
		    url:url,
		    data:data,
		    type:"POST",
		    dataType:'JSON',
		    success:function(res){
			    if(res['status']){
				    window.location.reload();
			    }else{
				    if(res['message'] == 'no_sign'){
					    login();
				    }else if(res['message']['content']){
					    alert(res['message']['content'][0]);
				    }else{
				    	alert(res['message']);
				    }
			    }
			   $(This).removeClass('sended');
		    }
		   });
	});
</script>
</div>
