function initMap() {
	latitud = parseFloat($('#latitud').text());
	longitud = parseFloat($('#longitud').text());

	console.log(latitud);
	console.log(longitud);

    //creo el mapa, lo posiciona en la latitud y longitud de bs as
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {
        	lat: latitud, 
        	lng: longitud
        },
        zoom: 17
    });

	var marker = new google.maps.Marker({
		position: {lat: latitud, lng: longitud},
		map: map
	});
	geocoder = new google.maps.Geocoder();
	var center = map.getCenter();
	geocoder.geocode(
		{'latLng': center},
		function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				//esto da la direccion completa, ejemplo: Av. Pueyrredón 1202-1246, C1118AAP CABA, Argentina
				var direccion = results[0].formatted_address;
				//console.log(results[0].address_components);
				$("#direccion").text($("#direccion").text() + " " + direccion);
			} else {
				mostrarModal('Se desconoce la dirección debido a : ' + status);
			}
		}
	);
}

google.maps.event.addDomListener(window, 'load', initMap);
/*
status puede ser
"OK" indica que no ocurrieron errores, que la dirección se analizó correctamente y que se devolvió al menos un geocódigo.
ZERO_RESULTS indica que el geocódigo fue exitoso, pero no devolvió resultados. Esto puede ocurrir si se pasa un valor address inexistente al geocodificador.
"OVER_QUERY_LIMIT" indica que excediste tu cuota.
"REQUEST_DENIED" indica que se rechazó tu solicitud.
"INVALID_REQUEST" generalmente indica que falta la consulta (address, components o latlng).
"UNKNOWN_ERROR" indica que no se pudo procesar la solicitud por un error en el servidor. La solicitud puede tener éxito si realizas un nuevo intento.
 */
