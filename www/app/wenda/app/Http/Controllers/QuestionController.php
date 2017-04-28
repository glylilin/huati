<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Common\Common;
use App\Common\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
class QuestionController extends ParentController
{	
	public function add_question(Request $request){
		$mess="";
		if($request->isMethod("post")){
			$title = $request->input("topic_title");
			$content = $request->input("content");
			$tags = $request->input("topic_tags");
			$topic_ids = $request->input("topic_ids");
			$teacher = $request->input("teacher");
			$anonymous = $request->input("anonymous");
			if($title){
				if($content){
					/*if($topic_ids){*/
						
						$access_token = $_SESSION['userinfo']['access_token'];
						$topic_ids = $topic_ids ? implode(",",  array_unique($topic_ids)) : "";
						$topic = $tags ? implode(",",array_unique($tags)) : "";
						$invite_ids = $teacher ? implode(",",$teacher) : "";
						$data = array(
							'title'=>addslashes($title),
							'content'=>addslashes($content),
							'topic_ids'=>$topic_ids,
							'topic'=>$topic,
							'tag'=>$topic,
							'invite_ids'=>$invite_ids,
							'anonymous'=>$anonymous
							);
						$url = Common::auth_url(Common::$_qa_createQuestion)."?access_token=".$access_token;
						$result = HTTP_POST($url,$data);
						if($result['isSuccessful']){
							header("location:/s");
							exit();
						}else{
							$mess = Lang::$_controller_error;
						}
					/*}else{
						$mess = Lang::$_type_not_empty;
					}*/
				}else{
					$mess = Lang::$_content_not_empty;
				}
			}else{
				$mess = Lang::$_title_not_empty;
			}
		}
		$url = Common::auth_url(Common::$_qa_topic_list);
	   	$access_token = $_SESSION['userinfo']['access_token'];
	   	$topic_list = array();
	   	 if(Cache::has("topic_type_list")){
         	$topic_list = Cache::get("topic_type_list");
	     }else{
	     	$type_list = HTTP_GET($url,array('access_token'=>$access_token));
		   	if($type_list['isSuccessful']){
		   		$topic_list =$type_list['data']; 
		   		 Cache::add("topic_type_list",$topic_list,Common::$_cache_time);
		   	}
	     }
	   	
	   	$obj = view("question/add");
	   	$obj->with('topic_list',$topic_list);
	   	$totur_total = $this->get_tutor_count();
	   	$obj->with('totur_list',$this->get_tutor_list($totur_total));
	   	$obj->with('mess',$mess);
	   	$obj->with('navclass',"tw");
		return $obj;
	}

	public function answer_question(Request $request){

		$qa_id = $request->input('qa_id');
		$content = $request->input('content');
		$res['status'] = false;
		if(is_numeric($qa_id)){
			if($content){
				$content =  format_contents($content);
				$params = array(
					'qa_id'=>$qa_id,
					'content'=>$content
					);
				$access_token = $_SESSION['userinfo']['access_token'];
				$url = Common::auth_url(Common::$_qa_createAnswer)."?access_token=".$access_token;
				$result = HTTP_POST($url,$params);

				if($result['isSuccessful']){
					$res['status'] = true;
				}else{
					$res['message'] = Lang::$_controller_error."-";
				}

			}else{
				$res['message'] = Lang::$_content_not_empty;
			}
		}else{	
			$res['message']=Lang::$_question_params_error;

		}
		echo json_encode($res);
		exit();
	}

	public function update_answer(Request $request,$qa_id=0){
		$qa_id = $qa_id ? $qa_id : $request->input("qa_id");
		if(is_numeric($qa_id)){
			$access_token = $_SESSION['userinfo']['access_token'];
			if($request->isMethod("post")){
				$content = $request->input('content');
				$res['status'] = false;
				if($content){
					$content = format_contents($content);

					$url = Common::auth_url(Common::$_qa_update)."?access_token=".$access_token."&id=".$qa_id;
				
					$params = array(
					'content'=>$content
					);
					$result = HTTP_POST($url,$params);
					
					if($result['isSuccessful']){
						$res['status'] = true;
					}else{
						$res['message']=Lang::$_controller_error;
					}
				}else{
					$res['message'] = Lang::$_content_not_empty;
				}
				echo json_encode($res);
				exit();
			}
			
			$info = $this->get_topic_info($access_token,$qa_id);
			$obj = view("question/update_answer");
			$obj->with('info',$info);
			$obj->with("upload_url",Common::$_topic_image_upload);
			return $obj;
		}else{
			header("location:/signout");
			exit();
		}
	}

	public function update_question(Request $request,$qa_id=0){

		$qa_id = $qa_id ? $qa_id : $request->input("qa_id");
		if(is_numeric($qa_id)){
			$mess="";
			$access_token = $_SESSION['userinfo']['access_token'];
			if($request->isMethod("post")){
				$title = $request->input("topic_title");
				$content = $request->input("content");
				$tags = $request->input("topic_tags");
				$topic_ids = $request->input("topic_ids");
				$teacher = $request->input("teacher");
				$anonymous = $request->input("anonymous");
				if($title){
					$title = addslashes($title);
					/*if($topic_ids){*/
						if($content){
							$content = addslashes($content);
							$url = Common::auth_url(Common::$_qa_update)."?access_token=".$access_token."&id=".$qa_id;
						
							$topic_ids = $topic_ids ? implode(",",  array_unique($topic_ids)) : "";
						
							$topic = $tags ? implode(",",array_unique($tags)) : "";
							$invite_ids = $teacher ? implode(",",$teacher) : "";
							$params = array(
								'title'=>addslashes($title),
								'content'=>addslashes($content),
								'topic_ids'=>$topic_ids,
								'topic'=>$topic,
								'tag'=>$topic,
								'invite_ids'=>$invite_ids,
								'anonymous'=>$anonymous
								);
							$result = HTTP_POST($url,$params);
							if($result['isSuccessful']){
								header("location:/s");
								exit();
							}else{
								$mess=Lang::$_controller_error;
							}
						}else{
							$$mess = Lang::$_content_not_empty;
						}
					/*}else{
						$mess = Lang::$_type_not_empty;
					}*/
				}else{
					$mess = Lang::$_title_not_empty;
				}
				
			
			}
			
			$info = $this->get_topic_info($access_token,$qa_id);
			if($info){
				$info['topic'] =  $info['topic'] ? explode(",", $info['topic']) : array();
				$info['topic_ids'] = $info['topic_ids'] ? explode(",", $info['topic_ids']) : array();
				$info['invite_ids'] = explode(",", $info['invite_ids']);
			}
				$obj = view("question/update_question");
				$obj->with('info',$info);
				$url = Common::auth_url(Common::$_qa_topic_list);
				$type_list = HTTP_GET($url,array('access_token'=>$access_token));
			   	$topic_list = array();
			   	if($type_list['isSuccessful']){
			   		$topic_list =$type_list['data']; 
			   	}
			   	$obj->with('topic_list',$topic_list);
			   	$totur_total = $this->get_tutor_count();
			   	$obj->with('totur_list',$this->get_tutor_list($totur_total));
			   	$obj->with('mess',$mess);
			   	$obj->with('navclass',"tw");
			return $obj;
		}else{
			header("location:/signout");
			exit();
		}
	}

	public function get_topic_info($access_token,$qa_id){
		$info = array();
		$params = array(
				'access_token'=>$access_token,
				'id'=>$qa_id
		);
		$url  = Common::auth_url(Common::$_qa_view);
		$res = HTTP_GET($url,$params);
		if($res['isSuccessful']){
				$info = $res['data'];
		}
		return $info;
	}
}