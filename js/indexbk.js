window.onload=function(){


	function changenews(type) {
		var par = "type=" + type;
		$.getJSON("qnews.php", par, function(result) {
			var j = 0;
			var k = 0;
			var l = 0;
			$.each(result, function(i, field) {
				if (field.topnews == 1 && j < 3) {
					var imageObject = $(".carousel-inner").find("img");
					imageObject[j++].src = field.image;
				}
				if (field.topnews == 0) {
					if (field.image2 != "") {
						var o = $(".main4").find(".main4-box")[1];
						console.log(o);
						main4image = $(o).find("img");
						console.log(main4image);
						main4image[0].src = field.image;
						main4image[1].src = field.image1;
						main4image[2].src = field.image2;
						$($(".main4-box")[l]).attr("data-displayurl", "newscontain.html?id=" + field.id);
						l++;
					} else {
						var main3image = $(".main3").find(".new-image img");
						main3image[k].src = field.image;
						var main3title = $(".main3").find(".new-text h2");
						main3title[k].innerHTML = field.title;
						var main3content = $(".main3").find(".new-text p");
						main3content[k].innerHTML = field.description;
						var contenttime = $(".main3").find(".new-bottom .time");
						contenttime[k].innerHTML = field.datetime;
						var contenthot = $(".main3").find(".new-bottom .hot");
						contenthot[k].innerHTML = field.Source;  
						$($(".main3-box")[k]).attr("data-displayurl", "newscontain.html?id=" + field.id);
						k++;
					}
				}
			});
		});
	}

	function shownews(type) {
		var par = "type=" + type;
		$.getJSON("qnews.php", par, function(result) {
			var j = 0;
			var str = "";
			var imgas = new Array();
			$.each(result, function(i, field) {
				if (field.topnews == 1) {
					var para = document.createElement("div");
					if (j == 0)
						para.className = "item active";
					else
						para.className = "item";
					var imageObject = document.createElement("img");
					imageObject.src = field.image;
					imageObject.alt = "First slide";
					$(imageObject).attr("data-displayurl", "newscontain.html?id=" + field.id);
					para.appendChild(imageObject);
					imgas[j++] = para;
				} else if (field.image1 == "") {
					//注册一个Handlebars模版，通过id找到某一个模版，获取模版的html框架
					var source=$('#mymain3').html();
					var myTemplate = Handlebars.compile(source);
					var data=myTemplate(field);
					
					str+=data;
				} else {
					var source=$('#mymain4').html();
					var myTemplate=Handlebars.compile(source);
					var data=myTemplate(field);console.log(field);
					str+=data;
				}
			});
			$(".containbox").append(str);
			$(imgas).appendTo(".carousel-inner");
			//点击查看详细新闻
			$(".main3-box").click(function() {
				var url = $(this).attr("data-displayurl");
				window.open(url);
			});
			//轮播图新闻
			$(".item").find("img").click(function() {
				var url = $(this).attr("data-displayurl");
				window.open(url);
			});
			//三张图
			$(".main4-box").click(function() {
				var url = $(this).attr("data-displayurl");
				window.open(url);
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

}