$(document).ready(function () {
	$("input[name='consultar']").click(obtenerDatos);
});
var contarMostrados = 0;
var raza;
var filtroTamanio;
var filtroSexo;
var filtroEdad;

function obtenerDatos() {
	contarMostrados = 0;
	var div = document.getElementById('resultado');
	div.innerHTML = "";
	//VOY A VER SI QUE CHECKBOX SE MARCARON
	var tamanio = $("input[name='tamanio']");
	var sexo = $("input[name='sexo']");
	var edad = $("input[name='edad']");
	raza = $("select[name='select_raza']").val();

	filtroTamanio = chequearSeleccionado(tamanio);
	filtroSexo = chequearSeleccionado(sexo);
	filtroEdad = chequearSeleccionado(edad);

  	enviarFiltros(filtroTamanio, filtroSexo, filtroEdad, raza, contarMostrados);
}

function chequearSeleccionado(dato){
	var p = [];
  	for (var i = 0; i < dato.length; i++) {
    	if (dato[i].checked) {
      		p.push(dato[i].value);
    	}
  	}
  	return p;
}


function enviarFiltros(filtroTamanio, filtroSexo, filtroEdad, raza, contarMostrados) {
	var parametros = {
		"do": "enviar",
		"tamanio" : filtroTamanio,
		"sexo" : filtroSexo,
		"edad" : filtroEdad,
		"raza" : raza,
		"contador" : contarMostrados
	}
	$.ajax({
		data: parametros,
		dataType: 'html',
		url: '../interfaces/validarFiltros.php',
		type: 'POST',
		success: function (respuesta) {
			cargarPerros(respuesta);
		},
		error: function (respuesta) {
			mostrarModal("Error", respuesta);
			setTimeout(function() {
				location.href ="perros.php";
			}, 1000);
		},
    });
}

function cargarPerros(html) {
	document.getElementById('resultado').innerHTML += html;
}

function mostrarMas() {
	contarMostrados += 1;
	var boton = document.getElementById("mostrarMas");
	boton.parentNode.removeChild(boton);
	enviarFiltros(filtroTamanio, filtroSexo, filtroEdad, raza, contarMostrados);
}