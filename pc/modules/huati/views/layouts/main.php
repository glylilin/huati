<?php
use yii\helpers\Html;
use pc\modules\huati\assets\AppAsset;
use pc\config\FileUtils;
use pc\modules\huati\widgets\LoginWidget;
use pc\modules\huati\widgets\LoginedWidget;
use pc\modules\huati\widgets\RightWidget;
use yii\helpers\Url;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="header">
	<div class="header_main">
	    <a href="http://www.puamap.com">
	    <img src="<?=FileUtils::getFilePath('images', 'huati', "logox2.png")?>" class="topic_logo"/>
	    </a>
	    <a class="title_logo" href="/"><?=yii::t("TOPIC", "TOPIC")?></a>
		<form action="/search" class="main_nav_form" method="post">
    		<div class='seach_main'>
    			<input type='text' class='seach_input' name='search' placeholder="搜索你感兴趣的话题…"/>
    			<input type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>"/>
    			<img src="<?=FileUtils::getFilePath('images', 'huati', "seach.png")?>" class="submitSeach">
    		</div>
		</form>
		<ul class="head_quest">
		  <?php if(Yii::$app->controller->id == "index" && Yii::$app->requestedAction->id != "digest" && Yii::$app->requestedAction->id != "column" ) :?>
		    <li><a class="active" href="/" rel="nofollow"><?=yii::t("TOPIC", "INDEX")?></a></li>
		  <?php else:?>
		   <li><a href="/" rel="nofollow"><?=yii::t("TOPIC", "INDEX")?></a></li>
		  <?php endif;?>
		    <?php if(\Yii::$app->requestedAction->id == "submit") :?>
		    	<li><a class="active" href="<?=Url::to(['/huati/qa/submit']);?>" rel="nofollow"><?=yii::t("TOPIC", "ADD_QUESTION")?></a></li>
		    <?php else :?>
		    	<li><a href="<?=Url::to(['/huati/qa/submit']);?>" rel="nofollow"><?=yii::t("TOPIC", "ADD_QUESTION")?></a></li>
		    <?php endif;?>
		    
		    <?php if(Yii::$app->requestedAction->id == "digest") :?>
			<li><a class="active" href="<?=Url::to(['/huati/index/digest']);?>" rel="nofollow"><?=yii::t("TOPIC", "ANSWER")?></a></li>
			<?php else:?>
			<li><a href="<?=Url::to(['/huati/index/digest']);?>" rel="nofollow"><?=yii::t("TOPIC", "ANSWER")?></a></li>
			<?php endif;?>
			
			<?php if(Yii::$app->requestedAction->id == "column") :?>
			<li><a class="active" href="<?=Url::to(['/huati/index/column']);?>" rel="nofollow"><?=yii::t("TOPIC", "TEACHER_CLOUMN")?></a></li>
			<?php else :?>
			<li><a href="<?=Url::to(['/huati/index/column']);?>" rel="nofollow"><?=yii::t("TOPIC", "TEACHER_CLOUMN")?></a></li>
			<?php endif;?>
		</ul>
		<?php if(!Yii::$app->user->isGuest){?>
		<?=LoginedWidget::widget()?>
		<?php }else{ ?>
		<?=LoginWidget::widget()?>
		<?php }?>
	</div>
</div>
<div class='main_content clearfix'>
    <div class='main_left'>
    	<?=$content?>
    </div>
    <div class="main_right">
        <?=RightWidget::widget()?>
    </div>
</div>
<div class="main_bottom">
	<h2><?=yii::t('TOPIC', "COPYRIGHT")?></h2>
</div>


<div class="share_dialog" >
	<ul class="share_ul">
		<li class="sina"><img src="http://wenda.puamap.com/static/images/sina.png"><span>新浪微博</span></li>
<!-- 		<li class='ten'><img src='images/ten.png'><span>腾讯微博</span></li>
		<li class='qq'><img src='images/qq.png'><span>QQ空间</span></li>
		<li class='rr'><img src='images/rr.png'><span>人人网</span></li> -->
	</ul>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
