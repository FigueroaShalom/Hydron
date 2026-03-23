<?php
include("conexion.php");
session_start();

if(!isset($_SESSION['id'])){
    echo "Acceso no autorizado";
    exit();
}

$idActual = $_SESSION['id'];

// obtener usuarios menos el actual
$sql = "SELECT * FROM usuarios WHERE id != $idActual";
$resultado = $conexion->query($sql);
?>

<h3 class="mb-4">Administrar Usuarios</h3>

<table class="table table-bordered table-hover bg-white">
<thead class="table-dark">
<tr>
    <th>ID</th>
    <th>Usuario</th>
    <th>Nombre</th>
    <th>Apellido P</th>
    <th>Apellido M</th>
    <th>Fecha</th>
    <th>Correo</th>
    <th>Rol</th>
    <th>Acciones</th>
</tr>
</thead>

<tbody>

<?php while($row = $resultado->fetch_assoc()){ ?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['nombreUsuario']; ?></td>
    <td><?php echo $row['nombre']; ?></td>
    <td><?php echo $row['apellidoP']; ?></td>
    <td><?php echo $row['apellidoM']; ?></td>
    <td><?php echo $row['fecha']; ?></td>
    <td><?php echo $row['correo']; ?></td>
    <td><?php echo $row['rol']; ?></td>

    <td>
    <button class="btn btn-warning btn-sm">Editar</button>

    <a href="eliminar_usuario.php?id=<?php echo $row['id']; ?>"
       class="btn btn-danger btn-sm"
       onclick="return confirm('¿Seguro que deseas eliminar esta cuenta?')">
       Eliminar
    </a>
</td>
</tr>

<?php } ?>

</tbody>
</table>