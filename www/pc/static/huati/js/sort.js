$(function(){
	var sortObj = {
		    initObj:"",
		    listObj:'',
		    newhtml:'',
		    tophtml:'',
		    init:function(classnames,chidren){
		        this.listObj = [];
		        this.initObj=[];
		        var This = this;
		        $("#"+classnames).find("."+chidren).each(function(k,v){
		            var temp = new tlist(k,parseInt($(v).find(".stop_comment").text()));
		          This.listObj[k] = temp;
		          This.initObj[k] = $(v).clone(true);
		        });
		    },
		    newsort:function(classnames){
		         $("#"+classnames).html("");
		        if(this.newhtml){
		            $("#"+classnames).html(this.newhtml);
		            return;
		        }
		        for (var i = 0; i < this.initObj.length; i++) {
		            $("#"+classnames).append(this.initObj[i]);
		        };
		        this.newhtml =  $("#"+classnames).html();
		    },
		    topsort:function(classnames){
		        $("#"+classnames).html("");
		        if(this.tophtml){
		            $("#"+classnames).html(this.tophtml);
		            return;
		        }
		        this.listObj = this.listObj.sort(this.compare("topi")).reverse();
		        for (var i =0; i < this.listObj.length; i++) {
		            var temp = this.listObj[i];
		            $("#"+classnames).append( this.initObj[temp.indexi]);
		        };
		        this.tophtml =  $("#"+classnames).html();
		    },
		  
		    compare:function(property){
		        return function(a,b){
		        var value1 = a[property];
		        var value2 = b[property];
		        return value1 - value2;
		        }
		    }
		};
		sortObj.init('view_list_sort_id','per_list_detail_li');
		$(".topic_csd").on('click','a',function(){
			if($(this).hasClass('active_current')){
				return;
			}
			$(".topic_csd").find("a").removeClass("active_current");
			var data = $(this).attr('data');
			if(data==1){
				sortObj.newsort("view_list_sort_id");
			}else{
				 sortObj.topsort("view_list_sort_id");
			}
			$(this).addClass('active_current');
		});
});

function tlist(index,topi){
    this.indexi=index;
    this.topi = topi;
}