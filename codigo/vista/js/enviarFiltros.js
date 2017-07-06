$(document).ready(function () {
	$("input[name='consultar']").click(obtenerDatos);
});
var contarMostrados = 0;
var final;
var raza;

function obtenerDatos() {
	contarMostrados = 0;
	var div = document.getElementById('resultado');
	div.innerHTML = "";
	//VOY A VER SI QUE CHECKBOX SE MARCARON
	var tamanio = $("input[name='tamanio']");
	var sexo = $("input[name='sexo']");
	var edad = $("input[name='edad']");
	raza = $("select[name='select_raza']").val();

	var filtroTamanio = chequearSeleccionado(tamanio);
	var filtroSexo = chequearSeleccionado(sexo);
	var filtroEdad = chequearSeleccionado(edad);

	var datos = "";
	var vtamanio = "";
	var vsexo = "";
	var vedad = "";


	//---------------------------------------------------------------------------------------------------------------------------------------------------------------
	//PARA PONER EL WHERE
	if(filtroTamanio.length > 0){
		datos = datos + "where ";
	}else{
		if(filtroSexo.length > 0){
			datos = datos + "where";
		}else{
			if(filtroEdad.length > 0){
				datos = datos + "where";
			}else{
				datos = datos + "where id_adoptante is null"
			}
		}
	}

	//VOY ARMANDO LA QUERY
	//tamanio
	for (var i = 0; i < filtroTamanio.length; i++) {
		if(i > 0){
			vtamanio = vtamanio + " OR tamanio = " + "'" + filtroTamanio[i] + "'";
		}else{
			vtamanio = "(tamanio = " + "'" + filtroTamanio[i] + "'";
		}
	}
	if (filtroTamanio.length > 0){
		vtamanio = vtamanio + ")";
	}

	//sexo
	for (var i = 0; i < filtroSexo.length; i++) {
		if(i > 0){
			vsexo = vsexo + " OR sexo = " + "'" + filtroSexo[i] + "'";
		}else{
			vsexo ="(sexo = " + "'" + filtroSexo[i] + "'";
		}
	}
	if (filtroSexo.length > 0){
		vsexo = vsexo + ")";
	}

	//edad
	for (var i = 0; i < filtroEdad.length; i++) {
		if(i > 0){
			vedad =  vedad + " OR edad = " + "'" + filtroEdad[i] + "'";
		}else{
			vedad = "(edad = " + "'" + filtroEdad[i] + "'";
		}
	}
	if (filtroEdad.length > 0){
		vedad = vedad + ")";
	}
	
	
	var array = [];

	//PARA PONER EL AND
	if(vtamanio != ""){
		array.push(vtamanio);
	}
	if(vsexo != ""){
		array.push(vsexo);
	}
	if(vedad != ""){
		array.push(vedad);
	}


	for(i = 0; i < array.length; i++){
		if(i < array.length-1){
			array[i] = array[i] + " AND ";
		}
	}

	final = datos;
	for(i = 0; i < array.length; i++){
		final = final + array[i];
	}

	//--------------------------------------------------------------------------------------------------------------------------------------------------------------

  	enviarFiltros(final, raza, contarMostrados);
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


function enviarFiltros(final, raza, contarMostrados) {
	var parametros = {
		"do": "enviar",
		"final": JSON.stringify(final),
		"raza": raza,
		"contador": contarMostrados
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
	console.log(html);
	document.getElementById('resultado').innerHTML += html;
}

function mostrarMas() {
	contarMostrados += 1;
	var boton = document.getElementById("mostrarMas");
	boton.parentNode.removeChild(boton);
	enviarFiltros(final, raza, contarMostrados);
}