<?php
include_once 'template/header.php';
require_once 'lib/carrito_compra.php';

?>

<div class="row">	
	<div class="col-xs-12">
		<h1>Carrito</h1>

		<?php 
			$mi_carrito[] = null;
			
			if (isset($_SESSION['email'])):

				$numero_productos = 0;

				for ($i=0; $i < count($mi_carrito); $i++) { 
					
					if ($mi_carrito[$i] != null) {
						
						$numero_productos = $numero_productos + 1;
					}
				}

				if ($numero_productos > 0):
				
		?>

		<!-- Productos del carrito -->
			<div style="overflow-x:auto;">
				<table class="table">
					
					<thead>						
						<td>Imagen</td>
						<td>Nombre</td>
						<td>Precio</td>
						<td>Cantidad</td>
						<td>Subtotal</td>
					</thead>

					<tbody>						
						<?php  
						if (isset($mi_carrito)) {
							$total = 0;
							for ($i=0; $i < count($mi_carrito); $i++) { 								
								if ($mi_carrito[$i] != null) {
						?>	

								<tr>
									<td><img src="admin/productos/<?php echo $mi_carrito[$i]['url'];?>" width="100" height="100"></td>
									<td><?php echo $mi_carrito[$i]['nombreProducto']; ?></td>
									<td><?php echo '$ '.$mi_carrito[$i]['precio']; ?></td>
									<td>										
										<form action="carrito.php" method="post">
											<input type="hidden" name="" value="<?php echo $i ?>">
											<input type="hidden" name="idProductoActualizar" value="<?php echo $i ?>">
											<input type="number" name="cantidadActualizada" value="<?php echo $mi_carrito[$i]['cantidad'];?>" min="1" max="<?php echo $mi_carrito[$i]['stock'];?>">
											
											<input type="image" name="update" src="images/update.png" width="25" height="25">

										</form>
									</td>
									<td>
										<?php 
										$subtotal = $mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad'];
										$total = $total + $subtotal;
										echo '$ '.$subtotal;
										?>
									</td>
									<td>
										<form action="carrito.php" method="post">
											<input type="hidden" name="idProductoEliminar" value="<?php echo $i; ?>">
											<input type="image" name="delete" src="images/eliminar.png" width="25" height="25">
										</form>
									</td>
								</tr>
						<?php	
								}
							}
						}
						$_SESSION['total'] = $total;
						?>

					</tbody>

				</table>
			</div>
				<form action="carrito_compra.php" method="post">
					<input type="hidden" name="total" value="<?php echo $total; ?>">
					<a href="tienda.php" class="btn btn-lg btn-success">Seguir comprando</a>
					<a href="datosPersonales.php" class="btn btn-lg btn-primary">Continuar</a>
				</form>	


		<?php 
				else:
					echo '<p class="alert alert-warning"> No hay productos </p>';
				endif;

			else: 
				echo '<p class="alert alert-warning"> Para ver esta sección necesita Iniciar Sesión </p>';
			endif;
		?>
	</div>
</div>

<?php 
include_once'template/footer.php';
?>