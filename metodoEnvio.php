<?php
include_once 'template/header.php';

$idUsuario = $_SESSION['idUsuario'];
$metodoPago = (isset($_POST['metodoPago'])) ? $_POST['metodoPago'] : null;
?>

<div class="row"><!--row 2-->
	<div class="col-xs-1"></div>
		<div class="col-xs-10">
		<nav class="navbar" style="background-color: #A9E2F3;" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
				            data-target=".navbar-ex2-collapse" style="background-color: #ffffff;">
					<span class="sr-only">Desplegar navegación</span>
					<span class="icon-bar" style="background-color: #A9E2F3;"></span>
					<span class="icon-bar" style="background-color: #A9E2F3;"></span>
					<span class="icon-bar" style="background-color: #A9E2F3;"></span>
				</button>
			</div>

			<div class="collapse navbar-collapse navbar-ex2-collapse">
				<ul class="nav navbar-nav">
					<li class="nav-item disable">
					    <a class="nav-link" href="datosPersonales.php">Datos personales</a>
					</li>
					<li class="nav-item disable"  >
					    <a class="nav-link disable" href="metodoPago.php" >Método de pago</a>
					</li>
					<li class="nav-item disable" style="background-color: #82FA58;">
					    <a class="nav-link disabled" href="#" >Método de envío</a>
					</li>
					<li class="nav-item disabled">
					    <a class="nav-link disabled" href="resumenPedido.php" >Resumen de pedido</a>
					</li>	    
				</ul>
			</div>
		</nav>
	</div>
	<div class="col-xs-1"></div>
</div><!-- fin row 2-->

<div class="row">
	<div class="col-xs-3"></div>
	<div class="col-xs-6">

		<center><h2><u> Método de Envío</u></h2></center>
		<hr>
		<div class="row">
		<div class="col-xs-3"></div>
		<div class="col-xs-8">
		<h4><i> Seleccione una opción</i></h4>
		<form action="resumenPedido.php" method="post">

		<div class="form-check">
			<label class="form-check-label">
			    <input type="radio" class="form-check-input" name="metodoEnvio" value="Estafeta" checked><img src="images/estafeta.png" width="130" height="50" checked>
			</label>
		</div>

		<div class="form-check">
		  <label class="form-check-label">
			    <input type="radio" class="form-check-input" name="metodoEnvio" value="FedEx"><img src="images/fedex.png" width="130" height="40">
		  </label>
		</div>

		<div class="form-check">
			<label class="form-check-label">
			    <input type="radio" class="form-check-input" name="metodoEnvio" value="DHL" ><img src="images/dhl.png" width="130" height="40">
			</label>
		</div>

		<div class="form-check">
		  <label class="form-check-label">
			    <input type="radio" class="form-check-input" name="metodoEnvio" value="OrderExpress"><img src="images/orderexpress.png" width="165" height="60">
		  </label>
		</div>

		<input type="hidden" name="metodoPago" value="<?php echo $metodoPago ?>">
		<input type="hidden" name="idUsuario" value="<?php echo $idUsuario ?>">

		<br>

		<a href="datosPersonales.php" class="btn btn-warning">Regresar</a>
		<a href="carrito.php" class="btn btn-danger">Cancelar</a>
		<input type="submit" value="Continuar" class="btn btn-success" />

		</form>

		</div>
		<div class="col-xs-3"></div>
		</div>
	<div class="col-xs-3"></div>
	<br>
	</div>
</div>


<?php 
include_once'template/footer.php';
?>