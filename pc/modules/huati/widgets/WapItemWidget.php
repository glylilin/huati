<?php
namespace pc\modules\huati\widgets;
use yii\base\Widget;
use pc\modules\huati\models\Favorite;
class WapItemWidget extends  Widget{
    public $item = array();
    public function run(){
        
       return $this->render("item_m",['v'=>$this->item,'favorites'=>Favorite::getFavoriteIds()]);
    }
}