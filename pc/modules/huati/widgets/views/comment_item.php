<?php
use pc\config\CommonUtils;
use pc\config\FileUtils;
use pc\modules\huati\widgets\CommentItemWidget;
use yii\helpers\Url;

?>
<li>
	<?php if($data['userinfo']):?>
	<div class="user_for_comment">
		<?php if($data['userinfo']['avatar_info']):?>
		<a href="<?=Url::to(['/topic/user/dynamic','uid'=>$data['userinfo']['id']])?>">
			 <img src="<?=$data['userinfo']['avatar_info']['path']?>" class="userHeader">
		</a>
		<?php else:?>
		<a href="<?=Url::to(['/topic/user/dynamic','uid'=>$data['userinfo']['id']])?>">
		<img originalSrc="<?=FileUtils::getFilePath("images",'huati',"header.png")?>" class="userHeader lazy">
		</a>
	   <?php endif;?>
		<div class="user_for_comment_time">
				<a class="user_name" href="<?=Url::to(['/topic/user/dynamic','uid'=>$data['userinfo']['id']])?>">
				<?php if($data['userinfo']['nickname']):?>
				<?=$data['userinfo']['nickname']?>
				<?php else :?>
				<?=CommonUtils::format_phone($data['userinfo']['mobile'])?>
				<?php endif;?>
				</a>
			<div class="user_for_comment_down"><span><?=CommonUtils::format_add_time($data['add_time'])?></span>
				<span class='agree_comment_num'><?=$data['like']?></span>
				<span class="stop_comment_num"><?=$data['number']?></span>
			</div>
		</div>
	</div>
	<?php endif;?>
		<div class='repaly_comment_list' id="<?=$data['id']?>">
			<div class="replay_detail"><?=$data['content']?></div>
			<dl>
				<?php if($data['comments']):?>
					<?php foreach ($data['comments'] as $vc) :?>
						<?=CommentItemWidget::widget(['comment'=>$vc,'flag'=>2])?>
					<?php endforeach;?>
				<?php endif;?>
			</dl>
			<div class="send_double_textarea">
				<input type='text' class="textarea_content" />
				<span class="replay_sub">评论</span>
				<span class='replay_reset'>取消</span>
			</div>
		</div>
</li>