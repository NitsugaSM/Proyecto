<?php
include_once 'template/header.php';
require_once'admin/class/Usuario.php';

$idUsuario = $_SESSION['idUsuario'];
$usuario = Usuario::buscarPorId($idUsuario);

$total = $_SESSION['total'];
$metodoPago = (isset($_POST['metodoPago'])) ? $_POST['metodoPago'] : null;
$metodoEnvio = (isset($_POST['metodoEnvio'])) ? $_POST['metodoEnvio'] : null;
$fechaPedido = date('Y/m/d');
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
					<li class="nav-item">
					    <a class="nav-link" href="datosPersonales.php">Datos personales</a>
					</li>
					<li class="nav-item"  >
					    <a class="nav-link" href="metodoPago.php" >Método de pago</a>
					</li>
					<li class="nav-item" >
					    <a class="nav-link" href="metodoEnvio.php" >Método de envío</a>
					</li>
					<li class="nav-item" style="background-color: #82FA58;">
					    <a class="nav-link " href="#" >Resumen de pedido</a>
					</li>	    
				</ul>
			</div>
		</nav>
	</div>
	<div class="col-xs-1"></div>
</div><!-- fin row 2-->

<div class="row">
	<div class="col-xs-12">
		<center><h2><u>Resumen del pedido</u></h2></center>

		<div class="row">
			<div class="col-xs-1"></div>	
			<div class="col-xs-10">
				<center><h3><b>Productos</b></h3></center>
					<div style="overflow-x:auto;">
						<table class="table" style="border:1px solid #81DAF5;">
							
							<thead>						
								<td>Producto</td>
								<td>Nombre</td>
								<td>Precio</td>
								<td>Cantidad</td>
								<td>Subtotal</td>
							</thead>

							<tbody>						
								<?php  
								$mi_carrito = $_SESSION['mi_carrito'];

									for ($i=0; $i < count($mi_carrito); $i++) { 								
								?>	

										<tr>
											<td><img src="admin/productos/<?php echo $mi_carrito[$i]['url'];?>" width="100" height="100"></td>
											<td><?php echo $mi_carrito[$i]['nombreProducto']; ?></td>
											<td><?php echo '$ '.$mi_carrito[$i]['precio']; ?></td>
											<td><?php echo $mi_carrito[$i]['cantidad']; ?></td>
											<td><?php echo '$ '.$mi_carrito[$i]['cantidad']*$mi_carrito[$i]['precio']; ?></td>
										</tr>
								<?php	
										}
								
								?>

							</tbody>

						</table>
					</div>
				<?php 
				?>
			</div>
			<div class="col-xs-1"></div>
			</div>

		<div class="row">
			<div class="col-xs-1"></div>	
			<div class="col-xs-10">
				<center><h4><b>Datos personales</b></h4></center>
				<hr>
				<div style="overflow-x:auto;">
					<table class="table" style="border:1px solid #81DAF5;">
						<thead>
							<td><b> Nombre(s)</b></td>
							<td><b>Apellidos</b></td>
							<td><b>Calle</b></td>
							<td><b>Número</b></td>
							<td><b>Colonia</b></td>
							<td><b>Código Postal</b></td>
							<td><b>Ciudad</b></td>
							<td><b>Estado</b></td>
							<td><b>Referencias</b></td>
							<td><b>Email</b></td>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $usuario->getNombre() ?></td>
								<td><?php echo $usuario->getApellidos() ?></td>
								<td><?php echo $usuario->getCalle() ?></td>
								<td><?php echo $usuario->getNumero() ?></td>
								<td><?php echo $usuario->getColonia() ?></td>
								<td><?php echo $usuario->getCp() ?></td>
								<td><?php echo $usuario->getCiudad() ?></td>
								<td><?php echo $usuario->getEstado() ?></td>
								<td><?php echo $usuario->getReferencia() ?></td>
								<td><?php echo $usuario->getEmail() ?></td>
							</tr>
						</tbody>
					</table>	
				</div>

				<center><h4><b>Datos del pedido</b></h4></center>
				<hr>
				<div style="overflow-x:auto;">
					<table class="table" style="border:1px solid #81DAF5;">
						<thead>
							<td><b>Total</b></td>
							<td><b>Método de Pago</b></td>
							<td><b>Método de Envío</b></td>
							<td><b>Fecha</b></td>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $total ?></td>
								<td><?php echo $metodoPago ?></td>
								<td><?php echo $metodoEnvio ?></td>
								<td><?php echo $fechaPedido ?></td>
							</tr>
						</tbody>
					</table>	
				</div>
				
			<form method="post" action="lib/validar_pedido.php" enctype="multipart/form-data">
				<br>
				<input type="hidden" name="idUsuario" value="<?php echo $usuario->getIdUsuario() ?>"/>
				<input type="hidden" name="total" value="<?php echo $total ?>"/>
				<input type="hidden" name="metodoPago" value="<?php echo $metodoPago ?>"/>
				<input type="hidden" name="metodoEnvio" value="<?php echo $metodoEnvio ?>"/>
				<input type="hidden" name="fechaPedido" value="<?php echo $fechaPedido ?>"/>
				<input type="checkbox" class="form-check-input" value="" required> He líedo y acepto los téminos y condiciones.
				<br>
				<br>
				<center>
				<a href="metodoEnvio.php" class="btn btn-warning">Regresar</a>
				<a href="carrito.php" class="btn btn-danger">Cancelar</a>
				<input type="submit" value="Continuar" class="btn btn-success" />
				</center>
			</form>
		</div>
		<div class="col-xs-1"></div>
	</div>
	</div>
	</div>



<?php 
include_once'template/footer.php';
?>