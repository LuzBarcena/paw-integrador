$(document).ready(function () {
	$("input[name='consultar']").click(obtenerDatos);
});

function obtenerDatos() {
	//VOY A VER SI QUE CHECKBOX SE MARCARON
	var tamanio = $("input[name='tamanio']");
	var sexo = $("input[name='sexo']");
	var edad = $("input[name='edad']");
	var raza = $("select[name='select_raza']").val();

	//var filtroRaza = chequearSelect(raza);
	var filtroTamanio = chequearSeleccionado(tamanio);
	var filtroSexo = chequearSeleccionado(sexo);
	var filtroEdad = chequearSeleccionado(edad);


	//PARA CHEQUEAR LOS FILTROS
	/*for(var i = 0; i < filtroRaza.length; i++){
  		console.log(filtroRaza[i]);
  	}*/

	for(var i = 0; i < filtroTamanio.length; i++){
  		console.log(filtroTamanio[i]);
  	}
  	for(var i = 0; i < filtroSexo.length; i++){
  		console.log(filtroSexo[i]);
  	}
  	for(var i = 0; i < filtroEdad.length; i++){
  		console.log(filtroEdad[i]);
  	}

  	enviarFiltros(filtroTamanio, filtroSexo, filtroEdad/*, filtroRaza*/);
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

function chequearSelect(select){
	var p = [];
	if(select != "Todas"){
		p.push(select);
	}

	return p;
}

function enviarFiltros(tamanio, sexo, edad/*, raza*/) {
	if(tamanio == ""){
		console.log("todos los tamaños");
	}
	if(edad == ""){
		console.log("todos las edades");
	}
	if(sexo == ""){
		console.log("todos los sexos");
	}
	/*if(raza == ""){
		console.log("todas las razas");
	}*/


	var parametros = {
		"do": "enviar",
		"tamanio": JSON.stringify(tamanio),
		"sexo": JSON.stringify(sexo),
		"edad": JSON.stringify(edad)
	}
	$.ajax({
		data: parametros,
		url: '../interfaces/validarFiltros.php',
		type: 'POST',
		success: function (respuesta) {
			if (respuesta.status === "ok") {
				for(i = 0 ; i <  respuesta.registros.length ; i++){
					console.log(respuesta.registros[i].nombre);
				}
				location.href="perros.php?registros="+escape(JSON.stringify(respuesta.registros));
			} else {
				console.log(respuesta.descripcion);
			}
			
		},
		error: function(respuesta) {
			console.log(respuesta.descripcion);
        }
    });
}