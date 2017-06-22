var map;
function initMap(){	
		var myLatLng = {lat: -34.6083, lng: -58.3712}; /*buenos aires*/
		var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(myLatLng),
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      	});

      	var marker = new google.maps.Marker({
            position: new google.maps.LatLng(myLatLng),
            map: map
      	});
}

google.maps.event.addDomListener(window, 'load', initMap);