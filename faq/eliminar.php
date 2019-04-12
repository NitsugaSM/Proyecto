<?php 
	require_once '../class/Faqs.php';

	$idFaq = (isset($_REQUEST['idFaq'])) ? $_REQUEST['idFaq'] : null;
	
	if ($idFaq) {
		$faqs = Faqs::buscarPorId($idFaq);
		$faqs->eliminar();
		header('Location: index.php');
	}
?>