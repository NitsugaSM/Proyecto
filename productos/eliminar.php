<?php 
	require_once '../class/Producto.php';

	$idProducto = (isset($_REQUEST['idProducto'])) ? $_REQUEST['idProducto'] : null;
	
	if ($idProducto) {
		$producto = Producto::buscarPorId($idProducto);
		$producto->eliminar();
		$url = $producto->getUrl();
		unlink($url);
		header('Location: index.php');
	}
?>