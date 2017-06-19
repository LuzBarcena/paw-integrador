{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="text/javascript" src="js/login.js"></script>
{/block}

{block name=section}
	<section class="section-login">
		{*action="../controlador/validarUsuario.php"
		onsubmit="return validarIniciarSesion();"*}
		<form class="formulario_login" method="POST" >
			<div class="container">
				<h1>INICIAR SESIÓN</h1>
				<label for="usuario"><b>Usuario</b></label>
				<input type="text" id="usuario" name="nombre_usuario" placeholder="Ingrese usuario" required>
				<label for="contrasenia"><b>Contraseña</b></label>
				<input type="password"  id="contrasenia" placeholder="Ingrese password" name="contrasenia" required>
				<div class="botones">
					<input type="button" id="iniciarSesion" name="iniciarSesion" value="Iniciar Sesión">
				</div>
			</div>
		</form>
	</section>
{/block}
