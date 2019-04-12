<?php 
	require_once '../class/Usuario.php';

	$idUsuario = (isset($_REQUEST['idUsuario'])) ? $_REQUEST['idUsuario'] : null;

	if ($idUsuario) {
		$usuario = Usuario::buscarPorId($idUsuario);
		$usuario->eliminar();
		header('Location: index.php');
	}
?>
