<?php
namespace pc\modules\huati\controllers;
use Yii;
use pc\common\controllers\BaseController;
use pc\modules\huati\models\Qa;
use yii\web\HttpException;
use pc\modules\huati\models\Follow;
use pc\common\models\QaForm;
use yii\helpers\Json;
use pc\modules\huati\filter\LoginFilter;
use pc\modules\huati\models\Favorite;
use pc\modules\huati\models\QaTopic;
use pc\common\models\User;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use pc\config\CommonUtils;
use yii\db\Expression;
use pc\modules\huati\models\UserCount;


class QaController extends BaseController{
    public function behaviors(){
       $behavior = parent::behaviors();
       $behavior[]=['class'=>LoginFilter::className(),'only'=>['add','add_m','like','delqa','delans','submit_m']];
        return $behavior;
    }
    public function  actionView(){
        $session =  \Yii::$app->session;
        if($session->isActive){
            $session->open();
        }
        $qa_id = \Yii::$app->request->get("id") ? intval(\Yii::$app->request->get("id")) : 0;
        $qa_model = new Qa();
        $data = $qa_model->getQaById($qa_id);
        if(!$data){
            throw new HttpException('404');
            exit();
        }
        //分类采集
        $question_topic_type_list = array();
        if($data['topic_ids'] && $data['topic']){
            $topic_ids = explode(",",$data['topic_ids']);
            $topic = explode(",",$data['topic']);
            foreach ($topic_ids as $k=>$v){
                $question_topic_type_list[$k]['id']=$v;
                $question_topic_type_list[$k]['name']=$topic[$k];
            }
        }
        $sort =\Yii::$app->request->get("sort") ? intval(\Yii::$app->request->get("sort")) : "";
        $list['total']=$data['answer'];//$qa_model->getQuestuionCountByQaid($qa_id);
        $list['list'] = $qa_model->getQuestuionPagetByQaid($qa_id,"userCount");
 
        $access_token = time()*rand(10,99);
        $session->set('access_token',$access_token);
        $seotitle = $data['title']."-浪迹教育";
        $seodescriotion= strlen(CommonUtils::format_simple_content($data['content'])) > 10 ? CommonUtils::mbsubstr(CommonUtils::format_simple_content($data['content']),0,100) : $data['title'];
        $seokeyword ="";
        return $this->render('view',[
            'question_topic_type_list'=>$question_topic_type_list,
            'detail'=>$data,
            'following'=>Follow::getFollowingIds(),
            'favorites'=>Favorite::getFavoriteIds(),
            'list'=>$list,
            'access_token'=>$access_token,
            'seotitle'=>$seotitle,
            'seodescriotion'=>$seodescriotion,
            'seokeyword'=>$seokeyword
            
        ]);
    }
    /**
     * wap详情
     * @return Ambigous <string, string>
     */
    public function actionView_m(){
        $qa_id = \Yii::$app->request->get("id") ? intval(\Yii::$app->request->get("id")) : 0;
        $qa_model = new Qa();
        $data = $qa_model->getQaById($qa_id);
        if(!$data){
            throw new HttpException('404');
            exit();
        }
        //分类采集
        $question_topic_type_list = array();
        if($data['topic_ids'] && $data['topic']){
            $topic_ids = explode(",",$data['topic_ids']);
            $topic = explode(",",$data['topic']);
            foreach ($topic_ids as $k=>$v){
                $question_topic_type_list[$k]['id']=$v;
                $question_topic_type_list[$k]['name']=$topic[$k];
            }
        }
        $sort =\Yii::$app->request->get("sort") ? intval(\Yii::$app->request->get("sort")) : "";
        $list['total']=$data['answer'];//$qa_model->getQuestuionCountByQaid($qa_id);
        $list['list'] = $qa_model->getQuestuionPagetByQaid($qa_id,"userCount");

        $seotitle = $data['title']."-浪迹教育";
        $seodescriotion= strlen(CommonUtils::format_simple_content($data['content'])) > 10 ? CommonUtils::mbsubstr(CommonUtils::format_simple_content($data['content']),0,100) : $data['title'];
        $seokeyword ="";
     
        return $this->render('view_m',[
            'question_topic_type_list'=>$question_topic_type_list,
            'detail'=>$data,
            'favorites'=>Favorite::getFavoriteIds(),
            'list'=>$list,
            'seotitle'=>$seotitle,
            'seodescriotion'=>$seodescriotion,
            'seokeyword'=>$seokeyword
        
        ]);
   
    }
 
    //提交问题回答
    public function actionAdd(){
        $res['status'] = false;
        if(\Yii::$app->request->isAjax){
            $qa_form = new QaForm(['scenario'=>'answer']);
            $qa_form->load( \Yii::$app->request->post());
            if($qa_form->validate() && $qa_form->answerSave()){
                $res['status'] = true;
            }else{
                $res['message'] = $qa_form->getErrors() ? $qa_form->getErrors() : "存在敏感词汇";
            }
        }else{
            $res['message'] = \Yii::t("TOPIC", "ILLEGAL_OPERATION");
        }
        echo Json::encode($res);exit();
    }
    
    /**
     * wap添加回答
     * @return Ambigous <string, string>
     */
    public function actionAdd_m(){
        $session =  \Yii::$app->session;
        if($session->isActive){
            $session->open();
        }
        $message = "";
         $qa_id = \Yii::$app->request->get("qa_id");
        if(\Yii::$app->request->isPost){
            $qa_form = new QaForm(['scenario'=>'answer']);
            $data = \Yii::$app->request->post();
            $qa_form->load($data);
            $qa_id = $data['QaForm']['qa_id'];
            if($qa_form->validate() && $qa_form->answerSave()){
                $this->redirect('/info/'.$qa_id.'.html');
            }else{
               $message = $qa_form->getErrors() ? $qa_form->getErrors() : "存在敏感词汇";
            }
        }
        $access_token = time()*rand(10,99);
        $session->set('access_token',$access_token);
        if(!$qa_id){
            $message = \Yii::t("TOPIC", "ILLEGAL_OPERATION");
        }
        return $this->render('add_m',['qa_id'=>$qa_id,'access_token'=>$access_token,"message"=>$message]);
    }
    
    /**
     * 点赞，踩
     */
    public function actionLike(){
        $res['status'] = false;
        if(\Yii::$app->request->isAjax){
            $id = \Yii::$app->request->post('id') ? intval(\Yii::$app->request->post('id')) : 0;
            $like = \Yii::$app->request->post('like') ? intval(\Yii::$app->request->post('like')) : 0;
            $qa_record = Qa::findOne(['id'=>$id]);
            if($qa_record && $like > 0){
                  if($like > 10){
                      $qa_record->updateCounters(['like'=>1]);
                  }else{
                      $qa_record->updateCounters(['dislike'=>1]);
                  }
                  $res['status'] = true;
            }
        }
        echo Json::encode($res);exit();
    }
    //创建问题
    public function actionSubmit(){
        $session =  \Yii::$app->session;
        if($session->isActive){
            $session->open();
        }
        $qa_form = new QaForm(['scenario'=>'question']);
        $topic_type_list = QaTopic::getAllQaTopic();
        $user_model = new User();
        $access_token = time()*rand(10,99);
       if(\Yii::$app->request->isPost){
           if(\Yii::$app->user->id){
               $qa_form->load(\Yii::$app->request->post());
               $qa_form->topic_ids = \Yii::$app->request->post('topic_ids');
               $qa_form->tag = \Yii::$app->request->post('topic_tags');
               $qa_form->invite_ids = \Yii::$app->request->post('teacher');
               $qa_form->content = \Yii::$app->request->post('content');
               if($qa_form->validate() && $qa_form->questionSave()){
                   $this->redirect(Url::to(['/']));
               }
           }else{
                throw new HttpException('404','Y R S B'); 
                exit();  
           }
       }else{
           $session->set('access_token',$access_token);
       }
        return $this->render('submit',[
            'topic_type_list'=>$topic_type_list,
            'teacher_list'=>$user_model->getTeacherList(),
            'error'=>$qa_form->getErrors(),
            'access_token'=>$access_token,
            'islogin'=>\Yii::$app->user->id
        ]);
    }
    /**
     * wap创建问题
     */
    public function actionSubmit_m(){
        $session =  \Yii::$app->session;
        if($session->isActive){
            $session->open();
        }
        $step = \Yii::$app->request->get('step') ? \Yii::$app->request->get('step'): (\Yii::$app->request->post('step') ? \Yii::$app->request->post('step') : 1);
        $data = array();
        $message= "";
        if(\Yii::$app->request->isPost){
            $params = \Yii::$app->request->post();
            switch ($step){
                case 1:
                   $title = $params['temp_content'] ? addslashes(trim($params['temp_content'])) :"";
                   if(!$title){
                       $message = L("REQUIRED");
                   }else{
                       $data['title'] = $title;
                       $session->set('title',$title);
                       $step ++;
                       
                   }
                   break;
                case 2:
                    $desc = $params['temp_content'] ? addslashes(trim($params['temp_content'])) :"";
                    $title = $params['title'] ? addslashes(trim($params['title'])) :"";
                    $data['anonymous'] = $params['anonymous'] ? intval($params['anonymous']) :0;
                    if(!$desc){
                        $message = \Yii::t("COMMON", "REQUIRED");
                    }else if(!$title){
                        $message = \Yii::t("TOPIC", "ILLEGAL_OPERATION");
                    }else{
                        $data['title'] = $title;
                        $data['desc'] = $desc;
                        $session->set('desc',$desc);
                        $session->set('anonymous',$data['anonymous']);
                        $step ++;
                    }
                break;
                case 3:
                    $qa_form = new QaForm(['scenario'=>'question']);
                    $user_model = new User();
                    if(\Yii::$app->user->id){
                        $qa_form->load($params);
                        $qa_form->topic_ids = \Yii::$app->request->post('topic_ids');
                        $qa_form->tag = \Yii::$app->request->post('topic_tags');
                        $qa_form->invite_ids = \Yii::$app->request->post('teacher');
                        $qa_form->content = \Yii::$app->request->post('content');
                        if($qa_form->validate() && $qa_form->questionSave()){
                            $session->set('title',null);
                            $session->set('desc',null);
                            $session->set('anonymous',null);
                            header("location:/");
                            exit();
                        }else{
                            $data['title'] = $params['QaForm']['title'];
                            $data['desc'] = $params['content'];
                            $data['anonymous'] = $params['QaForm']['anonymous'];
                            $message= \Yii::t("TOPIC", "ILLEGAL_OPERATION");
                        }
                    }else{
                       header("/huati/login/signin");
                       exit();
                    }
                   
                    break;
                default:
                    $step = 1;
                    break;
            }
        }
           $data['title'] = $session->get('title') ? $session->get('title') : "";
            $data['desc'] = $session->get('desc') ? $session->get('desc') : "";
                   $data['anonymous'] = $session->get('anonymous') ? $session->get('anonymous') : 0;

        $topic_type_list = array();
        $access_token = time()*rand(10,99);
        if($step == 3){
            $session->set('access_token',$access_token);
            $topic_type_list = QaTopic::getAllQaTopic();
        }
        
        return $this->render('submit_m',['step'=>$step,'data'=>$data,'message'=>$message,'topic_type_list'=>$topic_type_list,'access_token'=>$access_token]);
    }
    /**
     * 删除问题
     */
    public function actionDelqa(){
        $res['status'] = false;
        if(\Yii::$app->request->isAjax){
            $id = \Yii::$app->request->post('id') ? intval(\Yii::$app->request->post('id')) : 0;
            $qa_record = Qa::findOne(['id'=>$id]);
            if($qa_record){
                $qa_record->delete = 1;
                if($qa_record->update()){
                    $user_count =   UserCount::findOne(['user_id'=>$qa_record['user_id']]);
                    $user_count->updateCounters(['question'=>-1]);
                   $res['status'] = true;
                }
            }
        }
        echo Json::encode($res);exit();
    }
    
    
    /**
     * 删除回答
     */
    public function actionDelans(){
        $res['status'] = false;
        if(\Yii::$app->request->isAjax){
            $id = \Yii::$app->request->post('id') ? intval(\Yii::$app->request->post('id')) : 0;
            $qa_record = Qa::findOne(['id'=>$id]);
            if($qa_record){
                $qa_record->delete = 1;
                if($qa_record->update()){
                    $user_count =   UserCount::findOne(['user_id'=>$qa_record['user_id']]);
                    $user_count->updateCounters(['answer'=>-1]);
                    if($qa_record['type'] == 2){
                        $qa_model = Qa::findOne(['id'=>$qa_record['qa_id']]);
                        $qa_model->updateCounters(['answer'=>-1]);
                    }
                    $res['status'] = true;
                }
            }
        }
        echo Json::encode($res);exit();
    }
    
   //修改回答
    public function actionUanswer(){
        $params = \Yii::$app->request->get() ? \Yii::$app->request->get() : \Yii::$app->request->post();
        $id = $params['id'] ? intval($params['id']) : 0;
        $condition = Qa::getBaseWhere();
        $condition['id'] = $id;
        $condition['type'] = Qa::QUESTION_TYPE;
        $data = Qa::findOne($condition);
        if(!$data){
            throw new NotFoundHttpException();
            exit();
        }
        $qa_form = new QaForm(['scenario'=>'uanswer']);
		$error = "";
        if(\Yii::$app->request->isPost){
            $qa_form->load(\Yii::$app->request->post());
            
            if($qa_form->validate()){
                $temp  = CommonUtils::formatHtmlJson($qa_form->content);
                $data->content = $temp['content'];
                $data->json = $temp['json'];
                $data->update_time = time();
                if($data->update() && !$data->hasErrors()){
                    $this->redirect('/info/'.$data['qa_id'].'.html');
                }else{
					$error = $data->getErrors();
				}
            }else{
				 $error = $qa_form->getErrors();
			}
        }

        return $this->render('uanswer',[
            'form'=>$qa_form,
            'data'=>$data->toArray(),
			'error'=>$error
        ]);
    }
    /**
     * wap修改问题
     */
    public function actionUanswer_m(){
        $params = \Yii::$app->request->get() ? \Yii::$app->request->get() : \Yii::$app->request->post();
        $id = $params['id'] ? intval($params['id']) : 0;
        $condition = Qa::getBaseWhere();
        $condition['id'] = $id;
        $condition['type'] = Qa::QUESTION_TYPE;
        $data = Qa::findOne($condition);
        if(!$data){
            throw new NotFoundHttpException();
            exit();
        }
        $qa_form = new QaForm(['scenario'=>'uanswer']);
        $error = "";
        if(\Yii::$app->request->isPost){
            $qa_form->load(\Yii::$app->request->post());
        
            if($qa_form->validate()){
                $temp  = CommonUtils::formatHtmlJson($qa_form->content);
                $data->content = $temp['content'];
                $data->json = $temp['json'];
                $data->update_time = time();
                if($data->update() && !$data->hasErrors()){
                    $this->redirect('/info/'.$data['qa_id'].'.html');
                }else{
                    $error = $data->getErrors();
                }
            }else{
                $error = $qa_form->getErrors();
            }
        }
        
        return $this->render('uanswer_m',[
            'form'=>$qa_form,
            'data'=>$data->toArray(),
            'message'=>$error
        ]);
    }
    
    /**
     * 修改提問
     */
    public function actionUquestion(){
        $params = \Yii::$app->request->get() ? \Yii::$app->request->get() : \Yii::$app->request->post();
        
        $id = $params['id'] ? intval($params['id']) : 0;
        $condition = Qa::getBaseWhere();
        $condition['id'] = $id;
        $condition['type'] = Qa::QA_TYPE;
        $data = Qa::findOne($condition);
        
        if(!$data){
            throw new NotFoundHttpException();
            exit();
        }
        if($data['user_id'] != \Yii::$app->user->id){
            throw new NotFoundHttpException();
            exit();
        }
       
        $session =  \Yii::$app->session;
        if($session->isActive){
            $session->open();
        }
        $qa_form = new QaForm(['scenario'=>'uquestion']);
    
        $access_token = time()*rand(10,99);
        if(\Yii::$app->request->isPost){
             if(\Yii::$app->user->id){
                 $this->p(\Yii::$app->request->post());
                $qa_form->load(\Yii::$app->request->post());
                $qa_form->topic_ids = \Yii::$app->request->post('topic_ids');
                $qa_form->tag = \Yii::$app->request->post('topic_tags');
                $qa_form->invite_ids = \Yii::$app->request->post('teacher');
                $qa_form->content = \Yii::$app->request->post('content');
                if($qa_form->validate()){
                   
                    $data->title=$qa_form->title;
                    $formatContent = CommonUtils::formatHtmlJson($qa_form->content);
                    $data->content = $formatContent['content'];
                    $data->json = $formatContent['json'];
                    $data->anonymous = $qa_form->anonymous;
                    $data->update_time = time();
                    $data->topic_ids = $params['topic_ids'] ? implode(",",array_unique($params['topic_ids'])) : "";
                    $data->tag = $params['topic_tags'] ? implode(",",array_unique($params['topic_tags'])) : "";
                    $data->topic = $params['topic_tags'] ? implode(",",array_unique($params['topic_tags'])) : "";
                    $data->invite_ids = isset($params['teacher'])  ?  ( $params['teacher'] ? implode(",",array_unique($params['teacher'])) : "" ) : "";
                  
                    if($data->update()){
                        $this->redirect(Url::to(['/']));
                    }
                }
            }else{
                throw new HttpException('404','Y R S B');
                exit();
            }
        }else{
            $session->set('access_token',$access_token);
        }
        $user_model = new User();
        $topic_type_list = QaTopic::getAllQaTopic();
        $data['topic_ids'] = explode(",",$data['topic_ids']);
        $data['topic'] = explode(",",$data['topic']);
        $data['invite_ids'] = explode(",",$data['invite_ids']);
        return $this->render('uquestion',[
            'topic_type_list'=>$topic_type_list,
            'teacher_list'=>$user_model->getTeacherList(),
            'error'=>$qa_form->getErrors(),
            'access_token'=>$access_token,
            'islogin'=>\Yii::$app->user->id,
            'data'=>$data
        ]);
    }
    
    
    public function actionSearch(){
        $content = \Yii::$app->request->get("search") ? addslashes(trim(\Yii::$app->request->get("search"))) : (\Yii::$app->request->post("search") ? addslashes(trim(\Yii::$app->request->post("search"))) : "");
        $basecondition = QaTopic::getBaseWhere();
        $condition = ['like','name',$content];
        $topic_query = QaTopic::find();
        $topic_query->where($condition);
        $topic_query->andWhere($basecondition);
        $qa_topic_record =  $topic_query->select(['id'])->asArray()->one();

        $query = Qa::find();
        $condition=['like','title',$content];
        $query->where($condition);
        $query->andWhere($basecondition);
        $query->andWhere(['type'=>Qa::QA_TYPE]);
        if($qa_topic_record){
            $query->orWhere(new Expression('FIND_IN_SET(:topic_ids, topic_ids)'));
            $query->addParams([":topic_ids"=>$qa_topic_record['id']]);
        }
       
        $totalCount = $query->count();
        $page = \Yii::$app->request->get("page") ?  \Yii::$app->request->get("page")  : 1;
        $offset = ($page -1 )*Yii::getAlias("@PageSize");
        $data = $query->offset($offset)->limit(Yii::getAlias("@PageSize"))->asArray()->all();
        if($data){
            $user_model = new User();
            foreach ($data as $k=>$v){
                $data[$k]['userinfo']= $user_model->getUserInfoById($v['user_id']);
            }
        }
        $options = [
            'nourl'=>"/search/".$content,
            'url'=>"/search/".$content,
            'diff'=>'/',
            'suffix'=>''
        ];
        $seotitle = $content."-浪迹教育";
        return $this->render('search', [
            'qa_list_data' => $data,
            'options'=>$options,
            'totalCount'=>$totalCount,
            'currentPage'=>$page,
            'seotitle'=>$seotitle,
        ]);
    }

}