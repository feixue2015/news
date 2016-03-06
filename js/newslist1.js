    function sleep(n) {
    var start = new Date().getTime();
    while(true)  if(new Date().getTime()-start > n) break;
    }
window.onload = function() {
	//sleep(2000);
	play(-35);
	// function sleep(n) {
	//    var start = new Date().getTime();
	//    while(true)  if(new Date().getTime()-start > n) break;
	//    }
}

function play(num) {
	var ul = document.getElementById("ul-list");
	var newtop;
	var i = 0;
	var list = ul.getElementsByTagName("li");
	while (i <= list.length) {
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
		// if (i==4) i=0;
	}
  // setInterval("play(-35)",1000);
}