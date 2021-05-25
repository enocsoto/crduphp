
<?php
if (!isset($_GET['id'])) {
    exit();
}


$codigo= $_GET['id'];
include 'model/conexion.php';
$sentencia = $bd->prepare("DELETE FROM alumno WHERE id_alumno = ?;");
$resultado= $sentencia->execute([$codigo]);

if ($resultado == TRUE) {
    header('location: index.php');
}else{
    echo "NO SE ELIMINO EL ALUMNO DE LA DB";
}
?>