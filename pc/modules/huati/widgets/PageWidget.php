<?php
namespace pc\modules\huati\widgets;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
class PageWidget extends Widget{
    public $totalCount;
    public $maxButtonCount=10;
    public $pageCount;
    public $tagButton ="span";
    public $isA = false;
    public $currentPage = 1;
    public $prevPageLabel='上一页';
    public $nextPageLabel='下一页';
    public $actionClass;
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
    
    
    public function getPageListArray(){
       
        $data = array();
        if($this->pageCount <= $this->maxButtonCount){
            for($i=1;$i<=$this->pageCount;$i++){
                $data[] = $i;
            }
        }else{
            $halt = ceil($this->maxButtonCount / 2);
            if($this->currentPage - $halt <=0){
                for ($i=1;$i<=$this->maxButtonCount;$i++){
                    $data[] = $i;
                }
            }elseif($this->currentPage + $halt >=$this->pageCount){
                for($i = $this->pageCount-$this->maxButtonCount;$i<=$this->pageCount;$i++){
                    $data[]=$i;
                }
            }else{
                for ($i=$this->currentPage-$halt;$i<=$this->currentPage+$this->maxButtonCount-$halt;$i++){
                    $data[]= $i;
                }
            }
        }
        return $data;
    }
        
    protected function pageList(){
        $data = $this->getPageListArray();
        $html = "";
        if($data){
            foreach ($data as $i){
                if($this->isA){
                    if($i == $this->currentPage){
                        $html .=  Html::a($i,null,['class'=>$this->actionClass]);
                    }else{
                       // $html .=  Html::a($i,$this->pagination->createUrl($i-1));
                       if($i == 1){
                           $html .=  Html::a($i,$this->options['nourl']);
                      
                       }else{
                           $html .=  Html::a($i,$this->options['url'].$this->diff.($i).$this->options['suffix']);
                          
                       }
                       
                    }
                }else{
                    if($i == $this->currentPage){
                        $html .=   Html::tag($this->tagButton,$i,['data'=>0,'class'=>$this->actionClass]);
                    }else{
                        $html .=   Html::tag($this->tagButton,$i,['data'=>$i]);
                    }
                  
                }
            }
        }
        return $html;
        
    }
    //上一页初始化
    public function prevInit(){
        $html = "";
        if($this->currentPage -1 > 0){
            if($this->isA){     
                if($this->currentPage == 2){
                    $html =   Html::a($this->prevPageLabel,$this->options['nourl']);
                }else{
                    $html =   Html::a($this->prevPageLabel,$this->options['url'].$this->diff.($this->currentPage-1).$this->options['suffix']);
                }
            
              //$html =   Html::a($this->prevPageLabel,$this->pagination->createUrl($this->currentPage-2));//在该方法中实现了page+1,故要在前面减2
            }else{
              $html =   Html::tag($this->tagButton,$this->prevPageLabel,['data'=>$this->currentPage-1]);
            }
            
        }else{
            if($this->isA){
              $html =  Html::a($this->prevPageLabel);
            }else{
              $html =  Html::tag($this->tagButton,$this->prevPageLabel,['data'=>0]);
            }
        }
        
        return $html;
    }
    
    public function nextInit(){
        $html = "";
        if($this->currentPage <= $this->pageCount-1){
            if($this->isA){
              $html =  Html::a($this->nextPageLabel,$this->options['url'].$this->diff.($this->currentPage+1).$this->options['suffix']);
            }else{
              $html =  Html::tag($this->tagButton,$this->nextPageLabel,['data'=>$this->currentPage+1]);
            }
        
        }else{
            if($this->isA){
             $html =   Html::a($this->nextPageLabel);
            }else{
             $html =  Html::tag($this->tagButton,$this->nextPageLabel,['data'=>0]);
            }
        }
        return $html;
    }
    
}