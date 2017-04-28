<?php
$config = [
    'id' => 'pc',
    'basePath' => dirname(__DIR__),
    'name' => 'PC',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'pc\modules\controllers',
    'defaultRoute'=>'huati/index',//默认控制器
    'modules' => [
        'frontend' => [
            'class' => 'pc\modules\frontend\Module',
        ],
        'backend' => [
            'class' => 'pc\modules\backend\Module',
        ],
        'huati' => [
            'class' => 'pc\modules\huati\Module',
        ],
    ],
    'language' => 'zh-CN',
    //'sourceLanguage' => 'en',
    'components' => [
            'request' => [
                'enableCookieValidation' => false,
                'csrfParam' => '_csrf-frontend',
                'cookieValidationKey' => 'fcuVvgFv0Vex88Qm5N2-h6HH5anM4HEd',
            ],
            'cache' => [
                'class' => 'yii\caching\FileCache',
            ],
            'user' => [
                'identityClass' => 'pc\common\models\User',
                'enableAutoLogin' => false,
                'enableSession' => true,
                'loginUrl' => null,
            ],
            'log' => [
                'traceLevel' => YII_DEBUG? 3: 0,
                'targets' => [
                    [
                        'class' => 'yii\log\FileTarget',
                        'levels' => ['error', 'warning'],
                    ],
                ],
            ],
            'i18n' => [
                    'translations' => [
                        'TOPIC' => [
                            'class' => 'yii\i18n\PhpMessageSource',
                            'sourceLanguage' => 'en-US',
							'basePath' => '@app/messages',
							'forceTranslation' => true,
                            'fileMap' => [
                                'common' => 'topic.php',
                                'TOPIC' => 'topic.php',
                            ],
                        ],
                        'COMMON'=>[
                            'class' => 'yii\i18n\PhpMessageSource',
                            'fileMap' => [
                                'COMMON' => 'common.php',
                            ],
                        ]
                    ],
              ],
            /*'errorHandler' => [
             'errorAction' => 'site/error',
            ],*/
            'urlManager' => [
                    'enablePrettyUrl' => true,
                    'showScriptName' => false,
                    //'suffix'=>'.html',
                    'rules' => [
                        //"<controller:\w+>/<action:\w+>"=>"huati/<controller>/<action>",
                        "index_<page:\d+>.html"=>"huati/",
                        "tag/"=>"huati/index/tag_m",
                        "tag/<id:\d+>"=>"huati/",
                        "tag/<id:\d+>_<page:\d+>.html"=>"huati/",
                        "info/<id:\d+>.html"=>"huati/qa/view",
                        "info/<id:\d+>_<page:\d+>.html"=>"huati/qa/view",
                        "/center"=>"/huati/user/center",
                        "<uid:\d+>/dynamic"=>"/huati/user/dynamic",
                        "<uid:\d+>/ask"=>"/huati/user/question",
                        "<uid:\d+>/cans"=>"/huati/user/answer",
                        "<uid:\d+>/col"=>"/huati/user/collect",
                        "<uid:\d+>/careuser"=>"/huati/user/care",
                        "<uid:\d+>/ctopic"=>"/huati/user/ctopic",
                        "<uid:\d+>/cuser"=>"/huati/user/cuser",
                        "<uid:\d+>/dynamic/<page:\d+>.html"=>"/huati/user/dynamic",
                        "<uid:\d+>/ask/<page:\d+>.html"=>"/huati/user/question",
                        "<uid:\d+>/cans/<page:\d+>.html"=>"/huati/user/answer",
                        "<uid:\d+>/col/<page:\d+>.html"=>"/huati/user/collect",
                        "<uid:\d+>/careuser/<page:\d+>.html"=>"/huati/user/care",
                        "<uid:\d+>/ctopic/<page:\d+>.html"=>"/huati/user/ctopic",
                        "<uid:\d+>/cuser/<page:\d+>.html"=>"/huati/user/cuser",
                        "search"=>"/huati/qa/search",
                        "search/<search:>"=>"/huati/qa/search",
                        "search/<search:>/<page:\d+>"=>"/huati/qa/search",
                        "<modules:\w+>/<controller:\w+>/<action:\w+>"=>"<modules>/<controller>/<action>"
                    ],
                ],
               
            ],
            'params' => [],
            'aliases'=>[
                '@topic'=>dirname(__DIR__)."/modules/topic",
                '@pc'=>dirname(__DIR__),
                '@PageSize'=>15,
                '@WapPageSize'=>5
            ],
            ];


return $config;
?>
