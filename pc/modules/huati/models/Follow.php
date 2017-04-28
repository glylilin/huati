<?php
namespace pc\modules\huati\models;
use Yii;
use pc\common\models\User;
use common\models\queries\UserCountQuery;
class Follow extends  ParentRecord{
     public $primaryKey="id";
    public static function tableName()
    {
        return '{{%follow}}';
    }
    
    
    public static function getFollwings(){
        if(\Yii::$app->user->id){
           $condition = self::getBaseWhere();
           $condition['user_id']=\Yii::$app->user->id;
           $data = self::findAll($condition);
            if($data){
                return $data;
            }
            return array();
        }
        return array();
    }
    
    public static function getFollowingIds(){
        $data = self::getFollwings();

        if($data){
            $result = array();
            foreach ($data as $v){
                $result[] = $v['rel_user_id'];
            }
            return array_unique($result);
        }
        return array();
    }
    
    public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);
        $userCount_model = UserCount::findOne(['user_id'=>$this->user_id]);
        if($userCount_model){
            if($this->delete){
                $userCount_model->updateCounters(['following'=>-1]);
            }else{
                $userCount_model->updateCounters(['following'=>1]);
            }
           
        }else{
            if(!$this->delete){
                $userCount_model = new UserCount();
                $userCount_model->user_id = $this->user_id;
                $userCount_model->following = 1;
                $userCount_model->save();
            }
        }
        
        $other_user_counter_model = UserCount::findOne(['user_id'=>$this->rel_user_id]);
    
        if($other_user_counter_model){
            if($this->delete){
                $other_user_counter_model->updateCounters(['follower'=>-1]);
            }else{
                 $other_user_counter_model->updateCounters(['follower'=>1]);
            }
        }else{
            if(!$this->delete){
            $other_user_counter_model = new UserCount();
            $other_user_counter_model->user_id = $this->rel_user_id;
            $other_user_counter_model->follower = 1;
            $other_user_counter_model->save();
            }
        }
       
    }


    public function getFollowingList($offset,$limit,$caring=false){
        $order = [$this->primaryKey=>SORT_DESC];
        $uid = \Yii::$app->user->id;
        $query = self::find();
        $condition = self::getBaseWhere();
        if($caring){
            $condition['rel_user_id']=\Yii::$app->user->id;//关注我的
        }else{
            $condition['user_id']=\Yii::$app->user->id;//我关注的
        }
        $query->where($condition);
        $data =  $query->select(['user_id','rel_user_id'])->orderBy($order)->offset($offset)->limit($limit)->asArray()->all();
        return $data;
    }
    
    public function getFollowingCount($caring=false){
        $order = [$this->primaryKey=>SORT_DESC];
        $uid = \Yii::$app->user->id;
        $query = self::find();
        $condition = self::getBaseWhere();
        if($caring){
            $condition['rel_user_id']=\Yii::$app->user->id;//关注我的
        }else{
            $condition['user_id']=\Yii::$app->user->id;//我关注的
        }
        $query->where($condition);
        return $query->count();
    }
}