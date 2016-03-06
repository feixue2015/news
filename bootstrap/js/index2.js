$(document).ready(function() {
	var tdList = $("#navbar").find("td");
	var index = 0;
	for (var i = 0; i < tdList.length; i++) {

			$(tdList[i]).click(function() {

				var index = $(this).index();
				var show = document.getElementById("show");
				var showList = show.getElementsByClassName("showpage");
				$(showList[index]).css({
					"display": "block"
				});
				$(showList[index]).siblings().css({
					"display": "none"
				});

				$(this).find("span").addClass("line");
				$(this).siblings().find("span").removeClass("line");
				$(this).parent().siblings().find("span").removeClass("line");
			});
		
	}
});