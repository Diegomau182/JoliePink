<?php 
# Clase de conexión del sistema
	# aquí se encotra todo lo referido con la conexion a la base de datos
	class Conexion
	{
		# metodo para conectarse a la base de datos
		function conectar()
		{
			$dsn='mysql:dbname=joliepink; host=127.0.0.1; charset=utf8';
			$usuario='root';
			$contra='';

			try{
				$pdo = new pdo($dsn,$usuario,$contra);
				$pdo -> exec("set names utf8");
				return $pdo;
			}
			catch(PDOException $e){
				die('Error al conectarse '.$e->getMessage());
			}
		}
	} 
?>