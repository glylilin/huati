<?php 
use pc\config\FileUtils;
use yii\helpers\Url;
use pc\config\CommonUtils;
use pc\modules\huati\widgets\EditorWidget;
$this->registerCssFile(FileUtils::getFilePath('css',"huati", "question_left.css"));
$this->registerCssFile("/static/huati/simditor/styles/font-awesome.css");
$this->registerCssFile("/static/huati/simditor/styles/simditor.css");
$this->registerJsFile(FileUtils::getFilePath('js',"huati", "question.js"));
?>

<div class='main_left'>
	<div class="topic_desc">
		<span class="topic_title">发起提问</span>
	</div>
		<!--主题详情开始-->
		<div class="topic_main_list">
		<form action="<?=Url::to(['/huati/qa/uquestion'])?>" method="post" id="addForm">
			<dl>
				<dt>问题:</dt>
				<dd><input class='require input add_topic_title' name='QaForm[title]' placeholder="请写下你的问题或相关内容（必填）" value="<?=$data['title']?>"/>
				<p class="error"><?php if($error && isset($error['title']) && $error['title'][0]):?><?=$error['title'][0]?><?php endif;?></p></dd>
				<dt>详细描述:</dt>
				<dd>
					<textarea class='require textarea add_topic_content' id="editor" name='content'><?=CommonUtils::editformatJsonHtml($data['content'],$data['json'])?></textarea>
					
				</dd>
				<?php if($topic_type_list) :?>
				<dt>话题分类:</dt>
				<dd>
					<div class='topic_type'>
					   <?php if($data['topic_ids']):?>
					     <span class="show_type_list">
					       <?php foreach ($data['topic'] as $k=>$v) :?>
					           <span><?=$v?></span>
                                <input name="topic_tags[]" value="<?=$v?>" type="hidden">
                                <input name="topic_ids[]" value="<?=$data['topic_ids'][$k]?>" type="hidden">
					       <?php endforeach;?>
					       </span>
					   <?php else :?>
					   <span class="show_type_list"><?php if($error && isset($error['topic_ids']) && $error['topic_ids'][0]):?><?=$error['topic_ids'][0]?><?php else :?>请选择你要发布的话题分类(必填)<?php endif;?></span>
					   <?php endif;?>
						
						<span class="show_down"></span>
						
						
					
						<div class='topic_list_detail'>
							<ul class='clearfix'>
					
							<?php foreach ($topic_type_list as $v) :?>
							<li data="<?=$v['id']?>"><?=$v['name']?></li>
							<?php endforeach;?>
							</ul>
							<div class="topic_list_detail_bottom">
								<span class='make_true_topic'>确定</span>
								<span class="make_false_topic">取消</span>
							</div>
						</div>
					</div>
					
					<div class="hot_topic">
						<span>热门话题:</span>
					
						<ul class="remment_hot_topic">
						<?php foreach ($topic_type_list as $k=>$v) : ?>
							<?php if($k < 3) :?>
									<li data="<?=$v['id']?>"><?=$v['name']?></li>
							<?php endif;?>
						<?php endforeach;?>
							
						</ul>
					
					</div>
				</dd>
				<?php endif;?>
				<?php if($teacher_list) :?>
				<dt class="request clearfix"><span class='teacher'>邀请导师:</span>
					<ul class="request_teacher clearfix">
					<?php if($data['invite_ids']) :?>
					   <?php foreach ($teacher_list as $v ) :?>
					   <?php if(in_array($v['id'],$data['invite_ids'])) :?>
						<li>
                            <span>@ <?=$v['nickname']?> </span>
                            <span class="del">X</span>
                            <input name="teacher[]" value="<?=$v['id']?>" type="hidden">
                            </li>
                          <?php endif;?>
                       <?php endforeach;?>
                   <?php endif;?>
					</ul>
				</dt>
				<dd class="my_request_top"><span class="my_request">我要邀请</span><span class='js'>点击“我要邀请”按钮，选择想邀请的导师对你的提问进行回答，可不选！</span></dd>
				<?php endif;?>
				
				<dt class="cryptonym">
					匿名发布：
					
					<span <?php if($data['anonymous']) :?>class="isTrue" <?php endif;?> data='1'>是</span>
					<span <?php if(!$data['anonymous']):?>class="isTrue" <?php endif;?> data='0'>否</span>
				</dt>
				<dd class='last_sub'>
				<input type='hidden' name='QaForm[access_token]' value="<?=$access_token?>"/>
				<input type='hidden' value='<?=$data['anonymous']?>' class='anonymous_radio' name='QaForm[anonymous]' />
				<input type='hidden' name='QaForm[id]' value="<?=$data['id']?>"/>
				<input type='hidden' name='id' value="<?=$data['id']?>"/>
				<input type='hidden' name='<?=Yii::$app->request->csrfParam ?>' value="<?=Yii::$app->request->csrfToken?>">
				<input type='hidden' id="islogin" value="<?=$islogin?>">
				<span class="question_submit">确认发布</span></dd>
			</dl>
		</div>
		</form>
		<!--主题详情结束-->
	</div>
<?php if($error && isset($error['access_token']) && $error['access_token'][0]):?>
<script>
alert("<?=$error['access_token'][0]?>");
window.location.href="<?=Url::to(['/huati/qa/uquestion','id'=>$data['id']]);?>";
</script>
<?php endif;?>
<!--导师弹窗-->
<?php if($teacher_list) :?>
<div class='teacher_dialog'></div>
<div class='teacher_alert'>
	<div class="alert_top">
	<span class="show_mess">邀请导师</span>
		<img src='<?=FileUtils::getFilePath('images', "huati", "alert_del.png");?>' class="alert_del"/>
	</div>
	<div class="alert_main_dialog">
	</div>
	<div class="alert_main">
		<ul>
		<?php foreach ($teacher_list as $v): ?>
			<li>
				<span class="teacher_icon">
					<?php if($v['avatar_info'] && $v['avatar_info']['path']):?>
					<img  src="<?=$v['avatar_info']['path'];?>">
					<?php else :?>
					<img  src="<?=FileUtils::getFilePath('images', 'huati', "header.png");?>">
					<?php endif;?>
					<i data="<?=$v['id']?>"></i>
				</span>
				<div class="teacher_info">
					<div class='teacher_info_top'>
						<span class="teacher_name">
						<?php if($v['nickname']) :?>
						<?=$v['nickname']?>
						<?php else :?>
						<?=CommonUtils::format_phone($v['mobile'])?>
						<?php endif;?>
						</span>
						<?php if($v['userCount']) :?>
						<span class='car'><?=$v['userCount']['follower']?>关注</span>
						<span class='ques'><?=$v['userCount']['question']?>提问</span>
						<span class='ans'><?=$v['userCount']['answer']?>回答</span>
						<?php endif;?>
					</div>
					<div class='teacher_desc'><?=$v['remark']?></div> 
				</div>
			</li>
			<?php endforeach;?>
		</ul>

	</div>
	<div class="alert_end">
		<span class="checked_teacher_submit">确定</span>
		<span class="checked_teacher_reset">清除已选</span>
	</div>
</div>
<?php endif;?>
<!--导师弹窗-->
<?=EditorWidget::widget(['id'=>'editor'])?>

