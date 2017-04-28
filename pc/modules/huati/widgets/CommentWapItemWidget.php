<?php
namespace pc\modules\huati\widgets;
use yii\base\Widget;
class CommentWapItemWidget extends Widget{
    public $comment= array();
    public function run(){
         return $this->render("comment_wap_item",['data'=>$this->comment]);
    }
}