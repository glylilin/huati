<?php
namespace pc\common\models;
use yii;
use yii\base\Model;
use pc\common\models\User;
use yii\helpers\VarDumper;
use pc\config\CommonUrl;
use pc\config\CommonUtils;
class UserForm extends Model{
    
    public $mobile;
    public $password;
    public $code;
    public $repassword;
    private $_user;
    public function rules(){
 
        return [
            [['mobile','password','code','repassword'],'required','message'=>yii::t("COMMON", 'REQUIRED')],
            ['mobile','match','pattern'=>'/1[3|4|5|7|8]\d{9}/','message'=>yii::t("COMMON", 'PHONE')],
            [['password','repassword'],'string','length'=>[6,20],'message'=>yii::t("COMMON", "PASSWORD_LENGTH")],
            ['password','compare','compareAttribute'=>'password','message'=>yii::t("COMMON", "PASSWORD_NEQ_REPASSWORD")],
            ['code','validateCode']
        ];
    }
    
    public function scenarios(){
        return [
            'login'=>['mobile','password'],
            'register'=>['mobile','password','code'],
            'update'=>['mobile','password','code','repassword']
        ];
    }
    
    public function attributeLabels(){
        return [
            'mobile'=>yii::t("COMMON","MOBILE"),
            'password'=>yii::t("COMMON","PASSWORD")
        ];
    }
    
    public function validateCode($attribute, $params){
        if(!$this->getErrors()){
            $code  = yii::$app->session->get("code");
            if($code != $this->code){
                $this->addError($attribute,yii::t("COMMON", "CODE_ERROR"));
                return false;
            }
        }
    }
    
    public function validatePassword(){
        if(!$this->getErrors()){
            $user = $this->getUser();
          
            if (!$user) {
                $this->addError('mobile', yii::t("COMMON", "ACCOUNT_NEXISTS"));
                return false;
            }
            if ($user && $user->delete) {
                $this->addError('mobile', yii::t("COMMON", "ACCOUNT_DELETED"));

                return false;
            }
            if ($user && !$user->active) {
                $this->addError('mobile', yii::t("COMMON", "ACCOUNT_NACTIVE"));
                return false;
            }
            if ($user && !$user->status) {
                $this->addError('mobile',yii::t("COMMON", "ACCOUNT_NSTATUS"));
                return false;
            }
          
            if ($user && !$user->validatePassword($this->password)) {
                $this->addError("password",yii::t("COMMON", "PASSWORD_ERROR"));
                return false;
            }
            return true;
        }
    }
    
    
    public function getUser(){
        if($this->_user == null){
           $this->_user = User::findByMobile($this->mobile);
        }
        return $this->_user;
    }
    
    public function login(){
        if($this->validate() && $this->validatePassword()){
            return Yii::$app->user->login($this->getUser(), 0);
        }
        return false;
    }
    
    public function register(){
        if(!$this->getErrors()){
            $data['mobile']= $this->mobile;
            $data['password'] = $this->password;
            $data['code']=$this->code;
            $url = CommonUrl::getSignUpUrl();
            $result =  CommonUtils::HTTP_POST($url, $data);
            if($result['isSuccessful']){
                return true;
            }else{
                foreach ($result['data'] as $key => $value) {
                    if($value['field'] == "mobile"){
                        $this->addError('mobile',\Yii::t("COMMON", "PHONE_EXSITS"));
                    }else if($value['field'] == "code"){
                        $this->addError('code',yii::t("COMMON", "CODE_ERROR"));
                    }
                }
                return false;
            }
        }
    }
    
    public function updatePassword(){
        if(!$this->getErrors()){
            $user_model =User::findOne(['mobile'=>$this->mobile]);
            $user_model->password_hash = \Yii::$app->security->generatePasswordHash($this->password);
            return $user_model->update();
        }
    }
    
}