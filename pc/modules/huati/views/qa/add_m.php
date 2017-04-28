<?php
use pc\config\FileUtils;
?>
<div class="m_top">
	<label><a href="javascript:history.go(-1)"><img src="<?=FileUtils::getWapCommonFilePath('images', "back2.png")?>"/>返回</a></label>
	<p>话题</p><!--对应页面标题-->
	<span class="submit_answer"><a>提交</a></span>
</div>

<div class="edit_form">
    <form method='post' id="submit_answer_form">
    <?php if($message) :?>
        <textarea name="QaForm[content]" placeholder="<?=$message?>"></textarea>
    <?php else:?>
        <textarea name="QaForm[content]" placeholder="写回答..."></textarea>
    <?php endif;?>
    
        <input type='hidden' name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>">
        <input type='hidden' name='QaForm[qa_id]' value="<?=$qa_id?>">
        <input type='hidden' name='QaForm[access_token]' value="<?=$access_token?>">
   </form>
    </div>
    <dl class="edit_bottom"><!--提问标题页没有此div-->
        <dt><img src="<?=FileUtils::getWapCommonFilePath("images", "down.png")?>"/></dt>  
</dl>