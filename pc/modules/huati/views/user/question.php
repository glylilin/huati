<?php
use pc\modules\huati\widgets\UserCenterWidget;
use pc\config\FileUtils;
use pc\config\CommonUtils;
use pc\modules\huati\widgets\PageWidget;
use yii\helpers\Url;
$this->title =$seotitle;
$this->registerMetaTag(['name'=>'keywords','content'=>$seokeyword]);
$this->registerMetaTag(['name'=>'description','content'=>$seodescriotion]);
$this->registerCssFile(FileUtils::getFilePath('css',"huati", "main_left.css"));
?>

<div class='main_left'>
<?=UserCenterWidget::widget(['uid'=>$uid])?>

	<?php if($data) :?>
	<ul class="per_list_detail">
	<?php foreach ($data as $v) :?>
			<li class="per_list_detail_li per_list_detail_li_question">
				<a href="<?=Url::to(['/topic/qa/view','id'=>$v['id']])?>"><span class="remmend_topic_title"><?=$v['title']?></span></a>
				<div class="remmend_topic_time_answer_care">
					<span><?=CommonUtils::format_add_time($v['add_time'])?></span>
				
					<span><?=$v['answer']?> 回答</span>
					<span><?=$v['follow']?>关注</span>
				</div>
				<?php if($v['user_id'] == Yii::$app->user->id):?>
				<span class='ignore_question' id="<?=$v['id']?>">删除</span>
				<?php endif;?>
			</li>
			<?php endforeach;?>
		
		</ul>
<div class="main_page">
		<?=PageWidget::widget(['currentPage'=>$currentPage,'actionClass'=>'active','isA'=>true,'options'=>$options,'totalCount'=>$totalCount])?>
	</div>
	<?php endif;?>
	</div>
	<!--主题详情结束-->
</div>

