<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Common\Common;
use App\Common\Lang;
class TopicController extends ParentController{
	public function detail($qa_id,$sort=1,$page=''){
		switch ($sort) {
			case '1':
				$orderArray="['hot']";
				$sortArray ="['desc']";
				break;
			case '2':
				$orderArray="['sort']";
				$sortArray ="['desc']";
				break;
			default:
				$orderArray="['sort']";
				$sortArray ="['asc']";
				break;
		}
		$access_token = $_SESSION['userinfo']['access_token'];
			//统计总数
      $params = array(
         'type'=>2,
         'access_token'=>$access_token,
         'qa_id'=>$qa_id,
         );
		$url = Common::auth_url(Common::$_qa_count);
      $total = HTTP_GET($url,$params);
      $pageInfo = 0;
      if($total['isSuccessful']){
         $pageInfo = $total['data'];//deal_page($total['data'],$page,Common::$_pagesize);
      }
      //$obj->with("page_list",$pageInfo);
		$data = array(
			'qa_id'=>$qa_id,
			'type'=>2,
			"expand"=>"user,invites,comments",
			'order'=>$orderArray,
			'sort'=>$sortArray,
			'page'=>1,
			"pageSize"=>$pageInfo,
			'access_token'=>$access_token
			);
		$url = Common::auth_url(Common::$_qa_list);
		$list = HTTP_GET($url,$data);
		$data_list = array();
		if($list['isSuccessful']){
			$data_list = $list['data'];
			foreach ($data_list as $key => $value) {
         		$data_list[$key]['user']=$this->getUserInfo($value['user']['id']);
      		}
		}
		$obj = view('topic/detail');
		$obj->with('sort',$sort);
		$obj->with('list',$data_list);
		$obj->with('following',$this->getFollowList());
      $obj->with('id',$qa_id);
      $obj->with("page",$page);

      //获取本问题详情
      $params = array(
      	'access_token'=>$access_token,
      	'id'=>$qa_id,
      	'expand'=>'user'
      	);
      $url = Common::auth_url(Common::$_qa_view);
      $topic_info_temp = HTTP_GET($url,$params);
      $topic_info = array();
      if($topic_info_temp['isSuccessful']){
      	$topic_info = $topic_info_temp['data'];
         $topic_info['user']=$this->getUserInfo($topic_info['user']['id']);
      }
      if(!$topic_info){
      	 abort(404);
      }
      $topic_info['topic'] = isset($topic_info['topic']) ? explode(',',$topic_info['topic']) : array();
      $topic_info['topic_ids'] = isset($topic_info['topic_ids']) ? explode(',', $topic_info['topic_ids']) : array();
      $obj->with("topic_info",$topic_info);
      $obj->with("upload_url",Common::auth_url(Common::$_topic_image_upload)."?access_token=".$access_token);
      $this->add_topic_view($qa_id,$access_token);
		return $obj;
	}
	/***增加浏览量****/
	public function add_topic_view($qa_id,$access_token){
		$params = array(
			'access_token'=>$access_token,
			'id'=>$qa_id
			);
		$url = Common::auth_url(Common::$_qa_plusView);
		HTTP_GET($url,$params);
	}

	public function scomment(Request $request){
		$rel_id= $request->input('rel_id');
		$content = $request->input('content');
		$comment_id = $request->input('comment_id');
		$res['status'] = false;
		if(is_numeric($rel_id)){
			if($content){
				$params =array(
					'type'=>3,
					'user_id'=>$_SESSION['userinfo']['id'],
					'rel_id'=>$rel_id,
					'comment_id'=>$comment_id,
					'content'=>$content,
					);
				
				$url = Common::auth_url(Common::$_comment_create)."?access_token=".$_SESSION['userinfo']['access_token'];
				$data = HTTP_POST($url,$params);
	
				if($data['isSuccessful']){
					$res['status'] = true;
					$data['data']['add_time'] = format_date($data['data']['add_time'],true);
					$res['mes'] = $data['data'];
				}else{
					$res['message'] = Lang::$_controller_error;
				}
			}else{
				$res['message'] = Lang::$_content_not_empty;
			}
		}else{
			$res['message'] = Lang::$_must_number;
		}
		echo json_encode($res);
		exit();
	}
	/**删除评论**/
	public  function dcomment(Request $request){
		$comment_id = $request->input('id');
		$res['status'] = false;
		if(is_numeric($comment_id)){
			$params = array(
				"access_token"=>$_SESSION['userinfo']['access_token'],
				'id'=>$comment_id
				);
			
			$url = Common::auth_url(Common::$_comment_delete);
			$result = HTTP_GET($url,$params);
		
			if($result['isSuccessful'] || $result['data']['name'] =="Not Found"){
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
	/***话题点赞***/
	public function like(Request $request){
		$qa_id = $request->input('id');
		$res['status'] = false;
		if(is_numeric($qa_id)){
			$params = array(
				"access_token"=>$_SESSION['userinfo']['access_token'],
				'id'=>$qa_id
				);
			$url = Common::auth_url(Common::$_qa_plusLike);
			$result = HTTP_GET($url,$params);
			if($result['isSuccessful']){
				$res['status'] = true;
				$res['mes'] = $result['data'];
			}else{
				$res['message'] = Lang::$_controller_error;
			}
		}else{
			$res['message'] = Lang::$_must_number;
		}
		echo json_encode($res);
		exit();
	}
	/***话题取消***/
	public function minuslike(Request $request){
		$qa_id = $request->input('id');
		$res['status'] = false;
		if(is_numeric($qa_id)){
			$params = array(
				"access_token"=>$_SESSION['userinfo']['access_token'],
				'id'=>$qa_id
				);
			$url = Common::auth_url(Common::$_qa_minusLike);
			$result = HTTP_GET($url,$params);
			if($result['isSuccessful']){
				$res['status'] = true;
				$res['mes'] = $result['data'];
			}else{
				$res['message'] = Lang::$_controller_error;
			}
		}else{
			$res['message'] = Lang::$_must_number;
		}
		echo json_encode($res);
		exit();
	}
	/***话题点踩***/
	public function dislike(Request $request){
		$qa_id = $request->input('id');
		$res['status'] = false;
		if(is_numeric($qa_id)){
			$params = array(
				"access_token"=>$_SESSION['userinfo']['access_token'],
				'id'=>$qa_id
				);
			$url = Common::auth_url(Common::$_qa_plusDislike);
			$result = HTTP_GET($url,$params);
			if($result['isSuccessful']){
				$res['status'] = true;
				$res['mes'] = $result['data'];
			}else{
				$res['message'] = Lang::$_controller_error;
			}
		}else{
			$res['message'] = Lang::$_must_number;
		}
		echo json_encode($res);
		exit();
	}
/***话题减少点踩***/
	public function minusdislike(Request $request){
		$qa_id = $request->input('id');
		$res['status'] = false;
		if(is_numeric($qa_id)){
			$params = array(
				"access_token"=>$_SESSION['userinfo']['access_token'],
				'id'=>$qa_id
				);
			$url = Common::auth_url(Common::$_qa_minusDislike);
			$result = HTTP_GET($url,$params);
			if($result['isSuccessful']){
				$res['status'] = true;
				$res['mes'] = $result['data'];
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
	 * 创建问题收藏、关注
	 * @return [type] [description]
	 */
	public function fcreate(Request $request){
		$status = $request->input('status');

		$type = $status ? 7 : 8 ;//7表示问题8表示话题
		$rel_id =  $request->input('rel_id');
		$res['status'] = false;
		if(is_numeric($rel_id)){
			$url = Common::auth_url(Common::$_favorite_create)."?access_token=".$_SESSION['userinfo']['access_token'];
			$params = array(
				'type'=>$type,
				'rel_id'=>$rel_id
				);
			$result = HTTP_POST($url,$params);
			if($result['isSuccessful']){
				$res['status'] = true;
			}
		}else{
			$res['message'] = Lang::$_must_number;
		}
		echo json_encode($res);
		exit();
	}

	/**
	 * 取消问题收藏、关注
	 * @return [type] [description]
	 */
	public function dcreate(Request $request){
		$rel_id =  $request->input('rel_id');
		$res['status'] = false;
		if(is_numeric($rel_id)){
			$url = Common::auth_url(Common::$_favorite_delete);
			$params = array(
				"access_token"=>$_SESSION['userinfo']['access_token'],
				'type'=>7,
				'rel_id'=>$rel_id
				);
			$result = HTTP_GET($url,$params);
			
			if($result['isSuccessful']){
				$res['status'] = true;
			}
		}else{
			$res['message'] = Lang::$_must_number;
		}
		echo json_encode($res);
		exit();
	}

	public function search(Request $request,$content="",$page =1)
	{
		$access_token = $_SESSION['userinfo']['access_token'];
		$content = $content ? addslashes(trim($content)) : addslashes(trim($request->input('content')));
		$url = Common::auth_url(Common::$_qa_list);
   		$params = array(
   		'page'=>$page,
   		'type'=>1,
   		'expand'=>'user,comments',
   		'pageSize'=>Common::$_pagesize,
   		'access_token'=>$access_token,
   		'q'=>$content
   		);
   		$list =  HTTP_GET($url,$params);
   		$data_list = array();
   		if($list['isSuccessful']){
         $data_list = $list['data'];
      /*   foreach ($data_list as $key => $value) {
            $data_list[$key]['user']=$this->getUserInfo($value['user']['id']);
         }*/
      }
       $params = array(
         'type'=>1,
         'access_token'=>$access_token,
         'q'=>$content
         );
      $url = Common::auth_url(Common::$_qa_count);
      $total = HTTP_GET($url,$params);
      $pageInfo = array();
      if($total['isSuccessful']){
         $pageInfo = deal_page($total['data'],$page,Common::$_pagesize);
      }

      $obj = view("topic/search");
   	  $obj->with('list',$data_list);
   	  $obj->with("page_list",$pageInfo);
   	   $obj->with("content",$content);
   	   $obj->with('follow',$this->getFollowList());

   	   $obj->with("page",$page);
   	  return $obj;
	}
}
?>