<?php
use pc\config\FileUtils;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="login_regist">
	<span class='login'><?=yii::t("TOPIC", "LOGIN")?></span>|<span
		class='register'><?=yii::t("TOPIC", "REGISTER")?></span>
</div>
<div class='login_register_dialog'></div>
<div class='login_register'>
	<img src="<?=FileUtils::getFilePath('images', 'huati', "logout.png")?>"
		id="logout_login" />
	<div class='login_head'>
		<!-- <span id="forgetpassword">修改密码</span> -->
		<span id='login' class='now'><?=yii::t("TOPIC", "LOGIN")?></span> <span
			id='register'><?=yii::t("TOPIC", "REGISTER")?></span>
	</div>
  
	<div class='login_main form_main' url="<?=Url::to(['/huati/login/sign'])?>" send="false">
		<dl>
		<dt>
		     <?=yii::t("COMMON","MOBILE")?>
		</dt>
		<dd>
    		 <?=Html::textInput("login[mobile]",$model['mobile'],['class'=>'require login_mobile','flag'=>'mobile'])?>
    		 <p></p>
		</dd>
		<dt>
		    <?=yii::t("COMMON","PASSWORD")?>
		</dt>
		<dd>
		    <?=Html::passwordInput("login[password]",$model['password'],['class'=>'require login_password','flag'=>'password'])?>
		    <p></p>
		</dd>
		<dd>
		    
			<?=Html::tag("span",yii::t("TOPIC", "LOGIN"),['class'=>'login_btn'])?>
		
		</dd>
		<dd class="clearfix">
			<?=Html::tag("span",yii::t("TOPIC", "FORGET"),['class'=>'forget'])?>
		</dd>
		</dl>
	</div>

	<div class='register_main form_main' url="<?=Url::to(['/huati/login/register'])?>" send="false" >
		<dl>
			<dt><?=yii::t("COMMON","MOBILE")?></dt>
			<dd>
				<?=Html::textInput("register[mobile]",$model['mobile'],['class'=>'require register_mobile','flag'=>'mobile']);?>
				<p></p>
			</dd>
			<dt>验证码</dt>
			<dd class='show_code'>
				<?=Html::textInput('code',$model['code'],['class'=>'code_name','placeholder'=>'请输入收到的验证码']);?>
				<?=Html::tag("span","点击获取验证码",['class'=>'getCode'])?>
				<p></p>
			</dd>
			<dt><?=yii::t("COMMON","PASSWORD")?></dt>
			<dd>
				<?=Html::passwordInput("register[password]",$model['password'],['class'=>'require register_password','flag'=>'password'])?>
				<p></p>
			</dd>
			<dd>
				<?=Html::tag("span",yii::t("TOPIC", "REGISTER"),['class'=>'register_btn'])?>
			</dd>
			<dd class='link'>
				点击"注册",即表示您同意并愿意遵守<span>《浪迹教育协议》</span>
			</dd>

			<dd class='down_load'>
				<span class='down_load_btn'>下载浪迹教育App</span>
			</dd>
		</dl>
	</div>
	<div class='update_main form_main' send="false" url="<?=Url::to(['/huati/login/update'])?>">
		<dl>
		<dt><?=yii::t("COMMON","MOBILE")?></dt>
			<dd>
				<?=Html::textInput("update[mobile]",$model['mobile'],['class'=>'require update_mobile','flag'=>'mobile']);?>
				<p></p>
			</dd>
			<dt>验证码</dt>
			<dd class='update_show_code'>
				<?=Html::textInput('code',$model['code'],['class'=>'update_code_name','placeholder'=>'请输入收到的验证码']);?>
				<?=Html::tag("span","点击获取验证码",['class'=>'update_getCode'])?>
				<p></p>
			</dd>
			<dt>新密码</dt>
			<dd>
			
				<?=Html::passwordInput("update[password]",$model['password'],['class'=>'require update_password','flag'=>'password'])?>
				<p></p>
			</dd>
			<dt>确认密码</dt>
			<dd>
				<?=Html::passwordInput("update[repassword]",$model['repassword'],['class'=>'require update_repassword','flag'=>'repassword'])?>
				<p></p>
			</dd>
			<dd>
				<?=Html::tag("span","确定",['class'=>'update_btn'])?>
			</dd>

		</dl>
	</div>
</div>