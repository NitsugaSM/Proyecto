<?php 
include_once('template/header.php');
?>
<br>
<div class="row">
 	<div class="col-xs-12">
  			<h1>Registrar</h1>
 		<form action="lib/validar_registrar.php" method="post">
 			<hr>
 			<label id="icon" for="name"><i class="icon-user"></i></label>

	 		<label for="nombre"><h4>Nombre</h4></label>
	 		<input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre" pattern="[A-Za-z0-9%.-/]+"><br>
 			
	 		<label for="apellidos"><h4>Apellidos</h4></label>
	 		<input type="text" name="apellidos" id="apellidos" class="form-control" required placeholder="Apellidos"><br>

	 		<label id="icon" for="email"><i class="icon-envelope "></i></label>
 
		 	<label for="email"><h4>Correo</h4></label>
		 	<input type="email" name="email" id="email" class="form-control" required placeholder="Email"><br>

		 	<label id="icon" for="password"><i class="icon-shield"></i></label>

			<label for="password"><h4>Contraseña</h4></label>
	 		<input type="password" name="password" id="password" class="form-control" required placeholder="Contraseña" pattern="[A-Za-z0-9%.-]+" title="Sólo letras números % . -">

	 		<div class="col-xs-12">
	 		<center><button type="submit" class="btn btn-primary"><h4>Enviar</h4></button></center>
	 		</div>

 		</form>
 	</div>
 </div>
 <br>	
<?php 
	include_once('template/footer.php');
 ?>
 	