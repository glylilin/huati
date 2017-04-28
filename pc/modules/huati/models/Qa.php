<?php
namespace pc\modules\huati\models;
use  pc\common\models\User;
use yii\db\Expression;
use pc\config\CommonUtils;

class Qa extends ParentRecord{
    public $primaryKey="id";
    const HOT=1;
    const TOP= 1;
    const QA_TYPE = 1;
    const  QUESTION_TYPE =2;
	
	
    public function  fields(){
        $field = ['id','title','add_time','answer','comment','like','dislike','content','json','user_id','digest','view','type','topic_ids','topic','anonymous','qa_id','follow'];
        return $field;
    }
 
    public static function getHotOne($topic_id=''){
        $query =  self::find();
        $condition = self::getBaseWhere();
        $condition['hot']=self::HOT;
        $condition['type'] = self::QA_TYPE;
        $query->where($condition);
        if($topic_id){
            $query->andWhere(new Expression('FIND_IN_SET(:topic_ids, topic_ids)'));
            $query->addParams([":topic_ids"=>$topic_id]);
        }
      
   
        return $query->asArray()->one();
    }
    
    public static function getTopOne($topic_id=''){
        $query =  self::find();
        $condition = self::getBaseWhere();
        $condition['top']=self::TOP;
        $condition['type'] = self::QA_TYPE;
        $query->where($condition);
        if($topic_id){
            $query->andWhere(new Expression('FIND_IN_SET(:topic_ids, topic_ids)'));
            $query->addParams([":topic_ids"=>$topic_id]);
        }
        return $query->asArray()->one();
    }
    
    /**
     * 根据条件获取信息
     * @param string $topic_id
     */
    public static function getOneByWhere($where=[]){
        $query =  self::find();
        $condition = self::getBaseWhere();
        $condition['type'] = self::QA_TYPE;
        $query->where($condition);
        if($where){
            $query->andWhere($where);
        }
        return $query->asArray()->one();
    }
    
    
    //统计问题总数
    public function getAllQaCount($id){
       $query =  self::find();
       $condition = self::getBaseWhere();
        $condition['type'] = self::QA_TYPE;
        $query->where($condition);
        if($id){
            $query->andWhere(new Expression('FIND_IN_SET(:topic_ids, topic_ids)'));
            $query->addParams([":topic_ids"=>$id]);
         
        }
        return $query->count();
    }
    
    public function getIndexRight($id="",$offset=0,$limit = 10){
        $order = [$this->primaryKey=>SORT_DESC];
        $condition = self::getBaseWhere();
        $condition['type'] = self::QA_TYPE;
        $query =  self::find();
        $query->where($condition);
        $data =array();
        try {
            $data = $query->orderBy($condition)->offset($offset)->limit($limit)->asArray()->all();
        }catch (HttpException $e){
            $data  = array();
        }
        return $data;
    }
    
    /**
     * 获取问题的回答总数
     * @param unknown $qa_id
     */
      public function getQuestuionCountByQaid($qa_id){
          $query =  self::find();
          $condition = self::getBaseWhere();
          $condition['type'] = self::QUESTION_TYPE;
          $condition['qa_id'] = $qa_id;
          return $query->where($condition)->count();
      }

      /**
       * 根据用户名称获取用户所有的问题
       * @param unknown $userid
       */
      public function getAllCount($userid,$type=""){
          $query =  self::find();
          $condition = self::getBaseWhere();
          $condition['user_id'] = $userid;
          if($type){
           $condition['type']=$type;  
          }
          $query->where($condition);
          return $query->count();
      }
      
       /**
        * 获取回答数量
        * @param unknown $offset
        * @param unknown $limit
        * @param string $id
        * @param string $order
        * @return unknown
        */
      public function getQuestuionPagetByQaid($qa_id,$append="",$order="",$offset='',$limt=''){
          if(!$order){
              $order = [$this->primaryKey=>SORT_DESC];
          }
          $query = self::find();
          $condition = self::getBaseWhere();
          $condition['type'] = self::QUESTION_TYPE;
          $condition['qa_id'] = $qa_id;
          $query->where($condition);
          $data =  $query->select($this->fields())->orderBy($order)->asArray()->all();
          //$query->createCommand()->getRawSql();
          if($data){
              $user_model = new User();
              $user_count_model = new UserCount();
              if($append){
                  $append = explode(",",$append);
              }
              foreach ($data as $k=>$v){
                  $data[$k]['userinfo']= $user_model->getUserInfoById($v['user_id']);
                  if(in_array('userCount',$append)){
                     $data[$k]['userinfo']['userCount']= $user_count_model->getUserCount($v['user_id']);
                  }
              }
          }
          return $data;
      }
      
      public function getAllPageByUserid($userid,$offset='',$limit='',$type="",$order=""){
          if(!$order){
              $order = [$this->primaryKey=>SORT_DESC];
          }
          $query = self::find();
          $condition = self::getBaseWhere();
          $condition['user_id'] = $userid;
          if($type){
              $condition['type'] = $type;
          }
          $query->where($condition);
          $data =  $query->select($this->fields())->offset($offset)->limit($limit)->orderBy($order)->asArray()->all();
          if($data){
                  $user_model = new User();
                  $condition = self::getBaseWhere();
                  foreach ($data as $k=>$v){
                      if(!$type){
                          $data[$k]['userinfo']= $user_model->getUserInfoById($v['user_id']);
                      }
                      if($v['type']== 2){
                          $condition['id'] = $v['qa_id'];
                          $temp =self::findOne($condition);
                          if($temp){
                              $data[$k]['title'] = $temp['title'];
                              $data[$k]['aid'] = $temp['id'];
                             
                          }
                          
                      }
                  }
          }
          return $data;
      }
    //详情页面的调用
    public function getQaById($id){
        $condition = self::getBaseWhere();
        $condition['type'] = self::QA_TYPE;
        $condition['id'] =$id;
        $data = self::findOne($condition);
        if($data){
            $data->updateCounters(['view'=>1]);
            $user_model = new User();
            $user_count_model = new UserCount();
            $data = $data->toArray();
            $data['userinfo'] = $user_model->getUserInfoById($data['user_id']);
            $data['userCount'] = $user_count_model->getUserCount($data['user_id']);
            return $data;
        }else{
            return array();
        }      
    }
    
    public function getPageQa($offset,$limit,$id="",$order=""){
          if(!$order){
              $order = [$this->primaryKey=>SORT_DESC];
          }
          $query = self::find();
          $condition = self::getBaseWhere();
          $condition['type'] = self::QA_TYPE;
          $query->where($condition);
          if($id){
              $query->andWhere(new Expression('FIND_IN_SET(:topic_ids, topic_ids)'));
                $query->addParams([":topic_ids"=>$id]);
          }
          $data =  $query->select($this->fields())->orderBy($order)->offset($offset)->limit($limit)->asArray()->all();
        //$query->createCommand()->getRawSql();
          if($data){
                  $user_model = new User();
                  foreach ($data as $k=>$v){
                      $data[$k]['userinfo']= $user_model->getUserInfoById($v['user_id']);
                  }
          }
          return $data;
    }
    /**
     * 根据条件获取内容
     * @param unknown $where
     * @param unknown $offset
     * @param unknown $limit
     * @param string $order
     * @return \yii\db\static
     */
    public function getQaList($where,$offset,$limit,$order=''){
        if(!$order){
            $order = [$this->primaryKey=>SORT_DESC];
        }
        $query = self::find();
        $condition = self::getBaseWhere();
        $condition['type'] = self::QA_TYPE;
        $query->where($condition);
        if($where){
            $query->andWhere($where);
        }
        $data =  $query->select($this->fields())->orderBy($order)->offset($offset)->limit($limit)->asArray()->all();
        if($data){
            $user_model = new User();
            foreach ($data as $k=>$v){
                $data[$k]['userinfo']= $user_model->getUserInfoById($v['user_id']);
            }
        }
        return $data;
    }
    
    
    public function getExtraUser($userid){
        return $this->hasOne(User::className(),['id'=>$userid])->select(['nickname','avater_id','avater_path'])->asArray();
    }
    public function getUser(){
        return $this->hasOne(User::className(),['id'=>"user_id"]);
    }
    //獲取評論數
    public static function getQaComment($id){
        $data =  self::findOne(['id'=>$id])->toArray();
        return $data['comment'] ? intval($data['comment']) : 0;
    }
    //添加提問回答内容 
    public function addAnswer($data){
        $this->qa_id = $data['qa_id'];
        $formatContent = CommonUtils::formatHtmlJson($data['content']);
        $this->content = $formatContent['content'];
        $this->json = $formatContent['json'];
        $this->add_time = time();
        $this->update_time = time();
        $this->user_id = $data['user_id'];
        $this->type =self::QUESTION_TYPE;
		 if($this->save() && !$this->hasErrors()){
            return true;
        }else{
            return false;
        }
    }
    /**
     * 添加提问
     * @param unknown $data
     */
    public function addQuestion($data){
        $formatContent = CommonUtils::formatHtmlJson($data['content']);
        $this->content = $formatContent['content'];
        $this->topic_ids = $data['topic_ids'] ? implode(",",array_unique($data['topic_ids'])) : "";
        $this->tag = $data['tag'] ? implode(",",array_unique($data['tag'])) : "";
        $this->topic = $data['tag'] ? implode(",",array_unique($data['tag'])) : "";
        $this->invite_ids = isset($data['invite_ids']) ? ($data['invite_ids'] ? implode(",",array_unique($data['invite_ids'])) : "") : "" ;
        $this->json = $formatContent['json'];
        $this->add_time = time();
        $this->update_time = time();
        $this->user_id = $data['user_id'];
        $this->type = self::QA_TYPE;
        $this->title = $data['title'];
        $this->anonymous = $data['anonymous'];
        if($this->save() && !$this->hasErrors()){
            return true;
        }else{
            return false;
        }
    }
    
    public function getQaOrAnswerByIdWithType($id){
      $result = self::findOne(['id'=>$id]);
      if($result){
        $result  = $result->toArray();
        if($result['type'] == 2){
          $temp = self::find()->select(['title','id'])->where(['id'=>$result['qa_id']])->One();
          if($temp){
            $result['title'] = $temp['title'];
            $result['aid'] = $temp['id'];
          }
        }
      }
      return $result;
    }
    
}