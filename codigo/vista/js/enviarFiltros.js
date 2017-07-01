$(document).ready(function () {
	$("input[name='consultar']").click(obtenerDatos);
});

function obtenerDatos() {
	//VOY A VER SI QUE CHECKBOX SE MARCARON
	var tamanio = $("input[name='tamanio']");
	var sexo = $("input[name='sexo']");
	var edad = $("input[name='edad']");
	var raza = $("select[name='select_raza']").val();

	var filtroRaza = chequearSelect(raza);
	var filtroTamanio = chequearSeleccionado(tamanio);
	var filtroSexo = chequearSeleccionado(sexo);
	var filtroEdad = chequearSeleccionado(edad);

	var datos = "";
	var vtamanio = "";
	var vsexo = "";
	var vedad = "";
	var vraza = "";

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
				if(filtroRaza.length > 0){
					datos = datos + "where";
				}
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
	
	//raza
	if(raza != "Todas"){
		vraza = "(raza = " + "'" + raza + "'" + ")";
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
	if(vraza != ""){
		array.push(vraza);
	}


	for(i = 0; i < array.length; i++){
		if(i < array.length-1){
			array[i] = array[i] + " AND ";
		}
	}

	var final = datos;
	for(i = 0; i < array.length; i++){
		final = final + array[i];
	}

	//--------------------------------------------------------------------------------------------------------------------------------------------------------------

  	enviarFiltros(final);
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

function enviarFiltros(final) {
	console.log(final);
	var parametros = {
		"do": "enviar",
		"final": JSON.stringify(final)
	}
	$.ajax({
		data: parametros,
		url: '../interfaces/validarFiltros.php',
		type: 'POST',
		success: function (respuesta) {
			if (respuesta.status === "ok") {
				location.href="perros.php?registros="+escape(JSON.stringify(respuesta.registros));
			} else {
				mostrarModal(respuesta.descripcion);
			}
			
		},
		error: function(respuesta) {
			mostrarModal(respuesta.descripcion);
        }
    });
}