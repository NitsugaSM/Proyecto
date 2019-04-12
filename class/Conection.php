<?php 
class Conection extends PDO{

	private $db_type = 'mysql';
	private $host = 'localhost';
	private $db_name = 'gaagooco_twff';
	private $user = 'root';
	private $pass = '';

	public function __construct(){

		//sobrescribir el método constructor

		try {

			parent::__construct($this->db_type.':host='.$this->host.';dbname='.$this->db_name,$this->user,$this->pass);

			
		} catch (PDOException $e) {

			echo 'Ha surgido une error ....'.$e->getMessage();
			


		}

	}



}

?>