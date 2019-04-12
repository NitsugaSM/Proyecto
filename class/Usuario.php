<?php
require_once 'Conection.php';

class Usuario{

	private $imagen;
	private $idUsuario;
	private $nombre;
	private $apellidos;
	private $calle;
	private $numero;
	private $colonia;
	private $cp;
	private $ciudad;
	private $estado;
	private $referencia;
	private $email;
	private $password;
	private $estatus;
	private $privilegios;

	const TABLA = 'usuario';

	public function __construct($imagen = null, $nombre = null, $apellidos = null, $calle = null, $numero = null, $colonia = null, $cp = null, $ciudad = null, $estado = null, $referencia = null, $email = null, $password = null, $estatus = null, $privilegios = null, $idUsuario = null){

		$this->imagen = $imagen;
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->calle = $calle;
		$this->numero = $numero;
		$this->colonia = $colonia;
		$this->cp = $cp;
		$this->ciudad = $ciudad;
		$this->estado = $estado;
		$this->referencia = $referencia;
		$this->email = $email;
		$this->password = $password;
		$this->estatus = $estatus;
		$this->privilegios = $privilegios;
		$this->idUsuario = $idUsuario;
	}

	public function getIdUsuario(){

		return $this->idUsuario;
	}

	public function getImagen(){

		return $this->imagen;
	}

	public function getNombre(){

		return $this->nombre;
	}

	public function getApellidos(){

		return $this->apellidos;
	}

	public function getCalle(){

		return $this->calle;
	}

	public function getNumero(){

		return $this->numero;
	}

	public function getColonia(){

		return $this->colonia;
	}

	public function getCp(){

		return $this->cp;
	}

	public function getCiudad(){

		return $this->ciudad;
	}

	public function getEstado(){

		return $this->estado;
	}

	public function getReferencia(){

		return $this->referencia;
	}

	public function getEmail(){

		return $this->email;
	}

	public function getPassword(){

		return $this->password;
	}

	public function getEstatus(){

		return $this->estatus;
	}

	public function getPrivilegios(){

		return $this->privilegios;
	}

	public function setImagen($imagen){

		$this->imagen = $imagen;
	}

	public function setNombre($nombre){

		$this->nombre = $nombre;
	}

	public function setApellidos($apellidos){

		$this->apellidos = $apellidos;
	}

	public function setCalle($calle){

		$this->calle = $calle;
	}

	public function setNumero($numero){

		$this->numero = $numero;
	}

	public function setColonia($colonia){

		$this->colonia = $colonia;
	}

	public function setCp($cp){

		$this->cp = $cp;
	}

	public function setCiudad($ciudad){

		$this->ciudad = $ciudad;
	}

	public function setEstado($estado){

		$this->estado = $estado;
	}

	public function setReferencia($referencia){

		$this->referencia = $referencia;
	}

	public function setEmail($email){

		$this->email = $email;
	}

	public function setPassword($password){

		$this->password = $password;
	}

	public function setEstatus($estatus){

		$this->estatus = $estatus;
	}

	public function setPrivilegios($privilegios){

		$this->privilegios = $privilegios;
	}

	public function guardar(){

		$conection = new Conection();

		if ($this->idUsuario) {

			$query = $conection->prepare('UPDATE '.self::TABLA.' SET imagen=:imagen, nombre=:nombre, apellidos=:apellidos, calle=:calle, numero=:numero, colonia=:colonia, cp=:cp, ciudad=:ciudad, estado=:estado, referencia=:referencia, email=:email, password=:password, estatus=:estatus, privilegios=:privilegios WHERE idUsuario=:idUsuario');
			$query->bindParam(':idUsuario', $this->idUsuario);
			$query->bindParam(':imagen', $this->imagen);
			$query->bindParam(':nombre', $this->nombre);
			$query->bindParam(':apellidos', $this->apellidos);
			$query->bindParam(':calle', $this->calle);
			$query->bindParam(':numero', $this->numero);
			$query->bindParam(':colonia', $this->colonia);
			$query->bindParam(':cp', $this->cp);
			$query->bindParam(':ciudad', $this->ciudad);
			$query->bindParam(':estado', $this->estado);
			$query->bindParam(':referencia', $this->referencia);
			$query->bindParam(':email', $this->email);
			$query->bindParam(':password', $this->password);
			$query->bindParam(':estatus', $this->estatus);
			$query->bindParam(':privilegios', $this->privilegios);
			$query->execute();
			
		}else{

			$query = $conection->prepare('INSERT INTO '.self::TABLA.' (imagen, nombre, apellidos, calle, numero, colonia, cp, ciudad, estado, referencia, email, password, estatus, privilegios) VALUES(:imagen, :nombre, :apellidos, :calle, :numero, :colonia, :cp, :ciudad, :estado, :referencia, :email, :password, :estatus, :privilegios)');
			$query->bindParam(':imagen', $this->imagen);
			$query->bindParam(':nombre', $this->nombre);
			$query->bindParam(':apellidos', $this->apellidos);
			$query->bindParam(':calle', $this->calle);
			$query->bindParam(':numero', $this->numero);
			$query->bindParam(':colonia', $this->colonia);
			$query->bindParam(':cp', $this->cp);
			$query->bindParam(':ciudad', $this->ciudad);
			$query->bindParam(':estado', $this->estado);
			$query->bindParam(':referencia', $this->referencia);
			$query->bindParam(':email', $this->email);
			$query->bindParam(':password', $this->password);
			$query->bindParam(':estatus', $this->estatus);
			$query->bindParam(':privilegios', $this->privilegios);
			$reg = $query->execute();
			if ($reg == true) {
				$this->idUsuario = $conection->lastInsertId();
				return true;
			}else{
				return false;
			}
			
		}

		$conection = null;

	}

	public function eliminar(){

		$conection = new Conection();
		$query = $conection->prepare('DELETE from '.self::TABLA. ' WHERE idUsuario=:idUsuario');
		$query->bindParam(':idUsuario', $this->idUsuario);
		$query->execute();
		var_dump($query);

		$conection = null;
	}

	public static function buscarPorId($idUsuario){

		$conection = new Conection();
		$query = $conection->prepare('SELECT * from '.self::TABLA. ' WHERE idUsuario=:idUsuario');
		$query->bindParam(':idUsuario', $idUsuario);
		$query->execute();
		$row = $query->fetch();/*fetch dive en array*/
		$conection = null;

		if ($row) {

			return new self($row['imagen'], $row['nombre'], $row['apellidos'], $row['calle'], $row['numero'], $row['colonia'], $row['cp'], $row['ciudad'], $row['estado'], $row['referencia'], $row['email'], $row['password'], $row['estatus'], $row['privilegios'], $idUsuario);
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

	public function logIn(){

		$conection = new Conection();
		$query = $conection->prepare('SELECT idUsuario, imagen, nombre, email, privilegios FROM '.self::TABLA.' WHERE email=:email AND password=:password AND estatus=1');
		
		$query->bindParam(':email', $this->email);
		$query->bindParam(':password', $this->password);
		$query->execute();

		$row = $query->fetch();
		$conection = null;
		if ($row) {

			$_SESSION['idUsuario'] = $row[0];
			$_SESSION['imagen'] = $row[1];/*variables globales, guarda dato permanente*/
			$_SESSION['nombre'] = $row[2];
			$_SESSION['email'] = $row[3];
			$_SESSION['privilegios'] = $row[4];
			

			return true;
		}else{

			return false;
		}
	}

	
}
?>