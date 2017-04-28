<?php
use pc\config\FileUtils;
use yii\helpers\Url;
?>
<div class="m_top">
	<label>
	<?php if($step > 1) :?>
	<a href="/huati/qa/submit?step=<?=$step-1?>">
	<?php else :?>
	<a href="/">
	<?php endif;?>
	
	<img src="<?=FileUtils::getWapCommonFilePath('images', "back2.png")?>"/>返回</a>
	</label>
	<p>提问</p><!--对应页面标题-->
	<?php if($step < 3) :?>
	<span class="submit_answer"><a>下一步</a></span>
	<?php else:?>
	<span class='submit_question'><a>提交</a></span>
	<?php endif;?>
</div>
<div class="edit_form">
    <?php if ($step == 1) :?>
    <form method='post' id="submit_answer_form" action="<?=Url::to(['/huati/qa/submit'])?>">
         <?php if($message) :?>
        <textarea name="temp_content" placeholder="<?=$message?>"><?=$data['title']?></textarea>
         <?php else :?>
         <textarea name="temp_content" placeholder="请写下你的问题..."><?=$data['title']?></textarea>
         <?php endif;?>
    	<input type='hidden' name="step" value="<?=$step?>">
    	<input type='hidden' name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>">
   </form>
   <dl class="edit_bottom"><!--提问标题页没有此div-->
   <dt><img src="<?=FileUtils::getWapCommonFilePath("images", "down.png")?>"/></dt>  
</dl>
   <?php elseif ($step == 2) :?>
         <form method='post' id="submit_answer_form" action="<?=Url::to(['/huati/qa/submit'])?>">
            <textarea name="temp_content" placeholder="请写下你的问题..."><?=$data['desc']?></textarea> 
        	<input type='hidden' name="step" value="<?=$step?>">
        	<input type='hidden' name="title" value="<?=$data['title']?>">
        	<?php if($data['anonymous']) :?>
        	<input type='hidden' value='1' class='anonymous_radio' name='anonymous' />
        	<?php else :?>
        	<input type='hidden' value='0' class='anonymous_radio' name='anonymous' />
        	<?php endif;?>
        	
        	<input type='hidden' name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>">
        </form>
        <dl class="edit_bottom"><!--提问标题页没有此div-->
           <dt><img src="<?=FileUtils::getWapCommonFilePath("images", "down.png")?>"/></dt>  
           <dd>
           <?php if($data['anonymous']) :?>
            <span></span>
            <?php else :?>
              <span></span>
            <?php endif;?>
        </dd>
        </dl>
   <?php elseif ($step == 3) :?>
         <form method='post' id="submit_answer_form" action="<?=Url::to(['/huati/qa/submit'])?>">
            <dl class="huati_choose">
                <dd><label>请在下面选择话题分类</label></dd>
                <dt>X</dt>
            </dl>
            <dl class="huati_all">
        		<dt>选择话题分类：</dt>
        		<dd>
        		  <?php foreach($topic_type_list as $v) :?>
        			<span rel="<?=$v['name']?>" data-id="<?=$v['id']?>"><?=$v['name']?></span>
        		<?php endforeach;?>
        		</dd>
        	</dl>
            <textarea name="content" style='display:none;'><?=$data['desc']?></textarea> 
        	<input type='hidden' name="step" value="<?=$step?>">
        	<input type='hidden' name="QaForm[title]" value="<?=$data['title']?>">
        	<input type='hidden' value='<?=$data['anonymous']?>' class='anonymous_radio' name='QaForm[anonymous]' />
        	<input type='hidden' name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>">
        	<input type='hidden' name='QaForm[access_token]' value="<?=$access_token?>"/>
        </form>
        <?php if ($message) :?>
        <script>
        alert("<?=$message?>");
        </script>
        <?php endif;?>
   <?php endif;?>
</div>



