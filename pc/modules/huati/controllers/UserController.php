<?php
namespace pc\modules\huati\controllers;
use pc\common\controllers\BaseController;
use pc\modules\huati\filter\LoginFilter;
use pc\modules\huati\models\Follow;
use yii\helpers\Json;
use pc\modules\huati\models\Favorite;
use pc\modules\huati\filter\UserFilter;
use pc\modules\huati\models\Qa;
use yii\data\Pagination;
use pc\modules\huati\widgets\UserItemWidget;
use pc\common\models\User;
use yii\web\NotFoundHttpException;
use yii\web\HttpException;
use yii\helpers\Url;
class UserController extends BaseController{
    public function behaviors(){
        $behavior = parent::behaviors();
        $behavior[]= ['class'=>LoginFilter::className(),
               'only'=>['following',"dfollow",'favorite','dfavorite','acare','unickname','tfavorite','dtfavorite']
            ];
        return $behavior;
    }
    
    public function verbs(){
        $verbs = parent::verbs();
        $verbs['dynamic']=['GET'];
        return $verbs;
    }
    /**
     * 关注
     */
    public function actionFollowing(){
        $res['status'] = false;
        if(\Yii::$app->request->isAjax){
            $rel_user_id = \Yii::$app->request->post('userid') ? intval(\Yii::$app->request->post('userid')) : 0;
            if($rel_user_id){
                $user_id = \Yii::$app->user->id;
                $follow_record = Follow::findOne(['user_id'=>$user_id,'rel_user_id'=>$rel_user_id]);
                if($follow_record){
                    $follow_record->delete = 0;
                }else{
                    $follow_record = new Follow();
                    $follow_record->user_id = $user_id;
                    $follow_record->rel_user_id = $rel_user_id;
                    $follow_record->add_time= time();
                }
                if($follow_record->save()){
                    $res['status'] = true;
                }
            }
        }
        echo Json::encode($res);exit();
    }
    /**
     * 取消关注用户
     */
    public function actionDfollow(){
        $res['status'] = false;
        if(\Yii::$app->request->isAjax){
            $rel_user_id = \Yii::$app->request->post('userid') ? intval(\Yii::$app->request->post('userid')) : 0;
            if($rel_user_id){
                $user_id = \Yii::$app->user->id;
                $follow_record = Follow::findOne(['user_id'=>$user_id,'rel_user_id'=>$rel_user_id]);
                if($follow_record){
                    $follow_record->delete = 1;
                    if($follow_record->save()){
                        $res['status'] = true;
                    }
                }
            }
        }
        echo Json::encode($res);exit();
    }
    /**
     * 收藏话题的问题、回答
     */
    public function actionFavorite(){
        $res['status'] = false;
        if(\Yii::$app->request->isAjax){
            $rel_id = \Yii::$app->request->post('rel_id') ? intval(\Yii::$app->request->post('rel_id')) : 0;
            if($rel_id){
                $user_id = \Yii::$app->user->id;
                $favorite_record = Favorite::findOne(['user_id'=>$user_id,'rel_id'=>$rel_id,'type'=>Favorite::FAVORITE_QA_TYPE]);
                if($favorite_record){
                    $favorite_record->delete= 0;
                }else{
                    $favorite_record = new Favorite();
                    $favorite_record->user_id = $user_id;
                    $favorite_record->rel_id = $rel_id;
                    $favorite_record->add_time= time();
                    $favorite_record->type=Favorite::FAVORITE_QA_TYPE;
                }
                if($favorite_record->save()){
                    $res['status'] = true;
                }
            }
        }
        echo Json::encode($res);exit();
    }
    
    public function actionDfavorite(){
        $res['status'] = false;
        if(\Yii::$app->request->isAjax){
            $rel_id = \Yii::$app->request->post('rel_id') ? intval(\Yii::$app->request->post('rel_id')) : 0;
            if($rel_id){
                $user_id = \Yii::$app->user->id;
                $favorite_record = Favorite::findOne(['user_id'=>$user_id,'rel_id'=>$rel_id,'type'=>Favorite::FAVORITE_QA_TYPE]);
                if($favorite_record){
                    $favorite_record->delete= 1;
                    if($favorite_record->save()){
                        $res['status'] = true;
                    }
                }
                
            }
        }
        echo Json::encode($res);exit();
    }
    /**
     * 关注话题
     */
    public function actionTfavorite(){
        $res['status'] = false;
        if(\Yii::$app->request->isAjax){
            $rel_id = \Yii::$app->request->post('rel_id') ? intval(\Yii::$app->request->post('rel_id')) : 0;
            if($rel_id){
                $user_id = \Yii::$app->user->id;
                $favorite_record = Favorite::findOne(['user_id'=>$user_id,'rel_id'=>$rel_id,'type'=>Favorite::FAVORITE_TOPIC_TYPE]);
                if($favorite_record){
                    $favorite_record->delete= 0;
                }else{
                    $favorite_record = new Favorite();
                    $favorite_record->user_id = $user_id;
                    $favorite_record->rel_id = $rel_id;
                    $favorite_record->add_time= time();
                    $favorite_record->type=Favorite::FAVORITE_TOPIC_TYPE;
                }
                if($favorite_record->save()){
                    $res['status'] = true;
                }
        
            }
        }
        return Json::encode($res);
    }
   /**
    * 取消关注话题
    */
    public function actionDtfavorite(){
        $res['status'] = false;
        if(\Yii::$app->request->isAjax){
            $rel_id = \Yii::$app->request->post('rel_id') ? intval(\Yii::$app->request->post('rel_id')) : 0;
            if($rel_id){
                $user_id = \Yii::$app->user->id;
                $favorite_record = Favorite::findOne(['user_id'=>$user_id,'rel_id'=>$rel_id,'type'=>Favorite::FAVORITE_TOPIC_TYPE]);
                if($favorite_record){
                    $favorite_record->delete= 1;
                    if($favorite_record->save()){
                        $res['status'] = true;
                    }
                }
    
            }
        }
        return Json::encode($res);
    }
    
    /**
     * 用户中心
     */
    public function actionDynamic(){
        $user_id = \Yii::$app->request->get('uid') ? intval(\Yii::$app->request->get('uid')) : \Yii::$app->user->id;
        $user_data = User::findOne(['id'=>$user_id]);
        if(!$user_data){
            throw new NotFoundHttpException();
        }
        $qa_model = new Qa();
        
        $totalCount = $qa_model->getAllCount($user_id);
        $page =  \Yii::$app->request->get('page') ? intval(\Yii::$app->request->get('page')) : 1;
        $offset = ($page - 1)*\Yii::getAlias("@PageSize");
        $qa_list_data = $qa_model->getAllPageByUserid($user_id,$offset ,\Yii::getAlias("@PageSize"));
       $options = [
           'url'=>"/".$user_id."/dynamic",
           'diff'=>'/',
           'suffix'=>".html"
       ];
       $seotitle = $user_data['nickname']."的个人中心_第".$page."页-浪迹教育";
       $seodescriotion= $user_data['nickname']."的个人中心";
       $seokeyword =$user_data['nickname']."的个人中心";
        return $this->render('dynamic',[
            'uid'=>$user_id,
            'data'=>$qa_list_data,
            'totalCount'=>$totalCount,
            'currentPage'=>$page,
            'options'=>$options,
            'seotitle'=>$seotitle,
            'seodescriotion'=>$seodescriotion,
            'seokeyword'=>$seokeyword
        ]);
    }
    
    /**
     * wap用户中心
     */
    public function actionCenter(){
        $this->layout = 'wap';
        if(!\Yii::$app->user->id){
           
            header('location:/huati/login/signin');
            exit();
        }
        $user_id =\Yii::$app->user->id;
        $user_model = new User();
        $user_data = $user_model->getUserInfoById($user_id);

        if(!$user_data){
            throw new NotFoundHttpException();
        }
        $seotitle = $user_data['nickname']."的个人中心-浪迹教育";
        $seodescriotion= $user_data['nickname']."的个人中心";
        $seokeyword =$user_data['nickname']."的个人中心";
        
        return $this->render('center',[
            'info'=>$user_data,
            'seotitle'=>$seotitle,
            'seodescriotion'=>$seodescriotion,
            'seokeyword'=>$seokeyword
        ]);
    }
    public function actionDynamic_m(){
        $user_id = \Yii::$app->request->get('uid') ? intval(\Yii::$app->request->get('uid')) : \Yii::$app->user->id;
        $user_data = User::findOne(['id'=>$user_id]);
        if(!$user_data){
            throw new NotFoundHttpException();
        }
        $qa_model = new Qa();
    
        $totalCount = $qa_model->getAllCount($user_id);
        $page =  \Yii::$app->request->get('page') ? intval(\Yii::$app->request->get('page')) : 1;
        $offset = ($page - 1)*\Yii::getAlias("@PageSize");
        $qa_list_data = $qa_model->getAllPageByUserid($user_id,$offset ,\Yii::getAlias("@PageSize"));
        $options = [
            'url'=>"/".$user_id."/dynamic",
            'diff'=>'/',
            'suffix'=>".html"
        ];
        $seotitle = $user_data['nickname']."的个人中心_第".$page."页-浪迹教育";
        $seodescriotion= $user_data['nickname']."的个人中心";
        $seokeyword =$user_data['nickname']."的个人中心";
        return $this->render('dynamic_m',[
            'uid'=>$user_id,
            'data'=>$qa_list_data,
            'totalCount'=>$totalCount,
            'currentPage'=>$page,
            'options'=>$options,
            'seotitle'=>$seotitle,
            'seodescriotion'=>$seodescriotion,
            'seokeyword'=>$seokeyword
        ]);
    }
    
    
    /**
     * 提问
     */
    public function actionQuestion(){
        $user_id = \Yii::$app->request->get('uid') ? intval(\Yii::$app->request->get('uid')) : \Yii::$app->user->id;
        $user_data = User::findOne(['id'=>$user_id]);
        if(!$user_data){
            throw new NotFoundHttpException();
        }
        $qa_model = new Qa();
  
        $totalCount = $qa_model->getAllCount($user_id,1);
        $page =  \Yii::$app->request->get('page') ? intval(\Yii::$app->request->get('page')) : 1;
        $offset = ($page - 1)*\Yii::getAlias("@PageSize");
        $qa_list_data = $qa_model->getAllPageByUserid($user_id,$offset, \Yii::getAlias("@PageSize"),1);
        $options = [
            'url'=>"/".$user_id."/ask",
            'diff'=>'/',
            'suffix'=>".html"
        ];
        $seotitle =$user_data['nickname']."的提问_第".$page."页-浪迹教育";
        $seodescriotion= $user_data['nickname']."的提问";
        $seokeyword =$user_data['nickname']."的提问";
        return $this->render('question',[
            'uid'=>$user_id,
            'data'=>$qa_list_data,
            'totalCount'=>$totalCount,
            'currentPage'=>$page,
            'options'=>$options,
            'seotitle'=>$seotitle,
            'seodescriotion'=>$seodescriotion,
            'seokeyword'=>$seokeyword
        ]);
    }
    
/**
     * 提问
     */
    public function actionQuestion_m(){
        $user_id = \Yii::$app->request->get('uid') ? intval(\Yii::$app->request->get('uid')) : \Yii::$app->user->id;
        $user_data = User::findOne(['id'=>$user_id]);
        if(!$user_data){
            throw new NotFoundHttpException();
        }
        $qa_model = new Qa();
  
        $totalCount = $qa_model->getAllCount($user_id,1);
        $page =  \Yii::$app->request->get('page') ? intval(\Yii::$app->request->get('page')) : 1;
        $offset = ($page - 1)*\Yii::getAlias("@PageSize");
        $qa_list_data = $qa_model->getAllPageByUserid($user_id,$offset, \Yii::getAlias("@PageSize"),1);
        $options = [
            'url'=>"/".$user_id."/ask",
            'diff'=>'/',
            'suffix'=>".html"
        ];
        $seotitle =$user_data['nickname']."的提问_第".$page."页-浪迹教育";
        $seodescriotion= $user_data['nickname']."的提问";
        $seokeyword =$user_data['nickname']."的提问";
        return $this->render('question_m',[
            'uid'=>$user_id,
            'data'=>$qa_list_data,
            'totalCount'=>$totalCount,
            'currentPage'=>$page,
            'options'=>$options,
            'seotitle'=>$seotitle,
            'seodescriotion'=>$seodescriotion,
            'seokeyword'=>$seokeyword
        ]);
    }
    
    public function actionAnswer(){
         $user_id = \Yii::$app->request->get('uid') ? intval(\Yii::$app->request->get('uid')) : \Yii::$app->user->id;
         $user_data = User::findOne(['id'=>$user_id]);
         if(!$user_data){
             throw new NotFoundHttpException();
         }
        $qa_model = new Qa();
   
        $totalCount = $qa_model->getAllCount($user_id,2);
        $page =  \Yii::$app->request->get('page') ? intval(\Yii::$app->request->get('page')) : 1;
        $offset = ($page - 1)*\Yii::getAlias("@PageSize");
        $qa_list_data = $qa_model->getAllPageByUserid($user_id,$offset,\Yii::getAlias("@PageSize"),2);
        $seotitle = $user_data['nickname']."的回答_第".$page."页-浪迹教育";
        $seodescriotion= $user_data['nickname']."的回答";
        $seokeyword =$user_data['nickname']."的回答";
        $favorite_record = new Favorite();
        $options = [
            'url'=>"/".$user_id."/cans",
            'diff'=>'/',
            'suffix'=>".html"
        ];
        return $this->render('answer',[
            'uid'=>$user_id,
            'data'=>$qa_list_data,
            'favorites'=>$favorite_record->getFavoritesByUid($user_id),
            'seotitle'=>$seotitle,
            'seodescriotion'=>$seodescriotion,
            'seokeyword'=>$seokeyword,
            'totalCount'=>$totalCount,
            'currentPage'=>$page,
            'options'=>$options,
        ]);
    }
   /**
    * wap回答
    * @throws NotFoundHttpException
    * @return Ambigous <string, string>
    */ 
    public function actionAnswer_m(){
        $user_id = \Yii::$app->request->get('uid') ? intval(\Yii::$app->request->get('uid')) : \Yii::$app->user->id;
        $user_data = User::findOne(['id'=>$user_id]);
        if(!$user_data){
            throw new NotFoundHttpException();
        }
        $qa_model = new Qa();
         
        $totalCount = $qa_model->getAllCount($user_id,2);
        $page =  \Yii::$app->request->get('page') ? intval(\Yii::$app->request->get('page')) : 1;
        $offset = ($page - 1)*\Yii::getAlias("@PageSize");
        $qa_list_data = $qa_model->getAllPageByUserid($user_id,$offset,\Yii::getAlias("@PageSize"),2);
        $seotitle = $user_data['nickname']."的回答_第".$page."页-浪迹教育";
        $seodescriotion= $user_data['nickname']."的回答";
        $seokeyword =$user_data['nickname']."的回答";
        $favorite_record = new Favorite();
        $options = [
            'url'=>"/".$user_id."/cans",
            'diff'=>'/',
            'suffix'=>".html"
        ];
        return $this->render('answer_m',[
            'uid'=>$user_id,
            'data'=>$qa_list_data,
            'favorites'=>$favorite_record->getFavoritesByUid($user_id),
            'seotitle'=>$seotitle,
            'seodescriotion'=>$seodescriotion,
            'seokeyword'=>$seokeyword,
            'totalCount'=>$totalCount,
            'currentPage'=>$page,
            'options'=>$options,
        ]);
    }
    
    
    //收藏
    public function actionCollect(){
        $user_id = \Yii::$app->request->get('uid') ? intval(\Yii::$app->request->get('uid')) : \Yii::$app->user->id;
        $user_data = User::findOne(['id'=>$user_id]);
        if(!$user_data){
            throw new NotFoundHttpException();
        }
        $favorite_record = new Favorite();
   
        $totalCount =count($favorite_record->getFavoritesByUid($user_id));
        $page =  \Yii::$app->request->get('page') ? intval(\Yii::$app->request->get('page')) : 1;
        $offset = ($page - 1)*\Yii::getAlias("@PageSize");
        $data = $favorite_record->getFavoritesPage($user_id,$offset,\Yii::getAlias("@PageSize"));
        $options = [
            'url'=>"/".$user_id."/col",
            'diff'=>'/',
            'suffix'=>".html"
        ];
        $seotitle = $user_data['nickname']."的收藏_第".$page."页-浪迹教育";
        $seodescriotion= $user_data['nickname']."的收藏";
        $seokeyword =$user_data['nickname']."的收藏";;
        return $this->render('collect',[
            'uid'=>$user_id,
            'data'=>$data,
            'seotitle'=>$seotitle,
            'seodescriotion'=>$seodescriotion,
            'seokeyword'=>$seokeyword,
            'totalCount'=>$totalCount,
            'currentPage'=>$page,
            'options'=>$options,
        ]);
    }
    
    /**
     * 我關注的問題
     */
    public function actionCollect_m(){
      $user_id = \Yii::$app->request->get('uid') ? intval(\Yii::$app->request->get('uid')) : \Yii::$app->user->id;
        $user_data = User::findOne(['id'=>$user_id]);
        if(!$user_data){
            throw new NotFoundHttpException();
        }
        $favorite_record = new Favorite();
        $totalCount =count($favorite_record->getFavoritesByUid($user_id));
        $page =  \Yii::$app->request->get('page') ? intval(\Yii::$app->request->get('page')) : 1;
        $offset = ($page - 1)*\Yii::getAlias("@PageSize");
        $data = $favorite_record->getFavoritesPage($user_id,$offset,\Yii::getAlias("@PageSize"));
        $options = [
            'url'=>"/".$user_id."/col",
            'diff'=>'/',
            'suffix'=>".html"
        ];
        $seotitle = $user_data['nickname']."的收藏_第".$page."页-浪迹教育";
        $seodescriotion= $user_data['nickname']."的收藏";
        $seokeyword =$user_data['nickname']."的收藏";
      
        return $this->render('collect_m',[
            'uid'=>$user_id,
            'data'=>$data,
            'seotitle'=>$seotitle,
            'seodescriotion'=>$seodescriotion,
            'seokeyword'=>$seokeyword,
            'totalCount'=>$totalCount,
            'currentPage'=>$page,
            'options'=>$options,
        ]);
    }
    
    /**
     * wap关注话题
     */
    public function actionCtopic(){
        $this->layout = 'wap';
        $user_id = \Yii::$app->request->get('uid') ? intval(\Yii::$app->request->get('uid')) : \Yii::$app->user->id;
        $user_data = User::findOne(['id'=>$user_id]);
        if(!$user_data){
            throw new NotFoundHttpException();
        }
        $favorite_record = new Favorite();
        $totalCount =count($favorite_record->getFavoritesTopicByUid($user_id));
        $page =  \Yii::$app->request->get('page') ? intval(\Yii::$app->request->get('page')) : 1;
        $offset = ($page - 1)*\Yii::getAlias("@PageSize");
        $data = $favorite_record->getFavoritesTopicPage($user_id,$offset,\Yii::getAlias("@PageSize"));
        $options = [
            'url'=>"/".$user_id."/ctopic",
            'diff'=>'/',
            'suffix'=>".html"
        ];
        $seotitle = $user_data['nickname']."的收藏_第".$page."页-浪迹教育";
        $seodescriotion= $user_data['nickname']."的收藏";
        $seokeyword =$user_data['nickname']."的收藏";

       
        return $this->render('ctopic',[
            'uid'=>$user_id,
            'data'=>$data,
            'seotitle'=>$seotitle,
            'seodescriotion'=>$seodescriotion,
            'seokeyword'=>$seokeyword,
            'totalCount'=>$totalCount,
            'currentPage'=>$page,
            'options'=>$options,
        ]);
       
    }
    /**
     * wap关注的用户
     */
    public function actionCuser(){
        $this->layout = 'wap';
        $user_id = \Yii::$app->request->get('uid') ? intval(\Yii::$app->request->get('uid')) : \Yii::$app->user->id;
         $follow_model = new Follow();
        $page =  \Yii::$app->request->get('page') ? intval(\Yii::$app->request->get('page')) : 1;
        $totalCount =$follow_model->getFollowingCount();
        $offset = ($page - 1)*\Yii::getAlias("@PageSize");
        $care_me = $follow_model->getFollowingList($offset,\Yii::getAlias("@PageSize"));
        $seotitle = "我关注的用户-浪迹教育";
        $seodescriotion= "我关注的用户";
        $seokeyword = "我关注的用户";
        $options = [
            'url'=>"/".$user_id."/cuser",
            'diff'=>'/',
            'suffix'=>".html"
        ];
        return $this->render('cuser',[
            'uid'=>$user_id,
            'care_me'=>$care_me,
            'totalCount'=>$totalCount,
            'currentPage'=>$page,
            'options'=>$options,
            'seotitle'=>$seotitle,
            'seodescriotion'=>$seodescriotion,
            'seokeyword'=>$seokeyword,
        ]);
    }
    
    //关注
    public function actionCare(){
        $user_id = \Yii::$app->request->get('uid') ? intval(\Yii::$app->request->get('uid')) : \Yii::$app->user->id;
        $follow_model = new Follow();
        $me_care = $follow_model->getFollowingList(0,\Yii::getAlias("@PageSize"));
        $care_me = $follow_model->getFollowingList(0,\Yii::getAlias("@PageSize"),true);
        $seotitle = "我的关注-浪迹教育";
        $seodescriotion= "我的关注";
        $seokeyword = "我的关注";;
        return $this->render('care',[
                'uid'=>$user_id,
                'me_care'=>$me_care,
                'care_me'=>$care_me,
                'seotitle'=>$seotitle,
                'seodescriotion'=>$seodescriotion,
                'seokeyword'=>$seokeyword,
            ]);
    }
    
    
    /**
     * wap我的粉絲
     * @return Ambigous <string, string>
     */
    public function actionCare_m(){
        $user_id = \Yii::$app->request->get('uid') ? intval(\Yii::$app->request->get('uid')) : \Yii::$app->user->id;
        $follow_model = new Follow();
        $page =  \Yii::$app->request->get('page') ? intval(\Yii::$app->request->get('page')) : 1;
        $totalCount =$follow_model->getFollowingCount(true);
        $offset = ($page - 1)*\Yii::getAlias("@PageSize");
        $care_me = $follow_model->getFollowingList($offset,\Yii::getAlias("@PageSize"),true);
        $seotitle = "我的粉丝-浪迹教育";
        $seodescriotion= "我的粉丝";
        $seokeyword = "我的粉丝";
        $options = [
            'url'=>"/".$user_id."/careuser",
            'diff'=>'/',
            'suffix'=>".html"
        ];
        return $this->render('care_m',[
            'uid'=>$user_id,
            'care_me'=>$care_me,
            'totalCount'=>$totalCount,
            'currentPage'=>$page,
            'options'=>$options,
            'seotitle'=>$seotitle,
            'seodescriotion'=>$seodescriotion,
            'seokeyword'=>$seokeyword,
        ]);
    }
    
    
    public function actionAcare(){
        $res['status'] = false;
        if(\Yii::$app->request->isAjax){
            $type = \Yii::$app->request->post('type') ? \Yii::$app->request->post('type') : "";
            $page = \Yii::$app->request->post('page') ? intval(\Yii::$app->request->post('page')) : 0;
            $offset = $page*\Yii::getAlias("@PageSize");
            $data = array();
            $follow_model = new Follow();
            switch ($type) {
                case 'cm':
                   $data = $follow_model->getFollowingList($offset,\Yii::getAlias("@PageSize"),true);
                    break;
                default:
                   $data = $follow_model->getFollowingList($offset,\Yii::getAlias("@PageSize"));
                    break;
            }
            if($data){
                $html = "";
                foreach ($data as $key => $value) {
                    if($type == "cm"){
                        $html .= UserItemWidget::widget(['uid'=>$value['user_id']]);
                    }else{
                        $html .= UserItemWidget::widget([
                            'uid' => $value['rel_user_id']
                        ]);
                    }
                }
                $res['status'] = true;
                $res['message'] = $html;
            } else {
                $res['message'] = 'no_message';
            }
        }
        echo Json::encode($res);
        exit();
    }
  
    
    // 设置
    public function actionSetting()
    {
        $uid = \Yii::$app->user->id;
        $user_record = new User();
        $user_info = $user_record->getUserInfoById($uid);
       if(!$user_info){
           throw  new NotFoundHttpException();
       }elseif($user_info['delete']){
           throw new HttpException('202','已被删除');
       }else if(!$user_info['display']){
           throw new HttpException('202','用户不用见');
       }

        return $this->render('setting',[
            'user_info'=>$user_info
        ]);
    }
    /**
     * wap
     * @throws NotFoundHttpException
     * @throws HttpException
     * @return Ambigous <string, string>
     */
    public function actionSetting_m(){
        return $this->render('setting_m');
    }
    /**
     * 個人信息
     */
    public function actionPinformation(){
        $this->layout='wap';
        $uid = \Yii::$app->user->id;
        $user_record = new User();
        $user_info = $user_record->getUserInfoById($uid);
        if(!$user_info){
            throw  new NotFoundHttpException();
        }elseif($user_info['delete']){
            throw new HttpException('202','已被删除');
        }else if(!$user_info['display']){
            throw new HttpException('202','用户不用见');
        }
        $message = "";
        if(\Yii::$app->request->isPost){
            $nickname = \Yii::$app->request->post('nickname') ? addslashes(trim(\Yii::$app->request->post('nickname'))) : "";
            $weixin = \Yii::$app->request->post('weixin') ? addslashes(trim(\Yii::$app->request->post('weixin'))) : "";
            if($nickname && $weixin){
                $user_info_model = User::findOne(['id'=>\Yii::$app->user->id]);
                $user_info_model->nickname = $nickname;
                $user_info_model->weixin = $weixin;
                if(!$user_info_model->update()){
                }else{
                    $user_info['nickname']= $nickname;
                    $user_info['weixin']= $weixin;
                }
            }else{
                $message = \Yii::t("COMMON", "REQUIRED");
            }
        }
        if($message){
            $message = "<font style='color:red'>".$message."</font>";
        }
        
        return $this->render('pinformation',[
            'user_info'=>$user_info,
            'message'=>$message
           
        ]);
    }
    /**
     * wap修改密码
     */
    public function actionUpasswd(){
        $this->layout = 'wap';
        $message = "";
        $uid = \Yii::$app->user->id;
        $user_record = new User();
        $user_info = $user_record->getUserInfoById($uid);
        if(!$user_info){
            throw  new NotFoundHttpException();
        }elseif($user_info['delete']){
            throw new HttpException('202','已被删除');
        }else if(!$user_info['display']){
            throw new HttpException('202','用户不用见');
        }
        $message = "";
        if(\Yii::$app->request->isPost){
           $password =  \Yii::$app->request->post('password') ? addslashes(trim(\Yii::$app->request->post('password'))) : "";
           $repassword =  \Yii::$app->request->post('repassword') ? addslashes(trim(\Yii::$app->request->post('repassword'))) : "";
            if($password){
                if($password == $repassword){
                    if(strlen($password) >= 6 && strlen($password) <= 20){
                        $user_info_model = User::findOne(['id'=>\Yii::$app->user->id]);
                        $password =  \Yii::$app->security->generatePasswordHash($password);
                        $user_info_model->password_hash = $password;
                        if($user_info_model->update()){
                            $this->redirect('/huati/user/setting');
                        }
                    }else{
                        $message=\Yii::t("COMMON", "PASSWORD_LENGTH");
                    }
                }else{
                    $message = \Yii::t("COMMON", "PASSWORD_NEQ_REPASSWORD");
                }
                
            }else{
                $message = \Yii::t("COMMON", "REQUIRED");
            }
        }
        if($message){
            $message = "<font style='color:red'>".$message."</font>";
        }
        return $this->render('upasswd',[
            'message'=>$message
        ]);
    }
    /**
     * 修改用戶名
     */
    public function actionUnickname(){
        $res['status'] = false;
        if(\Yii::$app->request->isAjax){
            $nickname = \Yii::$app->request->post('nickname') ? addslashes(trim(\Yii::$app->request->post('nickname'))) : "";
            $weixin = \Yii::$app->request->post('weixin') ? addslashes(trim(\Yii::$app->request->post('weixin'))) : "";
            $password =  \Yii::$app->request->post('password') ? addslashes(trim(\Yii::$app->request->post('password'))) : "";
            $type = \Yii::$app->request->post('type') ? intval(\Yii::$app->request->post('type')) : 0;
            if(in_array($type,array(1,2,3))){
                $user_info = User::findOne(['id'=>\Yii::$app->user->id]);
                if($user_info){
                    $open =false;
                    if($nickname){
                        $user_info->nickname = $nickname;
                        $open= true;
                    }
                    if($weixin){
                        $user_info->weixin = $weixin;
                        $open= true;
                    }
                    if($password && strlen($password) >= 6){
                       $password =  \Yii::$app->security->generatePasswordHash($password);
                       $user_info->password_hash = $password;
                       $open= true;
                    }
                    if($open && $user_info->update()){
                        $res['status'] = true;
                    }
                }
            }
        }
        
        echo Json::encode($res);
        exit();
            
    }
    
    
}