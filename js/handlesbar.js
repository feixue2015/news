<script type="text/x-handlebars-template" id="mymain3">
 	<div class='main3'>
		<div class='main3-box' data-url={{'newscontain/" + field.id +"'}}>
			<div class='new1 showline'>
				<div class='new-image'>
					<img class='img' src={{'"+field.images+"'}} />
				</div>
				<div class='new-text'>
					<h2 class='text-title'>
						{{"+field.title +"}}
					</h2>
					<p class='text-contain'>
						{{"+field.description +"}}
					</p>
				</div>
				<div class='new-bottom'>
					<div class='bottom-text'>
						<b class='time'>发表于{{"+field.datetime+"}}前</b>
						<b class='www'>网址</b>
						<b class='hot'>{{"+field.laiyuan+"}}</b>
					</div>
				</div>
			</div>
		</div>
  	</div>
</script>
<script type="text/x-handlebars-template" id="mymain4">
	<div class="main4">
		<div class="main4-box" data-url={{"newscontain/' + field.id+'"}}>
			<div class="main4-text">
			{{'+field.title +'}}
		    </div>
			<div class="image-list">
				<div class="image-box one">
					<img src={{"'+field.images+'"}} />
				</div>
			</div>
			<div class="image-list">
				<div class="image-box two">
					<img src={{"'+field.images2+'"}} />
				</div>
			</div>
			<div class="image-list">
				<div class="image-box three">
					<img src={{"'+field.images3+'"}}/>
				</div>
			</div>
		</div>
	</div>
</script>