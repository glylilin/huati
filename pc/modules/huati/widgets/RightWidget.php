<?php
namespace pc\modules\huati\widgets;
use Yii;
use yii\base\Widget;
use pc\modules\huati\models\Qa;
class RightWidget extends Widget{
    public function run(){
        $qa_record = new Qa();
        $data = $qa_record->getIndexRight();
        $uid = 0;
       if(\Yii::$app->controller->id == "user"){
           $uid = \Yii::$app->request->get('uid') ? \Yii::$app->request->get('uid') : (\Yii::$app->user->id ? \Yii::$app->user->id : -1);
       }
        return $this->render("right",[
            'data'=>$data,
            'action_id'=>\Yii::$app->requestedAction->id,
            'uid'=>$uid
        ]);
    }
}