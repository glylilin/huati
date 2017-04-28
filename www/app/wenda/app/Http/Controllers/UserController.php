<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Common\Common;
use App\Common\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
class UserController extends ParentController
{	
	//人物关注
	public function follow(Request $request){
		$rel_user_id = $request->input("rel_user_id");
		$res['status'] = false;
		if(is_numeric($rel_user_id)){
			$params = array(
				'rel_user_id'=>$rel_user_id
				);
			$url = Common::auth_url(Common::$_follow_create)."?access_token=".$_SESSION['userinfo']['access_token'];
			$result = HTTP_POST($url,$params);
			if($result['isSuccessful']){
				$res['status'] = true;
			}else{
				$res['message'] = Lang::$_controller_error;
			}
		}else{
			$res['message'] = Lang::$_must_number;
		}
		echo json_encode($res);
		exit();
	}
	/**
	 * 取消关注
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function delete(Request $request){
		$rel_user_id = $request->input("rel_user_id");
		$res['status'] = false;
		if(is_numeric($rel_user_id)){
			$params = array(
				'access_token'=>$_SESSION['userinfo']['access_token'],
				'rel_user_id'=>$rel_user_id
				);
			$url = Common::auth_url(Common::$_follow_delete);
			$result = HTTP_GET($url,$params);
			if($result['isSuccessful']){
				$res['status'] = true;
			}else{
				$res['message'] = Lang::$_controller_error;
			}
		}else{
			$res['message'] = Lang::$_must_number;
		}
		echo json_encode($res);
		exit();
	}
	//个人中心提问列表
	public function ask_question($uid,$page = 1){
		$access_token  = $_SESSION['userinfo']['access_token'];
		$user_id = $uid;
		$params = array(
			'type'=>1,
			'user_id'=>$user_id,
			'access_token'=>$access_token,
			'page'=>$page,
			'pageSize'=>Common::$_pagesize
			);
		$url = Common::auth_url(Common::$_qa_list);
		$result = HTTP_GET($url,$params);
		$data = array();
		if($result['isSuccessful']){
			$data = $result['data'];
		}
		$cache_total = $this->get_question_answer_collection_total($access_token,$user_id);
		$obj = view("user/ask");
		$obj->with('data',$data);
		$obj->with('cache_total',$cache_total);
		$obj->with("pages_info",deal_page($cache_total['question_total'],$page));

		$userinfo = $this->getUserInfo($_SESSION['userinfo']['id']);
		$obj->with("userinfo",$userinfo);
		$obj->with('class','question');
		$obj->with("page",$page);
		$obj->with("uid",$uid);
		$obj->with('userinfo',$this->getUserInfo($uid));
		return $obj;
	}
	/**回答**/
	public function center_answer($uid,$page = 1){
		$access_token  = $_SESSION['userinfo']['access_token'];
		$user_id = $uid;
		$params = array(
			'type'=>2,
			'user_id'=>$user_id,
			'access_token'=>$access_token,
			"expand"=>"user,invites,comments",
			'page'=>$page,
			'pageSize'=>Common::$_pagesize
			);
		$url = Common::auth_url(Common::$_qa_list);
		$result = HTTP_GET($url,$params);
		$data = array();
		if($result['isSuccessful']){
			$data = $result['data'];
			foreach ($data as $key => $value) {
				
				$data[$key]['ans'] = $this->get_question_view($value['qa_id'],$access_token);
		        $data[$key]['user']=$this->getUserInfo($value['user']['id']);
			}
		}
		
		$cache_total = $this->get_question_answer_collection_total($access_token,$user_id);
		$obj = view("user/answer");
		$obj->with('list',$data);
		$obj->with('cache_total',$cache_total);
		$obj->with("page_list",deal_page($cache_total['answer_total'],$page));
		$userinfo = $this->getUserInfo($_SESSION['userinfo']['id']);
		$obj->with("userinfo",$userinfo);
		$obj->with('class','answer');
		$obj->with("page",$page);
		$obj->with("uid",$uid);
		$obj->with('userinfo',$this->getUserInfo($uid));
		return $obj;
	}

	public function get_question_view($qa_id,$access_token){
		$params = array(
      	'access_token'=>$access_token,
      	'id'=>$qa_id,
      	'expand'=>'user'
      	);
      $url = Common::auth_url(Common::$_qa_view);
      $topic_info_temp = HTTP_GET($url,$params);
      $data = array();
      if($topic_info_temp['isSuccessful']){
      	 $data = $topic_info_temp['data'];
      }
      return $data;
	}
	//收藏实质就是话题关注
	public function collection($page=1){
		$access_token  = $_SESSION['userinfo']['access_token'];

		$user_id = $_SESSION['userinfo']['id'];
		$url = Common::auth_url(Common::$_favorite_list);
		$params = array(
			'access_token'=>$access_token,
			'expand'=>'qa',
			'page'=>$page,
			"pageSzie"=>Common::$_pagesize
			);

		$result = HTTP_GET($url,$params);
		$data = array();
		if($result['isSuccessful']){
			$data = $result['data'];
			
			foreach ($data as $key => $value) {
				if($value['qa']){
					if($value['qa']['type'] == 2){
						$data[$key]['ans'] = $this->get_question_view($value['qa']['qa_id'],$access_token);
					}else{
						$data[$key]['ans']['title'] = $value['qa']['title'];
						$data[$key]['ans']['topic'] = $value['qa']['topic'];
					}

				}else{
					unset($data[$key]);
				}
			}
		}
		

		$cache_total = $this->get_question_answer_collection_total($access_token,$user_id);
		$obj = view("user/collection");
		$obj->with('list',$data);
		$obj->with('cache_total',$cache_total);
		$obj->with("page_list",deal_page($cache_total['favorite_total'],$page));
		$obj->with('class','collection');
		$obj->with("page",$page);
		$obj->with("uid",$user_id);
		$obj->with('userinfo',$this->getUserInfo($user_id));
		return $obj;
	}

	/*******关注人*********/
	public  function careuser($page = 1){
		$access_token  = $_SESSION['userinfo']['access_token'];
		$user_id = $_SESSION['userinfo']['id'];
		$my_follow_list = $this->whocare($access_token);
		$follow_me_list =$this->whocare($access_token,false);
		$obj = view("user/careuser");
		$obj->with('myfollow',$my_follow_list);
		
		$obj->with('followme',$follow_me_list);
		$obj->with('class','careuser');
		$cache_total = $this->get_question_answer_collection_total($access_token,$user_id);
		$obj->with('cache_total',$cache_total);
		$obj->with("uid",$user_id);
		$obj->with('userinfo',$this->getUserInfo($user_id));
		return $obj;
	}
	/**
	 * 异步获取关注分页信息
	 * @return [type] [description]
	 */
	public function ajaxfollow(Request $request){
		$flag = $request->input("type");
		$page =  $request->input("page");
		$res['status'] = false;
		if(is_numeric($page)){
			$page++;
			switch ($flag) {
				case 'mf':
					$myfollowing = true;
					break;
				default:
					$myfollowing = false;
					break;
			}
			$access_token  = $_SESSION['userinfo']['access_token'];
			$data = $this->whocare($access_token,$myfollowing,$page);
			if($data){
				$res['status'] = true;
				$res['list'] = $data;
				$res['total'] = count($data);
				$res['page']=$page;
			}else{
				$res['message'] = Lang::$_not_data;
			}
		}else{
			$res['message'] = Lang::$_must_number;
		}
		echo json_encode($res);
		exit();
	}

	/**
	*获取关注人物信息，true表示我的关注false表示关注我的
	**/
	public function whocare($access_token,$myfollowing=true,$page=1,$expand="following"){
		if($myfollowing){
			$url = Common::auth_url(Common::$_follow_myFollowingList);
		}else{
			$url = Common::auth_url(Common::$_follow_myFollowerList);
		}
		$params = array(
			'access_token'=>$access_token,
			'expand'=>'following',
			'page'=>$page,
			'pageSzie'=>Common::$_pagesize
			);
		$result = HTTP_GET($url,$params);
		$data = array();
		if($result['isSuccessful']){
			$data = $result['data'];
			foreach ($data as $key => $value) {
				$temp = $this->getUserInfo($value['user_id']);
				$data[$key]['userCount'] = $temp['userCount'];
			}
		}
		return $data;
	}
	/**动态**/
	public function dynamic($uid,$page =1){

		$access_token  = $_SESSION['userinfo']['access_token'];
		
		$total = $this->get_qa_count($access_token,$uid,"");
		$params = array(
			'access_token'=>$access_token,
			'user_id'=>$uid,
			"expand"=>"user",
			'page'=>$page,
			'pageSize'=>Common::$_pagesize
			);

		$url = Common::auth_url(Common::$_qa_list);
		$result = HTTP_GET($url,$params);
		$data = array();
		if($result['isSuccessful']){
			$data = $result['data'];
			foreach ($data as $key => $value) {
				if($value['type'] == 2){
					$temp =  $this->get_question_view($value['qa_id'],$access_token);
					if($temp){
						$data[$key]['title'] = $temp['title'];
						$data[$key]['id'] = $temp['id'];
						
						$data[$key]['topic'] = $temp['topic'];
						$data[$key]['answer'] = $temp['answer'];
						$data[$key]['view'] = $temp['view'];
						$data[$key]['user'] = $temp['user'];
						$data[$key]['anonymous'] = $temp['anonymous'];//是否匿名
					}
					$data[$key]['aid'] = $value['id'];
				}
			}
		}

		$obj = view("user/dynamic");
		$obj->with('list',$data);
		$obj->with("uid",$uid);
		$obj->with('class','dynamic');
		$cache_total = $this->get_question_answer_collection_total($access_token,$uid);
		$obj->with('cache_total',$cache_total);
		$obj->with("page_list",deal_page($total,$page));
		$obj->with("page",$page);
		$obj->with('userinfo',$this->getUserInfo($uid));
		return $obj;
	}

	//获取某个用户提问/回答总数
	public function get_qa_count($access_token,$user_id,$type=1){
		$params = array(
			'access_token'=>$access_token,
			'user_id'=>$user_id,
			'type'=>$type
			);
		$url = Common::auth_url(Common::$_qa_count);
		$result = HTTP_GET($url,$params);
		$total = 0;
		if($result['isSuccessful']){
			$total= $result['data'];
		}
		return $total;
	}

	public function get_question_answer_collection_total($access_token,$user_id){
		$data = array();
		
			$data['question_total']=$this->get_qa_count($access_token,$user_id);
			$data['answer_total']=$this->get_qa_count($access_token,$user_id,2);
			$url = Common::auth_url(Common::$_favorite_count);
			$params = array(
				'access_token'=>$access_token,
				'type'=>7
				);
			$reslut = HTTP_GET($url,$params);
			$data['favorite_total'] = 0;
			if($reslut['isSuccessful']){
			$data['favorite_total'] = $reslut['data'];
			}
			//统计消息总量
			$url = Common::auth_url(Common::$_message_count);
			$params = array(
				'access_token'=>$access_token
				);
			$reslut = HTTP_GET($url,$params);
			$data['message'] = 0;
			if($reslut['isSuccessful']){
				$data['message'] = $reslut['data'];
			}
	
		
		return $data;
	}
	/***
	*删除问题
	*/
	public function deleteqa(Request $request){
		$id = $request->input('id');
		$res['status'] = false;
		if($id && is_numeric($id)){
			$url = Common::auth_url(Common::$_qa_delete);
			$params = array(
				'access_token'=>$_SESSION['userinfo']['access_token'],
				'id'=>$id
				);
			$result = HTTP_GET($url,$params);
		
			if($result['isSuccessful']){
				$res['status'] = true;
			}else{
				$res['message']= Lang::$_controller_error;
			}
		}else{
			$res['message'] = Lang::$_must_number;
		}
		echo json_encode($res);
		exit();
	}

	public function user_setting(){
	
		$userinfo = $this->getUserInfo($_SESSION['userinfo']['id']);
		$obj = view("user/setting");
		$obj->with('userinfo',$userinfo);
		$obj->with("updateAvatarUrl",Common::auth_url(Common::$_user_updateAvatar)."?access_token=".$_SESSION['userinfo']['access_token']);
		return $obj;
	}

	public function updateinfo(Request $request){
		$name = $request->input("name");
		$value = $request->input('value');
		$res['status'] = false;
		if($value){
			$url = Common::auth_url(Common::$_user_updateProfile)."?access_token=".$_SESSION['userinfo']['access_token'];
			if($name=="1"){
				$params = array(
				"nickname"=>$value
				);
			}else{
				$params = array(
				"weixin"=>$value
				);
			}
			$res = HTTP_POST($url,$params);

			if($res['isSuccessful']){
				$res['status'] = true;
			}
		}
		echo json_encode($res);
		exit();
	}
	//由于接口问题所有需要使用通知和邀请互通
	public function notice($uid,$page = 1){
		$access_token  = $_SESSION['userinfo']['access_token'];
		$user_id = $uid;
		$obj = view('user/notice');
		$obj->with('class','notice');
		$url = Common::auth_url(Common::$_message_list);
		$params = array(
			'access_token'=>$access_token,
			'page'=>$page,
			'pageSize'=>Common::$_pagesize
			);
		$reslut = HTTP_GET($url,$params);
		$data = array();
		if($reslut['isSuccessful']){
			$data = $reslut['data'];
			foreach ($data as $key => $value) {
				$data[$key]['topic']=array();
				if($value['type'] == 1){
					$data[$key]['topic'] = $this->get_question_view($value['rel_id'],$access_token);
				}else if($value['type'] == 2){
					$cache = $this->get_question_view($value['rel_id'],$access_token);
					$data[$key]['topic'] = $this->get_question_view($cache['qa_id'],$access_token);
				}
				$data[$key]['userinfo'] = $this->getUserInfo($value['user_id']);
			}
		}

		$obj->with('data',$data);
		$cache_total = $this->get_question_answer_collection_total($access_token,$user_id);
		$obj->with('cache_total',$cache_total);
		$obj->with("page_list",deal_page($cache_total['message'],$page));
		$obj->with('page',$page);
		$obj->with('uid',$uid);
		$obj->with('userinfo',$this->getUserInfo($uid));
		return $obj;
	}

	public function delnotice(Request $request){
		$id = $request->input('id');
		$access_token  = $_SESSION['userinfo']['access_token'];
		$res['status'] = false;
		if(is_numeric($id)){
			$url = Common::auth_url(Common::$_message_delete);
			$params = array(
				'access_token'=>$access_token,
				'id'=>$id
				);
			$result = HTTP_GET($url,$params);
			if($result['isSuccessful']){
				$res['status'] = true;
			}
		}
		echo json_encode($res);
		exit();
	}

	/**发送验证码**/
	public function supcode(Request $request){//125885
		$mobile = $_SESSION['userinfo']['mobile'];
		$res['status'] = false;
		$access_token  = $_SESSION['userinfo']['access_token'];
		$http_host =$_SERVER['HTTP_HOST']; 
		$referer = $_SERVER['HTTP_REFERER']; 
		if($access_token && strstr($http_host,"puamap.com") &&  $request->ajax() && strstr($referer,"puamap.com")){
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
							$_SESSION['upcode'] = $result['data']['code'];
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
 
//重置密码 126046
	public function updatepassword(Request $request){
		$mobile = $_SESSION['userinfo']['mobile'];
		$password = $request->input('password');
		$code = $request->input('code');
		$res['status'] = false;
		if($mobile){
			$pattren ="/^1[34578]\d{9}$/";
			if(preg_match($pattren, $mobile)){
				if(isset($_SESSION['upcode']) && $code == $_SESSION['upcode']){
					unset($_SESSION['upcode']);
					if(strlen($password) >= 6){
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

}