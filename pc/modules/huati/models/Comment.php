<?php
namespace pc\modules\huati\models;

use pc\common\models\User;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "{{%comment}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $type
 * @property integer $rel_id
 * @property integer $comment_id
 * @property string $content
 * @property integer $add_time
 * @property integer $number
 * @property integer $like
 * @property integer $dislike
 * @property integer $display
 * @property integer $delete
 * @property integer $status
 */
class Comment extends  ParentRecord{
    public $primaryKey="id";
    const QA_TYPE = 3; //类型，0：无 1：帖子 2：课程 3:问答
  
    public $cache_model = null;
    
    public static function tableName()
    {
        return '{{%comment}}';
    }
    public function fields(){
        return ['user_id','rel_id','content','add_time','number','like','dislike','id'];
    }
    
    //问题评论的统计
    public function getQaCommentCountById($id){
        $condition = self::getBaseWhere();
        $condition['type'] = self::QA_TYPE;
        $condition['rel_id']=$id;
        $condition['comment_id']=0;
         return $this->find()->where($condition)->count();
    }
    //获取评论
    public function getPageQaComment($id,$offset,$limit,$order=""){
        if(!$order){
            $order = [$this->primaryKey=>SORT_DESC];
        }
        $condition = self::getBaseWhere();
        $condition['type'] = self::QA_TYPE;
        $condition['rel_id']=$id;
        $condition['comment_id']=0;
        $data =  $this->find()->select($this->fields())->where($condition)->orderBy($order)->offset($offset)->limit($limit)->asArray()->all();
        if($data){
            $user_model = new User();
            foreach ($data as $k=>$v){
                $data[$k]['userinfo']= $user_model->getUserInfoById($v['user_id']);
                $data[$k]['comments'] = $this->getQaReplyCommentById($v['id'],0,5);
            }
        }
        return $data;
    }
    /**
     * wap版回去评论信息
     * @param unknown $id
     */
    public function getWapCommentById($id,$limit,$order=""){
        if(!$order){
            $order = [$this->primaryKey=>SORT_DESC];
        }
        $condition = self::getBaseWhere();
        $condition['type'] = self::QA_TYPE;
        $condition['rel_id']=$id;
        $condition['comment_id']=0;
        $data =  $this->find()->select($this->fields())->where($condition)->orderBy($order)->offset(0)->limit($limit)->asArray()->all();
        if($data){
            $user_model = new User();
            foreach ($data as $k=>$v){
                $data[$k]['userinfo']= $user_model->getUserInfoById($v['user_id']);
            }
        }
        return $data;
    }
    
    /**
     * 获取评论的评论
     * @param unknown $id
     */
    public function getQaReplyCommentById($id,$offset,$limit,$order=''){
        if(!$order){
            $order = [$this->primaryKey=>SORT_DESC];
        }
        $condition = self::getBaseWhere();
        $condition['type'] = self::QA_TYPE;
        $condition['comment_id']=$id;
        $data =  $this->find()->select($this->fields())->where($condition)->orderBy($order)->offset($offset)->limit($limit)->asArray()->all();
        if($data){
            $user_model = new User();
            foreach ($data as $k=>$v){
                $data[$k]['userinfo']= $user_model->getUserInfoById($v['user_id']);
            }
        }
        return $data;
    }
    
    public function behaviors(){
        return [
            [
                'class'=>TimestampBehavior::className(),
                'createdAtAttribute'=>'add_time',
                'updatedAtAttribute' => false,
                'value' => time(),
            ]
        ];
    }
    
    public function beforeSave($insert){
        $this->type = self::QA_TYPE;
        if (parent::beforeSave($insert)) {
                $this->number = 0;
                $this->like = 0;
                $this->user_id = \Yii::$app->user->identity->id;
            return true;
        }
        return false;
    }

    public function  afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);
        $parent = static::findOne($this->comment_id);
        $qa = Qa::findOne($this->rel_id, ['type' =>self::QA_TYPE]);
        if ($insert) {
            if ($parent) {
                $parent->updateCounters(['number' => 1]);
            }
            if ($qa && !$parent) {
                $qa->updateCounters(['comment' => 1]);
            }
        }
        
    }
    
    public static function getCommentNumberCountById($id){
        $data =  self::findOne(['id'=>$id])->toArray();
        return $data['number'] ? intval($data['number']) : 0;
    }
    
    public function beforeDelete(){
        $this->cache_model = self::findOne(['id'=>$this->id,'user_id'=>\Yii::$app->user->id]);
        if(!$this->cache_model){
            \Yii::$app->response->format = Response::FORMAT_JSON;
            \Yii::$app->response->data = array(
                'status'=>false,
                'message'=>'no_exist'
            );
            return false;
        }
        return parent::beforeDelete();
    }
    
    public function  afterDelete(){
        if($this->cache_model){
           if(!self::findOne(['id'=>$this->id])){
               $del_model = self::findOne(['id'=>$this->cache_model->comment_id]);
               $del_model->updateCounters(['number'=>-1]);
               $this->cache_model = null;
           }
        }
    }
}