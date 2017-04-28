<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use App\Common\Common;
use App\Common\Lang;
class IndexController extends ParentController
{

   public function index($type=0,$page=1){
      $access_token = $_SESSION['userinfo']['access_token'];
    
      $type_list = array();
      if(Cache::has("topic_type_list")){
         $type_list = Cache::get("topic_type_list");
      }else{
         $url = Common::auth_url(Common::$_qa_topic_list);
         $type_list_cache = HTTP_GET($url,array('access_token'=>$access_token));
         if($type_list_cache['isSuccessful']){
            $type_list = $type_list_cache['data'];
            Cache::add("topic_type_list",$type_list_cache['data'],Common::$_cache_time);
         }
      }
   	

   	$url = Common::auth_url(Common::$_qa_count);
   	//提问数
   	$params = array(
   		'type'=>1,
   		'access_token'=>$access_token
   		);
      if($type){
         $params['topic_ids'] = $type;
      }
	  $question =  HTTP_GET($url,$params); 
	//回答数
	  $params = array(
   		'type'=>2,
   		'access_token'=>$access_token
   		);
     if($type){
         $params['topic_ids'] = $type;
      }
	  $answer =  HTTP_GET($url,$params); 
	//主页列表
   	$url = Common::auth_url(Common::$_qa_list);
   	$params = array(
   		'page'=>$page,
   		'type'=>1,
   		'expand'=>'user,comments',
   		'pageSize'=>Common::$_pagesize,
   		'access_token'=>$access_token
   		);
      if($type){
         $params['topic_ids'] = $type;
      }
   	$list =  HTTP_GET($url,$params);
      $hot = array();
      if(Cache::has("hot_topic_question")){
         $hot = Cache::get("hot_topic_question");
      }else{
         //最热
         $hot_params=array(
            'page'=>1,
            'type'=>1,
            'pageSize'=>1,
            'hot'=>1,
            'access_token'=>$access_token
            );
         $hots = HTTP_GET($url,$hot_params);
       
         if($hots['isSuccessful']){
            $hot =  $hots['data'] ? $hots['data'][0] : array();
            if($hot){
             Cache::add("hot_topic_question",$hot,Common::$_cache_time);
            }
         }
      }
   	 $top = array();
       if(Cache::has("top_topic_question")){
            $top = Cache::get("top_topic_question");
       }else{
         //置顶
         $top_params=array(
            'page'=>1,
            'type'=>1,
            'pageSize'=>1,
            'top'=>1,
            'access_token'=>$access_token
            );
         $tops = HTTP_GET($url,$top_params);
        
         if ($tops['isSuccessful']) {
            $top = $tops['data'] ? $tops['data'][0] : array();
            if($top){
            	 Cache::add("top_topic_question",$top,Common::$_cache_time);
            }
         }
       }
   	
      $data_list = array();
      if($list['isSuccessful']){
         $data_list = $list['data'] ? $list['data'] : array();
      }
      
   	$obj = view("index/index")->with('type_list',$type_list);
   	$obj->with('list',$data_list);


      $obj->with('hot',$hot);
   	$obj->with('top',$top);

      $obj->with('question',$question['data']);
   	$obj->with('answer',$answer['data']);
      $obj->with('follow',$this->getFollowList());
      $obj->with('type',$type);
      $obj->with("page",$page);
      //统计总数
      $params = array(
         'type'=>1,
         'access_token'=>$access_token
         );
      if($type){
         $params['topic_ids'] = $type;
      }
      $url = Common::auth_url(Common::$_qa_count);
      $total = HTTP_GET($url,$params);
      $pageInfo = array();
      if($total['isSuccessful']){
         $pageInfo = deal_page($total['data'],$page,Common::$_pagesize);
      }
      $obj->with("page_list",$pageInfo);
      //话题详情
      $tinfo = array();
      if($type){
         $url = Common::auth_url(Common::$_qa_topic_view);
         $params = array(
            'access_token'=>$access_token,
            'id'=>$type
            );
         $result = HTTP_GET($url,$params);
         if($result['isSuccessful']){
             $tinfo = $result['data'];
         }
      }
      $obj->with("topic_info",$tinfo);
      $obj->with('navclass',"index");
    
   	return $obj;
   }
  

}