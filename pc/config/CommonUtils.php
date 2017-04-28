<?php
namespace pc\config;

use yii\helpers\Json;
use yii\helpers\VarDumper;
class CommonUtils{
    static $static_host ="http://static.puamap.com/upload";
    static $_width = 120;
    public static function format_phone($phone){
        $replace =  substr($phone,3,4);
        return str_replace($replace,"****",$phone);
    }
    
    public static function format_simple_content($content){
        $content = strip_tags($content);
        $content = str_replace("[图片]","",$content);
        $content = preg_replace("/".PHP_EOL."/","",$content);
        return $content;
    }
    
    public static function format_first_image_json($json){
        if(!$json){
            return '';   
        }
       // $json = Json::decode($json,true);
	   $json = json_decode($json,true);
	
        $image_path ='';
       
        if($json && isset($json['images']) && $json['images']){
            $image_path = "http://static.puamap.com/upload/".$json['images'][0]['image_path'];
        }
       
        return $image_path;
    }

    //格式化有圖片的文件内容
    public static  function  formatJsonHtml($content,$json=''){
        $content = preg_replace("/".PHP_EOL."/","<br/>",$content);
        if(!$json){
            return $content;
        }
        $json = json_decode($json,true);
        $result =$content;
        if($json['images']){
            $images = $json['images'];
            $styles = isset($json['styles']) ? $json['styles'] : array();
            $pattern = array();
            for ($i=0; $i <count($images) ; $i++) {
                $pattern[] = "/\[图片\]/";
            }
         
            $real_image = array();
            foreach ($images as $key => $value) {
				
				$value['image_path'] = "http://static.puamap.com/upload/".$value['image_path'];
                if($styles){
                    $real_image[] ='<img alt="" originalSrc="'.$value['image_path'].'" width="'.$styles[$key]['width'].'" height="'.$styles[$key]['height'].'" info="'.$styles[$key]['id']."_".$styles[$key]['width']."_".$styles[$key]['height'].'" id="'.$styles[$key]['id'].'" class="lazy"><br/>';
                }else{
                    $timg = getimagesize($value['image_path']);
                    $width = $timg[0] > 600 ?  600 : $timg[0];
                    $height = $timg[1] * $width /$timg[0];
                    $real_image[]='<img alt="" originalSrc="'.$value['image_path'].'" width="'.$width.'" height="'.$height.'" info="'.$value['image_id'].'"_"'.$width.'"_"'.$height.'" id="'.$value['image_id'].'" class="lazy"><br/>';
                }
        
            }      
           
            $result = preg_replace($pattern, $real_image, $result,1);
        }
       
        return $result;
    }
    
    public static  function  editformatJsonHtml($content,$json=''){
        $content = preg_replace("/".PHP_EOL."/","<br/>",$content);
        if(!$json){
            return $content;
        }
        $json = json_decode($json,true);
        $result =$content;
        if($json['images']){
            $images = $json['images'];
            $styles = isset($json['styles']) ? $json['styles'] : array();
            $pattern = array();
            for ($i=0; $i <count($images) ; $i++) {
                $pattern[] = "/\[图片\]/";
            }
             
            $real_image = array();
            foreach ($images as $key => $value) {
                if($styles){
                     
                    $real_image[] ='<img alt="" src="'.$value['image_path'].'" width="'.$styles[$key]['width'].'" height="'.$styles[$key]['height'].'" info="'.$styles[$key]['id']."_".$styles[$key]['width']."_".$styles[$key]['height'].'" id="'.$styles[$key]['id'].'" class="lazy"><br/>';
    
                }else{
                    $timg = getimagesize($value['image_path']);
                    $width = $timg[0] > 600 ?  600 : $timg[0];
                    $height = $timg[1] * $width /$timg[0];
                    $real_image[]='<img alt="" src="'.$value['image_path'].'" width="'.$width.'" height="'.$height.'" info="'.$value['image_id'].'"_"'.$width.'"_"'.$height.'" id="'.$value['image_id'].'" class="lazy"><br/>';
                }
    
            }
             
            $result = preg_replace($pattern, $real_image, $result,1);
        }
         
        return $result;
    }
    /**
     * 将html内容转换json
     * @param unknown $content
     */
    public static function formatHtmlJson($content){
        preg_match_all("/<img[^>]*\>/is",$content,$match);
        $styles = array();
        $images = array();
        if(isset($match) && $match[0]){
            foreach ($match[0] as $key => $value) {
                preg_match_all("/src=['|\"](\S+)(\s+)?['|\"]/", $value,$cache_img);
                preg_match_all("/info=['|\"](\S+)(\s+)?['|\"]/",$value,$cache_info);
        
                if (isset($cache_info) && $cache_info[1][0]){
                    $info_cache = explode("_",$cache_info[1][0]);
                    $styles[] = array(
                        'id'=>$info_cache[0],
                        'width'=>$info_cache[1],
                        'height'=>$info_cache[2]
                    );
                    $images[] =array(
                        'image_id'=>$info_cache[0],
                        'image_path'=>str_replace("http://static.puamap.com/upload","", $cache_img[1][0])
                    );
                    $content = str_replace($value,"[图片]",$content);
                }else{
                    $content = str_replace($value,"",$content);
                }
            }
        }
        $temp = array(
            'images'=>$images,
            'styles'=>$styles
        );
        
        $temp = json_encode($temp,true);
        $result = array(
            'content'=>$content,
            'json'=>$temp
        );
        return $result;
    }
    
    /**
     * 格式化时间
     */
    public static function formatDate($time){
        return date("Y-m-d H:i:s",$time);
    } 
    
    public static function mbsubstr($str, $start=0, $length=120, $charset="utf-8", $suffix=false){
        if(function_exists("mb_substr")){
            if($suffix)
                return mb_substr($str, $start, $length, $charset)."...";
            else
                return mb_substr($str, $start, $length, $charset);
        }elseif(function_exists('iconv_substr')) {
            if($suffix)
                return iconv_substr($str,$start,$length,$charset)."...";
            else
                return iconv_substr($str,$start,$length,$charset);
        }
        $re['utf-8'] = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef][x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";
        $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";
        $re['gbk'] = "/[x01-x7f]|[x81-xfe][x40-xfe]/";
        $re['big5'] = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("",array_slice($match[0], $start, $length));
        if($suffix) return $slice."…";
        return $slice;
    }

    public static function format_add_time($time)
    {
        $nowtime = time();
        $difference = $nowtime - $time;
        
        switch ($difference) {
            
            case $difference <= '60':
                $msg = '刚刚';
                break;
            
            case $difference > '60' && $difference <= '3600':
                $msg = floor($difference / 60) . '分钟前';
                break;
            
            case $difference > '3600' && $difference <= '86400':
                $msg = floor($difference / 3600) . '小时前';
                break;
            
            case $difference > '86400' && $difference <= '2592000':
                $msg = floor($difference / 86400) . '天前';
                break;
            
            default:
                $msg = date("Y-m-d H:i", $time);
                break;
        }
        
        return $msg;
    }
    
   public static function mkdirs($dir){
       return is_dir($dir) or self::mkdirs(dirname($dir)) and mkdir($dir,0777);
   }  
   
   public static function HTTP_POST($url,$data){
       $data = http_build_query($data,true);
       $opts = array(
           'http'=>array(
               'method'=>"POST",
               'header'=>"Content-type: application/x-www-form-urlencoded\r\n".
               "Content-length:".strlen($data)."\r\n" .
               "Cookie: foo=bar\r\n" .
               "\r\n",
               'content' => $data,
           )
       );
       $cxContext = stream_context_create($opts);
       $output = file_get_contents($url, false, $cxContext);
       return json_decode($output,true);
   }
   
   
   public static function isMobile(){
       $user_agent = \Yii::$app->request->userAgent;
       $mobile_agents = Array("240x320","acer","acoon","acs-","abacho","ahong","airness","alcatel","amoi","android","anywhereyougo.com","applewebkit/525","applewebkit/532","asus","audio","au-mic","avantogo","becker","benq","bilbo","bird","blackberry","blazer","bleu","cdm-","compal","coolpad","danger","dbtel","dopod","elaine","eric","etouch","fly ","fly_","fly-","go.web","goodaccess","gradiente","grundig","haier","hedy","hitachi","htc","huawei","hutchison","inno","ipaq","ipod","jbrowser","kddi","kgt","kwc","lenovo","lg ","lg2","lg3","lg4","lg5","lg7","lg8","lg9","lg-","lge-","lge9","longcos","maemo","mercator","meridian","micromax","midp","mini","mitsu","mmm","mmp","mobi","mot-","moto","nec-","netfront","newgen","nexian","nf-browser","nintendo","nitro","nokia","nook","novarra","obigo","palm","panasonic","pantech","philips","phone","pg-","playstation","pocket","pt-","qc-","qtek","rover","sagem","sama","samu","sanyo","samsung","sch-","scooter","sec-","sendo","sgh-","sharp","siemens","sie-","softbank","sony","spice","sprint","spv","symbian","tablet","talkabout","tcl-","teleca","telit","tianyu","tim-","toshiba","tsm","up.browser","utec","utstar","verykool","virgin","vk-","voda","voxtel","vx","wap","wellco","wig browser","wii","windows ce","wireless","xda","xde","zte");
       $is_mobile =  false;
       foreach ($mobile_agents as $device) {
           if (stristr($user_agent, $device)) {
               $is_mobile = true;
               break;
           }
       }
       return $is_mobile;
   }
}
