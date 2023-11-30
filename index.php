<?php 

require_once "clases/conexion/conexion.php";

$conexion = new conexion;

$query = "INSERT INTO pacientes (DNI)value('1233123')";

print_r($conexion->nonQuery($query))

?>