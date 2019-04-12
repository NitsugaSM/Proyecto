<?php
session_start();
if ($_SESSION) {

	if ($_SESSION['privilegios'] == 1) {
require_once('../class/Pedido.php');
$pedido = Pedido::recuperarTodos();
include('../template/header.php');
?>

	<h1> Gestión de Pedidos</h1>
	<a href="../index.php">Regresar</a>
	<br>

	<?php
	if (count($pedido) > 0): 
	?>
	<div style="overflow-x:auto;">
		<table class="table table-bordered">
			
			<tr>
				<td>Usuario</td>
				<td>Producto(s)</td>
				<td>Total</td>
				<td>Método de Pago</td>
				<td>Método de Envío</td>
				<td>Fecha de Pedido</td>
				<td>Estatus</td>
				<td> </td>
				<td> </td>
			</tr>

			<?php  
			foreach ($pedido as $item):
			?>
			<tr>
				<td> <?php echo $item['idUsuario']; ?> </td>
				<td> <?php echo $item['producto']; ?> </td>
				<td> <?php echo $item['total']; ?> </td>
				<td> <?php echo $item['metodoPago']; ?> </td>
				<td> <?php echo $item['metodoEnvio']; ?> </td>
				<td> <?php echo $item['fechaPedido']; ?> </td>
				<td> <?php echo $item['estatus']; ?> </td>
				<td> <a href="guardar_pedido.php?idPedido=<?php echo $item['idPedido'] ?>"><button class="btn btn-warning">Actualizar</button></a> </td>
				<td> <form action="eliminar.php" method="POST">
                    <input type="hidden" name="idPedido" value="<?php echo $item['idPedido']?>">
                    <button class="btn btn-danger" data-toggle="confirmation" data-placement="left">Eliminar</button>
                  </form></td>
			</tr>
			<?php endforeach;  ?>

		</table>
	</div>

	<?php else: ?>
		<p> No hay Pedidos registrados </p>
	<?php endif; ?>

<?php  
include_once('../template/footer.php');
	}
}
?>

