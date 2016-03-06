$(document).ready(function() {
	//var tdList = $("#navbar").find("td");
	//var index = 0;
	//for (var i = 0; i < tdList.length; i++) {

			//$(tdList[i]).click(function() {

				//var index = $(this).index();
				//var show = document.getElementById("show");
				//var showList = show.getElementsByClassName("showpage");
			//	$(showList[index]).css({
				//	"display": "block"
			//	});
			//	$(showList[index]).siblings().css({
				//	"display": "none"
			//	});

			//	$(this).find("span").addClass("line");
			//	$(this).siblings().find("span").removeClass("line");
			//	$(this).parent().siblings().find("span").removeClass("line");
			//	location.href="index.php?type="+index;
			//});
		
	//}


 var time;
	

		$(function(){  
			time=setInterval(autoScroll,2000);
			  
		}) 

        $(".ul-list").mouseover(function(){
            clearInterval(time);
        });
         $(".ul-list").mouseout(function(){
           time=setInterval('autoScroll(".ul-list")',2000);
        });
           function autoScroll(){  
			$(".ul-list").find(".ul-list").animate({  
				marginTop : "-35px"},500,function(){  
				$(this).css({marginTop : "0px"}).find("li:first").appendTo(this);  
				   console.log($(this)) ;
			}) ; 
		}
    
});

