<?php
namespace pc\modules\huati\controllers;

use Yii;
use pc\common\controllers\BaseController;
use pc\modules\huati\models\QaTopic;
use pc\modules\huati\models\Qa;
use pc\common\models\User;
use pc\modules\huati\models\Follow;
use pc\modules\huati\widgets\WapItemWidget;
use yii\helpers\Json;
use pc\modules\huati\models\Favorite;

class IndexController extends BaseController
{
    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs['index'] = ['GET'];
        $verbs['view'] = ['GET'];
        return $verbs;
    }

    /**
     * pc首页
     * @return Ambigous <string, string>
     */
    public function actionIndex()
    {
        // Yii::$app->request->csrfParam .":". Yii::$app->request->getCsrfToken();
        $topic_type_list = QaTopic::getAllQaTopic();
        $topic_id = \Yii::$app->request->get("id") ? intval(\Yii::$app->request->get("id")) : 0;
        $top = Qa::getTopOne();
        $hot = Qa::getHotOne();
        $qa_record = new Qa();
        $totalCount = $qa_record->getAllQaCount($topic_id);
        $page = \Yii::$app->request->get("page") ?  \Yii::$app->request->get("page")  : 1;
        $offset = ($page -1 )*Yii::getAlias("@PageSize");
        $qa_list_data = $qa_record->getPageQa($offset,Yii::getAlias("@PageSize"), $topic_id);
        $current_topic = $this->getQaTypeByidInArrayList($topic_type_list, $topic_id);
        if(!$topic_id){
            $options = [
                'nourl'=>"/",
                'url'=>'/index',
                'suffix'=>".html"
            ];
            $seotitle = "话题_PUA追女生泡妞聊天话题库_第".$page."页-浪迹教育";
            $seodescriotion="浪迹教育话题中心致力于为广大兄弟情感答疑,无论您在追女生泡妞或是在和女生聊天过程中遇到任何问题,我们的PUA导师将为您一一解答.让你轻松告别单身,实现情感自由";
            $seokeyword ="追女生话题,PUA话题,把妹话题,泡妞话题";
        }else{
            $options = [
                'url'=>'/tag/'.$topic_id,
                'suffix'=>".html"
            ];

            $seotitle = $current_topic['name']."话题_".$current_topic['name']."问答-浪迹教育";
            $seodescriotion="浪迹教育话题中心为你提供各种".$current_topic['name']."话题，对于".$current_topic['name']."你有任何问题，在这里都可以得到PUA导师的最专业回答。";
            $seokeyword =$current_topic['name']."话题,".$current_topic['name']."问答,".$current_topic['name']."问题";
        }
        return $this->render('index', [
            'topic_type_list' => $topic_type_list,
            'top' => $top,
            'hot' => $hot,
            'qa_list_data' => $qa_list_data,
            'topic_id' => $topic_id,
            'current_topic' => $current_topic,
            'options'=>$options,
            'totalCount'=>$totalCount,
            'currentPage'=>$page,
            'seotitle'=>$seotitle,
            'seodescriotion'=>$seodescriotion,
            'seokeyword'=>$seokeyword,
            
        ]);
    }
    /**
     * 手机端首页
     * @return Ambigous <string, string>
     */
    public function actionIndex_m(){
        $topic_id = \Yii::$app->request->get("id") ? intval(\Yii::$app->request->get("id")) : 0;
        $qa_record = new Qa();
        $totalCount = $qa_record->getAllQaCount($topic_id);
        $page = \Yii::$app->request->get("page") ?  intval(\Yii::$app->request->get("page"))  : 1;
        $offset = ($page -1 )*Yii::getAlias("@PageSize");
        $qa_list_data = $qa_record->getPageQa($offset,Yii::getAlias("@PageSize"),$topic_id);
        $current_topic = QaTopic::getQaTopicInfoById($topic_id);
        $favorite_topic = array();
        if(!$topic_id){
            $options = [
                'nourl'=>"/",
                'url'=>'/index',
                'suffix'=>".html"
            ];
            $seotitle = "话题_PUA追女生泡妞聊天话题库_第".$page."页-浪迹教育";
            $seodescriotion="浪迹教育话题中心致力于为广大兄弟情感答疑,无论您在追女生泡妞或是在和女生聊天过程中遇到任何问题,我们的PUA导师将为您一一解答.让你轻松告别单身,实现情感自由";
            $seokeyword ="追女生话题,PUA话题,把妹话题,泡妞话题";
        }else{
            $options = [
                'url'=>'/tag/'.$topic_id,
                'suffix'=>".html"
            ];
            $favorite_topic = Favorite::getFavoriteTopicIds();
            $seotitle = $current_topic['name']."话题_".$current_topic['name']."问答_第".$page."页-浪迹教育";
            $seodescriotion="浪迹教育话题中心为你提供各种".$current_topic['name']."话题，对于".$current_topic['name']."你有任何问题，在这里都可以得到PUA导师的最专业回答。";
            $seokeyword =$current_topic['name']."话题,".$current_topic['name']."问答,".$current_topic['name']."问题";
        }
        $top = Qa::getTopOne($topic_id);
        $hot = Qa::getHotOne($topic_id);
        return $this->render('index_m', [
            'qa_list_data' => $qa_list_data,
            'current_topic' => $current_topic,
            'options'=>$options,
            'totalCount'=>$totalCount,
            'currentPage'=>$page,
            'seotitle'=>$seotitle,
            'seodescriotion'=>$seodescriotion,
            'seokeyword'=>$seokeyword,
            'top' => $top,
            'hot' => $hot,
            'favorite_topic'=>$favorite_topic
        ]);
    }
    /**
     * 手机端换一换
     */
    public function actionRand_m(){
        $res['status'] = false;
        if(\Yii::$app->request->isAjax){
            $qa_record = new Qa();
            $html = "";
            $qa_list_data = $qa_record->getPageQa(0,Yii::getAlias("@PageSize"),"","Rand()");
            if($qa_list_data){
                foreach ($qa_list_data as $c){
                  $html .= WapItemWidget::widget(['item'=>$c]);  
                }
            }
            if($html){
                $res['status'] = true;
                $res['message'] = $html;
            }
        }
        return  Json::encode($res);
    }
    
   
    
    /**
     * 手机端话题分类
     */
    public function actionTag_m(){
        $this->layout = 'wap';
        $topic_type_list = QaTopic::getAllQaTopic();
   
        return $this->render('tag_m',['topic_type_list'=>$topic_type_list]);
    }
    
    
    public function getQaTypeByidInArrayList($arr, $topic_id)
    {
        $data = array();
        if ($arr) {
            $question = 0;
            $answer = 0;
            $follow = 0;
            foreach ($arr as $v) {
                if ($v['id'] == $topic_id) {
                    $data = $v;
                }
                $question += $v['question'];
                $answer += $v['answer'];
                $follow += $v['follow'];
            }
            if (empty($data)) {
                $data = array(
                    'name' => Yii::t("TOPIC", "TOPIC_ALL"),
                    'question'=>$question,
                    'answer'=>$answer,
                    'follow'=>$follow,
                );
            }
        }
        return $data;
    }
    
    /**
     * 首页回答中的推荐和热门
     */
    public function actionDigest(){
        $digest = Qa::find()->where(['digest'=>1,'type'=>Qa::QA_TYPE,'display'=>Qa::STATUS_DISPLAY,'delete'=>Qa::STATUS_DELETE])->offset(0)->limit(20)->orderBy(['id'=>SORT_DESC])->all(); 
        $hot = Qa::find()->where(['hot'=>1,'type'=>Qa::QA_TYPE,'display'=>Qa::STATUS_DISPLAY,'delete'=>Qa::STATUS_DELETE])->offset(0)->limit(20)->orderBy(['id'=>SORT_DESC])->all();
        return $this->render('digest',[
            'digest'=>$digest,
            'hot'=>$hot
        ]);
    }
    /**
     *wap回答
     * @return Ambigous <string, string>
     */
    public function actionDigest_m(){
        $qa_record = new Qa();
        $digest = $qa_record->getQaList(['digest'=>1], 0, 20);
        $hot = $qa_record->getQaList(['hot'=>1], 0, 20); 
        return $this->render('digest_m',[
            'digest'=>$digest,
            'hot'=>$hot
        ]);
    }
    /**
     * 导师专栏
     */
    public function actionColumn(){
        $user_model = new User();
        $column = $user_model->getTeacherList();
        return $this->render('column',[
            'column'=>$column,
            'following'=>Follow::getFollowingIds()
        ]);
    }
    /**
     * wap导师
     */
    public function actionColumn_m(){
        $user_model = new User();
        $column = $user_model->getTeacherList();
 
        return $this->render('column_m',[
            'column'=>$column,
            'following'=>Follow::getFollowingIds()
        ]);
    }
}