<?php
use pc\config\CommonUtils;
use pc\config\FileUtils;
use yii\helpers\Url;
?>
<dd id="<?=$data['id'] ?>">
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
		<a class="user_name" href="">
		<?php if($data['userinfo']['nickname']):?>
            <?=$data['userinfo']['nickname']?>
        <?php else :?>
            <?=CommonUtils::format_phone($data['userinfo']['mobile'])?>
        <?php endif;?>
		</a>
			<div class="user_for_comment_down">
				<span class='comment_time'>
				<?=CommonUtils::format_add_time($data['add_time'])?></span> 
				<span class='del_user_second_replay'>删除</span>
			</div>
	</div>
	</div>
	<?php endif;?>
	<div class='repaly_comment_list'>
		<div class="replay_detail"><?=$data['content']?></div>
	</div>
</dd>