$(function(){
    var bCanPreview = true; // can preview

    // create canvas and context objects
    var canvas = document.getElementById('picker');
    var ctx = canvas.getContext('2d');

    // drawing active image
    var image = new Image();
    image.onload = function () {
        ctx.drawImage(image, 0, 0, image.width, image.height); // draw the image on the canvas
    }

    // select desired colorwheel
    image.src = '../img/300px_color.png';

    $('#picker').mousemove(function(e) { // mouse move handler
    	// get coordinates of current position
        var canvasOffset = $(canvas).offset();
        var canvasX = Math.floor(e.pageX - canvasOffset.left);
        var canvasY = Math.floor(e.pageY - canvasOffset.top);

        // get current pixel
        var imageData = ctx.getImageData(canvasX, canvasY, 1, 1);
        var pixel = imageData.data;

        // update preview color
        var pixelColor = "rgb("+pixel[0]+", "+pixel[1]+", "+pixel[2]+")";
        $('.preview').css('backgroundColor', pixelColor);
    });
    $('#picker').click(function(e) { // click event handler
		$('.preview').addClass('pulse').delay(400).queue(function() {
        	$(this).removeClass('pulse');
            $(this).dequeue();
        });
		var color = $('.preview').css('backgroundColor');
		var name = $('.colorPicker').attr('data-name');
		$('.device[data-name="' + name + '"] span').css('backgroundColor', color);
		$('.fullscreen').fadeOut(300);
    });
	
	$('.panel').on("click",".colorBulb",function(){
		var name = $(this).parent().attr('data-name');
		$('.colorPicker').attr('data-name',name);
		$('.fullscreen').fadeIn(300);
		
	});
	$('preview').click(function(){
		$('.fullscreen').fadeOut(300);
	});
});