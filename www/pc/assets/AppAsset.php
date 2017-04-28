<?php
namespace  pc\modules\topic\assets;
use Yii;
use yii\web\AssetBundle;
class AppAsset extends AssetBundle{
  //  public $sourcePath = '@topic/views/static';
    public $css = [
        'static/topic/css/main.css',
    ];
    public $js = [
        '/static/js/jquery.min.js',
        '/static/topic/js/lazy.js',
        '/static/topic/js/header.js',
        '/static/topic/js/share.js',
    ];
    public $depends = [
    
    ];
}