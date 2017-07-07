<?php

include_once('../extras/Config.php');
require_once('../vista/TemplateManager.php');

Config::autoload();

function mostrarResultado($datos) {
	$tpl = new TemplateManager();
	$tpl->assign("resultado", $datos);
	$tpl->display("resultadoBuscador.tpl");
}