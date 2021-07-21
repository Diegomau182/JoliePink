<?php
$nombreUsuario=$_POST['userName'];
$contra=$_POST['pass'];

include_once("../../models/usuario.php");

$usuario = new Usuario;
$usuario = $usuario->validarUsuario($nombreUsuario,$contra);

if($usuario)
{
	foreach ($usuario as $usu) {
		if ($usu["estado"]!='0'){
			session_start();
			$_SESSION['idUsuarioBS']=$usu['idUsuario'];
			$_SESSION['nombreUsuarioBS']=$usu['nombreUsuario'];
			$_SESSION['apellidoUsuarioBS']=$usu['apellidoUsuario'];
			$_SESSION['identidadUsuarioBS']=$usu['identidad'];
			$_SESSION['tipoUsuarioBS']=$usu['TipoUsuario']; 
			echo '1';

		}else{
			echo '0';
		}
	}
}else{
	echo '0';
}
	
