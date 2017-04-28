<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Common\Common;
use App\Common\Lang;
use Illuminate\Support\Facades\Session;
class AnswerController extends ParentController
{	
	public function index(){
		//推荐
		$access_token = $_SESSION['userinfo']['access_token'];
		
		$orderArray="['sort']";
		$sortArray ="['desc']";
		$data = array(
			'type'=>1,
			"expand"=>"",
			'order'=>$orderArray,
			'sort'=>$sortArray,
			'digest'=>1,
			'page'=>1,
			"pageSize"=>Common::$_pagesize,
			'access_token'=>$access_token
			);
		$url = Common::auth_url(Common::$_qa_list);
		$list = HTTP_GET($url,$data);
		$remend = array();
		if($list['isSuccessful']){
			$remend = $list['data'];
		}
	
		//最热
		$orderArray="['hot']";
		$sortArray ="['desc']";
		$data = array(
			'type'=>1,
			"expand"=>"",
			'order'=>$orderArray,
			'sort'=>$sortArray,
			'hot'=>1,
			'page'=>1,
			"pageSize"=>Common::$_pagesize,
			'access_token'=>$access_token
			);
		$url = Common::auth_url(Common::$_qa_list);
		$list = HTTP_GET($url,$data);
		$hot = array();
		if($list['isSuccessful']){
			$hot = $list['data'];
		}
		$obj = view("answer/index");
		$obj->with('remend',$remend);
		$obj->with("hot",$hot);
		$obj->with('navclass',"wd");
		return $obj;
	}

}