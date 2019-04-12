<?php
include 'template/header.php';
require_once 'admin/class/Pedido.php';

$idUsuario = $_SESSION['idUsuario'];
$pedido = Pedido::recuperarTodosUsuario($idUsuario);

?>

<h1> Pedidos realizados</h1>
	<a href="../index.php">Regresar</a>
	<br>

	<?php
	if (count($pedido) > 0): 
	?>
	<div style="overflow-x:auto;">
		<table class="table table-bordered">
			
			<tr>
				<td>Producto(s)</td>
				<td>Total</td>
				<td>Método de Pago</td>
				<td>Método de Envío</td>
				<td>Fecha de Pedido</td>
				<td>Estatus</td>

			</tr>

			<?php  
			foreach ($pedido as $item):
			?>
			<tr>
				<td> <?php echo $item['producto']; ?> </td>
				<td> <?php echo $item['total']; ?> </td>
				<td> <?php echo $item['metodoPago']; ?> </td>
				<td> <?php echo $item['metodoEnvio']; ?> </td>
				<td> <?php echo $item['fechaPedido']; ?> </td>
				<td> <?php echo $item['estatus']; ?> </td>
			</tr>
			<?php endforeach;  ?>

		</table>
	</div>

	<?php else: ?>
		<p> No hay Pedidos registrados </p>
	<?php endif; ?>



<?php
include 'template/footer.php';
?>
