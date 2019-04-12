<?php  
session_start();
if ($_SESSION) {

	if ($_SESSION['privilegios'] == 1) {
	require_once '../class/Faqs.php';
	include('../template/header.php');

	$idFaq = (isset($_REQUEST['idFaq'])) ? $_REQUEST['idFaq'] : null;
	

	if ($idFaq) {
		$faqs = Faqs::buscarPorId($idFaq);
	}else{
		$faqs = new Faqs();
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$pregunta = (isset($_POST['pregunta'])) ? $_POST['pregunta'] : null;
		$respuesta = (isset($_POST['respuesta'])) ? $_POST['respuesta'] : null;
		$faqs->setPregunta($pregunta);
		$faqs->setRespuesta($respuesta);
		
			if(ctype_space($pregunta)){
    		echo '<script> 
				alert("este campo no puede quedar vacio "); 
				window.location.href="guardar_comentario.php";
			</script>';
			}
			if(ctype_space($respuesta)){
    		echo '<script> 
				alert("este campo no puede quedar vacio "); 
				window.location.href="guardar_comentario.php";
			</script>';
			}
			else{
			$faqs->guardar();
			}
		header('Location: index.php');
		
	}
?>

<div class="row">
	<div class="col-xs-12">
		<h1>Guardar FAQ</h1>
		<form method="post" action="guardar_faq.php">
			<?php if ($faqs->getIdFaq()): ?>
				<input type="hidden" name="idFaq" value="<?php echo $faqs->getIdFaq() ?>"/>
			<?php endif; ?>
			<label>Pregunta</label>
			<input type="text" name="pregunta" value="<?php echo $faqs->getPregunta() ?>">
			<br>
			<label>Respuesta</label>
			<input type="text" name="respuesta" value="<?php echo $faqs->getRespuesta() ?>"> 
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