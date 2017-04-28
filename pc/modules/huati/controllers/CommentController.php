<?php
namespace pc\modules\huati\controllers;
use pc\common\controllers\BaseController;
use pc\modules\huati\models\Comment;
use yii\data\Pagination;
use pc\modules\huati\filter\LoginFilter;
use pc\common\models\User;
use pc\modules\huati\widgets\CommentItemWidget;
use yii\helpers\Json;
use pc\modules\huati\models\Qa;
use yii\helpers\VarDumper;
use pc\modules\huati\widgets\CommentWapItemWidget;
class CommentController extends BaseController{
    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs['index'] = ['POST'];
        $verbs['add'] = ['POST'];
        return $verbs;
    }
    public  function  behaviors(){
        $behaviors = parent::behaviors();
        $behaviors[] = ['class' => LoginFilter::className(),'only'=>['add','qdd','delete','like'] ];
        return $behaviors;
    }
    public  function actionIndex(){
        $data  = array();
        $pagination = array();
        if(\Yii::$app->request->isAjax){
            $id = \Yii::$app->request->post("id");
            $page = \Yii::$app->request->post("page") ? \Yii::$app->request->post("page")  : 1;
            $comment_model = new Comment();
            $pagination = new Pagination([
                'defaultPageSize'=>\Yii::getAlias("@PageSize"),
                'totalCount'=> $comment_model->getQaCommentCountById($id)
            ]);
            $totalCount = $comment_model->getQaCommentCountById($id);
            $offset = ($page-1) * \Yii::getAlias("@PageSize");
            $data = $comment_model->getPageQaComment($id, $offset, \Yii::getAlias("@PageSize"));
        }
        $this->layout= false;
        $pagination->setPage($page);
        return $this->render('index',[
            'data'=>$data,
            'id'=>$id,
            'totalCount'=>$totalCount,
            'currentPage'=>$page
        ]);
    }
    /**
     * wap版评论信息
     */
    public function actionIndex_m(){
        $data  = array();
        if(\Yii::$app->request->isAjax){
            $id = \Yii::$app->request->post("id");
            $comment_model = new Comment();
            $data = $comment_model->getWapCommentById($id, \Yii::getAlias("@WapPageSize"));
        }
        $this->layout= false;
        return $this->render('index_m',['data'=>$data]);
    }
    /**
     * 问题的评论
     * @return string
     */
    public function actionAdd(){
        $res['status'] = false;
        if(\Yii::$app->request->isAjax){
            $id = \Yii::$app->request->post("id");
            $wap = \Yii::$app->request->post("id") ? intval(\Yii::$app->request->post("id")) : 0;
            $content = \Yii::$app->request->post("content");
            $content = addslashes(trim($content));   
            $comment_model = new Comment();
            $comment_model->rel_id = $id;
            $comment_model->content = $content;
            $data = array();
            if($comment_model->save()){
                $data = $comment_model->toArray();
                $user_model = new User();
                $data['userinfo']= $user_model->getUserInfoById($comment_model->user_id);
                $data['comments'] = $comment_model->getQaReplyCommentById($comment_model->id,0,5);
                $res['qa_comment_qa'] = Qa::getQaComment($id);
                $res['status'] = true;
                if($wap){
                     $res['html'] = CommentWapItemWidget::widget(['comment'=>$data]);
                }else{
                    $res['html'] = CommentItemWidget::widget(['comment'=>$data]);
                }
                
            }
        }
        return Json::encode($res);
    }
    
    
    //评论的評論
    public function actionQdd(){
        $res['status'] = false;
        if(\Yii::$app->request->isAjax){
            $id = \Yii::$app->request->post("id");
            $comment_id = \Yii::$app->request->post("comment_id") ? intval(\Yii::$app->request->post("comment_id")) : 0;
            $content = \Yii::$app->request->post("content");
            $content = addslashes(trim($content));
            $comment_model = new Comment();
            $comment_model->rel_id = $id;
            $comment_model->content = $content;
            $comment_model->comment_id  =$comment_id;
            $data = array();
            if($comment_model->save()){
                $data = $comment_model->toArray();
                $user_model = new User();
                $data['userinfo']= $user_model->getUserInfoById($comment_model->user_id);
                $res['qa_comment_qa'] = Comment::getCommentNumberCountById($comment_id);
                $res['status'] = true;
                $res['html'] = CommentItemWidget::widget(['comment'=>$data,'flag'=>2]);
            }
        }
        return Json::encode($res);
    }
    //删除评论的评论
    public function actionDelete(){
        $res['status'] = false;
        if(\Yii::$app->request->isAjax){
            $id = \Yii::$app->request->post('id') ? intval(\Yii::$app->request->post('id')) : 0;
            $model = Comment::findOne(['id'=>$id]);
            if($model->delete()){
                $res['status'] = true;
            } 
           
        }
        return Json::encode($res);
    }
    /**
     * 评论点赞
     * @return string
     */
    public function actionLike(){
        $res['status'] = false;
        if(\Yii::$app->request->isAjax){
            $id = \Yii::$app->request->post('id') ? intval(\Yii::$app->request->post('id')) : 0;
            $model = Comment::findOne(['id'=>$id]);
            if($model){
                $model->updateCounters(['like'=>1]);
                $res['status'] = true;
                $res['message'] = intval($model->like);
            }
             
        }
        return Json::encode($res);
    }
}