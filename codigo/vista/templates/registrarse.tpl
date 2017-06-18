{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/registrarse.css">
	<script type="text/javascript" src="js/registro.js"></script>
{/block}

{block name=section}
	<section id="contenedor_registro">
		<!-- action="../controlador/validarRegistro.php" 
			action="../interfaces/validarRegistro.php"
			onsubmit="return validar();"
		" -->
		<form class="formulario_registro" method="post" >
	    	<div class="container">
	    		<h1>REGISTRARSE</h1>
	    		<label><b>Nombre de usuario</b></label>
				<input type="text" min="3" max="30" placeholder="Ingrese nombre de usuario" name="nombre_usuario" required>
				<label><b>Email</b></label>
				<input type="email" min="11" max="50" placeholder="Ingrese email" name="email" onchange="" required>
				<label><b>Contraseña</b></label>
				<input type="password" min="6" max="30" placeholder="Ingrese contraseña" name="contrasenia" onchange="" required>
				<label><b>Repita contraseña</b></label>
				<input type="password" min="6" max="30" placeholder="Ingrese contraseña" name="contrasenia2" onchange="" required>
				<label><b>Nombre</b></label>
				<input type="text" min="3" max="50" placeholder="Ingrese su nombre" name="nombre" onchange="" required>
				<label><b>Apellido</b></label>
				<input type="text" min="3" max="50" placeholder="Ingrese su apellido" name="apellido" onchange="" required>
				<label><b>Fecha de nacimiento</b></label>
				<input type="date" min="01-01-1930" placeholder="Fecha" name="fecha_nacimiento" onchange="" required>
				<div class="botones">
					<input type="button" class="registro" name="registro" value="Registrarse"></input>
				</div>
			</div>
		</form>
	</section>
{/block}