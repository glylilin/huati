<?php
namespace pc\common\controllers;
use yii\web\Controller;
use yii\helpers\VarDumper;
use pc\modules\huati\filter\AgentFilter;
class BaseController extends Controller{

    public function goHome()
    {
        return $this->redirect("/");
    }

    public function behaviors(){
        return [
            ['class'=>AgentFilter::className(),
            ],
    
        ];
    }
    
    public function p($data, $flag = false)
    {
        echo "<pre>";
        VarDumper::dump($data);
        if ($flag) {
            exit();
        }
    }
}