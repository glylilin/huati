<?php 
namespace pc\common\models;
use yii;
use yii\base\Model;
use pc\modules\huati\models\Qa;
use yii\helpers\VarDumper;
use pc\modules\huati\models\UserCount;
use pc\modules\huati\models\QaTopic;
class QaForm extends Model{
   
    public $qa_id;
    public $content;
    public $access_token;
    public $title;
    public $anonymous;
    public $topic_ids;
    public $tag;
    public $invite_ids;
    public $id;
    public function rules(){
        return [
            [['qa_id','content','access_token','title','id','topic_ids'],'required','message'=>yii::t("COMMON", 'REQUIRED')],
            ['qa_id','integer','message'=>yii::t("COMMON", 'INTEGER')],
            ['qa_id','checkExsits'],
            ['access_token','checkToken'],
            ['title','string'],
            ['anonymous','integer'],
            ['anonymous','in','range'=>[0,1]],
            ['id','integer']
        ];
    }
    
    public function scenarios(){
        return [
            'answer'=>['qa_id','content','access_token'],
            'uanswer'=>['id','content'],
            'question'=>['title','access_token','anonymous','topic_ids'],
            'uquestion'=>['id','title','access_token','anonymous','topic_ids'],
        ];
    }
    public function checkExsits($attribute,$params){
        if(!$this->hasErrors()){
            $data =  Qa::findOne(['id'=>$this->qa_id,'display'=>1,'delete'=>0,'status'=>0]);
            if(!$data){
                $this->addError($attribute,\Yii::t("COMMON",'NEXISTS'));
            }
        }
    }
    //表單重複提交哦驗證
    public function checkToken($attribute,$params){
        if(!$this->hasErrors()){
            $session = \Yii::$app->session;
            $access_token = $session->get('access_token');
            $session->set("access_token",'');
            if($this->access_token != $access_token){
                $this->addError($attribute,yii::t("TOPIC",'ACCESS_TOKEN_ERROR'));
            }
            
        }
    }
    
    public function answerSave(){
        if(!$this->hasErrors()){
            $qa = new Qa();
            $data =$this->toArray();
            $data['user_id']=\Yii::$app->user->id;
           if($qa->addAnswer($data)){
               $answer = Qa::findOne(['id'=>$data['qa_id']]);
               $answer->updateCounters(['answer'=>1]);
               if($answer['topic_ids']){
                   QaTopic::updateAllCounters(['answer'=>1],['IN','id',explode(",",$answer['topic_ids'])]);
               }
               $user_count_model = UserCount::findOne(['user_id'=>$data['user_id']]);
               $user_count_model->updateCounters(['answer'=>1]);
             return true;  
           }
        }
        return false;
    }
    
    public function questionSave(){
        if(!$this->hasErrors()){
            $qa = new Qa();
            $data =$this->toArray();
            $data['user_id']=\Yii::$app->user->id;
            if($qa->addQuestion($data)){
                if($data['topic_ids']){
                    QaTopic::updateAllCounters(['question'=>1],['IN','id',$data['topic_ids']]);
                }
                $user_count_model = UserCount::findOne(['user_id'=>$data['user_id']]);
                $user_count_model->updateCounters(['question'=>1]);
                return true;
            }
        }
        return false;
    }
}

?>