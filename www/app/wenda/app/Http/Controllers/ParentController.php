<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Common\Common;
use Illuminate\Support\Facades\Cache;
class ParentController extends Controller{
	public function __construct(){
		//parent::__construct();
		if(!isset($_SESSION['userinfo'])){ 
       session_destroy();   
	     header("location:/");
		  exit();
		}
  
      $uid = $_SESSION['userinfo']['id'];
      $cache_data = $this->getUserInfo($uid);
		if(!$cache_data){
         unset($_SESSION['userinfo']);
         $_SESSION['userinfo'] =null;
         session_destroy();
         header("location:/");
         exit();
      }
      $_SESSION['userinfo'] = $cache_data;
	}
   public function ParentController(){
      $this->__construct();
   }
	/*獲取用户信息*/
	public function getUserInfo($uid){
	
		$access_token = $_SESSION['userinfo']['access_token'];

            $params = array(
            'id'=>$uid,
            'access_token'=>$access_token,
            'expand'=>"userCount"
            );
         $url = Common::auth_url(Common::$_user_view);
         $data = HTTP_GET($url,$params);
         $result = array();
         if($data['isSuccessful']){
            $result = $data['data'];
           
         }
		return $result;
	}
	//登陸用户的关注列表
	public function getFollowList(){
		$access_token = $_SESSION['userinfo']['access_token'];
		$params = array(
			'access_token'=>$access_token,
			'expand'=>"following",
			'page'=>1
			);
		$url = Common::auth_url(Common::$_follow_myFollowingList);
		$follow_lists = HTTP_GET($url,$params);
      $follow_list = array();
      $res = array();
      if($follow_lists['isSuccessful']){
         $follow_list = $follow_lists['data'];
         if($follow_list){
            foreach ($follow_list as $key => $value) {
               $res[] = $value['following']['id'];
            }
         }
      }
		
		return $res;
	}

	public function favorite_list_qa(){
		$access_token = $_SESSION['userinfo']['access_token'];
		$params = array(
			'access_token'=>$access_token,
			'expand'=>"qa",
			'page'=>1
			);
		$url = Common::auth_url(Common::$_favorite_list);
		$favorite_list = HTTP_GET($url,$params);
		$res = array();
		if($favorite_list['data']){
			foreach ($favorite_list['data'] as $key => $value) {
				$res[] = $value['qa']['id'];
			}
		}
		return $res;
	}

//获取问题最新的评论
   public function get_topic_comment_list($qa_id){
      
      
  		$res['count'] = $this->get_topic_comment_count($qa_id);
  		$cache = $this->get_topic_question_page($qa_id);
  		$res['pages'] = $cache['pages'];
  		$res['data'] = $cache['data'];
      return $res;
   } 
   //问答评论分页显示
   public function get_topic_question_page($qa_id,$page=1,$expand='user,comments'){
   	$url = Common::auth_url(Common::$_comment_list);
      $params = array(
         'type'=>3,
         'rel_id'=>$qa_id,
         'page'=>$page,
         'pageSize'=>Common::$_pagesize,
         'expand'=>$expand
         );
      $data = HTTP_GET($url,$params);
      $res['data'] = array();
      if($data['isSuccessful']){
      		foreach ($data['data'] as $key => $value) {
      			$res['data'][] = $value;
      		}
      }
      if($res['data']){
      	foreach ($res['data'] as $key => $value) {
            $res['data'][$key]['add_time'] = format_date($value['add_time'],true);
      		if($value['comment_id']){
      			$temp = $this->get_comment_view_by_comment_id($value['comment_id']);
      			$res['data'][$key]['toUser'] = $temp ? $temp['username'] : "";
      		}else{
      			$res['data'][$key]['toUser'] =  "";
      		}
            if($value['comments']){
               foreach ($value['comments'] as $key1 => $value1) {
                  $res['data'][$key]['comments'][$key1]['add_time'] = format_date($value1['add_time'],true);
               }
            }
      	}
      }
      $res['pages'] = $this->ajax_page_span_show($this->get_topic_comment_count($qa_id),$qa_id,$page);
      return $res;
   }

   public function get_comment_view_by_comment_id($comment_id,$expand="user"){
   	$params = array(
   		'id'=>$comment_id,
   		'expand'=>$expand
   		);
   	$url = Common::auth_url(Common::$_comment_view);
   	$res = HTTP_GET($url,$params);
   	$info = array();
   	if($res['isSuccessful']){
   		$info['username'] = $res['data']['user']['nickname']  ? $res['data']['user']['nickname'] : $res['data']['user']['mobile'];
   	}	
   	return $info;
   }

   public function get_topic_comment_count($qa_id){
   		$url = Common::auth_url(Common::$_comment_count);
   		 $access_token = $_SESSION['userinfo']['access_token'];
      	$params = array(
         'rel_id'=>$qa_id,
         'type'=>3
         );
      $data = HTTP_GET($url,$params);
      return  $data['isSuccessful']? $data['data'] : 0;
   }


   //默认
   public function ajax_page_span_show($count,$qa_id,$page = 1){
   		$page_total = ceil($count / Common::$_pagesize);
           
   		$str = "";
   		if($page -1 >0){
   			$str.="<span data='".$qa_id."' page='".($page-1)."'>上一页</span>";
   		}else{
   			$str.="<span data='".$qa_id."'>上一页</span>";
   		}
   		if($page_total <= 5){
   			for ($i=1; $i <=$page_total; $i++) { 
   				if($page == $i){
   					$str.="<span class='active'>".$i."</span>";
   				}else{
   					$str.="<span data='".$qa_id."' page='".$i."'>".$i."</span>";
   				}
   			
   			}
   		}else{
   			if($page -2 <= 1){
   				for ($i=1; $i <6; $i++) { 
	   				if($page == $i){
	   					$str.="<span class='active'>".$i."</span>";
	   				}else{
	   					$str.="<span data='".$qa_id."' page='".$i."'>".$i."</span>";
	   				}
   				}
   			}else if($page + 2 >= $page_total){
   				for ($i=$page_total; $i > $page_total- 5; $i--) { 
	   				if($page == $i){
	   					$str.="<span class='active'>".$i."</span>";
	   				}else{
	   					$str.="<span data='".$qa_id."' page='".$i."'>".$i."</span>";
	   				}
   				}
   			}else{
   				for ($i=$page-2; $i <=$page +2 ; $i++) { 
	   				if($page == $i){
	   					$str.="<span class='active'>".$i."</span>";
	   				}else{
	   					$str.="<span data='".$qa_id."' page='".$i."'>".$i."</span>";
	   				}
   				}
   			}
   		}

   		if($page + 1 <= $page_total){
   			$str.="<span data='".$qa_id."' page='".($page+1)."'>下一页</span>";
   		}else{
   			$str.="<span data='".$qa_id."'>下一页</span>";
   		}
   		return $str;
   }

   public function get_tutor_list($pageSize=15,$expand='userCount'){
      $totur = array();
      if(Cache::has("tutor_list")){
         $totur = Cache::get("tutor_list");
      }else{
         $access_token = $_SESSION['userinfo']['access_token'];
         $params = array(
            'access_token'=>$access_token,
            'expand'=>$expand,
            'page'=>1,
            "pageSize"=>$pageSize
         );
         $url = Common::auth_url(Common::$_tutor_list);
         $list = HTTP_GET($url,$params);
         if($list['isSuccessful']){
            $totur = $list['data'];
            Cache::add("tutor_list",$totur,Common::$_cache_time);
         }
      }
      
      return $totur;
   }
   //获取总数
   public function get_tutor_count(){
      $count = Common::$_pagesize ;
      if(Cache::has("tutor_count")){
         $count = Cache::get("tutor_count");
      }else{
         $access_token = $_SESSION['userinfo']['access_token'];
         $params = array(
            'access_token'=>$access_token
         );
         $url = Common::auth_url(Common::$_tutor_count);
         $res = HTTP_GET($url,$params);
        
         if($res['isSuccessful']){
            $count = $res['data'];
            Cache::add("tutor_count",$count,Common::$_cache_time);
         }
      }
     
      return $count;
   }
}
?>