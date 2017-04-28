<?php
namespace App\Common;
class Common{
	static $_base="http://local.app.com/api/v2/";
	//登录接口
	static $_signin = "auth/signin";
	//发送验证码
	static $_sendVerifyCode = "auth/sendVerifyCode";
	//手机注册
	static $_signup ="auth/signup";
	//手机是否注册验证
	static $_validateMobile = "auth/validateMobile";
	//重置密码
	static $_resetPassword = "auth/resetPassword";
	//话题分类
	static $_qa_topic_list = 'qa_topic/list';
	//问题页列表
	static $_qa_list = "qa/list";
	//统计回答总数
	static $_qa_count = "qa/count";

	//获取问题详情
	static $_qa_view = "qa/view";
	//增加浏览量
	static $_qa_plusView = "qa/plusView";
	//删除问题
	static $_qa_delete = "qa/delete";
	//修改问题接口
	static $_qa_update = "qa/update";
	//我关注人列表接口
	static $_follow_myFollowingList = "follow/myFollowingList";
	//关注我的
	static $_follow_myFollowerList = "follow/myFollowerList";
	//点赞
	static $_qa_plusLike="qa/plusLike";
	//取消话题点赞
	static $_qa_minusLike= "qa/minusLike";
	//踩
	static $_qa_plusDislike = "qa/plusDislike";
	//减少踩数
	static $_qa_minusDislike = "qa/minusDislike";
	//评论点赞
	static $_comment_plusLike = "comment/plusLike";

	//问题创建
	static $_qa_create = "qa/create";
	//创建问题
	static $_qa_createQuestion = "qa/createQuestion";
	//创建回答
	static $_qa_createAnswer = 'qa/createAnswer';
	//用戶信息查詢
	static $_user_view = "user/view";

	
	//人物关注
	static $_follow_create = "follow/create";
	//取消关注
	static $_follow_delete = "follow/delete";
	//关注问题/问答
	static $_favorite_create = "favorite/create";
	//问题关注
	static $_favorite_list = "favorite/list";
	//取消关注问题
	static $_favorite_delete = "favorite/cancel";
	//收藏统计
	static $_favorite_count = "favorite/count";
	//评论详情
	static $_comment_view = "comment/view";
	//评论统计
	static $_comment_count = "comment/count";
	//评论列表
	static $_comment_list = 'comment/list';
	//创建评论
	static $_comment_create = "comment/create";
	//删除评论
	static $_comment_delete = "comment/delete";
	//分页数

	//导师列表
	static $_tutor_list = "tutor/list";
	//导师总数
	static $_tutor_count = "tutor/count";
	//话题详情
	static $_qa_topic_view = "qa_topic/view";
	//修改头像
	static $_user_updateAvatar = "user/updateAvatar";
	//修改用户信息
	static $_user_updateProfile = "user/updateProfile";
	//消息总量统计
	static $_message_count = "message/count";
	//消息列表
	static $_message_list = "message/list";
	//刪除消息
	static $_message_delete = "message/delete";
	static $_pagesize = 15;
	static $_cache_time = 60;

	static $_topic_image_upload = "attach/upload";
	public static function auth_url($url){
		return Self::$_base."".$url;
	}


}