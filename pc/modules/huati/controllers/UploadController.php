<?php
namespace pc\modules\huati\controllers;
use pc\common\controllers\BaseController;
use yii\web\UploadedFile;
use yii\behaviors\TimestampBehavior;
use pc\config\CommonUtils;
use yii\helpers\Json;
class UploadController extends BaseController{
    public  function  beforeAction($action){
       $action->controller->enableCsrfValidation = false; 
       parent::beforeAction($action);
       return true;
    }
    public function actionImage(){
       
       $file =  UploadedFile::getInstanceByName('file');
       $uploads_path ="uploads/image/".date('Ymd')."/";
       if(!file_exists($uploads_path)){
           CommonUtils::mkdirs($uploads_path);
       }
       $basePath = $uploads_path.time().".".$file->extension;
       $res['isSuccessful']= false;
       if($file->saveAs($basePath)){
           $res['isSuccessful'] = true;
           $res['data']['fullPath'] = "/".$basePath;
           $res['data']['id']=11;
           $imagesize = getimagesize($basePath);
           $res['data']['width']=$imagesize[0];
           $res['data']['height'] =$imagesize[1];
       }
       echo Json::encode($res);
       exit();
    }
    
}
?>
