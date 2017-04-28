<?php
namespace pc\modules\huati\models;
use pc\modules\huati\models\Qa;
class Favorite extends ParentRecord{
    public $primaryKey="id";
    const FAVORITE_QA_TYPE = 7;
    const FAVORITE_TOPIC_TYPE = 8;
    public static function tableName()
    {
        return '{{%favorite}}';
    }
    
    public static function getFavorites(){
        if(\Yii::$app->user->id){
            $condition = self::getBaseWhere();
            $condition['type'] = self::FAVORITE_QA_TYPE;
            $condition['user_id']=\Yii::$app->user->id;
            $data = self::findAll($condition);
            if($data){
                return $data;
            }
            return array();
        }
        return array();
    }
    
    public static function getFavoriteIds(){
        $data = self::getFavorites();
        if($data){
            $result = array();
            foreach ($data as $v){
                $result[] = $v['rel_id'];
            }
            return array_unique($result);
        }
        return array();
    }
    /**
     * 获取关注的话题ids
     * @return multitype:\yii\db\static
     */
    public static function getFavoriteTopicIds(){
        $result = array();
        if(\Yii::$app->user->id){
            $condition = self::getBaseWhere();
            $condition['type'] = self::FAVORITE_TOPIC_TYPE;
            $condition['user_id']=\Yii::$app->user->id;
            $data = self::findAll($condition);
            if($data){
                foreach ($data as $v){
                    $result[] = $v['rel_id'];
                }
            }
        }
        return $result;
    }

    public function getFavoritesByUid($uid){
        if($uid == \Yii::$app->user->id){
            return self::getFavoriteIds();
        }else{
            $condition = self::getBaseWhere();
            $condition['type'] = self::FAVORITE_QA_TYPE;
            $condition['user_id']=$uid;
            $data = self::findAll($condition);
            if($data){
                $result = array();
                foreach ($data as $v){
                    $result[] = $v['rel_id'];
                }
                return array_unique($result);
            }
        }
        return array();
    }
    
    //获取用户收藏的
    public function getFavoritesPage($uid,$offset="",$limit="",$order=""){
        if(!$order){
            $order = [$this->primaryKey=>SORT_DESC];
        }
        $condition = self::getBaseWhere();
        $condition['type'] = self::FAVORITE_QA_TYPE;
        $condition['user_id']=$uid;
        $query = self::find();
        $query->where($condition);
        $data =  $query->select(['rel_id'])->orderBy($order)->offset($offset)->limit($limit)->asArray()->all();
        $result  = array();
        if($data){
            $qa_record = new Qa();
            foreach ($data as $key => $value) {
                $result[] = $qa_record->getQaOrAnswerByIdWithType($value['rel_id']);
            }
    
        }
        return $result;
    }
    /**
     * 获取关注话题数
     * @param unknown $uid
     * @return multitype:
     */
    public function getFavoritesTopicByUid($uid){
            $condition = self::getBaseWhere();
            $condition['type'] = self::FAVORITE_TOPIC_TYPE;
            $condition['user_id']=$uid;
            $data = self::findAll($condition);
            if($data){
                $result = array();
                foreach ($data as $v){
                    $result[] = $v['rel_id'];
                }
                return array_unique($result);
            }
       
        return array();
    }
    //获取用户收藏的关注话题
    public function getFavoritesTopicPage($uid,$offset="",$limit="",$order=""){
        if(!$order){
            $order = [$this->primaryKey=>SORT_DESC];
        }
        $condition = self::getBaseWhere();
        $condition['type'] = self::FAVORITE_TOPIC_TYPE;
        $condition['user_id']=$uid;
        $query = self::find();
        $query->where($condition);
        $data =  $query->select(['rel_id'])->orderBy($order)->offset($offset)->limit($limit)->asArray()->all();
        $result  = array();
        if($data){
            $qa_topic_record = new QaTopic();
            foreach ($data as $key => $value) {
                $result[] = $qa_topic_record->find()->where(['id'=>$value['rel_id']])->asArray()->one();//$qa_record->getQaOrAnswerByIdWithType($value['rel_id']);
            }
    
        }
        return $result;
    }


    public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);
        $userCount_model = UserCount::findOne(['user_id'=>$this->user_id]);
      
        if($userCount_model){
            if($this->type == self::FAVORITE_QA_TYPE){
                $qa_mdoel = Qa::findOne(['id'=>$this->rel_id]);
                if($qa_mdoel){
                    if($this->delete){
                        $qa_mdoel->updateCounters(['follow'=>-1]);
                        $userCount_model->updateCounters(['follow_question'=>-1]);
                    }else{
                        $qa_mdoel->updateCounters(['follow'=>1]);
                        $userCount_model->updateCounters(['follow_question'=>1]);
                    }
                }
            }else if($this->type == self::FAVORITE_TOPIC_TYPE){
                $qa_topic_model = QaTopic::findOne(['id'=>$this->rel_id]);
                if($qa_topic_model){
                    if($this->delete){
                        $qa_topic_model->updateCounters(['follow'=>-1]);
                        $userCount_model->updateCounters(['follow_topic'=>-1]);
                    }else{
                        $qa_topic_model->updateCounters(['follow'=>1]);
                        $userCount_model->updateCounters(['follow_topic'=>1]);
                    }
                }
            }
        }else{
            if(!$this->delete){
                $other_user_counter_model = new UserCount();
                $other_user_counter_model->user_id = $this->rel_user_id;
                if($this->type == self::FAVORITE_QA_TYPE){
                    $other_user_counter_model->follow_question = 1;
                }elseif($this->type == self::FAVORITE_TOPIC_TYPE){
                    $other_user_counter_model->follow_topic = 1;
                }
                $other_user_counter_model->save();
            }
        }
    }
    
}