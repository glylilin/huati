<?php 
use pc\config\FileUtils;
use yii\helpers\Url;
use pc\config\CommonUtils;
use pc\modules\huati\widgets\EditorWidget;
$this->registerCssFile(FileUtils::getFilePath('css',"huati", "main_left.css"));
$this->registerCssFile("/static/huati/simditor/styles/font-awesome.css");
$this->registerCssFile("/static/huati/simditor/styles/simditor.css");
$this->title="修改提问-浪迹教育";
?>
<div class='main_left'>
    <form method='post' action="<?=Url::to(['/huati/qa/uanswer'])?>">
	<div class="answer_the_question">
		<textarea id="editor" name='QaForm[content]' class="editor"><?=CommonUtils::editformatJsonHtml($data['content'],$data['json'])?></textarea>
	
		<input type='hidden' name="id" value="<?=$data['id']?>">
			<input type='hidden' name="QaForm[id]" value="<?=$data['id']?>">
		<input type='hidden' name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>">
		<div class="detail_reply_submit">
			<span class="answer_submit">提交</span>
		</div>
	</div>
	</form>
<?=EditorWidget::widget(['id'=>"editor"])?>
<?php 
if($error && $error['content']){
?>
<script type="text/javascript">
alert("<?=$error['content'][0]?>");
</script>
<?php	
}
?>
	<script type="text/javascript">


   $(".answer_submit").click(function(){
	    var content = $('#editor').val();
	    if(!content){
		    return ;
	    }
	    $(this).parents("form").submit();
	   });
</script>
</div>
