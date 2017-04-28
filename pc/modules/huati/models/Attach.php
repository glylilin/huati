<?php
namespace pc\modules\huati\models;
use pc\config\CommonUtils;
class Attach extends ParentRecord{
    public function  fields(){
        return ['id','user_id','path','size','width','height'];
    }
    public static function getImageOne($id){
        $condition = self::getBaseWhere();
        $condition['id'] =$id;
         $image_data= self::findOne($condition);
         if($image_data){
             $image_data = $image_data->toArray();
             $image_data['path'] =CommonUtils::$static_host."".$image_data['path'];
         }
         return $image_data;
    }
}