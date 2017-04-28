<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use App\Common\Common;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer("main_nav",function($view){
            $username = '';
            $head = '';
            if($_SESSION){
                if(isset($_SESSION['userinfo'])){

                    $userinfo = $_SESSION['userinfo'];
                    $username = $userinfo['nickname'] ? $userinfo['nickname'] : $userinfo['mobile']; 
                    $head = $userinfo['avatarPath'];
                }   
           }
            $view->with('user',array('username'=>$username))->with('head',$head);
        });
        view()->composer("main_right",function($view){
            $data = array();
             if($_SESSION){
                if(isset($_SESSION['userinfo'])){
                    if(Cache::has("main_right")){
                        $data = Cache::get("main_right");
                    }else{
                        $access_token = $_SESSION['userinfo']['access_token'];
                        $url = Common::auth_url(Common::$_qa_list);
                        $params = array(
                        'page'=>1,
                        'type'=>1,
                        'pagesize'=>10,
                        'hot'=>1,
                        'access_token'=>$access_token
                        );
                        $list =  HTTP_GET($url,$params);
                        if($list['isSuccessful']){
                            $data= $list['data'];
                            Cache::add("main_right",$data,Common::$_cache_time);
                        }
                    }
                 
                }   
           }
            $view->with('rightlist',array('info'=>$data));
        });
         view()->composer("*",function($view){
            $info = array();
             if($_SESSION){
                if(isset($_SESSION['userinfo'])){
                   $info = $_SESSION['userinfo'];
                }
            }
           $view->with('baseinfo',$info);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
