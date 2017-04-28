<?php 
use pc\modules\huati\widgets\CommentItemWidget;
use pc\modules\huati\widgets\PageWidget;
use pc\config\FileUtils;
?>

<!--  话题评论框开始 -->
			<div class="comment_topic_main">
				<input type='text' class='comment_content' />
				<span class="send_comment"> 评论 </span>
			</div>
			<!-- 话题评论框结束 -->
			<ul class="comment_info">
			     <?php if($data):?>
			         <?php foreach ($data as $k=>$v) :?>
			       <?=CommentItemWidget::widget(['comment'=>$v])?>
				    <?php endforeach;?>
				<?php endif;?>
			</ul>
			<?php if($totalCount) :?>
			<div class="comment_page">
			<?=PageWidget::widget(['totalCount'=>$totalCount,'currentPage'=>$currentPage,'actionClass'=>'active','maxButtonCount'=>5])?>
			</div>
			<?php endif;?>