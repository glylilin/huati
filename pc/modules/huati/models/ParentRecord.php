<?php
namespace pc\modules\huati\models;
use yii\db\ActiveRecord;
class ParentRecord extends ActiveRecord{
    const STATUS_DISPLAY=1;
    
    const STATUS_DELETE = 0;
    
    const STATUS_STATUS = 0;
    public static function getBaseWhere(){
        return ['display'=>self::STATUS_DISPLAY,'delete'=>self::STATUS_DELETE];
    }
}