<?php
namespace pc\config;
class CommonUrl{
    const THIRD_PARTY_HOST ="http://app.puamap.com/api/v2/";
    //上传头像
    public static function getUpdateAvatar(){
        return self::THIRD_PARTY_HOST."user/updateAvatar";
    }
    //获取验证码
    public static function getVerifyCodeUrl(){
        return self::THIRD_PARTY_HOST."auth/sendVerifyCode";
    }
    //获取注册UIR
    public static function getSignUpUrl(){
        return self::THIRD_PARTY_HOST."auth/signup";
    }
    
    public static function uploadImage(){
        return self::THIRD_PARTY_HOST."attach/upload";
    }
    

    
    
}