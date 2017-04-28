<?php
use pc\config\FileUtils;
?>
<div class="m_top">
	<label><a href="/huati/user/setting"><img src="<?=FileUtils::getWapCommonFilePath('images', "back2.png")?>"/>返回</a></label>
	<p>个人信息</p><!--对应页面标题-->
</div>

    <dl class="member_head3">
        <dt>头像</dt>
        <dd><div>
        <?php if($user_info && $user_info['avatar_info']) :?>
        <img src="<?= $user_info['avatar_info']['path']?>"/>
        <?php else :?>
        <img src="<?=FileUtils::getWapCommonFilePath('images', "header.png")?>"/>
        <?php endif;?>
        </div></dd>
    </dl>
    <form action="/huati/user/pinformation" method='post' id="update_information">
    <ul class="form_list">
        <li>
            <div>
                <p class="left">昵称</p>
                <p class="right"><input type="text" name='nickname' class='info_nickname' value="<?=$user_info['nickname']?>"/></p>
            </div>
        </li>
         <li>
            <div>
                <p class="left">微信</p>
                <p class="right"><input type="text" name='weixin' class='info_weixn' value="<?=$user_info['weixin']?>"/></p>
            </div>
        </li>
         <li class="no_edit">
            <div>
                <p class="left">手机</p>
                <p class="right"><input type="text" value="<?=$user_info['mobile']?>"/>
               	<input type='hidden' name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>">
                </p>
            </div>
        </li>
    </ul>
    </form>
	<p class='error_s'><?=$message?></p>
	<button class="signin_btn info_btn">提交</button>