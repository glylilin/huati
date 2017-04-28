<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Common\Common;
use App\Common\Lang;
use Illuminate\Support\Facades\Session;
/**
*登录接口
**/
class TestController extends Controller{
	public function index(){
		return view("test/index");
	}
	public function index2(){
		return view("test/index2");
	}
	public function upload(){
		$res['success'] = false;
		if($_FILES){
			$file_data = $_FILES;
			$filePath  = "uploads/".date("Ymd");
			if(!file_exists($filePath)){
				mkdir($filePath,0755);
			}
			if($file_data['fileData']['size'] > 1024*1024*2){
				$res['message'] = '图片过大';
			}elseif (!in_array($file_data['fileData']['type'], array("image/jpeg","image/png"))) {
				$res['message'] = '类型不对';
			}else{
				$filename = "";
				switch ($file_data['fileData']['type']) {
					case 'image/jpeg':
						$filename = time().".jpg";
						break;
					default:
						$filename = time().".png";
						break;
				}
				$real_path = $filePath."/".$filename;
				
				if(is_uploaded_file($_FILES['fileData']['tmp_name'])){
					move_uploaded_file($_FILES['fileData']['tmp_name'],$real_path);
					$res['success'] = true;
					$res['file_path'] = "http://".$_SERVER["HTTP_HOST"]."/".$real_path;
				}else{
					$res['message'] = '上传失败';
				}

			}
			
		}
		echo json_encode($res);
		exit();
	}
}