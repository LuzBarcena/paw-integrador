google.load('maps', '2', {callback:initMap});
var map;
function initMap(){	
	if (GBrowserIsCompatible()) { 
		var map = new GMap2(document.getElementById("map"));
		map.setCenter(new GLatLng(20.0972, -81.6503), 6);
	}
}

window.onload=function(){
	initMap();
}