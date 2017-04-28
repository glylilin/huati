<?php
namespace pc\modules\huati;
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'pc\modules\huati\controllers'; 
    public $defaultController = 'index';
    public $defaultRoute = 'index';
    public function init(){
    	
    	parent::init();
    	//\Yii::$app->errorHandler->errorAction = 'frontend/index/error';
        //\Yii::$app->request->cookieValidationKey = "fcuVvgFv0Vex88Qm5N2-h6HH5anM4HEd";
    	\Yii::configure($this,['layout'=>"main"]);
        
    }
 
}