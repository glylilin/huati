<?php
use pc\config\FileUtils;
use pc\config\CommonUtils;
?>
<?php if(isset($v['aid'])) :?>
<li data-id="<?=$v['aid']?>">
<?php else:?>
<li data-id="<?=$v['id']?>">
<?php endif;?>

	<div class="promulgator">
                   <?php if ($v['userinfo']):?>
                    <div class="name">
			<div>
				<span> <a href="/<?=$v['userinfo']['id']?>/dynamic">
                        <?php if ($v['userinfo']['avatar_info'] && $v['userinfo']['avatar_info']['path']):?>
                          <img
						src="<?=$v['userinfo']['avatar_info']['path']?>" />
                        <?php else:?>
                          <img
						src="<?=FileUtils::getWapCommonFilePath('images', "header.png")?>"
						alt="" />
                        <?php endif;?>
                        </a>
				</span>
			</div>
			<!--i标签class的v6按等级改变-->
			<p>
				<span><a href="/<?=$v['userinfo']['id']?>/dynamic">
                            <?php if($v['userinfo']['nickname']) :?>
                                <?=$v['userinfo']['nickname']?>
                            <?php else:?>
                                <?=CommonUtils::format_phone($v['userinfo']['mobile'])?>
                            <?php endif;?>
                            </a></span>
                            <?php if($v['topic']) :?>
                            <label>来自话题：<a><?=$v['topic']?></a></label>
                            <?php endif;?>
                        </p>
		</div>
		<p class="gz">
		          <?php if(isset($v['aid'])) :?>
		                   <?php if(in_array($v['aid'],$favorites)):?>
                                  <a class="current">已关注</a>
                            <?php else:?>
                                   <a>关注回答</a>
                            <?php endif;?>
		              <?php else:?>
                            <?php if(in_array($v['id'],$favorites)):?>
                                  <a class="current">已关注</a>
                            <?php else:?>
                                   <a>关注话题</a>
                            <?php endif;?>
                    <?php endif;?>
              
                    </p>
                    <?php endif;?>
                </div>
	<div class="info">
		<a href="/info/<?=$v['id']?>.html" title="<?=$v['title'] ?>">
			<p class="tt"><?=$v['title'] ?></p>
			<div class="con">
                        <?php if($v['json'] && CommonUtils::format_first_image_json($v['json'])) :?>
                            <p>
					<img src="<?=CommonUtils::format_first_image_json($v['json'])?>"
						alt="" />
				</p>
                        <?php endif;?>
                         <div>
                         <?=CommonUtils::mbsubstr(CommonUtils::format_simple_content($v['content']),0,100)?>
                         </div>
			</div>
		</a>
	</div>
	<div class="people">
		<span><?=$v['like']?>赞</span><i>·</i><span><?=$v['answer']?>回答</span>
	</div>
</li>