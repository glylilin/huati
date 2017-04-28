<?php
namespace pc\modules\huati\controllers;
use pc\common\models\UserForm;
use yii\helpers\Json;
use pc\common\controllers\BaseController;
use pc\config\CommonUrl;
use pc\config\CommonUtils;
class LoginController extends BaseController{
    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs['sign'] = ['POST'];
        return $verbs;
    }
    public function actionSign(){
        
        $result['status'] = false;
        if(\Yii::$app->request->isAjax){
            $data = \Yii::$app->request->post();
            $userForm = new UserForm(['scenario'=>'login']);
            $userForm->load($data);
            if($userForm->validate() && $userForm->login()){
                $result['status'] = true;  
            }else{
                $result['message'] = $userForm->getErrors();
            }
        }else{
            $result['message'] = \Yii::t("TOPIC", "ILLEGAL_OPERATION");
        }
        return Json::encode($result);
    }
    /**
     * 发送验证码
     */
    public function actionScode(){
          $res['status'] = false;
          if(\Yii::$app->request->isAjax){
              $mobile = \Yii::$app->request->post('mobile');
              $pattren ="/^1[3|4|5|7|8]\d{9}$/";
              if(preg_match($pattren, $mobile)){
				$http_host =$_SERVER['HTTP_HOST']; 
				$referer = $_SERVER['HTTP_REFERER']; 
				/* if(strstr($http_host,"puamap.com") &&  strstr($referer,"puamap.com")){ */
						$url = CommonUrl::getVerifyCodeUrl();
						$data = array(
						  'mobile'=>$mobile,
						  'debug'=>0
						);
						  $result = CommonUtils::HTTP_POST($url, $data);
						  if($result['isSuccessful']) { // 发送成功
							$res['status'] = true;
							$session = \Yii::$app->session;
							if($session->isActive){
								$session->open();
							}
							$session->set('code',$result['data']['code']);
						  }else{
							  $res['filed'] = 'mobile';
							  $res['message'] = \Yii::t('COMMON', "PHONE_EXSITS");
						  }
				/* }else{
					 $res['filed'] = 'mobile';
                      $res['message'] = \Yii::t('COMMON', "CODE_ERROR");
				} */
              }else{
                  $res['filed'] = 'mobile';
                  $res['message'] = \Yii::t('COMMON', "PHONE")."1";
              } 
          }
        echo Json::encode($res);
        exit();
    }
    
    public function actionRegister(){
        $result['status'] = false;
        if(\Yii::$app->request->isAjax){
            $data = \Yii::$app->request->post();
            $userForm = new UserForm(['scenario'=>'register']);
            $userForm->load($data);
            if($userForm->validate() && $userForm->register()){
                $userForm->login();
                $result['status'] = true;
            }else{
                $result['message'] = $userForm->getErrors();
            }
        }else{
            $result['message'] = \Yii::t("TOPIC", "ILLEGAL_OPERATION");
        }
        return Json::encode($result);
    }
    
    public function actionRegister_m(){
        $referer = \Yii::$app->request->get('referer') ? \Yii::$app->request->get('referer') : ( \Yii::$app->request->post('referer') ? \Yii::$app->request->post('referer') : "");
        $message ="";
        if(\Yii::$app->request->isPost){
            $data = \Yii::$app->request->post();
            $userForm = new UserForm(['scenario'=>'register']);
            $userForm->load($data);
            if($userForm->validate() && $userForm->register()){
                $userForm->login();
                $this->redirect('/');
            }else{
                $temp = $userForm->getErrors();
                if($temp){
                    $message = isset($temp['mobile']) ? $temp['mobile'][0] : (isset($temp['password']) ? $temp['password'][0]: (isset($temp['code']) ? $temp['code'][0] : ""));
                }
            }
        }
        if($message){
            $message = "<font style='color:red'>".$message."</font>";
        }
        return $this->render('register_m',['referer'=>$referer,'message'=>$message]);
    }
    /**
     * 忘记密码
     * @return Ambigous <string, string>
     */
    public function actionForget(){
        $this->layout = 'wap';
        $message ="";
        $referer = \Yii::$app->request->get('referer') ? \Yii::$app->request->get('referer') : ( \Yii::$app->request->post('referer') ? \Yii::$app->request->post('referer') : "");
        if(\Yii::$app->request->isPost){
            $data = \Yii::$app->request->post();
            $userForm = new UserForm(['scenario'=>'update']);
             
            $userForm->load($data);
            if($userForm->validate() && $userForm->updatePassword()){
                $userForm->login();
                 $this->redirect('/');
            }else{
                $temp = $userForm->getErrors();
                if($temp){
                    $message = isset($temp['mobile']) ? $temp['mobile'][0] : (isset($temp['password']) ? $temp['password'][0]: (isset($temp['code']) ? $temp['code'][0] : (isset($temp['repassword']) ? $temp['repassword'][0] : "" )));
                }
            }
        }
        return $this->render('forget',['referer'=>$referer,'message'=>$message]);
    }
    
    public function actionUpdate(){
        $result['status'] = false;
        if(\Yii::$app->request->isAjax){
            $data = \Yii::$app->request->post();
            $userForm = new UserForm(['scenario'=>'update']);
             
            $userForm->load($data);
            if($userForm->validate() && $userForm->updatePassword()){
                $userForm->login();
                $result['status'] = true;
            }else{
                $result['message'] = $userForm->getErrors();
            }
        }else{
            $result['message'] = \Yii::t("TOPIC", "ILLEGAL_OPERATION");
        }
        return Json::encode($result);
    }
    
    public function actionLogout(){
        \Yii::$app->user->logout();        
        return $this->goHome();
    }
    /**
     * 登录
     */
    public function actionSignin(){
       $this->layout = 'wap';
       $referer = \Yii::$app->request->get('referer') ? \Yii::$app->request->get('referer') : "";
       $message = "";
       if(\Yii::$app->request->isPost){
           $data = \Yii::$app->request->post();
           $referer = $data['referer'];
           $userForm = new UserForm(['scenario'=>'login']);
           $userForm->load($data);
           if($userForm->validate() && $userForm->login()){
               $this->redirect($referer);
           }else{
               $message = $userForm->getErrors();
           }
       }
       $referer = $referer ? $referer : $_SERVER['HTTP_REFERER'];
        $message = $message ? (isset($message['password']) ? $message['password'][0] : ( isset($message['mobile']) ? $message['mobile'][0] : "" )) : "";
        if($message){
            $message ="<font style='color:red'>".$message."</font>";
        }
       return $this->render('signin',['referer'=>$referer,'message'=>$message]);
    }
}