<?php
namespace pc\modules\huati\widgets;
use yii\base\Widget;
use pc\common\models\User;
use pc\modules\huati\models\UserCount;
class UserCenterWidget extends Widget{
    public $uid;
    public function run(){
     
        $user_model = new User();
        $user_count_model = new UserCount();
        $useinfo = $user_model->getUserInfoById($this->uid);
        if($useinfo){
            $user_count_model = new UserCount();
            $useinfo['userCount'] = $user_count_model->getUserCount($this->uid);
            
            return $this->render("use_center",[
                'user_info'=>$useinfo,
                'action_id'=>\Yii::$app->requestedAction->id,
                'uid'=>$this->uid
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