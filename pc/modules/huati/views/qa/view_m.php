 <?php 
 use pc\config\CommonUtils;
use pc\config\FileUtils;
use yii\helpers\Url;
$this->title =$seotitle;
$this->registerMetaTag(['name'=>'keywords','content'=>$seokeyword]);
$this->registerMetaTag(['name'=>'description','content'=>$seodescriotion]); 
$this->registerJsFile(FileUtils::getWapCommonFilePath('js' ,"jquery-1.7.2.min.js"));
$this->registerJsFile(FileUtils::getWapFilePath('js', 'huati' ,"sort.js"));
?>
 <div class="m_top">
	<label><a href="javascript:history.go(-1)"><img src="<?=FileUtils::getWapCommonFilePath('images', "back2.png")?>"/>返回</a></label>
	<p>问题详情</p>
</div>
 
   <div class="huida_con" data-id="<?=$detail['id']?>">
        <?php if($question_topic_type_list) :?>
        <p class="lei">
            <?php foreach ($question_topic_type_list as $v):?>
                    <a href="/tag/<?=$v['id']?>"><?=$v['name']?></a>
            <?php endforeach;?>
        </p>
        <?php endif;?>
        
        <h1 class="tt"><?=$detail['title']?></h1>
        <div class="con"><?=CommonUtils::formatJsonHtml($detail['content'],$detail['json'])?></div>
        <p class="people"><span><?=$detail['view']?>观看<i>·</i><?=$detail['answer']?>回答</span><label>
        <?php if(in_array($detail['id'],$favorites)) :?>
        <a class='qa_view_care_topic current'>已关注</a>
        <?php else:?>
        <a class='qa_view_care_topic'>关注问题</a>
        <?php endif;?>
        
        </label></p><!--已关注问题a标签加上class="current"-->
        <?php if(Yii::$app->user->id):?>
        <a href="/huati/qa/add?qa_id=<?=$detail['id']?>" class="btn"><img src="<?=FileUtils::getWapCommonFilePath('images', "edit2.png")?>"/>写回答</a>
        <?php else:?>
        <a href="javascript: void(0);" onclick="login();" class="btn"><img src="<?=FileUtils::getWapCommonFilePath('images', "edit2.png")?>"/>写回答</a>
        <?php endif;?>
    </div>

    <dl class="huida_title">
        <dt><?=$detail['answer']?>个回答</dt>
        <dd>
            <p class="pai">默认排序</p>
            <div>
                <p class="current"><a>默认排序</a></p>
                <p ><a>按最热排序</a></p>
                <i></i>
            </div>
        </dd>
    </dl>

     <ul class="huati_huida_list">
        <?php if($list['list']) :?>
             <?php foreach ($list['list'] as $v):?>
		<li data-id='<?=$v["id"]?>'>
			<p class="portrait"><label>
			<?php if(!$v['anonymous']):?>
    			<a href='<?=Url::to(['/'.$v['userinfo']['id']."/dynamic"])?>'>
    			<?php if($v['userinfo']['avatar_info']):?>
                    <img src="<?=$v['userinfo']['avatar_info']['path']?>">
                  <?php else : ?>
                    <img src="<?=FileUtils::getWapCommonFilePath('images', "header.png")?>">
                 <?php endif;?>
    			</a>
			<?php else :?>
				 <img src="<?=FileUtils::getWapCommonFilePath('images', "header.png")?>">
			<?php endif;?>
			
			
			</label>
			<span class="v6"></span></p>
			<div class="user_name">
				<p>
				<?php if(!$v['anonymous']):?>	
    					<?php if ($v['userinfo']['nickname']):?>
                			    <?=$v['userinfo']['nickname']?>
                		<?php else :?>
                			    <?=CommonUtils::format_phone($v['userinfo']['mobile'])?>
                		<?php endif;?>
                <?php else :?>
                	匿名
                <?php endif;?>
				<img src="<?=FileUtils::getWapCommonFilePath('images', "ds.png")?>"/><span> <?=CommonUtils::formatDate($v['add_time'])?></span></p>
				<label class='answer_like_dislike'><img class="answer_like" src="<?=FileUtils::getWapCommonFilePath('images', "hand_2.png")?>"><span><?=$v['like']?></span>
				<img src="<?=FileUtils::getWapCommonFilePath('images', "hand_down_2.png")?>"><span><?=$v['dislike']?></span>
				</label><!--点赞后第一个图片为hand.png，反对后第二个图片为hand_down.png-->
			</div>
			
			<div class="con"><?=CommonUtils::mbsubstr(CommonUtils::format_simple_content($v['content']),0,50)?><a class="show">[展开全部]</a></div>
			
			<div class="con_all"><?=CommonUtils::formatJsonHtml($v['content'],$v['json'])?><a class="hide">[收起回答]</a></div>
			<div class="comment">
			<?php if($v['userinfo']['id'] == Yii::$app->user->id) :?>
				<a class="del_wap_self_ans">删除</a><a href="<?=Url::to(['/huati/qa/uanswer','id'=>$v['id']])?>">编辑</a>
			<?php endif;?>
			<p><span><?=$v['comment'] ?></span>评论<i></i></p></div>
            <div class="comment_hide_box">
                
            </div>
		</li>
		  <?php endforeach;?>
		<?php endif;?>
	</ul>
