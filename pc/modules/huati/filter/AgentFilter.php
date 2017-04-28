<?php
namespace pc\modules\huati\filter;
use yii\base\ActionFilter;
use Yii;
use pc\config\CommonUtils;
use yii\helpers\VarDumper;
class AgentFilter extends ActionFilter{
    public function  beforeAction($action){
       
  
       // var_dump(method_exists($action->controller,$action->actionMethod."_m"));exit();
        if(CommonUtils::isMobile()){
            if(method_exists($action->controller,$action->actionMethod."_m")){
                $action->controller->layout ="wap.php";//修改手机版的模板页面
                $action->id = $action->id."_m";
                $action->actionMethod = $action->actionMethod."_m";
            }
        }
        return parent::beforeAction($action);
    }
}