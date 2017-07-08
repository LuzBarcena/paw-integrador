{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/registrarse.css">
	<script type="text/javascript" src="js/registro.js"></script>
{/block}

{block name=section}
	<section id="contenedor_registro">
		<form class="formulario_registro" method="post" >
	    	<div class="container">
	    		<h2>REGISTRARSE</h2>
	    		<label><strong>Nombre de usuario</strong></label>
				<input type="text" min="3" max="30" placeholder="Ingrese nombre de usuario" name="nombre_usuario" required>
				<label><strong>Email</strong></label>
				<input type="email" min="11" max="50" placeholder="Ingrese email" name="email" onchange="" required>
				<label><strong>Contraseña</strong></label>
				<input type="password" min="6" max="30" placeholder="Ingrese contraseña" name="contrasenia" onchange="" required>
				<label><strong>Repita contraseña</strong></label>
				<input type="password" min="6" max="30" placeholder="Ingrese contraseña" name="contrasenia2" onchange="" required>
				<label><strong>Nombre</strong></label>
				<input type="text" min="3" max="50" placeholder="Ingrese su nombre" name="nombre" onchange="" required>
				<label><strong>Apellido</strong></label>
				<input type="text" min="3" max="50" placeholder="Ingrese su apellido" name="apellido" onchange="" required>
				<label><strong>Fecha de nacimiento</strong></label>
				<input type="date" min="01-01-1930" placeholder="Fecha" name="fecha_nacimiento" onchange="" required>
				<div class="botones">
					<input type="button" class="registro" name="registro" value="Registrarse"></input>
					<input type="reset">
				</div>
			</div>
		</form>
	</section>
{/block}