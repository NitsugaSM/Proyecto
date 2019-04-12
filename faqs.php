<?php 
include_once('template/header.php');
require_once('admin/class/Faqs.php');
$faqs = Faqs::recuperarTodos();
?>
<br>
<br>
<center> <h2>Preguntas frecuentes</h2> </center>
 <br>
 <br>
 <?php
	if (count($faqs) > 0): 
	?>
		
		<?php  
			foreach ($faqs as $item):
		?>
		<div class="row">
			<div class="col-xs-1"> </div> 
			<div class="col-xs-11"> 
				<h3><?php echo $item['pregunta']; ?></h3>
			</div>
		</div>
		<br>	
		<div class="row"> 
			<div class="col-xs-2"> </div>
			<div class="col-xs-10">
				<p><?php echo $item['respuesta']; ?></p>

			</div>
		</div>
		<br>	

			<?php endforeach;  ?>

	<?php else: ?>
		<p> No hay FAQs registrados </p>
	<?php endif; 

		include_once('template/footer.php');
	?>
