<?php
use yii\helpers\Url;
?>
<script type="text/javascript" src="/static/js/jquery.min.js"></script>
<?php if($enable):?>
<script type="text/javascript"
		src="/static/huati/simditor/scripts/js/simditor-all.js"></script>
<script type="text/javascript">
	 $(function(){
		    toolbar = [ 'title', 'bold', 'italic', 'underline',
		            'color', '|', 'ol', 'ul', 'blockquote', 'table', '|',
		             'image', 'hr','indent', 'outdent' ];
		    var editor = new Simditor( {
		        textarea : $("#<?=$id?>"),
		        placeholder : '',
		        toolbar : toolbar,  //工具栏
		        defaultImage : '', //编辑器插入图片时使用的默认图片
		        upload : {
		            url : '<?=$uploadUrl ?>', //文件上传的接口地址
		            params: null, //键值对,指定文件上传接口的额外参数,上传的时候随文件一起提交
		            fileKey: 'file', //服务器端获取文件数据的参数名
		            connectionCount:1 ,
		            leaveConfirm: '正在上传文件'
		        },
		      
		    });
		   })
</script>
<?php endif;?>