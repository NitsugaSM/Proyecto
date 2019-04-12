<?php
session_start();
if ($_SESSION) {

	if ($_SESSION['privilegios'] == 1) {
require_once('../class/Comentario.php');
$comentario = Comentario::recuperarTodos();
include('../template/header.php');
?>

	<h1> Gestión de Comentarios</h1>
	<a href="../index.php">Regresar</a>
	<br>

	<?php
	if (count($comentario) > 0): 
	?>
	<div style="overflow-x:auto;">
		<table class="table table-bordered">
			
			<tr>
				<td>Email</td>
				<td>Mensaje</td>
				<td>Fecha</td>
				<td>Estatus</td>
				<td> </td>
				<td> </td>
			</tr>

			<?php  
			foreach ($comentario as $item):
			?>
			<tr>
				<td> <?php echo $item['email']; ?> </td>
				<td> <?php echo $item['mensaje']; ?> </td>
				<td> <?php echo $item['fecha']; ?> </td>
				<td> <?php echo $item['estatus']; ?> </td>
				<td> <a href="guardar_comentario.php?idComentario=<?php echo $item['idComentario'] ?>"><button class="btn btn-warning">Actualizar</button></a> </td>
				<td> <form action="eliminar.php" method="POST">
                    <input type="hidden" name="idComentario" value="<?php echo $item['idComentario']?>">
                    <button class="btn btn-danger" data-toggle="confirmation" data-placement="left">Eliminar</button>
                  </form></td>
			</tr>
			<?php endforeach;  ?>

		</table>
	</div>

	<?php else: ?>
		<p> No hay Comentarios registrados </p>
	<?php endif; ?>

<?php  
include_once('../template/footer.php');
	}
}
?>

