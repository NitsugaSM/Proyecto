<?php
session_start();
if ($_SESSION) {

	if ($_SESSION['privilegios'] == 1) {

require_once('../class/Producto.php');
$producto = Producto::recuperarTodos();
include('../template/header.php');
?>

	<h1> Gestión de Productos</h1>
	<a href="../index.php">Regresar</a>
	<br>
	<a href="guardar_producto.php" class="btn btn-success"> Rgistrar nuevo Producto</a>

	<?php
	if (count($producto) > 0): 
	?>
	<div style="overflow-x:auto;">
		<table class="table table-bordered">
			
			<tr>
				<td>Imagen</td>
				<td>Nombre del producto</td>
				<td>Precio</td>
				<td>Stock</td>
				<td>Descripción</td>
				<td>Categoría</td>
				<td> </td>
				<td> </td>
			</tr>

			<?php  
			foreach ($producto as $item):
			?>
			<tr>
				<td><img src="<?php echo $item['url']; ?>" height="100" width="100"> </td>
				<td> <?php echo $item['nombreProducto']; ?> </td>
				<td> <?php echo $item['precio']; ?> </td>
				<td> <?php echo $item['stock']; ?> </td>
				<td> <?php echo $item['descripcion']; ?> </td>
				<td> <?php echo $item['nombreCategoria']; ?> </td>
				<td> <a href="guardar_producto.php?idProducto=<?php echo $item['idProducto'] ?>"><button class="btn btn-warning">Actualizar</button></a> </td>
				<td> <form action="eliminar.php" method="POST">
                    <input type="hidden" name="idProducto" value="<?php echo $item['idProducto']?>">
                    <button class="btn btn-danger" data-toggle="confirmation" data-placement="left">Eliminar</button>
                  </form></td>
			</tr>
			<?php endforeach;  ?>

		</table>
	</div>

	<?php else: ?>
		<p> No hay Productos registrados </p>
	<?php endif; ?>

<?php  
include_once('../template/footer.php');
	}
}
?>

