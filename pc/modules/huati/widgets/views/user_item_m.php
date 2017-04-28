<?php
use yii\helpers\Url;
use pc\config\FileUtils;
?>
<?php if($user_info):?>
  <li class="li2" data-id="<?=$user_info['id']?>">
           <div class="ds_head">
               <div><span>
               <a href="<?=Url::to(["/".$user_info['id']."/dynamic"])?>">
               <?php if($user_info['avatar_info'] && $user_info['avatar_info']['path']):?>
                   <img src="<?=$user_info['avatar_info']['path']?>"/>
               <?php else:?>
                   <img src="<?=FileUtils::getWapCommonFilePath('images', "1.png")?>"/>
               <?php endif;?>
               </a>
               </span></div>
               <p>
                   <span><a href="<?=Url::to(["/".$user_info['id']."/dynamic"])?>">
                   
             <?php if($user_info['nickname']) :?>
			<?=$user_info['nickname']?>
			<?php else :?>
			<?=CommonUtils::format_phone($user_info['mobile'])?>
		  <?php endif;?>
                   <?php if($user_info['type'] = 4 ):?>
                   <img src="<?=FileUtils::getWapCommonFilePath('images', "ds.png")?>"/>
                   <?php endif;?>
                   </a></span>
                   <label><?=$user_info['userCount']['follower']?>关注</label>
                </p>
           </div>
     
           <?php if(in_array($user_info['id'],$following)) :?>
                       <p class="gz2"><span class="current">已关注</span></p>
                       <?php else:?>
                       <p class="gz2"><span>关注TA</span></p>
          <?php endif;?>
     
       </li>
 <?php endif;?>