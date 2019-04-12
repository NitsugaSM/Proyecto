<?php 
include_once('template/header.php');
?>
<br>
<div class="row">
 	<div class="col-xs-12">
 		<center><h2>Contáctanos</h2></center>
 		<br>
 		<br>
 		<form action="lib/validar_contactar.php" method="post">

 			<div class="row">
 			<div class="col-xs-3"></div>
 			<div class="col-xs-6">
	 		<label for="nombre"><h4>Nombre</h4></label>
	 		<input type="text" name="nombre" id="nombre" class="form-control" required>
	 		</div>
	 		<div class="col-xs-3"></div>
	 		</div>

	 		<div class="row">
	 		<div class="col-xs-3"></div>
 			<div class="col-xs-6">
	 		<label id="icon" for="email"><i class="icon-envelope "></i></label>
	 		<label for="email"><h4>Correo</h4></label>
	 		<input type="email" name="email" id="email" class="form-control" required>
	 		</div>
	 		<div class="col-xs-3"></div>
	 		</div>

	 		<div class="row">
	 		<div class="col-xs-3"></div>
 			<div class="col-xs-6">
	 		<label for="telefono"><h4>Teléfono</h4></label>
	 		<input type="text" name="telefono" id="telefono" class="form-control">
	 		</div>
	 		<div class="col-xs-3"></div>
	 		</div>

	 		<div class="row">
	 		<div class="col-xs-3"></div>
 			<div class="col-xs-6">
	 		<label for="asunto"><h4>Asunto</h4></label>
	 		<input type="text" name="asunto" id="asunto" class="form-control" required>
	 		</div>
	 		<div class="col-xs-3"></div>
	 		</div>

	 		<div class="row">
	 		<div class="col-xs-3"></div>
 			<div class="col-xs-6">
	 		<label for="mensaje"><h4>Mensaje</h4></label>
	 		<textarea name="mensaje" id="mensaje" class="form-control" required></textarea>
	 		</div>
	 		<div class="col-xs-3"></div>
	 		</div>

 		<br>
 		<center><button type="submit" class="btn btn-primary">Enviar</button></center>

 		</form>
 	</div>
 	</div>
 <br> 
<?php 
include_once('template/footer.php');
?>