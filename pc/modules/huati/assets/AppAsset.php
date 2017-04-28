<?php
namespace  pc\modules\huati\assets;
use Yii;
use yii\web\AssetBundle;
class AppAsset extends AssetBundle{
    public $basePath = 'pc/modules/huati/assets';
    public $css = [
        'static/huati/css/main.css',
    ];
    public $js = [
        '/static/js/jquery.min.js',
        '/static/huati/js/lazy.js',
        '/static/huati/js/header.js',
        '/static/huati/js/share.js',
		'/static/huati/js/huatiseo.js',
    ];
    public $depends = [
    
    ];
}