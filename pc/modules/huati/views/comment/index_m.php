<?php
use pc\modules\huati\widgets\CommentWapItemWidget;
?>
<div class="edit_comment">

		<p>
			<input type="text" autocomplete="off" class='wap_comment_content' placeholder="我来说两句..." />
		</p>
		<button>评论</button>
</div>

<div class="comment_list">
    <?php if($data):?>
    <?php foreach ($data as $k=>$v) :?>
        <?=CommentWapItemWidget::widget(['comment'=>$v])?>
	 <?php endforeach;?>
	<?php endif;?>

</div>
