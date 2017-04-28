<?php
use pc\config\FileUtils;
use pc\modules\huati\widgets\ItemWidget;
use pc\modules\huati\widgets\PageWidget;
use yii\helpers\Url;
$this->title =$seotitle;
$this->registerCssFile(FileUtils::getFilePath('css',"huati", "main_left.css"));
?>
<div class='main_left'>

	<!--主题详情开始-->
	<div class="topic_main_list">
		<ul class="per_list_detail">
		<?php foreach ($qa_list_data as $k =>$v):?>
			<li class="per_list_detail_li">		
                <?=ItemWidget::widget(['item'=>$v])?>
			</li>
		<?php endforeach;?>
		</ul>
		<div class="main_page">
		<?=PageWidget::widget(['currentPage'=>$currentPage,'actionClass'=>'active','isA'=>true,'options'=>$options,'totalCount'=>$totalCount])?>
		
		</div>
	</div>
	<!--主题详情结束-->
</div>