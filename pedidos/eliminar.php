<?php 
	require_once '../class/Pedido.php';

	$idPedido = (isset($_REQUEST['idPedido'])) ? $_REQUEST['idPedido'] : null;
	
	if ($idPedido) {
		$pedido = Pedido::buscarPorId($idPedido);
		$pedido->eliminar();
		header('Location: index.php');
	}
?>