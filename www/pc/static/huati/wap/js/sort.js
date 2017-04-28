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
		        $("."+classnames).find(chidren).each(function(k,v){
		            var temp = new tlist(k,parseInt($(v).find(".load").find('span').text()));
		          This.listObj[k] = temp;
		          This.initObj[k] = $(v).clone(true);
		        });
		    },
		    newsort:function(classnames){
		         $("."+classnames).html("");
		        if(this.newhtml){
		            $("."+classnames).html(this.newhtml);
		            return;
		        }
		        for (var i = 0; i < this.initObj.length; i++) {
		            $("."+classnames).append(this.initObj[i]);
		        };
		        this.newhtml =  $("."+classnames).html();
		    },
		    topsort:function(classnames){
		        $("."+classnames).html("");
		        if(this.tophtml){
		            $("."+classnames).html(this.tophtml);
		            return;
		        }
		        this.listObj = this.listObj.sort(this.compare("topi")).reverse();
		        for (var i =0; i < this.listObj.length; i++) {
		            var temp = this.listObj[i];
		            $("."+classnames).append( this.initObj[temp.indexi]);
		        };
		        this.tophtml =  $("."+classnames).html();
		    },
		  
		    compare:function(property){
		        return function(a,b){
		        var value1 = a[property];
		        var value2 = b[property];
		        return value1 - value2;
		        }
		    }
		};
		sortObj.init('huati_huida_list','li');
		//排序方式
		var num =1;
		$(".huida_title dd .pai").next().find("p").click(function(){
			if($(this).hasClass("current")){
				return ;
			}
			$(".huida_title dd .pai").next().find("p").removeClass("current");
			$(this).addClass("current");
			if(num == 1){
				 sortObj.topsort("huati_huida_list");
				 num++;
			}else{
				sortObj.newsort("huati_huida_list");
				num =1;
			}
			
			
		})
		
	
});

function tlist(index,topi){
    this.indexi=index;
    this.topi = topi;
}