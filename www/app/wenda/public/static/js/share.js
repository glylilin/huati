var config = {
	_title:"",
	_content:'utf-8',
	_url:"",
	_source:"",
	_sourceUrl:'',
	_pic:"",
	_desc:"",
	_summary:"",
	_site:"",
	_width:800,
    _height:600,
    _top:"",
    _left:"",
}
$(function(){
	$('.share_topic').click(function(e){
		if($(this).hasClass("isOIP")){
			$(this).removeClass('isOIP');
			resetConfig();
			close_share();
		}else{
			resetConfig();
			var parents = $(this).parents('.teacher_topic');
			config._content=$(parents).find('.topic_brief').text();
			config._title = $(parents).find('.topic_list_title').text() ? $(parents).find('.topic_list_title').text(): config._content;
			
			config._source = encodeURIComponent(config._source||'');
			config._sourceUrl  = encodeURIComponent(config._sourceUrl||'');
			config._desc = 	config._content;
			config._url = "http://www.theme.com:8088"+$(parents).find('.topic_list_head').find("a").eq(0).attr("href");
			config._summary=config._desc;
			config._site=encodeURIComponent(config._site||''); 
			config._top = (screen.height-config._height)/2;
			config._width = (screen.width-config._width)/2;
			var offset = $(this).offset();
			$('.share_dialog').css({"top":offset.top+30+"px","left":offset.left+"px"});
			$('.share_dialog').show();
			$(this).addClass('isOIP');
		}
	
	});
	$(".sina").click(function(event){
		shareToSinaWB(event);
		close_share();
	});
});
function resetConfig(){
	config._title='';
	config._url='';
	config._source='';
	config._sourceUrl='';
	config._desc='';
	config._summary='';
	config._site='';
}

 function shareToSinaWB(event){
     event.preventDefault();    
     var _shareUrl = 'http://v.t.sina.com.cn/share/share.php?&appkey=895033136';     //真实的appkey，必选参数 
     _shareUrl += '&url='+ config._url;     //参数url设置分享的内容链接|默认当前页location，可选参数
     _shareUrl += '&title=' + config._title;    //参数title设置分享的标题|默认当前页标题，可选参数
    _shareUrl += '&source=' + config._source;
     _shareUrl += '&sourceUrl=' + config._sourceUrl;
     _shareUrl += '&content=' + config._content;   //参数content设置页面编码gb2312|utf-8，可选参数
     _shareUrl += '&pic=' + config._pic;  //参数pic设置图片链接|默认为空，可选参数
     window.open(_shareUrl,'_blank','width='+config._width+',height='+config._height+',top='+config._top+',left='+config._left+',toolbar=no,menubar=no,scrollbars=no, resizable=1,location=no,status=0');
 }

 function shareToQQwb(event){
     event.preventDefault();
     var _shareUrl = 'http://v.t.qq.com/share/share.php?';
     _shareUrl += 'title=' + config._url;    //分享的标题
     _shareUrl += '&url=' + config._title;    //分享的链接
     _shareUrl += '&appkey=5bd32d6f1dff4725ba40338b233ff155';    //在腾迅微博平台创建应用获取微博AppKey
     _shareUrl += '&site=' + config._site;   //分享来源
     _shareUrl += '&pic=' + config._pic;    //分享的图片，如果是多张图片，则定义var _pic='图片url1|图片url2|图片url3....'
     window.open(_shareUrl,'_blank','width='+config._width+',height='+config._height+',top='+config._top+',left='+config._left+',toolbar=no,menubar=no,scrollbars=no, resizable=1,location=no,status=0');
 }

 function shareToQzone(event){
     event.preventDefault(); 
    var _shareUrl = 'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?';
     _shareUrl += 'url=' + config._url;   //参数url设置分享的内容链接|默认当前页location
     _shareUrl += '&showcount=0';      //参数showcount是否显示分享总数,显示：'1'，不显示：'0'，默认不显示
     _shareUrl += '&desc=' + config._desc;    //参数desc设置分享的描述，可选参数
    _shareUrl += '&summary=' + config._summary;    //参数summary设置分享摘要，可选参数
     _shareUrl += '&title=' + config._title;    //参数title设置分享标题，可选参数
    _shareUrl += '&site=' + config._site;   //参数site设置分享来源，可选参数
     _shareUrl += '&pics=' + config._pic;   //参数pics设置分享图片的路径，多张图片以＂|＂隔开，可选参数
    window.open(_shareUrl,'_blank','width='+config._width+',height='+config._height+',top='+config._top+',left='+config._left+',toolbar=no,menubar=no,scrollbars=no, resizable=1,location=no,status=0');
 }

function shareToRenren(event){
     event.preventDefault();
     var _shareUrl = 'http://share.renren.com/share/buttonshare.do?';
     _shareUrl += 'link=' + config._url;   //分享的链接
     _shareUrl += '&title=' + config._title;     //分享的标题
     window.open(_shareUrl,'_blank','width='+config._width+',height='+config._height+',top='+config._top+',left='+config._left+',toolbar=no,menubar=no,scrollbars=no, resizable=1,location=no,status=0');
 }

function close_share(){
	resetConfig();
	$('.share_dialog').hide();
}