
window.onload = function() {
	//play(-35);
	//alert("sds");
	setInterval(play, 1500);
	
}
var i = 0;
function play() {
	var ul = document.getElementById("ul-list");
	var newtop;
	
	var num = -35;
	var list = ul.getElementsByTagName("li");
	//while (i <= list.length)
		{
		newtop = parseInt(ul.style.marginTop) + num;
		ul.style.transition = "margin-top 5s ease-out 0s";
		ul.style.marginTop = newtop + "px";
		// sleep(1000);

		if (parseInt(ul.style.marginTop) <= -140) {
			ul.style.transition = "none";
			ul.style.marginTop = 0 + "px";
			//i=0;
			//continue;
		}

		i++;
		 if (i==4) i=0;
	}
  // setInterval("play(-35)",1000);
}
// var prevbtn=document.getElementById("prev");
// 	prevbtn.onclick=prev();

// function prev(){
// 	 history.back();
// }