<?php 
	require_once 'vendor/autoload.php';

	$loader = new Twig_Loader_Filesystem('templates/'); //donde esta mi vista
	$twig = new Twig_Environment($loader); //es el ambiente en donde se tiene que crear la vista

	$nombre_usuario = "Luz";

	//compact pone las variables en un array asociativo, porque render necesita un array
	echo $twig->render("index.html", compact('nombre_usuario'));
