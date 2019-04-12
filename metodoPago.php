<?php
include_once 'template/header.php';
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
					<li class="nav-item disable"  style="background-color: #82FA58;">
					    <a class="nav-link" href="#" >Método de pago</a>
					</li>
					<li class="nav-item disabled">
					    <a class="nav-link disabled" href="metodoEnvio.php" >Método de envío</a>
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

		<center><h2><u> Método de Pago</u></h2></center>
		<hr>
		<div class="row">
		<div class="col-xs-3"></div>
		<div class="col-xs-8">
		<h4><i> Seleccione una opción</i></h4>
		<form action="metodoEnvio.php" method="post">

		<div class="form-check">
			<label class="form-check-label">
			    <input type="radio" class="form-check-input" name="metodoPago" value="PayPal" checked><img src="images/paypal.png" width="130" height="50">
			</label>
		</div>

		<div class="form-check">
		  <label class="form-check-label">
			    <input type="radio" class="form-check-input" name="metodoPago" value="Depósito Bancario"><img src="images/deposito.png" width="60" height="60"> Depósito Bancario
		  </label>
		</div>

		<div class="form-check">
		  <label class="form-check-label">
			    <input type="radio" class="form-check-input" name="metodoPago" value="Transferencia Bancaria"><img src="images/transferencia.png" width="60" height="60"> Transferencia Bancaria
		  </label>
		</div>

		<div class="form-check">
		  <label class="form-check-label">
			    <input type="radio" class="form-check-input" name="metodoPago" value="Tarjeta de crédito"><img src="images/creditcard.jpg" width="70" height="50">Tarjeta de crédito
		  </label>
		</div>

		</div>
		<div class="col-xs-1"></div>
		</div>

		<br>
		<center>
		<a href="datosPersonales.php" class="btn btn-warning">Regresar</a>
		<a href="carrito.php" class="btn btn-danger">Cancelar</a>
		<input type="submit" value="Continuar" class="btn btn-success" />
		</center>
		</form>
	</div>
	<div class="col-xs-3"></div>
</div>

<?php 
include_once'template/footer.php';
?>