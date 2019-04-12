<?php
require_once 'Conection.php';

class Faqs{

	private $idFaq;
	private $pregunta;
	private $respuesta;

	const TABLA = 'faqs';

	public function __construct($pregunta = null, $respuesta = null, $idFaq = null){

		$this->pregunta = $pregunta;
		$this->respuesta = $respuesta;
		$this->idFaq = $idFaq;
	}

	public function getIdFaq(){

		return $this->idFaq;
	}

	public function getPregunta(){

		return $this->pregunta;
	}

	public function getRespuesta(){

		return $this->respuesta;
	}


	public function setPregunta($pregunta){

		$this->pregunta = $pregunta;
	}

	public function setRespuesta($respuesta){

		$this->respuesta = $respuesta;
	}


	public function guardar(){

		$conection = new Conection();

		if ($this->idFaq) {

			$query = $conection->prepare('UPDATE '.self::TABLA.' SET pregunta=:pregunta, respuesta=:respuesta WHERE idFaq=:idFaq');
			$query->bindParam(':idFaq', $this->idFaq);
			$query->bindParam(':pregunta', $this->pregunta);
			$query->bindParam(':respuesta', $this->respuesta);
			$query->execute();

		}else{

			$query = $conection->prepare('INSERT INTO '.self::TABLA.' (pregunta, respuesta) VALUES(:pregunta, :respuesta)');
			$query->bindParam(':pregunta', $this->pregunta);
			$query->bindParam(':respuesta', $this->respuesta);
			$reg = $query->execute();
			if ($reg == true) {
				$this->idFaq = $conection->lastInsertId();
				return true;
			}else{
				return false;
			}
			
		}

		$conection = null;

	}

	public function eliminar(){

		$conection = new Conection();
		$query = $conection->prepare('DELETE from '.self::TABLA. ' WHERE idFaq=:idFaq');
		$query->bindParam(':idFaq', $this->idFaq);
		$query->execute();

		$conection = null;
	}

	public static function buscarPorId($idFaq){

		$conection = new Conection();
		$query = $conection->prepare('SELECT * FROM '.self::TABLA. ' WHERE idFaq=:idFaq');
		$query->bindParam(':idFaq', $idFaq);
		$query->execute();
		$row = $query->fetch();
		$conection = null;
		if ($row) {

			return new self($row['pregunta'], $row['respuesta'], $idFaq);
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