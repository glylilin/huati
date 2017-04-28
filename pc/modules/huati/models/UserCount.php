<?php 
namespace pc\modules\huati\models;
use yii\db\ActiveRecord;
class UserCount extends ActiveRecord{


    public static function tableName()
    {
        return '{{%user_count}}';
    }
    public function fields(){
        $fields = parent::fields();
        unset($fields['delete']);
        unset($fields['display']);
        unset($fields['status']);
        return $fields;
    }
    public function getUserCount($id){
        $condition['user_id'] = $id;
        $data = self::findOne($condition);
        if($data){
            return  $data->toArray();
        }else{
            return array();
        }
 
    }
    
}

?>