<?php 
# Se obtiene el archivo del controlador
require_once "controllers/template.php";
# instancia del objeto
 $template = new TemplateController();
 # Ejecucion del metodo
 $template->template();

 ?>