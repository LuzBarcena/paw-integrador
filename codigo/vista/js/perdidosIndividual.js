function initMap() {
	latitud = parseFloat($('#latitud').text());
	longitud = parseFloat($('#longitud').text());

	console.log(latitud);
	console.log(longitud);

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