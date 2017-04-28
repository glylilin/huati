<?php
namespace pc\modules\huati\widgets;
use yii\base\Widget;
use pc\common\models\User;
use pc\modules\huati\models\UserCount;
use pc\modules\huati\models\Follow;
class WapUserItemWidget extends Widget{
    public $uid;
    public function run(){
     
        $user_model = new User();
        $user_count_model = new UserCount();
        $useinfo = $user_model->getUserInfoById($this->uid);
        if($useinfo){
            $user_count_model = new UserCount();
            $useinfo['userCount'] = $user_count_model->getUserCount($this->uid);
          
            return $this->render("user_item_m",[
                'user_info'=>$useinfo,
                'following'=>Follow::getFollowingIds()
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