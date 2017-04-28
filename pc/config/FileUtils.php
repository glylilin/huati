<?php
namespace pc\config;
use Yii;
class FileUtils{
    public $_name;
    public static function getFilePath($fileType,$modules,$filename){
        $path = '';
        $fileType = strtoupper($fileType);
        switch ($fileType){
            case "IMAGES":
                $path = self::getImagePath($modules, $filename);
                break;
            case "CSS":
                $path = self::getCssPath($modules, $filename);
                break;
            case "JS":
                $path = self::getJsPath($modules, $filename);
                break;
        }

       return $path;
    }
    public static function getImagePath($modules,$filename){
         return "/static/".$modules."/images/".$filename;
    }
    public static function getCssPath($modules,$filename){
        return "/static/".$modules."/css/".$filename;
    }
    public static function getJsPath($modules,$filename){
        return "/static/".$modules."/js/".$filename;
    }
    /**
     * wap公共的样式
     * @param unknown $fileType
     * @param unknown $filename
     * @return string
     */
    public static function getWapCommonFilePath($fileType,$filename){
        $path = '';
        $fileType = strtoupper($fileType);
        switch ($fileType){
            case "IMAGES":
                $path = self::getWapCommonImagePath($filename);
                break;
            case "CSS":
                $path = self::getWapCommonCssPath($filename);
                break;
            case "JS":
                $path = self::getWapCommonJsPath($filename);
                break;
        }
        
        return $path;
    }
    
    public static function getWapCommonImagePath($filename){
        return "/static/wap/img/".$filename;
    }
    public static function getWapCommonCssPath($filename){
        return "/static/wap/css/".$filename;
    }
    public static function getWapCommonJsPath($filename){
        return "/static/wap/js/".$filename;
    }
    /**
     * wap的各自的样式
     * @param unknown $fileType
     * @param unknown $modules
     * @param unknown $filename
     * @return string
     */
    public static function getWapFilePath($fileType,$modules,$filename){
        $path = '';
        $fileType = strtoupper($fileType);
        switch ($fileType){
            case "IMAGES":
                $path = self::getWapImagePath($modules, $filename);
                break;
            case "CSS":
                $path = self::getWapImagePath($modules, $filename);
                break;
            case "JS":
                $path = self::getWapJsPath($modules, $filename);
                break;
        }
    
        return $path;
    }
    public static function getWapImagePath($modules,$filename){
        return "/static/".$modules."/wap/img/".$filename;
    }
    public static function getWapCssPath($modules,$filename){
        return "/static/".$modules."/wap/css/".$filename;
    }
    public static function getWapJsPath($modules,$filename){
        return "/static/".$modules."/wap/js/".$filename;
    }
}