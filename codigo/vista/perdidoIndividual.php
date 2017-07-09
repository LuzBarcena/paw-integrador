<?php 
include_once('../controlador/SesionControlador.php');
include_once('../controlador/PerdidoControlador.php');
include_once('../extras/Config.php');
require_once('TemplateManager.php');

Config::autoload();

$tpl = new TemplateManager();
$haySesion = SesionControlador::haySesion();
$tpl->assign('haySesion', $haySesion);
$tpl->assign("mismoUsuario", false);
if ($haySesion) {
	$usuario = SesionControlador::getSesion();
	$id_usuario = SesionControlador::getId();
	$tpl->assign('usuario', $usuario);
}
$tpl->assign('pageTitle', 'Perdidos');

$resultado = PerdidoControlador::getPerdido($_GET['id']);
if ($resultado != false) {
	if($haySesion){
		$mismoUsuario = PerdidoControlador::chequearUsuario($id_usuario, $_GET['id']);
		if($mismoUsuario != false){
			$tpl->assign("mismoUsuario", true);
			$tpl->assign("id", $mismoUsuario['id_perdido']);
		}
	}
	
	$tpl->assign("titulo", $resultado['titulo']);
	$tpl->assign('descripcion',$resultado['descripcion']);
	$tpl->assign('latitud', $resultado['lat']);
	$tpl->assign('longitud', $resultado['lng']);
	$tpl->assign('fechaAlta', $resultado['fecha_alta']);
	$tpl->assign('tel', $resultado['tel']);
	$esSilueta = strpos($resultado['foto'], 'silueta');
	if ($esSilueta === false) {
		$path = concatenarPath($resultado['foto'], 'perdidos');
		$path = $path . ".jpg";
	} else {
		$path = concatenarPath($resultado['foto'], 'siluetas');
		$path = $path . ".png";
	}
	$tpl->assign('foto', $path);
	/*estos son no obligatorios*/
	$sexo = $resultado['sexo'];
	if ($sexo != "") {
		$tpl->assign('sexo', $sexo);
	} else {
		$sexo = "Sin especificar";
		$tpl->assign('sexo', $sexo);
	}

	$nombre = $resultado['nombre'];
	if ($nombre != "") {
		$tpl->assign('nombre', $nombre);
	} else {
		$nombre = "Sin especificar";
		$tpl->assign('nombre', $nombre);
	}
	
	$fechaDesaparicion = $resultado['fecha_desaparicion'];
	if ($sexo != "") {
		$tpl->assign('fechaDesaparicion', $fechaDesaparicion);
	} else {
		$fechaDesaparicion = "Sin especificar";
		$tpl->assign('fechaDesaparicion', $fechaDesaparicion);
	}
}

$tpl->display("perdidosIndividual.tpl");