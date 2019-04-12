<?php
require_once 'Conection.php';

class Pedido{

	private $idPedido;
	private $idUsuario;
	private $producto;
	private $total;
	private $metodoPago;
	private $metodoEnvio;
	private $fechaPedido;
	private $estatus;

	const TABLA = 'pedidos';

	public function __construct($idPedido = null, $idUsuario = null, $producto = null, $total = null, $metodoPago = null, $metodoEnvio = null, $fechaPedido = null, $estatus = null){

		$this->idPedido = $idPedido;
		$this->idUsuario = $idUsuario;
		$this->producto = $producto;
		$this->total = $total;
		$this->metodoPago = $metodoPago;
		$this->metodoEnvio = $metodoEnvio;
		$this->fechaPedido = $fechaPedido;
		$this->estatus = $estatus;
	}

	public function getIdPedido(){

		return $this->idPedido;
	}

	public function getIdUsuario(){

		return $this->idUsuario;
	}

	public function getProducto(){

		return $this->producto;
	}

	public function getTotal(){

		return $this->total;
	}

	public function getMetodoPago(){

		return $this->metodoPago;
	}

	public function getMetodoEnvio(){

		return $this->metodoEnvio;
	}

	public function getFechaPedido(){

		return $this->fechaPedido;
	}

	public function getEstatus(){

		return $this->estatus;
	}

	public function setIdUsuario($idUsuario){

		$this->idUsuario = $idUsuario;
	}

	public function setProducto($producto){

		$this->producto = $producto;
	}

	public function setTotal($total){

		$this->total = $total;
	}

	public function setMetodoPago($metodoPago){

		$this->metodoPago = $metodoPago;
	}

	public function setMetodoEnvio($metodoEnvio){

		$this->metodoEnvio = $metodoEnvio;
	}

	public function setFechaPedido($fechaPedido){

		$this->fechaPedido = $fechaPedido;
	}

	public function setEstatus($estatus){

		$this->estatus = $estatus;
	}


	public function guardar(){

		$conection = new Conection();

		if ($this->idPedido) {

			$query = $conection->prepare('UPDATE '.self::TABLA.' SET idUsuario=:idUsuario, producto=:producto, total=:total, metodoPago=:metodoPago, metodoEnvio=:metodoEnvio, estatus=:estatus, fechaPedido=:fechaPedido, estatus=:estatus WHERE idPedido=:idPedido');
			$query->bindParam(':idPedido', $this->idPedido);
			$query->bindParam(':idUsuario', $this->idUsuario);
			$query->bindParam(':producto', $this->producto);
			$query->bindParam(':total', $this->total);
			$query->bindParam(':metodoPago', $this->metodoPago);
			$query->bindParam(':metodoEnvio', $this->metodoEnvio);
			$query->bindParam(':fechaPedido', $this->fechaPedido);
			$query->bindParam(':estatus', $this->estatus);
			$query->execute();
			
		}else{

			$query = $conection->prepare('INSERT INTO '.self::TABLA.' (idUsuario, producto, total, metodoPago, metodoEnvio, fechaPedido, estatus) VALUES(:idUsuario, :producto, :total, :metodoPago, :metodoEnvio, :fechaPedido, :estatus)');
			$query->bindParam(':idUsuario', $this->idUsuario);
			$query->bindParam(':producto', $this->producto);
			$query->bindParam(':total', $this->total);
			$query->bindParam(':metodoPago', $this->metodoPago);
			$query->bindParam(':metodoEnvio', $this->metodoEnvio);
			$query->bindParam(':fechaPedido', $this->fechaPedido);
			$query->bindParam(':estatus', $this->estatus);
			$reg = $query->execute();
		
			if ($reg == true) {
				$this->idPedido = $conection->lastInsertId();
				return true;
			}else{
				return false;
			}
			
		}

		$conection = null;

	}

	public function eliminar(){

		$conection = new Conection();
		$query = $conection->prepare('DELETE from '.self::TABLA. ' WHERE idPedido=:idPedido');
		$query->bindParam(':idPedido', $this->idPedido);
		$query->execute();

		$conection = null;
	}

	public static function buscarPorId($idPedido){

		$conection = new Conection();
		$query = $conection->prepare('SELECT * FROM '.self::TABLA. ' WHERE idPedido=:idPedido');
		$query->bindParam(':idPedido', $idPedido);
		$query->execute();
		$row = $query->fetch();/*fetch dive en array*/
		$conection = null;

		if ($row) {

			return new self($idPedido, $row['idUsuario'], $row['producto'], $row['total'], $row['metodoPago'], $row['metodoEnvio'], $row['fechaPedido'], $row['estatus']);
		}else{

			return false;
		}
	}

	public static function recuperarTodos(){

		$conection = new Conection();
		$query = $conection->prepare('SELECT * FROM '.self::TABLA);
		$query->execute();
		$rows = $query->fetchAll();
		$conection = null;
		return $rows;
	}

	public static function recuperarTodosUsuario($idUsuario){ 
		$conection = new Conection();
		$query = $conection->prepare('SELECT * FROM '.self::TABLA.' WHERE idUsuario=:idUsuario');
		$query->bindParam(':idUsuario', $idUsuario);
		$query->execute();
		$rows = $query->fetchAll();
		$conection = null;
		return $rows;
	}
	
}
?>