<?php
use pc\config\FileUtils;
use pc\config\CommonUtils;
use yii\helpers\Url;
?>
<div class="m_top">
	<label><a href="javascript:history.go(-1)"><img src="<?=FileUtils::getWapCommonFilePath('images', "back2.png")?>"/>返回</a></label>
	<p>
    <?php if(Yii::$app->user->id == $user_info['id']) :?>
    我的
    <?php else:?>
	<?php if($user_info['nickname']) :?>
			<?=$user_info['nickname']?>
			<?php else :?>
			<?=CommonUtils::format_phone($user_info['mobile'])?>
	<?php endif;?>
	<?php endif;?>
	</p>

</div>
  <dl class="member_head2">
        <dt><a class="current">已关注</a></dt>
        <dd>
            <div><span><a href="#">
            <?php if($user_info['avatar_info'] && $user_info['avatar_info']['path']) :?>
                 <img src="<?=$user_info['avatar_info']['path']?>">
            <?php else:?>
        	<img src="<?=FileUtils::getWapCommonFilePath('images', "header.png")?>">
            <?php endif;?>
            </a></span></div>
            <p>
                <span><?php if($user_info['nickname']) :?>
			<?=$user_info['nickname']?>
			<?php else :?>
			<?=CommonUtils::format_phone($user_info['mobile'])?>
			<?php endif;?>
                <?php if($user_info['type'] == 4):?>
                <img src="<?=FileUtils::getWapCommonFilePath('images', "ds.png")?>"/>
                <?php endif;?>
                </span>
                <label><?=$user_info['userCount']['like']?> 赞</label><i>微信</i>
            </p>
        </dd>
    </dl>
    <ul class="member_data">
    <?php if(Yii::$app->user->id == $user_info['id']) :?>
        <li><a href="/<?=$user_info['id']?>/careuser"><b><?=$user_info['userCount']['follower']?><i></i></b><label>我的粉丝</label></a></li>
        <li><a href="/<?=$user_info['id']?>/col"><b><?=$user_info['userCount']['following']?></b><label>我的关注</label></a></li>
        <?php endif;?>
        <li><a href="/<?=$user_info['id']?>/ask"><b><?=$user_info['userCount']['question']?></b><label><?php if(Yii::$app->user->id == $user_info['id']) :?>我的提问<?php else :?>他的提问<?php endif;?></label></a></li>
        <li><a href="/<?=$user_info['id']?>/cans"><b><?=$user_info['userCount']['answer']?></b><label><?php if(Yii::$app->user->id == $user_info['id']) :?>我的回答<?php else :?>他的回答<?php endif;?></label></a></li>    
    </ul>

    <dl class="huati_toutiao">
        <?php if($hot || $top) :?>
        <dt><img src="<?=FileUtils::getWapFilePath('images','huati',"toutiao.png")?>"/></dt>
        <dd>
            <a href="/info/<?=$top['id']?>.html" title=""><i>置顶</i><?=$top['title']?></a>
            <a href="/info/<?=$hot['id']?>.html" title=""><i>热议</i><?=$hot['title']?></a>
        </dd>
        <?php endif;?>
    </dl> 
    