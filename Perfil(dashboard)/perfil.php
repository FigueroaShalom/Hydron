<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

/* anti cache */
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

// 🔥 CAMBIO AQUÍ
$user = $_SESSION['user'];
$email = $_SESSION['email'];
$rol = $_SESSION['rol'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{background:#f4f6f9;}
.sidebar{width:250px;background:#0d6efd;color:white;min-height:100vh;}
.usuario{background:#0b5ed7;padding:15px;border-radius:10px;text-align:center;margin-bottom:20px;}
.menu .btn{width:100%;margin-bottom:10px;}
.contenido{flex:1;padding:30px;background:#f8f9fa;}
</style>
</head>

<body>

<div class="d-flex">

<!-- SIDEBAR -->
<div class="sidebar p-3">

<div class="usuario">
<img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" width="70"><br>

<!-- 🔥 CAMBIO -->
<strong><?php echo $user; ?></strong><br>
<small><?php echo $email; ?></small><br>

<?php echo ucfirst($rol); ?>
</div>

<div class="menu">

<?php if($rol == "administrador"){ ?>
<button class="btn btn-light" onclick="cargar('crear_Contenido')">Crear Contenido</button>
<button class="btn btn-light" onclick="cargar('mis_Publicaciones')">Mis Publiciones</button>
<button class="btn btn-light" onclick="cargar('mis_borradores')">Mis Borradores</button>
<button class="btn btn-light" onclick="cargar('mis_publicacionePendientes')">Mis publicaciones Pendientes</button>
<button class="btn btn-light" onclick="cargar('publicaciones_Revision')">Publicaciones en Revisión</button>
<button class="btn btn-warning" onclick="cargar('administrar_Usuarios')">Administrar usuarios</button>
<button class="btn btn-warning" onclick="cargar('crear_Usuarios')">Crear Usuario</button>

<?php } elseif($rol == "editor"){ ?>
<button class="btn btn-light" onclick="cargar('crear_Contenido')">Crear Contenido</button>
<button class="btn btn-light" onclick="cargar('mis_Publicaciones')">Mis Publiciones</button>
<button class="btn btn-light" onclick="cargar('mis_borradores')">Mis Borradores</button>
<button class="btn btn-light" onclick="cargar('mis_publicacionePendientes')">Mis publicaciones Pendientes</button>
<button class="btn btn-light" onclick="cargar('publicaciones_Revision')">Publicaciones en Revisión</button>

<?php } elseif($rol == "autor"){ ?>
<button class="btn btn-light" onclick="cargar('crear_Contenido')">Crear Contenido</button>
<button class="btn btn-light" onclick="cargar('mis_Publicaciones')">Mis Publiciones</button>
<button class="btn btn-light" onclick="cargar('mis_borradores')">Mis Borradores</button>
<button class="btn btn-light" onclick="cargar('mis_publicacionePendientes')">Mis publicaciones Pendientes</button>

<?php } else { ?>
<p class="text-center">Sin permisos</p>
<?php } ?>

<a href="logout.php" class="btn btn-danger">Cerrar sesión</a>

</div>
</div>

<!-- CONTENIDO -->
<div class="contenido" id="contenido">
<h4>Bienvenido <?php echo $user; ?> 👋</h4>
<p>Selecciona una opción del menú</p>
</div>

</div>

<script>

// cargar contenido sin recargar la pagina
function cargar(modulo){
    fetch(modulo + ".php")
    .then(res => res.text())
    .then(data => {
        document.getElementById("contenido").innerHTML = data;
    });
}

// anti boton atras
window.history.forward();
window.onpageshow = function(e){
    if(e.persisted) location.reload();
};

</script>

</body>
</html>