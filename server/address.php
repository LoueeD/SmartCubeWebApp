<?php
// First, we need to take their postcode and get the lat/lng pair:
$postcode = $_GET['postcode'];

if($postcode){
	// Sanitize their postcode:
	$search_code = urlencode($postcode);
	$url = 'http://maps.googleapis.com/maps/api/geocode/json?address=' . $search_code . '&sensor=false';
	$json = json_decode(file_get_contents($url));

	$lat = $json->results[0]->geometry->location->lat;
	$lng = $json->results[0]->geometry->location->lng;

	// Now build the lookup:
	$address_url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . $lat . ',' . $lng . '&sensor=false';
	$address_json = json_decode(file_get_contents($address_url));
	$address_data = $address_json->results[0]->address_components;

	$street = str_replace('Dr', 'Drive', $address_data[1]->long_name);
	$county = $address_data[2]->long_name;
	$country = $address_data[5]->long_name;
	$postal_code = str_replace("+", " ",$search_code);

	$array = array('street' => $street, 'county' => $county, 'postal_code' => $postal_code, 'country' => $country);
	// echo json_encode($array); - Collect with javascript and feed into form
	echo $array['street'].'<br />'.$array['county'].'<br />'.$array['postal_code'].'<br />'.$array['country'];
}
?>