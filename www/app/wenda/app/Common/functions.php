<?php
function HTTP_GET($url,$data= array()){
  if($data){
    $data = http_build_query($data,true);  
    $url .="?".$data;
  }

	$output = file_get_contents($url);
	return json_decode($output,true);
}
function HTTP_POST($url,$data){
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

function HTTP_POST_S($url,$data){
 $data = http_build_query($data,true);  
 $opts = array(  
   'http'=>array(  
     'method'=>"POST",  
     'header'=>"Content-type: multipart/form-data\r\n".  
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

function format_date($time,$f=false) {
    $nowtime = time();
    $difference = $nowtime - $time;
 
    switch ($difference) {
 
        case $difference <= '60' :
            $msg = '刚刚';
            break;
 
        case $difference > '60' && $difference <= '3600' :
            $msg = floor($difference / 60) . '分钟前';
            break;
 
        case $difference > '3600' && $difference <= '86400' :
            $msg = floor($difference / 3600) . '小时前';
            break;
 
        case $difference > '86400' && $difference <= '2592000' :
            $msg = floor($difference / 86400) . '天前';
            break;
 
        default:
          $msg = date("Y-m-d H:i",$time);
            break;
    }
  if($f){
    return $msg;
  }else{
    echo  $msg;
  }
    
}

function deal_page($count,$page,$pagesize = 15){
    $page_total = ceil($count / $pagesize);
    $data = array();
    
      if($page_total <= 5){
        for ($i=1; $i <=$page_total; $i++) { 
          $data[] = $i;
        
        }
      }else{
        if($page -2 <= 1){
          for ($i=1; $i <6; $i++) { 
            $data[] = $i;
          }
        }else if($page + 2 >= $page_total){
          for ($i=$page_total; $i > $page_total- 5; $i--) { 
           $data[] = $i;
          }
        }else{
          for ($i=$page-2; $i <=$page +2 ; $i++) { 
            $data[] = $i;
          }
        }
      }

      $res['pages'] = $data;
      $res['page_total'] = $page_total;
      return $res;
}

function format_html($content){
  $content = trim($content);
  $content = preg_replace("/".PHP_EOL."/","<br/>", $content);
  echo $content; 
}

function sub_html($content){
  $cache = substr($content, 3,4);
  echo str_replace($cache, "****", $content);
}

function format_contents($content){
  preg_match_all("/<img[^>]*\>/is",$content,$match);
 
  $styles = array();
  $images = array();
  if(isset($match) && $match[0]){
    $index = 1;
    foreach ($match[0] as $key => $value) {
      preg_match_all("/['|\"](\S+)(\s+)?['|\"]/", $value,$cache);
      if(isset($cache) && $cache[0]){
        $content = str_replace($value,"[图片]",$content);
        if(count($cache[0])  >= 4){
          $images[$index] = $cache[0][1];
          $styles[$index] = array(
            'height'=>$cache[0][2],
            'width'=>$cache[0][3]
            );
        }else{
          $images[$index] = $cache[0][0];
           $styles[$index] = array(
            'width'=>50,
            'height'=>50
            );
        }
        $index++;
      }
    }

  }
  $content = array(
    'content'=>$content,
    'images'=>$images,
    'styles'=>$styles
    );
  $content = json_encode($content);
  return $content;
}

function decode_content($content){
  if(!$ccontent = json_decode($content,true)){
    return $content;
  }
 
  $result = $ccontent['content'];
   if($ccontent['images']){
    $images = $ccontent['images'];
    $styles = $ccontent['styles'];
    $pattern = array();
    for ($i=0; $i <count($ccontent['images']) ; $i++) { 
     $pattern[] = "/\[图片\]/";
    }
     $real_image = array();
    foreach ($images as $key => $value) {
    
      $real_image[]='<img alt="" src='.$value.' width='.$styles[$key]['width'].' height='.$styles[$key]['height'].'>';
    }
    $result = preg_replace($pattern, $real_image, $result); 
  }
 

  return $result;
}
?>