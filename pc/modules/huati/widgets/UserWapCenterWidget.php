<?php
namespace pc\modules\huati\widgets;
use yii\base\Widget;
use pc\common\models\User;
use pc\modules\huati\models\UserCount;
use pc\modules\huati\models\Qa;

class UserWapCenterWidget extends Widget{
    public $uid;
    public function run(){
     
        $user_model = new User();
        $user_count_model = new UserCount();
        $useinfo = $user_model->getUserInfoById($this->uid);
        if($useinfo){
           
             
            $user_count_model = new UserCount();
            $useinfo['userCount'] = $user_count_model->getUserCount($this->uid);
            $top = Qa::getOneByWhere(['top'=>1,'user_id'=>$this->uid]);
            $hot = Qa::getOneByWhere(['hot'=>1,'user_id'=>$this->uid]);
            return $this->render("use_wap_center",[
                'user_info'=>$useinfo,
                'action_id'=>\Yii::$app->requestedAction->id,
                'uid'=>$this->uid,
                'top'=>$top,
                'hot'=>$hot
            ]);
        }else{
            \Yii::$app->response->statusCode= 404;
            \Yii::$app->response->format = Response::FORMAT_JSON;
            \Yii::$app->response->data = array(
                'status'=>false,
                'message'=>"用户不存在"
            );
        }
       
    }
}