<?php
namespace pc\modules\huati\filter;
use Yii;
use yii\base\ActionFilter;
use yii\web\Response;
class LoginFilter extends ActionFilter{
    public function beforeAction($action){
        if(Yii::$app->user->isGuest){
            \Yii::$app->response->format = Response::FORMAT_JSON;
            \Yii::$app->response->data = array(
                'status'=>false,
                'message'=>"no_sign"
            );
          return false;
        }
        return parent::beforeAction($action);
    }
}
?>