<?php
namespace pc\modules\huati\widgets;
use yii\base\Widget;
use pc\common\models\UserForm;
class LoginWidget extends Widget{
    public function run(){
        $userForm = new UserForm();
        return $this->render("login",['model'=>$userForm]);
    }
}