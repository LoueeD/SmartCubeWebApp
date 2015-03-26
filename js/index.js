$(function() {
	function controlLight(device,action) {
		var e = 0;
		if(action == 'on'){
			e = 1;
		}
		//Device is equal to the light that was clicked however, 
		//aidens services is only setup to use 1 device atm so,
		//device is allways
		device = 1;
		$.ajax({
			type: "POST",
			url: "https://smartcubewebservice.appspot.com/api/AddEvent",
			data: '[{ "DevID" : "'+ device +'", "DevNewVal" : "' + e + '"}]',
			error: function(data) {
				console.log('AJAX-ERROR: ' + data);
			}
		});
	}
	
	
	$('.sidebar li').click(function() {
		if ($(this).text() == 'Logout') {
			localStorage.email = '';
			localStorage.forename = ''; 
			window.location.href = '/smartcube?logout';
		} else if ($(this).attr('class') == 'selected') {
			$('body').removeClass('openNav');
			$(this).removeClass('selected');
		} else {
			//Reset
			$('.sidebar li').removeClass('selected');
			$(this).addClass('selected');
			
			//Show correct content
			$('.menuSelector').hide();
			$('.menuSelector[data-id="' + $(this).attr('data-id') + '"]').show();
			
			//open
			$('body').addClass('openNav');
		}
	});
	$('.extraMenu span').addClass('selected');
	$('.extraMenu span').click(function() {
		$(this).toggleClass('selected');
	});
	$('.panel').on("click",".device",function() {
		var title = $(this).attr('data-name');
		var x = 0;
		if($(this).attr("data-type") == "switchAll") x = 1;
		if($(this).hasClass("active")){
			if(x) $('.device').removeClass('active');
			else controlLight(title,'0');
		}else{
			if(x) $('.device').addClass('active');
			else controlLight(title,'1');
		}
		$(this).toggleClass('active');
		console.log('Device Clicked: ' + title);
	});
});

function printDeviceController(name,type) {
	var controller = '<div class="device" data-name="' + name + '"><div class="switch"></div><h2>' + name + '</h2></div>';
	switch (type) {
		case "range":
			controller = '<div class="device" data-name="' + name + '">' + 
				'<input type="range" class="slider" min="15" max="33" value="33" /><h2>' + name + '<span></span></h2></div>';
			break;
		case "color":
			controller = '<div class="device" data-name="' + name + '">' + 
				'<div class="colorBulb">' + 
				'<span>Click to choose colour</span>' + 
				'</div>' + 
				'<h2>' + name + '</h2>' + 
				'</div>';
			break;
		case "status":
			controller = '<div class="device" data-name="' + name + '">' + 
			'<div class="status">LOCKED</div>' + 
			'<h2>' + name + '</h2>' +
			'</div>';
			break;
		case "switchAll":
			controller = '<div class="device" data-type="switchAll" data-name="' + 
				name + '"><div class="switch"></div><h2>' + 
				name + '</h2></div>';
			break;
	}
	$('.panel').append(controller);
}