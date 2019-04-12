<?php
session_start();
if ($_SESSION) {

	if ($_SESSION['privilegios'] == 1) {
		
require_once('../class/Faqs.php');
$faqs = Faqs::recuperarTodos();
include('../template/header.php');
?>

	<h1> Gestión de FAQs</h1>
	<a href="../index.php">Regresar</a>
	<br>
	<a href="guardar_faq.php" class="btn btn-success"> Rgistrar nuevo FAQ</a>


	<?php
	if (count($faqs) > 0): 
	?>
	<div style="overflow-x:auto;">
		<table class="table table-bordered">
			
			<tr>
				<td>Pregunta</td>
				<td>Respuesta</td>
				<td> </td>
				<td> </td>
			</tr>

			<?php  
			foreach ($faqs as $item):
			?>
			<tr>
				<td> <?php echo $item['pregunta']; ?> </td>
				<td> <?php echo $item['respuesta']; ?> </td>
				<td> <a href="guardar_faq.php?idFaq=<?php echo $item['idFaq'] ?>"><button class="btn btn-warning">Actualizar</button></a> </td>
				<td> <form action="eliminar.php" method="POST">
                    <input type="hidden" name="idFaq" value="<?php echo $item['idFaq']?>">
                    <button class="btn btn-danger" data-toggle="confirmation" data-placement="left">Eliminar</button>
                  </form></td>
			</tr>
			<?php endforeach;  ?>

		</table>
	</div>

	<?php else: ?>
		<p> No hay FAQs registrados </p>
	<?php endif; ?>

<?php  
include_once('../template/footer.php');
	}
}
?>

