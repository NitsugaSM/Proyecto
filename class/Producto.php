<?php 
require_once 'Conection.php';

class Producto{

	private $idProducto;
	private $idCategoria;
	private $url;
	private $nombreProducto;
	private $precio;
	private $stock;
	private $descripcion;

	const TABLA = 'productos';

	public function __construct($idProducto = null, $idCategoria = null, $url = null, $nombreProducto = null, $precio = null, $stock = null, $descripcion = null){

		$this->idProducto = $idProducto;
		$this->idCategoria = $idCategoria;
		$this->url = $url;
		$this->nombreProducto = $nombreProducto;
		$this->precio = $precio;
		$this->stock = $stock;
		$this->descripcion = $descripcion;

	}

	public function getIdProducto(){

		return $this->idProducto;
	}

	public function getIdCategoria(){

		return $this->idCategoria;
	}

	public function getUrl(){

		return $this->url;
	}

	public function getNombreProducto(){

		return $this->nombreProducto;
	}

	public function getPrecio(){

		return $this->precio;
	}

	public function getStock(){

		return $this->stock;
	}

	public function getDescripcion(){

		return $this->descripcion;
	}

	public function setIdCategoria($idCategoria){

		$this->idCategoria = $idCategoria;
	}

	public function setUrl($url){

		$this->url = $url;
	}

	public function setNombreProducto($nombreProducto){

		$this->nombreProducto = $nombreProducto;
	}

	public function setPrecio($precio){

		$this->precio = $precio;
	}

	public function setStock($stock){

		$this->stock = $stock;
	}

	public function setDescripcion($descripcion){

		$this->descripcion = $descripcion;
	}

	public function guardar(){

		$conection = new Conection();

		if ($this->idProducto) {

			$query = $conection->prepare('UPDATE '.self::TABLA.' SET idCategoria=:idCategoria, url=:url, nombreProducto=:nombreProducto, precio=:precio, stock=:stock, descripcion=:descripcion WHERE idProducto=:idProducto');
			$query->bindParam(':idProducto', $this->idProducto);
			$query->bindParam(':idCategoria', $this->idCategoria);
			$query->bindParam(':url', $this->url);
			$query->bindParam(':nombreProducto', $this->nombreProducto);
			$query->bindParam(':precio', $this->precio);
			$query->bindParam(':stock', $this->stock);
			$query->bindParam(':descripcion', $this->descripcion);
			$query->execute();
			
		}else{

			$query = $conection->prepare('INSERT INTO '.self::TABLA.' (idCategoria, url, nombreProducto, precio, stock, descripcion) VALUES(:idCategoria, :url, :nombreProducto, :precio, :stock, :descripcion)');
			$query->bindParam(':idCategoria', $this->idCategoria);
			$query->bindParam(':url', $this->url);
			$query->bindParam(':nombreProducto', $this->nombreProducto);
			$query->bindParam(':precio', $this->precio);
			$query->bindParam(':stock', $this->stock);
			$query->bindParam(':descripcion', $this->descripcion);
			$reg = $query->execute();
			var_dump($reg);
			if ($reg == true) {
				$this->idProducto = $conection->lastInsertId();
				return true;
			}else{
				return false;
			}
			
		}

		$conection = null;

	}

	public function eliminar(){

		$conection = new Conection();
		$query = $conection->prepare('DELETE from '.self::TABLA. ' WHERE idProducto=:idProducto');
		$query->bindParam(':idProducto', $this->idProducto);
		$query->execute();

		$conection = null;
	}

	public static function buscarPorId($idProducto){

		$conection = new Conection();
		$query = $conection->prepare('SELECT * FROM '.self::TABLA. ' WHERE idProducto=:idProducto');
		$query->bindParam(':idProducto', $idProducto);
		$query->execute();
		$row = $query->fetch();/*fetch dive en array*/
		$conection = null;

		if ($row) {

			return new self($idProducto, $row['idCategoria'], $row['url'], $row['nombreProducto'], $row['precio'], $row['stock'], $row['descripcion']);
		}else{

			return false;
		}
	}

	public static function recuperarTodos(){

		$conection = new Conection();
		$query = $conection->prepare('SELECT * FROM '.self::TABLA.' INNER join categorias on productos.idCategoria=categorias.idCategoria');
		$query->execute();
		$rows = $query->fetchAll();
		$conection = null;
		return $rows;
	}

	public function actualizarStock(){

		$conection = new Conection();
		$query = $conection->prepare('UPDATE '.self::TABLA.' SET stock=:stock WHERE idProducto=:idProducto');
		$query->bindParam(':idProducto', $this->idProducto);
		$query->bindParam(':stock', $this->stock);
		$query->execute();
		$conection = null;
	}

}

?>