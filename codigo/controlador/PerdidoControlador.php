<?php
include_once '../DAO/PerdidoDAO.php';
include_once '../modelo/Perdido.php';

class PerdidoControlador {

	public static function getPerdidos(){
		$resultado = PerdidoDAO::devolverPerdidos();
		
		//para probar si trae bien
		/*foreach ($resultado as $perdidos)
   		{
   			echo $perdidos["titulo"];
   			echo $perdidos["descripcion"];
   			echo $perdidos["foto"];
   			echo $perdidos["info_contacto"];
   			echo $perdidos["ultima_direccion"];
   		}*/

		return $resultado;
	}

}