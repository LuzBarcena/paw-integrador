var longitud;
var latitud;

function initMap() {
    //creo el mapa, lo posiciona en la latitud y longitud de bs as
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -34.6083, lng: -58.3712},
        zoom: 13
    });
    
    var input = (document.getElementById('direccion'));

    //agrego el autocompletar al input de la direccion
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    //la ventana del mapa
    var infowindow = new google.maps.InfoWindow();

    //los puntos marcados
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            //Se ingreso un lugar que no estaba sugerido
            window.alert("El nombre que ingreso fallo: '" + place.name + "'");
            return;
        }

        //Si el lugar que ingreso el usuario "existe en el autocomplet" lo muestra en el mapa
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  
        }

        //aca lo marca
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        latitud = marker.getPosition().lat();
        longitud = marker.getPosition().lng();
        marker.setVisible(true);

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
    });
}

function getLatitud () {
    return latitud;
}

function getLongitud () {
    return longitud;
}

google.maps.event.addDomListener(window, 'load', initMap);