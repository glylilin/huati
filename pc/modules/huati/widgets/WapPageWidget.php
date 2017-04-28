<?php
namespace pc\modules\huati\widgets;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
class WapPageWidget extends Widget{
    public $totalCount;
    public $currentPage = 1;
    public $pageCount;
    public $prevPageLabel='上一页';
    public $nextPageLabel='下一页';
    public $options;
    public $diff="_";
    public function run(){
        $this->initPage();
        $html = "";
        if($this->pageCount > 1){
            $html .= $this->prevInit();
            $html .=$this->pageList();
            $html .= $this->nextInit();
        }
        return $html;
    }
    public function initPage(){
        $this->pageCount = ceil($this->totalCount / Yii::getAlias("@PageSize"));
        if($this->options){
            $this->options['url'] = $this->options['url'] ? $this->options['url'] : "";
            $this->options['suffix'] = $this->options['suffix'] ? $this->options['suffix'] : "";
        }else{
            $this->options['url'] =  "";
            $this->options['suffix'] =  "";
        }
        $this->options['nourl'] = isset($this->options['nourl']) ?  $this->options['nourl'] : $this->options['url'];
        $this->diff = isset($this->options['diff']) ? $this->options['diff'] : "_";
    }

        
    protected function pageList(){
      
        $html = '<div>第<input type="text" value="'.$this->currentPage.'" autocomplete="off" />页<button nourl="'.$this->options['nourl'].'" diff="'.$this->diff.'" url="'.$this->options['url'].'" suffix="'.$this->options['suffix'].'">跳转</button></div>';
        return $html;
        
    }
    //上一页初始化
    public function prevInit(){
        $html = "";
        if($this->currentPage -1 > 0){
            if($this->currentPage == 2){
                $html =   Html::a($this->prevPageLabel,$this->options['nourl'],['class'=>"prev"]);
            }else{
                $html =   Html::a($this->prevPageLabel,$this->options['url'].$this->diff.($this->currentPage-1).$this->options['suffix'],['class'=>"prev"]);
            }
        }else{
             $html =   Html::a($this->prevPageLabel,"",['class'=>"prev nopage"]);
        }
        return $html;
    }
    
    public function nextInit(){
        $html = "";
        if($this->currentPage <= $this->pageCount-1){
            
            $html =   Html::a($this->nextPageLabel,$this->options['url'].$this->diff.($this->currentPage+1).$this->options['suffix'],['class'=>"next"]);
        }else{
             $html =   Html::a($this->nextPageLabel,"",['class'=>"next nopage"]);
        }
        return $html;
    }
    
}