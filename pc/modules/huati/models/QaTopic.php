<?php
namespace pc\modules\huati\models;
class QaTopic extends ParentRecord{


  public static function tableName()
  {
      return '{{%qa_topic}}';
  }
  public function fields(){
      return ['id','name','question','answer','follow','search'];
  }
  
  public static function getAllQaTopic(){
      $condition = self::getBaseWhere();
	  $query = self::find()->where($condition);
	  $query->andWhere([">","question",0]);
      return $query->orderBy('`sort` = 0, `sort` ASC, `search` DESC, `id` ASC')->asArray()->all();
  }
  
  public static  function getQaTopicInfoById($id){
      $condition = self::getBaseWhere();
      $query = self::find()->where($condition);
      $query->andWhere(["=","id",$id]);
      return $query->orderBy('`sort` = 0, `sort` ASC, `search` DESC, `id` ASC')->asArray()->one();
  }
}