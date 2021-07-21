<?php 

# Clase Template del controlador para mostra la pagina con la cual iniciará la aplicación
class TemplateController{

	# Metodo encargado de abrir la pantalla
	public function template(){

		# ruta en la cual se encuentra el archivo
		include "views/index.php";
	}
} 
?>