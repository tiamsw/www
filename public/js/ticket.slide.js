$(function() { 
	
	//计算相关数据
		var wrapper = $('#demo4'), ul = wrapper.children('ul.items'), lis = ul.find('li'), firstPic = lis.first().find('img');
		var li_num = lis.size(), li_height = 0, li_width = 0;
		//定义滚动顺序:ASC/DESC.ADD.JENA.201208081718
		var order_by = 'ASC';
			//默认参数
		var defaults = {
			direction : 'left',//left,top
			duration : 0.6,//unit:seconds
			easing : 'swing',//swing,linear
			delay : 3,//unit:seconds
			startIndex : 0,
			hideClickBar : true,
			clickBarRadius : 5,//unit:px
			hideBottomBar : true
		};
		var settings = defaults;
	
	
		
		//开始轮播
		var start = function() {
			var active = ul.find('li.active'), active_a = active.find('a');
		   var index = active.index();
			if(settings.direction == 'left'){
				if(index == 0){ 
					offset = index * li_width * -1 ;
					}else{
			    offset = index * li_width * -1 - 28*index;
				  }
			
				param = {'left':offset + 'px' };
			}else{
				offset = index * li_height * -1;
				param = {'top':offset + 'px' };
			} 

			ul.stop().animate(param, settings.duration*500, settings.easing, function() {
				active.removeClass('active');
				if(order_by=='ASC'){
				 	 
				 	 var totalli = ul.find('li').size();
				 	 var inde= totalli-index;
			 
				  if(inde > 4){ 
						active.next().addClass('active');
					}else{
						order_by = 'DESC';
						active.prev().addClass('active');
					}
				}else if(order_by=='DESC'){
					if (active.prev().size()){
						active.prev().addClass('active');
					}else{
						order_by = 'ASC';
						active.next().addClass('active');
					}
				}
			});
			wrapper.data('timeid', window.setTimeout(start, settings.delay*1000));
		};
		//停止轮播
		var stop = function() {
			window.clearTimeout(wrapper.data('timeid'));
		};
	
	function slideBox(options) {
	
		//初始化
		var init = function(){
			if(!wrapper.size()) return false;
			
			li_height = lis.first().height();
			li_width = lis.first().width();
			
			//wrapper.css({width: li_width+'px', height:li_height+'px'});
			lis.css({width: li_width+'px', height:li_height+'px'});//ADD.JENA.201207051027
			
			if (settings.direction == 'left') {
				ul.css('width', (li_num+28) * li_width + 'px');
			} else {
				ul.css('height', li_num * li_height + 'px');
			}			
			ul.find('li:eq('+settings.startIndex+')').addClass('active'); 
			
			lis.size()>1 && start();
		}
	
		//鼠标经过事件
		wrapper.hover(function(){
			stop();
		}, function(){
			start();
		});	
		//首张图片加载完毕后执行初始化
		var imgLoader = new Image();
		imgLoader.onload = function(){
			imgLoader.onload = null;
			init();
		}
		imgLoader.src = firstPic.attr('src');
			
	 }
	
	
	
		slideBox({
	    	hideBottomBar : true//隐藏底栏
	  });
    $("#J_prev").click(function(){
    	   stop(); 
    	   var active = ul.find('li.active');  
		     var index = active.index();
		     var totalli = ul.find('li').size();
				 	var inde= totalli-index; 
				 	  
				 	 if(index==0){
				 	 	index =1;
				 	}
				  if(inde > 4){  
				  	  active.removeClass('active');
    	        active.next().addClass('active'); 
					    offset = index * li_width * -1 - 28*index;
					   
			      	param = {'left':offset + 'px' }; 
		        	ul.stop().animate(param, settings.duration*100, settings.easing);
					}  
			 
    	  start();
    	
    	});
    	 $("#J_next").click(function(){
    	 		  stop();
    	 	 
    	  var active = ul.find('li.active'); 
    	   var index = active.index();  
				 if(index > 0){ 
				 	  active.removeClass('active');
				 	  active.prev().addClass('active');  
				     offset = index * li_width * -1 - 28*index;
						param = {'left':offset + 'px' }; 
		  	    ul.stop().animate(param, settings.duration*100, settings.easing);
				  }  
    	  start();
    	});
	});
	