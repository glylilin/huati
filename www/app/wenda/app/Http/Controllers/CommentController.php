<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Common\Common;
use App\Common\Lang;
use Illuminate\Support\Facades\Session;
class CommentController extends ParentController
{	
	/**
	 * 评论点赞
	 * @return [type] [description]
	 */
	public function pluslike(Request $request){
		$commentid = $request->input('comment_id');
		$res['status'] = false;
		if(is_numeric($commentid)){
			$params = array(
				"access_token"=>$_SESSION['userinfo']['access_token'],
				'id'=>$commentid
				);
			$url = Common::auth_url(Common::$_comment_plusLike);
			$data = HTTP_GET($url,$params);
			if($data['isSuccessful']){
				$res['status']=true;
				$res['mes'] = $data['data'];
			}else{
				$res['message'] =  Lang::$_controller_error;
			}
		}else{
			$res['message'] = Lang::$_must_number;
		}
		echo json_encode($res);
		exit();
	}
//问答异步分页
	public function comment_qa_list_page(Request $request){
		$qa_id = $request->input('qa_id');
		$page = $request->input('page');
		$res['status'] = false;
		if(is_numeric($qa_id) && is_numeric($page)){
			$data = $this->get_topic_question_page($qa_id,$page);
			if($data['data']){
				$res['status'] = true;
				foreach ($data as $key => $value) {
					if(isset($value['user']) && $value['user']) {
						$data[$key]['user']['mobile'] = sub_html($value['user']['mobile']);
					}
					if(isset($value['comments']) && $value['comments']){
						foreach ($value['comments'] as $k => $v) {
							if($v['user']){
								$data[$key]['comments'][$k]['user']['mobile'] = sub_html($v['user']['mobile']);
							}
						}
					}
				}
				$res['list'] = $data;
			}
		}else{
			$res['message'] = Lang::$_must_number;
		}
		echo json_encode($res);
		exit();
	}
}