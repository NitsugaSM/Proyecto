<?php
session_start();
if ($_SESSION) {

	if ($_SESSION['privilegios'] == 1) {
require_once('../class/Contacto.php');
$contacto = Contacto::recuperarTodos();
include('../template/header.php');
?>

	<h1> Contactos</h1>
	<a href="../index.php">Regresar</a>

	<?php
	if (count($contacto) > 0): 
	?>
	<div style="overflow-x:auto;">
		<table class="table table-bordered">
			
			<tr>
				<td>Nombre</td>
				<td>Email</td>
				<td>Telefono</td>
				<td>Asunto</td>
				<td>Mensaje</td>
				<td> </td>
			</tr>

			<?php  
			foreach ($contacto as $item):
			?>
			<tr>
				<td> <?php echo $item['nombre']; ?> </td>
				<td> <?php echo $item['email']; ?> </td>
				<td> <?php echo $item['telefono']; ?> </td>
				<td> <?php echo $item['asunto']; ?> </td>
				<td> <?php echo $item['mensaje']; ?> </td>
				<td> <form action="eliminar.php" method="POST">
                    <input type="hidden" name="idContacto" value="<?php echo $item['idContacto']?>">
                    <button class="btn btn-danger" data-toggle="confirmation" data-placement="left">Eliminar</button>
                  </form></td>
			</tr>
			<?php endforeach;  ?>

		</table>
	</div>

	<?php else: ?>
		<p> No hay contactos registrados </p>
	<?php endif; ?>

<?php  
include_once('../template/footer.php');
	}
}
?>

