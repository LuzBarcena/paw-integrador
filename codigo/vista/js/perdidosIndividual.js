function initMap() {
	latitud = document.getElementById('latitud');
	longitud = document.getElementById('longitud');

    //creo el mapa, lo posiciona en la latitud y longitud de bs as
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: latitud, lng: longitud},
        zoom: 13
    });

	var marker = new google.maps.Marker({
		position: {lat: latitud, lng: longitud},
		map: map
	});
}

google.maps.event.addDomListener(window, 'load', initMap);