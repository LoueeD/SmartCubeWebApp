$(function(){
	//To start the test lets print out a selection of devices
	//(The app can use the printDeviceController that is initalised on the main index.js page)
	//
	//printDeviceController('name','type');
	//
	var devices = [
		['Living room light','switch'],
		['Front Door','status'],
		['Jess\'s bedroom light','switch'],
		['kitchen','color'],
		['Kitchen Heater','range'],
		['Bill\'s desk light','switch'],
		['Sara\'s heater','range'],
		['Living room hue','color'],
		['Garage Door','status'],
		['All House\'s lights','switchAll']
	];
	for(var i=0;i<devices.length;i++){
		var device = devices[i];
		printDeviceController(device[0],device[1]);
	}
});