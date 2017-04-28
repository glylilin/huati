<?php
use pc\config\FileUtils;
use pc\config\CommonUtils;
$this->title =$seotitle;
$this->registerMetaTag(['name'=>'keywords','content'=>$seokeyword]);
$this->registerMetaTag(['name'=>'description','content'=>$seodescriotion]);
?>
<div class="m_top">
	<label><a href="javascript:history.go(-1)"><img src="<?=FileUtils::getWapCommonFilePath('images', "back2.png")?>"/>返回</a></label>
	<p>
	<?php if($info['nickname']):?>
	<?=$info['nickname']?>
	<?php else :?>
	<?=CommonUtils::format_phone(['mobile'])?>
	<?php endif;?>
	</p>
	<?php if($info['id'] == Yii::$app->user->id):?>
	<span class="icon2"><a href="huati/user/setting"><img src="<?=FileUtils::getWapCommonFilePath('images', "setting.png")?>"></a></span>
	<?php endif;?>
</div>
<div class="member_head">
		<dl class="info">
			<dd>
				<span><?php if($info['nickname']):?>
	<?=$info['nickname']?>
	<?php else :?>
	<?=CommonUtils::format_phone(['mobile'])?>
	<?php endif;?></span>
				<p>浪迹教育欢迎<br/>对PUA世界有追求的人</p>
			</dd>
			<dt>
			<?php if($info['avatar_info']):?>
			<img src="<?=$info['avatar_info']['path']?>" alt="">
			<?php else :?>
			<img src="<?=FileUtils::getWapCommonFilePath('images', 'header.png')?>" alt="">
			<?php endif;?>
			
			</dt>
		</dl>
		<p class="label_a"><a>VIP7套路之王</a><a>推荐APP给好友</a></p>
	</div>

	<ul class="member_list">
		<li><a href="/<?=$info['id']?>/dynamic"><p><img src="<?=FileUtils::getWapCommonFilePath('images', "messge.png")?>">我的话题</p><i></i><span></span></a></li><!--i标签为有消息时显示-->
	</ul>
<!-- 
	<ul class="member_list">
	
		<li><a href="wechat_verify.php"><p><img src="<?=FileUtils::getWapCommonFilePath('images', "wechat_icon2.png")?>">官方微信验证</p><span></span></a></li>
	</ul> -->