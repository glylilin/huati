<?php
use pc\config\FileUtils;
use pc\config\CommonUtils;
?>
<div class="m_top">
	<label><a href="javascript:history.go(-1)"><img src="<?=FileUtils::getWapCommonFilePath('images', "back2.png")?>"/>返回</a></label>
	<p>话题</p><!--对应页面标题-->
	<span class="submit_answer"><a>提交</a></span>
</div>

<div class="edit_form">
    <form method='post' id="submit_answer_form">
    <?php if($message) :?>
        <textarea name="QaForm[content]" placeholder="<?=$message?>"><?=strip_tags(CommonUtils::editformatJsonHtml($data['content'],$data['json']))?></textarea>
    <?php else:?>
        <textarea name="QaForm[content]" placeholder="写回答..."><?=strip_tags(CommonUtils::editformatJsonHtml($data['content'],$data['json']))?></textarea>
    <?php endif;?>
        <input type='hidden' name="id" value="<?=$data['id']?>">
		<input type='hidden' name="QaForm[id]" value="<?=$data['id']?>">
		<input type='hidden' name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>">
   </form>
    </div>
<dl class="edit_bottom"><!--提问标题页没有此div-->
   <dt><img src="<?=FileUtils::getWapCommonFilePath("images", "down.png")?>"/></dt>  
</dl>