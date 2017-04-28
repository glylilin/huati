<?php
namespace pc\modules\huati\widgets;
use yii\base\Widget;
class CommentItemWidget extends Widget{
    public $comment= array();
    public $flag = 1;
    public function run(){
        if($this->flag == 1){
            return $this->render("comment_item",['data'=>$this->comment]);
        }else{
            return $this->render("comment_reply_item",['data'=>$this->comment]);
        }
       
    }
}