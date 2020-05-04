$(document).ready(function(){
    var timer = null; //声明一个全局定时器
			var index = 0;	
			$(".next").click(function(){ //下一张
				next();
			});
			$(".prev").click(function(){ //上一张
				prev();
			})
			function next(){
				index++;
				if(index > 2){
					/*
					当图片到最后一张时跳回第一张，本例中在最后一张中放入了第一张的图片，为实现无缝切换图片的效果。
					*/
					 $(".pic-list").animate({left:-(index)*840},500); 
					 index = 0;
					 $(".pic-list").animate({left:0},0); //
				}
				$(".pic-list").animate({left:-index*840},500);
				iconHover(index);
			}
			function prev(){
				index--;
				if(index < 0 ){
					index = 2;
					$(".pic-list").animate({left:-(index)*840},0);
				}
				$(".pic-list").animate({left:-index*840},500);
				iconHover(index);
			}
			function auto(){ 
				timer = setInterval(function(){ //设置自动播放的定时器
					next();
					iconHover(index);
			},2000) 
			}
			auto();
			$("#slide").mouseover(function(){ //鼠标移入 定时器取消
				clearInterval(timer);
				$('.btn').css("opacity",0.5)
			})
			$("#slide").mouseleave(function(){ //鼠标离开 定时器开启
				auto();
				$('.btn').css("opacity",0)
			})
			//鼠标碰触圆点图标实现图片左右轮播
			$(".icon-list li").mouseover(function(){ 
				var index = $(this).index();
				$(".pic-list").animate({left:-index*840},500);
				iconHover(index);
			})
			//实现被选图片对应圆点图标索引更新
			function iconHover(index){
				$(".icon-list li").eq(index).addClass("active").siblings().removeClass("active");
			}
		
})