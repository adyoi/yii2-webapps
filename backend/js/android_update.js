function showBarcode(number) {
	document.getElementById('shipmentdeliverydetail-awb_number').value = number;
	document.getElementById('enter').click();
}

function showGPS (longitude, latitude) {
	var gps, lon, lat;
	if (typeof latitude !== 'undefined' &&
		latitude !== null) {
		lon = longitude;
		lat = latitude;
	} else {
		gps = longitude.split(",");
		lon = gps[0];
		lat = gps[1];
	}
	document.getElementById('longitude').value = lon;
	document.getElementById('latitude').value = lat;
}
