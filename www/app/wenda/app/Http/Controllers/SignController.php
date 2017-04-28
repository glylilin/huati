<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Common\Common;
use App\Common\Lang;
use Illuminate\Support\Facades\Session;
/**
*登录接口
**/
class SignController extends Controller{
	public function signin(Request $request){

		$_SESSION['startsign'] = true;
		var_dump($_POST);die;
		if($request->isMethod("post")){
			$mobile = $request->input('mobile');
			$password = $request->input('password');
			
			$res['status'] = false;
			if($mobile){

				$pattren ="/^1[34578]\d{9}$/";
				if(preg_match($pattren, $mobile)){

					if(strlen($password) >= 6){
						$data['name'] = $mobile;
						$data['password'] = $password;
						$url = Common::auth_url(Common::$_signin);
						$result = HTTP_POST($url,$data);
		
						if($result['isSuccessful']){
							$res['status'] = true;
							$_SESSION['userinfo'] = $result['data'];
						}else{
							$res['field']=$result['data'][0]['field'];
							$res['message']=$result['data'][0]['message'];
						}
					}else{
						$res['field']='password';
						$res['message'] = Lang::$_password_error;
					}
				}else{
					$res['field']='mobile';
					$res['message'] = Lang::$_phone_error;
				}
			}else{
				$res['field']='mobile';
				$res['message'] = Lang::$_phone_empty;
			}
			echo json_encode($res);
			exit();
		}
		if(isset($_SESSION['userinfo'])){
			header("location:/s");
			exit();
		}
		return view("sign/signin");
	
	}
	/***
	*手机是否注册验证
	**/
	public function vmobile(Request $request){
		$mobile = $request->input('mobile');
		$res['status'] = false;
		if($mobile){
			$pattren ="/^1[34578]\d{9}$/";
			if(preg_match($pattren, $mobile)){
					$url = Common::auth_url(Common::$_validateMobile."?mobile=".$mobile);
					$result = HTTP_GET($url);
					if($result['data']['id'] > 0){//表示已经注册
						$res['status'] = true;
					}
			}else{
				$res['message'] = Lang::$_phone_error;
			}
		}else{

			$res['message'] = Lang::$_phone_empty;
		}
		echo json_encode($res);
		exit();
	}
	/**发送验证码**/
	public function svcode(Request $request){//125885
		$mobile = $request->input('mobile');
		$res['status'] = false;
		$flag = $_SESSION['startsign'] ? true : false;
		$http_host =$_SERVER['HTTP_HOST']; 
		$referer = $_SERVER['HTTP_REFERER']; 

		if($flag && strstr($http_host,"puamap.com") && $request->ajax() &&  strstr($referer,"puamap.com")){
			
			if($mobile){
				$pattren ="/^1[34578]\d{9}$/";
				if(preg_match($pattren, $mobile)){
						$url = Common::auth_url(Common::$_sendVerifyCode);
						$data = array(
							'mobile'=>$mobile,
							'debug'=>0
							);
						$result = HTTP_POST($url,$data);
						
						
						if($result['isSuccessful']){//发送成功
							$res['status'] = true;
							$_SESSION['code'] = $result['data']['code'];
						}
				}else{
					$res['message'] = Lang::$_phone_error;
				}
			}else{

				$res['message'] = Lang::$_phone_empty;
			}
		}else{
			$res['message'] = Lang::$_illegal;
		}
		
		echo json_encode($res);
		exit();
	}
	//手机注册
	public function signup(Request $request){
		$mobile = $request->input('mobile');
		$password = $request->input('password');
		$code = $request->input('code');
		$res['status'] = false;
		if($mobile){
			$pattren ="/^1[34578]\d{9}$/";
			if(preg_match($pattren, $mobile)){
				if(isset($_SESSION['code']) && $code == $_SESSION['code']){
					unset($_SESSION['code']);
					if(strlen($password) >= 6){
						$data['mobile']= $mobile;
						$data['password'] = $password;
						$data['code']=$code;
						$url = Common::auth_url(Common::$_signup);
						$result = HTTP_POST($url,$data);
						if($result['isSuccessful']){
							$res['status'] = true;
						}else{
							foreach ($result['data'] as $key => $value) {
								if($value['field'] == "mobile"){
									$res['field']='mobile';
									$res['message']=Lang::$_phone_exsits;
								}else if($value['field'] == "code"){
									$res['field']='code';
									$res['message']=Lang::$_code_error;
								}
							}
						}
					}else{
						$res['field']='password';
						$res['message'] = Lang::$_password_error;
					}
				}else{
					$res['field']="code";
					$res['message'] = Lang::$_code_error;
				}
			}else{
				$res['field']="mobile";
				$res['message'] = Lang::$_phone_error;
			}
		}else{
			$res['field']="mobile";
			$res['message'] = Lang::$_phone_empty;
		}

echo json_encode($res);
exit();
	}
	//重置密码
	public function rpassword(Request $request){
		$mobile = $request->input('mobile');
		$password = $request->input('password');
		$repassword = $request->input('update_repassword');
		$code = $request->input('code');
		$res['status'] = false;
		if($mobile){
			$pattren ="/^1[34578]\d{9}$/";
			if(preg_match($pattren, $mobile)){
				if(isset($_SESSION['code']) && $code == $_SESSION['code']){
					unset($_SESSION['code']);
					if(strlen($password) >= 6){
						if($password == $repassword){
							$data['mobile']= $mobile;
							$data['password'] = $password;
							$data['code']=$code;
							$url = Common::auth_url(Common::$_resetPassword);
							$result = HTTP_POST($url,$data);
							if($result['isSuccessful']){
								$res['status'] = true;
							}else{
								foreach ($result['data'] as $key => $value) {
									if($value['field'] == "mobile"){
										$res['field']='mobile';
										$res['message']=Lang::$_phone_exsits;
									}else if($value['field'] == "code"){
										$res['field']='code';
										$res['message']=Lang::$_code_error;
									}else if($value['field'] == "password"){
										$res['field']='password';
										$res['message'] = Lang::$_password_error;
									}
								}
							}
						}else{
							$res['field']='repassword';
							$res['message'] = Lang::$_password_nequite;
						}
						
					}else{
						$res['field']='password';
						$res['message'] = Lang::$_password_error;
					}
				}else{
					$res['field']="code";
					$res['message'] = Lang::$_code_error;
				}
			}else{
				$res['field']="mobile";
				$res['message'] = Lang::$_phone_error;
			}
		}else{
			$res['field']="mobile";
			$res['message'] = Lang::$_phone_empty;
		}

echo json_encode($res);
exit();
	}

	public function signout(){
		unset($_SESSION['userinfo']);
		$_SESSION['userinfo'] =null;
		session_destroy();
		return redirect()->back();
	}

}