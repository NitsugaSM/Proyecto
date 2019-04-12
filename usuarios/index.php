<?php
session_start();
if ($_SESSION) {

	if ($_SESSION['privilegios'] == 1) {
require_once('../class/Usuario.php');
$usuario = Usuario::recuperarTodos();
include('../template/header.php');
?>

	<h1> Gestión de Usuarios</h1>
	<a href="../index.php">Regresar</a>
	<br>
	<a href="guardar_usuario.php" class="btn btn-success"> Rgistar nuevo usuario</a>

	<?php
	if (count($usuario) > 0): 
	?>
	<div style="overflow-x:auto;">
		<table class="table table-bordered">
			
			<tr>
				<td>Imagen de usuario</td>
				<td>Nombre</td>
				<td>Apellidos</td>
				<td>Calle</td>
				<td>Numero</td>
				<td>Colonia</td>
				<td>CP</td>
				<td>Ciudad</td>
				<td>Estado</td>
				<td>Referencia</td>
				<td>Email</td>
				<td>Estatus</td>
				<td>Privilegios</td>
				<td> </td>
				<td> </td>
			</tr>

			<?php  
			foreach ($usuario as $item):
			?>
			<tr>
				<td><img src="<?php echo $item['imagen']; ?>" height="100" width="100"> </td>
				<td> <?php echo $item['nombre']; ?> </td>
				<td> <?php echo $item['apellidos']; ?> </td>
				<td> <?php echo $item['calle']; ?> </td>
				<td> <?php echo $item['numero']; ?> </td>
				<td> <?php echo $item['colonia']; ?> </td>
				<td> <?php echo $item['cp']; ?> </td>
				<td> <?php echo $item['ciudad']; ?> </td>
				<td> <?php echo $item['estado']; ?> </td>
				<td> <?php echo $item['referencia']; ?> </td>
				<td> <?php echo $item['email']; ?> </td>
				<td> <?php echo $item['estatus']; ?> </td>
				<td> <?php echo $item['privilegios']; ?> </td>
				<td> <a href="guardar_usuario.php?idUsuario=<?php echo $item['idUsuario'] ?>"><button class="btn btn-warning">Actualizar</button></a> </td>
				<td> <a data-toggle="confirmation" data-placement="right" href="eliminar.php?idUsuario=<?php echo $item['idUsuario'] ?>);"><button class="btn btn-danger">Eliminar</button></a></td>
			</tr>
			<?php endforeach;  ?>

		</table>
	</div>

	<?php else: ?>
		<p> No hay Usuarios registrados </p>
	<?php endif; ?>
<script>
      $('[data-toggle=confirmation]').confirmation({
       rootSelector: '[data-toggle=confirmation]',
      container: 'body'
      });
  </script>
<?php  
include_once('../template/footer.php');

	}
}

?>

