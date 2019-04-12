<?php
require_once 'Conection.php';

class Comentario{

	private $idComentario;
	private $email;
	private $mensaje;
	private $fecha;
	private $estatus;

	const TABLA = 'comentarios';

	public function __construct($email = null, $mensaje = null, $fecha = null, $estatus = null, $idComentario = null){

		$this->email = $email;
		$this->mensaje = $mensaje;
		$this->fecha = $fecha;
		$this->estatus = $estatus;
		$this->idComentario = $idComentario;
	}
	public function getIdComentario(){

		return $this->idComentario;
	}

	public function getEmail(){

		return $this->email;
	}

	public function getMensaje(){

		return $this->mensaje;
	}

	public function getFecha(){

		return $this->fecha;
	}

	public function getEstatus(){

		return $this->estatus;
	}


	public function setEmail($email){

		$this->email = $email;
	}

	public function setMensaje($mensaje){

		$this->mensaje = $mensaje;
	}

	public function setFecha($fecha){

		$this->fecha = $fecha;
	}

	public function setEstatus($estatus){

		$this->estatus = $estatus;
	}

	public function guardar(){

		$conection = new Conection();

		if ($this->idComentario) {

			$query = $conection->prepare('UPDATE '.self::TABLA.' SET email=:email, mensaje=:mensaje, fecha=:fecha, estatus=:estatus WHERE idComentario=:idComentario');
			$query->bindParam(':idComentario', $this->idComentario);
			$query->bindParam(':email', $this->email);
			$query->bindParam(':mensaje', $this->mensaje);
			$query->bindParam(':fecha', $this->fecha);
			$query->bindParam(':estatus', $this->estatus);
			$query->execute();

		}else{

			$query = $conection->prepare('INSERT INTO '.self::TABLA.' (email, mensaje, fecha, estatus) VALUES(:email, :mensaje, :fecha, :estatus)');
			$query->bindParam(':email', $this->email);
			$query->bindParam(':mensaje', $this->mensaje);
			$query->bindParam(':fecha', $this->fecha);
			$query->bindParam(':estatus', $this->estatus);
			$reg = $query->execute();
			if ($reg == true) {
				$this->idComentario = $conection->lastInsertId();
				return true;
			}else{
				return false;
			}
			
		}

		$conection = null;

	}

	public function eliminar(){

		$conection = new Conection();
		$query = $conection->prepare('DELETE from '.self::TABLA. ' WHERE idComentario=:idComentario');
		$query->bindParam(':idComentario', $this->idComentario);
		$query->execute();

		$conection = null;
	}

	public static function buscarPorId($idComentario){

		$conection = new Conection();
		$query = $conection->prepare('SELECT * FROM '.self::TABLA. ' WHERE idComentario=:idComentario');
		$query->bindParam(':idComentario', $idComentario);
		$query->execute();
		$row = $query->fetch();
		$conection = null;

		if ($row) {

			return new self($row['email'], $row['mensaje'], $row['fecha'], $row['estatus'], $idComentario);
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

	public static function recuperarTodosValidados(){

		$conection = new Conection();
		$query = $conection->prepare('SELECT * FROM '.self::TABLA.' WHERE estatus = 1');
		$query->execute();
		$rows = $query->fetchAll();
		$conection = null;
		return $rows;
	}

	
}
?>