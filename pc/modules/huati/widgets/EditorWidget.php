<?php
namespace pc\modules\huati\widgets;
use yii\base\Widget;
use pc\config\CommonUrl;
class EditorWidget extends Widget{
 public $id = '';
    public function run(){
       $uploadUrl = "";
       $user = \Yii::$app->user->identity;
       $enable = false;
       if(\Yii::$app->user->id){
           $cache_user =\Yii::$app->user->identity;
           if($cache_user->type == 4){
			    $uploadUrl = CommonUrl::uploadImage();
               $uploadUrl = CommonUrl::uploadImage()."?access_token=".\Yii::$app->user->identity->access_token;
				$enable = true;
           }
       }
	   
       return $this->render("editor",['id'=>$this->id,"uploadUrl"=>$uploadUrl,'enable'=>$enable]);
    }
}