<?php 
include_once('template/header.php');
require_once('admin/class/Comentario.php');
$comentario = Comentario::recuperarTodosValidados();
?>
<br>
<center>
<div class="row">
 	<div class="col-xs-12">
 		<h1>Agregar comentario</h1>
 		<br>
 		<form action="lib/validar_comentar.php" method="post">

 		<div class="row">
 		<div class="col-xs-1">

 		</div>

 		<div class="col-xs-4">
 		<div class="form-group">
	 		<label for="email"><h3>Correo</h3></label>
	 		<input type="email" name="email" id="email" class="form-control"><br>
 		</div>
 		</div>

 		<div class="col-xs-6">

 		</div>
 		</div>

 		<div class="row">
 		<div class="col-xs-1">

 		</div>

 		<div class="col-xs-8">
 		<div class="form-group">
	 		<label for="Mensaje"><h3>Mensaje</h3></label>
	 		<textarea name="mensaje" id="mensaje" class="form-control"></textarea><br>
 		</div>
 		</div>
 		</div>


 		<div class="col-xs-12">
	 	<input type="hidden" name="fecha" id="fecha" value="<?php echo date('Y/m/d')?>"><br>
 		<button type="submit" class="btn btn-primary">Enviar</button>
 		</div>

 		</form>
 	</div>
 </div>
 </center> 
 <br>
 <center>
 <h1>Comentarios</h1>
</center>
 <br>
 <?php
	if (count($comentario) > 0): 
	?>

		 
				<?php  
					foreach ($comentario as $item):
				?>
				<div class="row"> 
			<div class="col-xs-1">
			</div>
			<div class="col-xs-11">
				<h4><?php echo $item['email']; ?></h4>
			</div>
		</div>
		<br>	
		<div class="row"> 
			<div class="col-xs-2">
			</div>
			<div class="col-xs-10" style="background-color: #F3E2A9; border-radius: 50px 50px 50px 50px">
				<p><?php echo $item['mensaje']; ?></p>

			</div>
		</div>	
		<br>
		<br>

			<?php endforeach;  ?>

	<?php else: ?>
		<p> No hay Comentarios registrados </p>
	<?php endif; 

	include_once('template/footer.php');
	?>