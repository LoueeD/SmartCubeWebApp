$(function(){
	
	//Here we add the spesific device controller
	$('#add_submit').submit(function(){		
		$.ajax({
			data: $(this).serialize(),
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			sucsess: function(response){
				console.log(response);
			}
		});
		var deviceType = $('select[name="device"]').val();
		var deviceName = $('input[name="deviceName"]').val();
		printDeviceController(deviceName,deviceType);
		return false;
	});
});