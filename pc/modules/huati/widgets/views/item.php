<?php
use  pc\config\FileUtils;
use pc\config\CommonUtils;
use yii\helpers\Url;
?>
<?php if($data) :?>
<div class="detail_right" id="<?=$data['id']?>">
	<!--话题导师介绍信息开始-->
	<?php if($data['userinfo']) :?>
	<div class="teacher_info">
	   <?php if(!$data['anonymous']):?>
    	     <a href='<?=Url::to(['/'.$data['userinfo']['id']."/dynamic"])?>'>
        	   <?php if($data['userinfo']['avatar_info']) :?>
      
        		     <img originalSrc="<?=$data['userinfo']['avatar_info']['path']?>" data="<?=$data['userinfo']['avatar_info']['path']?>" class="teacher_header lazy">
        		<?php else : ?>
        		  <img originalSrc="<?=FileUtils::getFilePath('images', 'huati', "header.png")?>" class="teacher_header lazy">
        		<?php endif;?>
        	</a>
    	<?php else:?>
    	       <img originalSrc="<?=FileUtils::getFilePath('images', 'huati', "header.png")?>" class="teacher_header lazy">
    	<?php endif;?>
		<?php if(!$data['anonymous']):?>
			<a href='<?=Url::to(['/'.$data['userinfo']['id']."/dynamic"])?>'>
			<?php if ($data['userinfo']['nickname']):?>
			     <span class='teacher_info_name'><?=$data['userinfo']['nickname']?></span>
			<?php else :?>
			     <span class='teacher_info_name'><?=CommonUtils::format_phone($data['userinfo']['mobile'])?></span>
			<?php endif;?>
			</a>
		<?php else :?>
		  <span class='teacher_info_name'>匿名</span>
		<?php endif; ?>	
			<?php if($data['userinfo']['type'] == 4):?>
			     <span class="ticon"></span>
			<?php endif;?>
			<a class="let_me_answer" rel="nofollow" href="<?=URL::to(['/info/'.$data['id'].".html"])?>">我来回答</a>
	</div>
	<?php endif;?>
	<!--话题导师介绍信息介绍-->

	<!--话题展示開始-->
	<div class="teacher_topic">
		<!-- 话题标题信息开始 -->
		<div class="topic_list_head">
		  <?php if($data['digest']) :?>
			<span>精</span>
		  <?php endif;?>
		  <?php if($data['title']) :?>
			<a href='<?=Url::to(['/info/'.$data['id'].".html"])?>'><h2 class='topic_list_title'><?=$data['title']?></h2></a>
		  <?php endif;?>
		</div>
		<div class="answer_view_num">
			<span><?=$data['answer']?> 回答</span> <span><?=$data['view']?> 浏览</span>
		</div>
		<!-- 标题信息结束 -->
		<!-- 话题简介正文开始 -->
		<?php if ($data['json'] && CommonUtils::format_first_image_json($data['json'])):?>
		<div class="topic_list_desc clearfix">
		    <img originalSrc="<?=CommonUtils::format_first_image_json($data['json'])?>" class="lazy leftimg">
			<div class="topic_brief_img"><?= CommonUtils::mbsubstr(CommonUtils::format_simple_content($data['content']),0,100)?></div>
		</div>
		<?php else :?>
		<div class="topic_list_desc">
			<div class="topic_brief"><?= CommonUtils::mbsubstr(CommonUtils::format_simple_content($data['content']))?></div>
		</div>
		<?php endif;?>
		<!-- 话题简介正文结束 -->
		<!-- 话题简介正文底部按钮 开始-->
		<dl class="topic_add_ons">
			<dd class="agree"><?=$data['like']?> 赞</dd>
			<dd class="disagree"><?=$data['dislike']?> 踩</dd>
			<dd class="stop_comment">
				<?=$data['comment']?>评论 
				<img src="<?=FileUtils::getFilePath("images","huati","single.png")?>" />
			</dd>
			<?php if(in_array($data['id'],$favorites)):?>
			<dd class="delete_topic hiddens">已关注话题</dd>
			<?php else:?>
			<dd class="follow_topic hiddens">关注话题</dd>
			<?php endif;?>
			<dd class="share_topic hiddens">分享</dd>
			
			<?php if($data['user_id'] == Yii::$app->user->id) :?>
			<a href="<?=Url::to(['/huati/qa/uquestion','id'=>$data['id']])?>"><dd>修改</dd></a>
			<?php endif;?>
		</dl>
		<!-- 话题简介正文底部按钮结束 -->

		<div class="topic_comment_list">
			
		</div>
	</div>
	<!--话题展示結束-->
</div>
<?php endif;?>
