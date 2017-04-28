<?php
namespace pc\modules\huati\widgets;
use yii\base\Widget;
use pc\modules\huati\models\Favorite;
class ItemWidget extends  Widget{
    public $item = array();
    public function run(){
        
       return $this->render("item",['data'=>$this->item,'favorites'=>Favorite::getFavoriteIds()]);
    }
}