$(document).ready(function(){

	$(".searchbuton").click(function(){
		var search_text = $(".searchinput").val();
		var base_url = $("#baseurl").attr('data-value');

		if(search_text){
			var search_url = base_url+'search.php?mod=forum&searchid=1&orderby=lastpost&ascdesc=desc&searchsubmit=yes&kw='+search_text;
			window.open(search_url);    
		}else{
			$(".searchinput").css("opacity","1").fadeToggle();			
		}			
	})
	//用户名展开
	$(".yhm_name").click(function(){
		$(".yhmUL").css("opacity","1").fadeToggle();
	})
	
	//首页商城推荐
	var scrollPic_02 = new ScrollPic();
	scrollPic_02.scrollContId   = "ISL_Cont_1"; //内容容器ID
	scrollPic_02.arrLeftId      = "LeftArr";//左箭头ID
	scrollPic_02.arrRightId     = "RightArr"; //右箭头ID

	scrollPic_02.frameWidth     = 1160;//显示框宽度
	scrollPic_02.pageWidth      = 232; //翻页宽度

	scrollPic_02.speed          = 10; //移动速度(单位毫秒，越小越快)
	scrollPic_02.space          = 10; //每次移动像素(单位px，越大越快)
	scrollPic_02.autoPlay       = false; //自动播放
	scrollPic_02.autoPlayTime   = 3; //自动播放间隔时间(秒)

	scrollPic_02.initialize(); //初始化
							
})