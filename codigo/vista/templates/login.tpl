{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="text/javascript" src="js/login.js"></script>
{/block}

{block name=section}
	<section class="section-login">
		<form class="formulario_login" method="POST" >
			<h2>INICIAR SESIÓN</h2>
			<div class="container">
				<label for="usuario"><strong>Usuario</strong></label>
				<input type="text" id="usuario" name="nombre_usuario" placeholder="Ingrese usuario" required>
				<label for="contrasenia"><strong>Contraseña</strong></label>
				<input type="password"  id="contrasenia" placeholder="Ingrese password" name="contrasenia" required>
				<div class="botones">
					<input type="button" id="iniciarSesion" name="iniciarSesion" value="Iniciar Sesión">
				</div>
			</div>
		</form>
	</section>
{/block}
