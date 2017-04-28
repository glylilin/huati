<?php
use pc\config\FileUtils;
use pc\modules\huati\widgets\UserCenterWidget;
use pc\config\CommonUtils;
use yii\helpers\Url;
use pc\modules\huati\widgets\PageWidget;
$this->title =$seotitle;
$this->registerMetaTag(['name'=>'keywords','content'=>$seokeyword]);
$this->registerMetaTag(['name'=>'description','content'=>$seodescriotion]);
$this->registerCssFile(FileUtils::getFilePath('css',"huati", "main_left.css"));
?>
<div class='main_left'>
<?=UserCenterWidget::widget(['uid'=>$uid])?>

		<!--我的关注-->
		<ul class="per_list_detail">
		<?php if($data) : ?>
		  <?php foreach ($data as $v) :?>
			
			<li class="per_list_detail_li">
				<div class="detail_right" id="<?=$v['id']?>">
					<!--话题展示開始-->
				<div class="teacher_topic">
					<div class="topic_list_head_action">
						<span class='head_action'>
						  <?php if($v['type'] == 1) :?>
							提出问题
							<?php else :?>
							回答问题
						  <?php endif;?>
						</span>
							<font class='this_topic_answer_time'><?=CommonUtils::format_add_time($v['add_time'])?></font></div>
					<?php if($v['userinfo']): ?>
						<div class="teacher_info">
    						 <?php if(!$v['anonymous']) :?>
    								<a href="<?=Url::to(["/".$uid.'/dynamic'])?>">
    								<?php if($v['userinfo']['avatar_info'] && $v['userinfo']['avatar_info']['path']) :?>
    									<img src="<?=$v['userinfo']['avatar_info']['path']?>" class="teacher_header">
    								<?php else :?>
    									<img src="<?=FileUtils::getFilePath('images', 'huati', "header.png")?>" class="teacher_header">
    								<?php endif;?>
    								</a>
    						<?php else :?>
    								<img src="<?=FileUtils::getFilePath("images", "huati", "header.png")?>" class="teacher_header">
    						<?php endif;?>
							<dl class="teacher_info_desc">
								<dd class='teacher_info_one'>
									<?php if(!$v['anonymous']):?>
										<a href="<?=Url::to(["/".$uid.'/dynamic'])?>">
										<span class='teacher_info_name dynamic_name'>
										  <?php if($v['userinfo']['nickname']) :?>
										      <?=$v['userinfo']['nickname']?>
										  <?php else :?>
											<?=CommonUtils::format_phone($v['userinfo']['mobile'])?>
										<?php endif;?>
										</span>
										</a>
									<?php else :?>
										<span class='teacher_info_name'>
											匿名
										</span>
									<?php endif;?>
									<?php if($v['userinfo']['type'] == 4) :?>
									<span class="ticon"></span>
									<?php endif;?>
								</dd>
							</dl>
						</div>
					<?php endif;?>
	
					<?php if($v['type'] == 1) :?>
							<div class="topic_list_head">
							<a href="<?=Url::to(['/info/'.$v['id'].'.html'])?>"><h2 class='topic_list_title'><?=$v['title']?></h2></a>
							</div>
					<?php elseif(isset($v['aid']) && $v['aid']) :?>
							<div class="topic_list_head">
							<a href="<?=Url::to(['/info/'.$v['aid'].'.html'])?>"><h2 class='topic_list_title'><?=$v['title']?></h2></a>
							</div>
					<?php endif;?>
							
					<span class="this_topic_answer_many_agree">
						<span><?=$v['answer']?>回答</span> <span><?=$v['view']?>浏览</span>
					</span>
					<div class="topic_list_desc clearfix">
					<?php if(CommonUtils::format_first_image_json($v['json'])) :?>
							<img originalSrc="<?=CommonUtils::format_first_image_json($v['json'])?>" class=" teacher_header index_images_left "/>
					<?php endif;?>
					<div class="topic_brief"><?=CommonUtils::mbsubstr(CommonUtils::format_simple_content($v['content']))?></div>

					</div>
						<dl class="topic_add_ons">
							
								<dd class="agree"><?=$v['like']?> 赞</dd>
                                <dd class="disagree"><?=$v['dislike']?> 踩</dd>
								<dd class="stop_comment"><?=$v['comment']?>评论 <img src="<?=FileUtils::getFilePath('images', 'huati', 'single.png')?>" /> 
								</dd>
								<dd class="share_topic">分享</dd>
								
						</dl>
						<div class="topic_comment_list">
							
						</div>
					</div>
					<!--话题展示結束-->
				</div>
			</li>
			 <?php endforeach;?>
			<?php else :?>
			
			<li>暂时没有动态</li>
			<?php endif;?>

		</ul>
	

	   <div class="main_page">
		<?=PageWidget::widget(['currentPage'=>$currentPage,'actionClass'=>'active','isA'=>true,'options'=>$options,'totalCount'=>$totalCount])?>
		
		</div>
	</div>
	<!--主题详情结束-->
</div>
