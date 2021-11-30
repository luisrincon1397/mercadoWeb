<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Inicio de sesión</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="<?= base_url(); ?>/static/js/bootstrapJS/bootstrap.js"></script>
	<script src="<?= base_url(); ?>/static/js/bootstrapJS/jquery.min.js"></script>
	<link href="<?= base_url(); ?>/static/css/bootstrapCSS/bootstrap.css" rel="stylesheet">
	<link href="<?= base_url() ?>/static/css/estilos/login.css" rel="stylesheet">
</HEAD>

<BODY>
	<h2>Login</h2>

	<!--             <div class="card col col-md-3">
                <div class="card-header">
                    <h4>Inicio de sesión</h4>
                </div>

                <div class="card-body">
                    <div class="col col-md-4">
                        <label>Correo eléctronico:</label>
                        <input type="text" id="usuario">
                    </div>

                    <div class="col col-md-4">
                        <label>Correo eléctronico:</label>
                        <input type="text" id="usuario">
                    </div>

                </div>
            </div> -->             
                  
	<div id="contenedor" class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-md-6">
				<div class="col-md-12">
					<form id="login-form" action="<?= base_url(); ?>inicio/inicio_sesion" method="post"><br><br>
						<h3 class="text-center text-info">Inicio de sesión</h3>
						<div class="form-group">
							<label for="correo">Usuario:</label>
							<input type="text" name="usuario" id="usuario" class="form-control" required>
						</div>

						<div class="form-group">
							<label for="contrasenia">Contraseña:</label>
							<input type="password" name="contrasenia" id="contrasenia" class="form-control" required><br>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-info">Iniciar sesión</button>
						</div>
						<div class="form-group">
                            <a href="#">¿Crea un cuenta?</a>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>

</BODY>
</html>