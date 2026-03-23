<?php
include("conexion.php");
session_start();

if(!isset($_SESSION['id']) || $_SESSION['rol'] != "administrador"){
    echo "Acceso no autorizado";
    exit();
}

if($_POST){

    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $genero = $_POST['genero'];
    $fecha = $_POST['fecha'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];
    $password = $_POST['password'];

    $sql = "INSERT INTO usuarios 
    (nombreUsuario, nombre, apellidoP, apellidoM, genero, fecha, correo, rol, password) 
    VALUES 
    ('$usuario','$nombre','$apellidoP','$apellidoM','$genero','$fecha','$correo','$rol','$password')";

    if($conexion->query($sql)){
        echo "
        <script>
            alert('Usuario creado correctamente');
            window.location.href='perfil.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Error: ".$conexion->error."');
            window.location.href='perfil.php';
        </script>
        ";
    }

} else {
    echo "
    <script>
        alert('No se recibieron datos');
        window.location.href='perfil.php';
    </script>
    ";
}
?>