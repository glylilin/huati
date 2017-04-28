<?php
//defined('YII_DEBUG') or define('YII_DEBUG', true);
define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../../../vendor/autoload.php');
require(__DIR__ . '/../../../vendor/yiisoft/yii2/Yii.php');

require(__DIR__ . '/../../../config/constants.php');

$config = yii\helpers\ArrayHelper::merge(
	require(__DIR__ . '/../../../config/main.php'),
	require(__DIR__ . '/../../../overall/backend/config/main.php')
);

//print_r($config);exit();

//print_r(Yii::getAlias('@web'));exit();

(new yii\web\Application($config))->run();
