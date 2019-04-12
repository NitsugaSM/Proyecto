<?php
session_start();
if ($_SESSION) {

	if ($_SESSION['privilegios'] == 1) {
require_once('../class/Categoria.php');
$categoria = Categoria::recuperarTodos();
include('../template/header.php');
?>

	<h1> Gestión de Categorias</h1>
	<a href="../index.php">Regresar</a>
	<br>
	<a href="guardar_categoria.php" class="btn btn-success"> Rgistar nueva categoria</a>

	<?php
	if (count($categoria) > 0): 
	?>
	<div style="overflow-x:auto;">
		<table class="table table-bordered">
			
			<tr>
				<td>Nombre</td>
				<td>Descripción</td>
				<td> </td>
				<td> </td>
			</tr>

			<?php  
			foreach ($categoria as $item):
			?>
			<tr>
				<td> <?php echo $item['nombreCategoria']; ?> </td>
				<td> <?php echo $item['descripcion']; ?> </td>
				<td> <a href="guardar_categoria.php?idCategoria=<?php echo $item['idCategoria'] ?>"><button class="btn btn-warning">Actualizar</button></a> </td>
				<td> <form action="eliminar.php" method="POST">
                    <input type="hidden" name="idCategoria" value="<?php echo $item['idCategoria']?>">
                    <button class="btn btn-danger" data-toggle="confirmation" data-placement="left">Eliminar</button>
                  </form></td>
			</tr>
			<?php endforeach;  ?>

		</table>
	</div>

	<?php else: ?>
		<p> No hay Categorías registradas </p>
	<?php endif; ?>

<?php  
include_once('../template/footer.php');
	}
}

?>

