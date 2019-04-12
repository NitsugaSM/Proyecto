<?php 
require_once 'Conection.php';

class Contacto{

	private $idContacto;
	private $nombre;
	private $email;
	private $telefono;
	private $asunto;
	private $mensaje;

	const TABLA = 'contacto';

	public function __construct($idContacto = null, $nombre = null, $email = null, $telefono = null, $asunto = null, $mensaje = null){

		$this->nombre = $nombre;
		$this->email = $email;
		$this->telefono = $telefono;
		$this->asunto = $asunto;
		$this->mensaje = $mensaje;
		$this->idContacto = $idContacto;		
	}

	public function getIdContacto(){

		return $this->idContacto = $idContacto;
	}

	public function getNombre(){

		return $this->nombre = $nombre;
	}

	public function getEmail(){

		return $this->email = $email;
	}

	public function getTelefono(){

		return $this->telefono = $telefono;
	}

	public function getAsunto(){

		return $this->asunto = $asunto;
	}

	public function getMensaje(){

		return $this->mensaje = $mensaje;
	}

	public function setNombre($nombre){

		$this->nombre = $nombre;
	}

	public function setEmail($email){

		$this->email = $email;
	}

	public function setTelefono($telefono){

		$this->telefono = $telefono;
	}

	public function setAsunto($asunto){

		$this->asunto = $asunto;
	}	

	public function setMensaje($mensaje){

		$this->mensaje = $mensaje;
	}

	public function guardar(){

		$conection = new Conection();

		$query = $conection->prepare('INSERT INTO '.self::TABLA.' (nombre, email, telefono, asunto, mensaje) VALUES(:nombre, :email, :telefono, :asunto, :mensaje)');
		$query->bindParam(':nombre', $this->nombre);
		$query->bindParam(':email', $this->email);
		$query->bindParam(':telefono', $this->telefono);
		$query->bindParam(':asunto', $this->asunto);
		$query->bindParam(':mensaje', $this->mensaje);
		$reg = $query->execute();
		if ($reg == true) {
			$this->idContacto = $conection->lastInsertId();
			return true;
		}else{
			return false;
		}

		$conection = null;
	}

	public function eliminar(){

		$conection = new Conection();
		$query = $conection->prepare('DELETE from '.self::TABLA. ' WHERE idContacto=:idContacto');
		$query->bindParam(':idContacto', $this->idContacto);
		$r=$query->execute();
		//var_dump($r);

		$conection = null;
	}

	public static function buscarPorId($idContacto){

		$conection = new Conection();
		$query = $conection->prepare('SELECT * FROM '.self::TABLA. ' WHERE idContacto=:idContacto');
		$query->bindParam(':idContacto', $idContacto);
		$query->execute();
		$row = $query->fetch();
		$conection = null;

		if ($row) {

			return new self($idContacto, $row['nombre'], $row['email'], $row['telefono'], $row['asunto'], $row['mensaje']);
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