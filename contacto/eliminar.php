<?php 
	require_once '../class/Contacto.php';

	$idContacto = (isset($_REQUEST['idContacto'])) ? $_REQUEST['idContacto'] : null;
	
	if ($idContacto) {
		$contacto = Contacto::buscarPorId($idContacto);
		$contacto->eliminar();
		header('Location: index.php');
	}
?>