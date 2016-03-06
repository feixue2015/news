	function changenews(type) {
		//$(".main3").remove();
		//$(".main4").remove();
		//$(".carousel-inner").empty();
		var par = "type=" + type;
		$.getJSON("qnews.php", par, function(result) {
			console.log(result);
			var ac = 0;
			$.each(result, function(i, field) {
				//console.log(i);
				console.log(field);
				var str = "";

				if (field.topnews == 1 && ac < 3) {
					var imageObject = $(".carousel-inner").find("img");
					// console.log(imageObject);
					//.eq(ac++).find();
					imageObject[ac++].src = field.image;
				}
				if (field.topnews == 0) {

					if (field.image2 != "") {
						var main4image = $(".main4").find(".image-list img");
						main4image[0].src = field.image;
						main4image[1].src = field.image1;
						main4image[2].src = field.image2;
					}
					//console.log(ac);
					else {
						var main3image = $(".main3").find(".new-image img");
						//console.log(main3image);
						main3image[i - ac].src = field.image;
						var main3title = $(".main3").find(".new-text h2");
						main3title[i - ac].innerHTML = field.title;
						var main3content = $(".main3").find(".new-text p");
						main3content[i - ac].innerHTML = field.description;
						var contenttime = $(".main3").find(".new-bottom .time");
						contenttime[i - ac].innerHTML = field.datetime;
						var contenthot = $(".main3").find(".new-bottom .hot");
						contenthot[i - ac].innerHTML = field.Source;
						//var srcbox=$(".main3-box");
						//console.log(field.Source);
						//点击查看详细新闻
						$(".main3-box").attr("data-src",field.id);
						$(".main3-box").attr("data-diaplayurl", "newscontain.html");
						$(".main3-box").click(function() {
							window.open($(".main3-box").attr("data-diaplayurl"));
						});
					}
				}
			});


		});
	}

	function shownews(type) {
		//$(".main3").remove();
		//$(".main4").remove();
		//$(".carousel-inner").empty();

		var par = "type=" + type;
		$.getJSON("qnews.php", par, function(result) {
			var ac = 0;
			sonsole.log(result);
			$.each(result, function(i, field) {
				var str = "";

				if (field.topnews == 1) {
					var para = document.createElement("div");
					if (ac == 0) {
						para.className = "item active";
						ac = 1;
					} else
						para.className = "item";
					var imageObject = document.createElement("img");
					imageObject.src = field.image;
					imageObject.alt = "First slide";
					//imageObject.height="200";
					para.appendChild(imageObject);
					$(para).appendTo(".carousel-inner");

				} else {
					if (field.image1 == "") {

						//  var addContain=document.createElement("div");
						//  var contain=document.getElementsByClassName("contain");
						//      textnode=document.createTextNode(contain[1]);
						//	  addContain.appendChild("textnode");
						// var containbox=document.getElementsByClassName("containbox");
						// containbox[1].appendChild(addContain);
						str = "\
	  <div class='main3'>\
		<div class='main3-box'>\
			<div class='new1 showline'>\
				<div class='new-image'>\
					<img class='img' src='" + field.image + "'>\
				</div>\
				<div class='new-text'>\
					<h2 class='text-title'>" + field.title + "</h2>\
					<p class='text-contain'>" + field.description + "</p>\
				</div>\
				<div class='new-bottom'>\
					<div class='bottom-text'>\
						<b class='time'>发表于" + field.datetime + "前</b>\
						<b class='www'>网址</b>\
						<b class='hot'>" + field.Source + "</b>\
					</div>\
				</div>\
			</div>\
		</div>\
	</div>";
					} else {
						str = '\
	  	<div class="main4">\
		<div class="main4-box">\
			<div class="main4-text">\
			' + field.title + '\
		</div>\
			<div class="image-list">\
				<div class="image-box one">\
					<img src="' + field.image + '" />\
				</div>\
			</div>\
			<div class="image-list">\
				<div class="image-box two">\
					<img src="' + field.image1 + '" />\
				</div>\
			</div>\
			<div class="image-list">\
				<div class="image-box three">\
					<img src="' + field.image2 + '" />\
				</div>\
			</div>\
		</div>\
	</div>';
					}

					$(".scroll").append(str);
					//点击查看详细新闻
					$(".main3-box").attr("value", "field.id");
					$(".main3-box").attr("data-diaplayurl", "newscontain.html");
						$(".main3-box").click(function() {
							window.open($(".main3-box").attr("data-diaplayurl"));
						});
				}
			});
		});
	}
	$(document).ready(function() {
		var tdList = $("#navbar").find("td");
		var index = 0;
		for (var i = 0; i < tdList.length; i++) {
			$(tdList[i]).click(function() {
				var index = $(this).index();
				changenews(index);
			});
		}
		shownews(0);
	});