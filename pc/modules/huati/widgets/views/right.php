<?php
use pc\config\FileUtils;
use yii\helpers\Url;
?>
<?php if(Yii::$app->user->id):?>
<h2 class='center_self'><?=yii::t('TOPIC', "USER_CENTER")?></h2>
<div class='center_info'>
    <?php if($action_id == "care" && $uid == Yii::$app->user->id ):?>
	   <a class='care ahover' rel="nofollow" href="<?=Url::to(['/'.Yii::$app->user->id."/careuser"])?>"><?=yii::t('TOPIC', "MY_CARE")?></a>
	<?php else :?>
	   <a class='care' rel="nofollow"  href="<?=Url::to(['/'.Yii::$app->user->id."/careuser"])?>"><?=yii::t('TOPIC', "MY_CARE")?></a>
	<?php endif;?>
	
	 <?php if($action_id == "question" && $uid == Yii::$app->user->id ):?>
	   <a class='question ahover' rel="nofollow" href="<?=Url::to(['/'.Yii::$app->user->id."/ask"])?>"><?=yii::t('TOPIC', "MY_QUESTION")?></a>
	 <?php else :?>
	   <a class='question' rel="nofollow" href="<?=Url::to(['/'.Yii::$app->user->id."/ask"])?>"><?=yii::t('TOPIC', "MY_QUESTION")?></a>
	 <?php endif;?>
	
	<?php if($action_id == "answer" && $uid == Yii::$app->user->id ):?>
	   <a class="answer ahover" rel="nofollow" href="<?=Url::to(['/'.Yii::$app->user->id."/cans"])?>"><?=yii::t('TOPIC', "MY_ANSWER")?></a>
	<?php else :?>
	   <a class="answer" rel="nofollow" href="<?=Url::to(['/'.Yii::$app->user->id."/cans"])?>"><?=yii::t('TOPIC', "MY_ANSWER")?></a>
	<?php endif;?>
	
	
	<?php if($action_id == "collect" && $uid == Yii::$app->user->id ):?>
	<a class='collection ahover' rel="nofollow" href="<?=Url::to(['/'.Yii::$app->user->id."/col"])?>"><?=yii::t('TOPIC', "MY_COLLECTION")?></a>
	<?php else :?>
	<a class='collection' rel="nofollow" href="<?=Url::to(['/'.Yii::$app->user->id."/col"])?>"><?=yii::t('TOPIC', "MY_COLLECTION")?></a>
	<?php endif;?>
	<!--  
	<a class='invite'><?=yii::t('TOPIC', "MY_INVITE")?></a>
	-->
</div>
<?php endif;?>
<?php if($this->beginCache("download_info",['duration' => 3600])) {?>
<div class="base_hot_topic">
	<h2><?=yii::t('TOPIC', "BEST_HOT_TOPIC")?></h2>
	<span class="change_hot"><?=yii::t('TOPIC', "FOR_A_BATCH")?></span>
</div>
<?php if($data):?>
<div class="base_hot_topic_list">
	<ul>
	   <?php foreach ($data as $v) :?>
		<li><a href="<?=Url::to(['/info/'.$v['id'].".html"])?>"><?=$v['title']?></a></li>
		<?php endforeach;?>
	
	</ul>
</div>
<?php endif;?>

<div class="app_info">
	<img class="topic_right_tag"
		src="<?=FileUtils::getFilePath('images', 'huati', 'index_right_tag.png')?>">
	<span class="puamap_app_title"><?=yii::t('TOPIC', "APP")?></span> <span
		class="puamap_app_desc"><?=yii::t('TOPIC', "APP_DESC")?></span> <img
		class="app_img lazy"
		originalSrc="<?=FileUtils::getFilePath('images', 'huati', "app.png")?>">
	<div class="index_right_wechat_download">
		<img class="puamap_logo lazy"
			originalSrc="<?=FileUtils::getFilePath('images', 'huati', 'logo.png')?>">
		<span class="puamap_detail"><?=yii::t('TOPIC', "DOWNLOAD_WAY")?></span>
	</div>
</div>
<?php $this->endCache();}?>





