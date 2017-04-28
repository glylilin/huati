<?php
namespace  pc\modules\huati\widgets;
use yii\base\Widget;
use yii\helpers\VarDumper;
use pc\common\models\User;
class LoginedWidget extends Widget{
    public function run(){
		$user_model = new User();
        $data =  $user_model->getUserInfoById(\Yii::$app->user->id);

        return $this->render('logined',['user'=>$data]);
    }
}