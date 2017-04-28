<?php
use pc\modules\huati\widgets\UserCenterWidget;
use pc\config\FileUtils;
use pc\config\CommonUtils;
use pc\modules\huati\widgets\PageWidget;
use yii\helpers\Url;
$this->registerCssFile(FileUtils::getFilePath('css',"huati", "main_left.css"));
$this->title =$seotitle;
$this->registerMetaTag(['name'=>'keywords','content'=>$seokeyword]);
$this->registerMetaTag(['name'=>'description','content'=>$seodescriotion]);
?>
<div class='main_left'>
<?=UserCenterWidget::widget(['uid'=>$uid])?>
		<!--我的关注-->
		<ul class="per_list_detail">
			<?php if($data) :?>
				<?php foreach ($data as $key => $v) :?>
			<li class="per_list_detail_li">

				<div class="detail_right" id="<?=$v['id']?>">
					<!--话题展示開始-->
					<div class="teacher_topic">
						<div class="topic_list_head">
						<?php if($v['type'] == 1) :?>
							<a href="<?=Url::to(['/info/'.$v['id'].".html"])?>">
								<h2 class='topic_list_title'><?=$v['title']?></h2>
							</a>
						<?php else: ?>
							<a href="<?=Url::to(['/info/'.$v['aid'].'.html'])?>">
								<h2 class='topic_list_title'><?=$v['title']?></h2>
							</a>
						<?php endif;?>
							<font class='this_topic_answer_time'>
								<?=CommonUtils::format_add_time($v['add_time']);?>
							</font></div>
						<?php if($v['content']) :?>
						<div class="topic_list_desc">
							<div class="topic_brief">
							<?=CommonUtils::mbsubstr(CommonUtils::format_simple_content($v['content']))?>
							</div>
						</div>
						<?php endif;?>
						<dl class="topic_add_ons">
								
								<dd class="agree"><?=$v['like']?> 赞</dd>
                                <dd class="disagree"><?=$v['dislike']?> 踩</dd>
								<dd class="stop_comment"><?=$v['comment']?> 评论 <img src="<?=FileUtils::getFilePath('images', 'huati', 'single.png')?>" />
								</dd>
								<dd class="share_topic">分享</dd>
								
								<dd class="delete_collect">
								<?php if($v['type'] == 1) :?>
									取消收藏问题
								<?php else:?>
									取消收藏问答
								<?php endif;?>
								</dd>
								
						</dl>
						<div class="topic_comment_list">
							
						</div>
					</div>
					<!--话题展示結束-->
				</div>
			</li>
			<?php endforeach;?>
		<?php else :?>
			<li class="per_list_detail_li">
			暂时没有数据
			</li>
		<?php endif;?>
			
		</ul>
		<?php if($data) :?>
		<div class="main_page">
			<?=PageWidget::widget(['currentPage'=>$currentPage,'actionClass'=>'active','isA'=>true,'options'=>$options,'totalCount'=>$totalCount])?>
		
		</div>
		<?php endif;?>
	</div>
	
</div>

