function controlSlideshow(action) {
		if(!action) action = $('#toggleSlide').attr('data-toggle');
		if(!action){
			$('#toggleSlide').attr('data-toggle',1);
			$('.cover #toggleSlide').html('<i class="fa fa-pause"></i>');
		}else{
			$('#toggleSlide').removeAttr('data-toggle');
			$('.cover #toggleSlide').html('<i class="fa fa-play"></i>');
		}
		return $('#toggleSlide').attr('data-toggle');
}
$(function(){
	$('.switcher').on("click","span",function(){
		var id = $(this).attr('id');
		id = id.split('switch');
		id = id[1];
		$('.cover img,.switcher span').removeClass('show');
		$('.cover img[id="c' + id + '"],.switcher span[id="switch' + id + '"]').addClass('show');
	});
	var dir = "img/cover";
	var fileextension = ".jpg";
	var count = 0;
	$.ajax({
		//This will retrieve the contents of the folder if the folder is configured as 'browsable'
		url: dir,
		success: function (data) {
			//Lsit all png file names in the page
			$(data).find("a:contains(" + fileextension + ")").each(function () {
				var filename = this.href.replace('http://louisdickinson.com/smartcube', "");
				var show = "";
				if(count === 0) show = "class='show'";
				count++;
				$(".cover").append($("<img id='c" + count + "' src=" + dir + filename + " " + show + "></img>"));
				$('.cover').attr('image-count',count--);
				count++;
			});
		}
	}).done(function(){
		var count = $('.cover').attr('image-count');
		$('.cover').append('<div id="toggleSlide"></div>');
		for(var i=1;i<=count;i++){
			var show = "";
			if(i == 1) show = "class='show'";
			$('.cover .switcher').append('<span id="switch' + i + '" ' + show + '></span>');
		}
		setInterval(function(){
			if($('#toggleSlide').attr('data-toggle')){
				if(count !== 0){
					var imgID = $('img[class="show"]').attr('id');
					imgID = imgID.split('c');
					var nextImg = imgID[1];
					nextImg++;
					if(imgID[1] == count) nextImg = 1;
					console.log(nextImg);
					$('.cover img,.switcher span').removeClass('show');
					$('.cover img[id="c' + nextImg + '"],.switcher span[id="switch' + nextImg + '"]').addClass('show');
				}
			}else{
				console.log('Slidehow is paused');
			}
		}, 8000);
		controlSlideshow();
	});

	$('.cover').on("click","#toggleSlide",function(){
		controlSlideshow();
	});
});