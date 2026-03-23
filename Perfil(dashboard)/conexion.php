<?php
$conexion = new mysqli("localhost", "root", "", "pi");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT * FROM articulos";
$resultado = $conexion->query($sql);
?>