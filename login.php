<?php 
include_once('template/header.php');
?>

	<div class="row">
		<div class="col-xs-12">
  				<h1>Iniciar sesión</h1>
 			<br>
			<form action="lib/validar_login.php" method="post">

				<div class="row">
					<div class="col-xs-3"></div>
					<div class="col-xs-6">
						<label id="icon" for="email"><i class="icon-envelope "></i></label>
						<label for="email"><h4>Correo: </h4></label>
						<input type="email" name="email" id="email" class="form-control" placeholder="Correo"><br>
					</div>
					<div class="col-xs-3"></div>
				</div>
				
				<div class="row">
					<div class="col-xs-3"></div>
					<div class="col-xs-6">
						<label id="icon" for="password"><i class="icon-shield"></i></label>
						<label for="password"><h4>Contraseña:</h4></label>
						<input type="password" name="password" id="password" class="form-control" placeholder="Contraseña"><br>
					</div>
					<div class="col-xs-3"></div>
				</div>

				<center><button type="submit" class="btn btn-primary"><h4>Enviar</h4></button></center>

			</form>
						
		</div>
	</div>

	<br>

<?php 
include_once('template/footer.php');
?>