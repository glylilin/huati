<?php
namespace pc\modules\huati\controllers;
use Yii;
use pc\common\controllers\BaseController;
use pc\modules\huati\models\QaTopic;
use pc\modules\huati\models\Qa;
use yii\db\Expression;
use yii\helpers\Json;
class ThirdController extends BaseController
{
    public function actionType(){
        $topic_type_list = QaTopic::getAllQaTopic();
        echo Json::encode($topic_type_list);
        exit();
    }
    
    public function actionList(){
       $id =  \Yii::$app->request->get("id") ? intval( \Yii::$app->request->get("id")) : 0;
       $condition = Qa::getBaseWhere();
       $condition['type'] = 1;
       
       $query = Qa::find();
       $query->where($condition);
       if($id){
         $query->andWhere(new Expression('FIND_IN_SET(:topic_ids, topic_ids)'));
         $query->addParams([":topic_ids"=>$id]);
        }
      $data  = $query->select(['id'])->orderBy(['id'=>SORT_DESC])->limit(50)->offset(0)->asArray()->all();
      echo Json::encode($data);
      exit();
    }
    
    
    public function actionInfo(){
        $id =  \Yii::$app->request->get("id") ? intval(\Yii::$app->request->get("id")) : 0;
        $condition = Qa::getBaseWhere();
        $condition['type'] = 1;
        $condition['id'] = $id;
        $query = Qa::find();
        $data = $query->where($condition)->select(['title','content','view','answer','id'])->asArray()->one();
        echo Json::encode($data);
        exit();
    }
	public function actionMap(){
$xml =<<<LABEL
<?xml version="1.0" encoding="UTF-8" ?> 
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:mobile="http://www.baidu.com/schemas/sitemap-mobile/1/"> 
LABEL;
$content =PHP_EOL."<url>".PHP_EOL;
$content .="<loc>http://huati.puamap.com</loc>".PHP_EOL;
$content .="<lastmod>".date("Y-m-d")."</lastmod>".PHP_EOL;
$content .="<changefreq>daily</changefreq>".PHP_EOL;
$content .="<priority>1.0</priority>".PHP_EOL;
$content .="</url>".PHP_EOL;
$query = Qa::find();
$condition = Qa::getBaseWhere();
$condition['type'] = 1;
$query->where($condition);
$data  = $query->select(['id'])->orderBy(['id'=>SORT_DESC])->limit(1000)->offset(0)->asArray()->all();
if($data){
    foreach ($data as $v){
        $content .="<url>".PHP_EOL;
        $content .="<loc>http://huati.puamap.com/info/".$v['id'].".html</loc>".PHP_EOL;
        $content .='<mobile:mobile type="pc,mobile"/>'.PHP_EOL;
        $content .='<changefreq>daily</changefreq>'.PHP_EOL;
        $content .='<priority>0.8</priority>'.PHP_EOL;
        $content .='</url>'.PHP_EOL;
    }
}
$xml .=$content;
$xml .="</urlset>";
file_put_contents('sitemap.xml',$xml);
chmod('sitemap.xml',0755);
return "success";
}
}