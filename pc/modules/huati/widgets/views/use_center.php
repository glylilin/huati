<?php
use pc\config\FileUtils;
use pc\config\CommonUtils;
use yii\helpers\Url;
?>
<?php if($user_info) :?>
<div class="topic_desc_user">
        <?php if($user_info['avatar_info'] && $user_info['avatar_info']['path']) :?>
            <img src="<?=$user_info['avatar_info']['path']?>" class='user_icon'>
        <?php else:?>
        	<img src="<?=FileUtils::getFilePath('images', 'huati', "header.png")?>" class='user_icon'>
        <?php endif;?>
	
		<div class='reduction'>
			<span class="username_sex women">
			<?php if($user_info['nickname']) :?>
			<?=$user_info['nickname']?>
			<?php else :?>
			<?=CommonUtils::format_phone($user_info['mobile'])?>
			<?php endif;?>
			</span>
			<p class="information"><?php if($user_info['remark']) :?><?=$user_info['remark']?> <?php else:?> 我相信，明天会更好。<?php endif;?></p>
			<?php if($user_info['userCount']):?>
			<p class='fans_caring'>
				<span>粉丝<font><?=$user_info['userCount']['follower']?></font></span>
				<span>关注<font><?=$user_info['userCount']['following']?></font></span>
			</p>
			<?php endif;?>
		</div>
</div>
<?php endif;?>
	<!--主题详情开始-->
	<div class="topic_main_list">
	<?php if($user_info && $user_info['userCount']) :?>
		<ul class="tabs_list clearfix">
			<li <?php if($action_id == 'dynamic') :?> class='tab pointer' <?php else :?>class='tab' <?php endif;?>><a href="<?=Url::to(["/".$uid.'/dynamic'])?>"><span>动态</span></a></li>
			<!-- <li class='tab'><span>邀请<font>0</font></span></li> -->
			<li <?php if($action_id == 'question') :?> class='tab pointer' <?php else :?>class='tab' <?php endif;?>><a href="<?=Url::to(["/".$uid.'/ask'])?>"><span>提问<font><?=$user_info['userCount']['question'] ?></font></span></a></li>
			<li <?php if($action_id == 'answer') :?> class='tab pointer' <?php else :?>class='tab' <?php endif;?>><a href="<?=Url::to(["/".$uid.'/cans'])?>"><span>回答<font><?=$user_info['userCount']['answer'] ?></font></span></a></li>
			<li <?php if($action_id == 'collect') :?> class='tab pointer' <?php else :?>class='tab' <?php endif;?>><a href="<?=Url::to(["/".$uid.'/col'])?>"><span>收藏<font><?=$user_info['userCount']['follow_question'] ?></font></span></a></li>
			<?php if($uid == Yii::$app->user->id) :?>
			<li <?php if($action_id == 'care') :?> class='tab pointer' <?php else :?>class='tab' <?php endif;?>><a href="<?=Url::to(["/".$uid.'/careuser'])?>"><span>关注</span></a></li>
			<?php endif;?>
		</ul>
    <?php endif;?>