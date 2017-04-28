<?php
namespace pc\modules\huati\filter;
use Yii;
use yii\base\ActionFilter;
use yii\helpers\Url;
class UserFilter extends ActionFilter{
 public function beforeAction($action){
        if(Yii::$app->user->isGuest){
           \Yii::$app->response->redirect(Url::to(['/topic']));
          return false;
        }
        return parent::beforeAction($action);
    }
}
?>