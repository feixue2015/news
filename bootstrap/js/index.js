 window.onload = function() {
	var showbtn = document.getElementById("up-icon");
	var hidbtn = document.getElementById("hidd-btn");
	showbtn.onclick = show;
	hidbtn.onclick = hidden;

}
var news = document.getElementsByTagName("tr");
var upicon = document.getElementsByClassName("up-icon");
var foot = document.getElementsByClassName("foot");

function show() {
	for (var i = 0; i < news.length; i++) {
		if (news[i].className == "cols1") {
			news[i].style.display = "table-row";
		};
	}
	upicon[0].style.display = "none";
	foot[0].style.display = "block";
}
//点击收起分类
function hidden() {
	for (var i = 0; i < news.length; i++) {
		if (news[i].className == "cols1") {
			news[i].style.display = "none";
		};
	}
	foot[0].style.display = "none";
	upicon[0].style.display = "block";
}

// //轮播图
// var box=document.getElementById("box");
// var time;
// function imagePlay() {
// 	var imge = document.getElementById("img-box");
// 	var Left = parseInt(imge.style.left);
// 		console.log(Left);
// 	var newLeft = Left-100;
// 	var times = 300; //位移总时间
// 	var Interval = 5; //位移间隔时间 
// 	var speed =parseInt( -100/(times/Interval));
// 	 function goplay() {
// 		if (speed < 0 && parseInt(imge.style.left) > newLeft) {
// 			imge.style.left = parseInt(imge.style.left) + speed + "%";
// 				console.log(imge.style.left);
// 			setTimeout(goplay, Interval);
// 		} else {
			
// 			if (parseInt(imge.style.left) < -200) {
// 				imge.style.left =0 + "%";
// 			};
		
// 		};

// 	}
// 	goplay();
// }
// function go(){
// 	 time = setInterval(imagePlay, 2000);
// }
// function stop(){
// 	clearInterval(time);
// }


// go();
// box.onmouseover=stop;
// box.onmouseout=go;

// body.onpagehide=stop();
