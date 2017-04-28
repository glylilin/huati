<?php
namespace  pc\modules\huati\assets;
use Yii;
use yii\web\AssetBundle;
class WapAsset extends AssetBundle{
    public $basePath = 'pc/modules/huati/assets';
    public $css = [
        'static/wap/css/m.css',
        'static/huati/wap/css/main.css',
    ];
    public $js = [
        '/static/wap/js/jquery-1.7.2.min.js',
        '/static/huati/wap/js/main.js',
        '/static/wap/js/m.js',
    ];
    public $depends = [
    
    ];
}