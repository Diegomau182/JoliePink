<?php
	/* Clase de carreras del sistema de unacifor */

	# agregamos al archivo de carreras, la clase de conexion.
	require_once('conexion.php');

	# creamos la clase de Persona
	class Usuario
	{
		# atributo que contendra la conexion.
		public $AbrirConexion;

		# constructor de la clase de usuario
		function __construct()
		{
			# instanciamos el atrubuto con la clase de conexion.
			$this->AbrirConexion = new Conexion();
			# nos conectamos con la base de datos.
			$this->AbrirConexion = $this->AbrirConexion->conectar();
		}

		# metodo para listar todas los usuario de la base de datos
		function listarusuario(){

			# variabele en donde estara sentencia SQL
			$sql = "SELECT * FROM `usuarios`;";
			# se prepara el stament para la ejecucion de la consulta
			$stmt = $this->AbrirConexion->prepare($sql);

			try {
				# ejecutamos el stament
				$stmt->execute();
				# solicitamos la consulta en un arreglo asociativo
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				# capturamos el error
				$result = $e->getMesage();
			}
			# libera la conexion con la base de datos
			$stmt->closeCursor();

			# retornamos el resultado de la consulta.
			return $result;
		}

		function validarUsuario($nombreUsuario, $password){

			# variabele en donde estara sentencia SQL
			$sql = "SELECT * FROM `usuario` WHERE `identidad`='$nombreUsuario' AND `password`='$password';";
			# se prepara el stament para la ejecucion de la consulta
			$stmt = $this->AbrirConexion->prepare($sql);

			try {
				# ejecutamos el stament
				$stmt->execute();
				# solicitamos la consulta en un arreglo asociativo
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				# capturamos el error
				$result = $e->getMessage();
			}
			# libera la conexion con la base de datos
			$stmt->closeCursor();

			# retornamos el resultado de la consulta.
			return $result;
		}

		function registrarUsuario($usuario, $perfil, $password){

			# variabele en donde estara sentencia SQL
			$sql = "INSERT INTO `usuarios`( `nombreUsuario`,`password`, `perfil`, `estado`) VALUES ('$usuario','$password','$perfil',1);";
			# se prepara el stament para la ejecucion de la consulta
			$stmt = $this->AbrirConexion->prepare($sql);

			try {
				# ejecutamos el stament
				$stmt->execute();
				# solicitamos la consulta en un arreglo asociativo
				$result = TRUE;
			} catch (PDOException $e) {
				# capturamos el error
				$result = FALSE;
			}
			# libera la conexion con la base de datos
			$stmt->closeCursor();

			# retornamos el resultado de la consulta.
			return $result;
		}

		function editarUsuario($id,$usuario, $perfil){

			# variabele en donde estara sentencia SQL
			$sql = "UPDATE `usuarios` SET `nombreUsuario`='$usuario',`perfil`='$perfil' WHERE `idUsuario`='$id';";
			# se prepara el stament para la ejecucion de la consulta
			$stmt = $this->AbrirConexion->prepare($sql);

			try {
				# ejecutamos el stament
				$stmt->execute();
				# solicitamos la consulta en un arreglo asociativo
				$result = TRUE;
			} catch (PDOException $e) {
				# capturamos el error
				$result = FALSE;
			}
			# libera la conexion con la base de datos
			$stmt->closeCursor();

			# retornamos el resultado de la consulta.
			return $result;
		}

		function estadoUsuario($id){
			# variabele en donde estara sentencia SQL
			$sql = "UPDATE `usuarios` SET `estado`= 0 WHERE `idUsuario`='$id';";
			# se prepara el stament para la ejecucion de la consulta
			$stmt = $this->AbrirConexion->prepare($sql);

			try {
				# ejecutamos el stament
				$stmt->execute();
				# solicitamos la consulta en un arreglo asociativo
				$result = TRUE;
			} catch (PDOException $e) {
				# capturamos el error
				$result = FALSE;
			}
			# libera la conexion con la base de datos
			$stmt->closeCursor();

			# retornamos el resultado de la consulta.
			return $result;
		}
	}
 ?>
