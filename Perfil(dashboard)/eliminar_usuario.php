<?php
include("conexion.php");
session_start();

if(!isset($_SESSION['id'])){
    echo "Acceso no autorizado";
    exit();
}

if(isset($_GET['id'])){

    $idEliminar = $_GET['id'];
    $idActual = $_SESSION['id'];

    // evitar que se elimine a sí mismo
    if($idEliminar == $idActual){
        echo "No puedes eliminar tu propia cuenta";
        exit();
    }

    $sql = "DELETE FROM usuarios WHERE id = $idEliminar";

    if($conexion->query($sql)){
        header("Location: perfil.php");
    } else {
        echo "Error al eliminar";
    }

} else {
    echo "ID no válido";
}
?>