<?php 
session_start();
if ($_SESSION) {

	if ($_SESSION['privilegios'] == 1) {
	 
	require_once '../class/Comentario.php';
	include('../template/header.php');

	$idComentario = (isset($_REQUEST['idComentario'])) ? $_REQUEST['idComentario'] : null;
	

	if ($idComentario) {
		$comentario = Comentario::buscarPorId($idComentario);
	}else{
		$comentario = new Comentario();
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$email = (isset($_POST['email'])) ? $_POST['email'] : null;
		$mensaje = (isset($_POST['mensaje'])) ? $_POST['mensaje'] : null;
		$fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : null;
		$estatus = (isset($_POST['estatus'])) ? $_POST['estatus'] : null;
		$comentario->setEmail($email);
		$comentario->setMensaje($mensaje);
		$comentario->setFecha($fecha);
		$comentario->setEstatus($estatus);
		
		if(!is_numeric($estatus)){
    		echo '<script> 
				alert("utiliza unicamente numeros en precio "); 
				window.location.href="guardar_comentario.php";
			</script>';
		}
		if(ctype_space($estatus)){
    		echo '<script> 
				alert("este campo no puede quedar vacio "); 
				window.location.href="guardar_comentario.php";
			</script>';
		}
		else{
		$comentario->guardar();
		}
		header('Location: index.php');
		
	}
?>

<div class="row">
	<div class="col-xs-12">
		<h1>Guardar Comentario</h1>
		<form method="post" action="guardar_comentario.php">
			<?php if ($comentario->getIdComentario()): ?>
				<input type="hidden" name="idComentario" value="<?php echo $comentario->getIdComentario() ?>"/>
			<?php endif; ?>
			<label>Correo</label>
			<input type="email" name="email" value="<?php echo $comentario->getEmail() ?>"/>
			<br>
			<label>Mensaje</label>
			<input type="text" name="mensaje" value="<?php echo $comentario->getMensaje() ?>"/>
			<br>
			<label>Fecha</label>
			<input type="text" name="fecha" value="<?php echo $comentario->getFecha() ?>"/>
			<br>
			<label>Estatus</label>
			<input type="text" name="estatus" value="<?php echo $comentario->getEstatus() ?>" required />
			<br>
			<input type="submit" value="Guardar"/>
			<a href="index.php">Cancelar</a>
		</form>
	</div>
</div>
<?php 
include('../template/footer.php');
	}
}
?>