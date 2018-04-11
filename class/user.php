<?php
/**
* 
*/
class user
{
	private static $instance;
	private $connection;
	private function __construct()
	{
		try
		{
			$this->connection = new PDO("mysql:host=127.0.0.1; dbname=Formulario", "root", "root");
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->connection->exec("SET CHARACTER SET utf8");
		}
		catch (PDOException $e)
		{
			echo "Conexion Fallida ....".$e->getMessage();
			die();
		}
	}

	/*Instanciacion de la clase Singleton*/
	public static function singleton(){
		if (!isset(self::$instance)) {
			$miclase = __CLASS__;
			self::$instance = new $miclase;
		}
		return self::$instance;
	}

	public function saveUser($nombre, $apellido1, $apellido2, $email)
	{
		try
		{
			$query = $this->connection->prepare("INSERT INTO usuario VALUES (?, ?, ?, ?)");
			$query->bindParam(1, $nombre);
			$query->bindParam(2, $apellido1);
			$query->bindParam(3, $apellido2);
			$query->bindParam(4, $email);
			$query->execute();
			echo "Registro guardado exitosamente";
		}
		catch(PDOException $e){
			echo "Error en la sentencia ...".$e->getMessage();
			die();
		}
	}

	public function getUsers()
	{
		try
		{
			$query = $this->connection->prepare("SELECT * FROM usuario");
			$query->execute();
			return $query->fetchAll();
		}
		catch (PDOException $e){
			echo "Error en la sentencia ...".$e->getMessage();
			die();
		}
	}
}
?>