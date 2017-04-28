<?php
use pc\config\FileUtils;
use pc\config\CommonUtils;
?>
	<?php if($data['userinfo']):?>
	<div class="list_div" data-id="<?=$data['id']?>">
		<p class="portrait">
			<label>
		  <?php if($data['userinfo']['avatar_info']):?>
			 <img src="<?=$data['userinfo']['avatar_info']['path']?>">
		  <?php else :?>
		     <?=FileUtils::getWapCommonFilePath('images', "1.png")?>
		  <?php endif;?>
			</label>
			<span class="v6"></span>
		</p>
		<div class="user_name">
			<p>
				<?php if($data['userinfo']['nickname']):?>
				<?=$data['userinfo']['nickname']?>
				<?php else :?>
				<?=CommonUtils::format_phone($data['userinfo']['mobile'])?>
				<?php endif;?><span><?=CommonUtils::format_add_time($data['add_time'])?></span>
			</p>
			<label><img src="<?=FileUtils::getWapCommonFilePath('images', "hand_2.png")?>"><span class='wap_answer_replay'><?=$data['like']?></span></label>
			<!--点赞后图片为hand.png-->
		</div>
		<div class="con"><?=$data['content']?></div>
	</div>
	<?php endif;?>