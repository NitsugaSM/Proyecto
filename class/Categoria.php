<?php
require_once 'Conection.php';

class Categoria{

	private $idCategoria;
	private $nombreCategoria;
	private $descripcion;

	const TABLA = 'categorias';

	public function __construct($nombreCategoria = null, $descripcion = null, $idCategoria = null){

		$this->nombreCategoria = $nombreCategoria;
		$this->descripcion = $descripcion;
		$this->idCategoria = $idCategoria;
	}

	public function getIdCategoria(){

		return $this->idCategoria;
	}

	public function getNombreCategoria(){

		return $this->nombreCategoria;
	}

	public function getDescripcion(){

		return $this->descripcion;
	}


	public function setNombreCategoria($nombreCategoria){

		$this->nombreCategoria = $nombreCategoria;
	}

	public function setDescripcion($descripcion){

		$this->descripcion = $descripcion;
	}

	public function guardar(){

		$conection = new Conection();

		if ($this->idCategoria) {

			$query = $conection->prepare('UPDATE '.self::TABLA.' SET nombreCategoria=:nombreCategoria, descripcion=:descripcion WHERE idCategoria=:idCategoria');
			$query->bindParam(':idCategoria', $this->idCategoria);
			$query->bindParam(':nombreCategoria', $this->nombreCategoria);
			$query->bindParam(':descripcion', $this->descripcion);
			$query->execute();
			
		}else{

			$query = $conection->prepare('INSERT INTO '.self::TABLA.' (nombreCategoria, descripcion) VALUES(:nombreCategoria, :descripcion)');
			$query->bindParam(':nombreCategoria', $this->nombreCategoria);
			$query->bindParam(':descripcion', $this->descripcion);
			$reg = $query->execute();
			if ($reg == true) {
				$this->idCategoria = $conection->lastInsertId();
				return true;
			}else{
				return false;
			}
			
		}

		$conection = null;

	}

	public function eliminar(){

		$conection = new Conection();
		$query = $conection->prepare('DELETE from '.self::TABLA. ' WHERE idCategoria=:idCategoria');
		$query->bindParam(':idCategoria', $this->idCategoria);
		$query->execute();

		$conection = null;
	}

	public static function buscarPorId($idCategoria){

		$conection = new Conection();
		$query = $conection->prepare('SELECT * FROM '.self::TABLA. ' WHERE idCategoria=:idCategoria');
		$query->bindParam(':idCategoria', $idCategoria);
		$query->execute();
		$row = $query->fetch();/*fetch dive en array*/
		$conection = null;

		if ($row) {

			return new self($row['nombreCategoria'], $row['descripcion'], $idCategoria);
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

	
}
?>