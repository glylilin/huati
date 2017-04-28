<?php
use yii\helpers\Html;
use pc\config\FileUtils;
use pc\modules\huati\widgets\LoginWidget;
use pc\modules\huati\widgets\LoginedWidget;
use pc\modules\huati\widgets\RightWidget;
use yii\helpers\Url;
use pc\modules\huati\assets\WapAsset;
WapAsset::register($this);
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
<div class="bodyauto">

<?=$content?>
<div class="bot_div"></div>
<ul class="m_nav maxWidth">
	<li><a href="#" target="_blank"><img src="<?=FileUtils::getWapCommonFilePath('images', "m_nav_icon1.png")?>"/><p>首页</p></a></li>
	<li><a href="#" target="_blank"><img src="<?=FileUtils::getWapCommonFilePath('images', "m_nav_icon6.png")?>"/><p>话题</p></a></li>
	<li><a href="#" target="_blank"><img src="<?=FileUtils::getWapCommonFilePath('images', "m_nav_icon2.png")?>"/><p>资讯</p></a></li>
	<li><a href="#" target="_blank"><img src="<?=FileUtils::getWapCommonFilePath('images', "m_nav_icon3.png")?>"/><p>课程</p></a></li>
	<li><a href="/center" target="_blank"><img src="<?=FileUtils::getWapCommonFilePath('images', "m_nav_icon5.png")?>"/><p>我的</p></a></li>
</ul>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
