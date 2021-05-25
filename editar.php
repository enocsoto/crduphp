<?php
if (!isset($_GET['id'])) {
    header('location: index.php');
}
include 'model/conexion.php';
$id=$_GET['id'];
$sentencia=$bd->prepare("SELECT * FROM alumno WHERE id_alumno = ?;");
$sentencia->execute([$id]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=|, initial-scale=1.0">
    <link rel="StyleSheet" href="css/mystyle.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Editar Alumno</title>
</head>

<body>
    <div class="container">

        <div class="editar">

            <h3>Editar Alumno:</h3>
            <form method="POST" action="editarProceso.php">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label"> Pimer Apellido </label>
                    <div class="col-sm-10">
                        <input type="text" name="txt2Paterno" required value="<?php echo $persona->ap_paterno;?>">
                    </div>
                    <label for="" class="col-sm-2 control-label"> Segundo Apellido </label>
                    <div class="col-sm-10">
                        <input type="text" name="txt2Materno" required value="<?php echo $persona->ap_materno; ?>">
                    </div>
                    <label for="" class="col-sm-2 control-label">Nombres </label>
                    <div class="col-sm-10">
                        <input type="text" name="txt2Nombre" required value="<?php echo $persona->nombre; ?>">
                    </div>
                    <label for="" class="col-sm-2 control-label">Nota Parcial: </label>
                    <div class="col-sm-10">
                        <input type="text" name="txt2Parcial" required value="<?php echo $persona->ex_parcial;?>">
                    </div>
                    <label for="" class="col-sm-2 control-label">Nota Final: </label>
                    <div class="col-sm-10">
                        <input type="text" name="txt2Final" required value="<?php echo $persona->ex_final; ?>">
                    </div>
                    <input type="hidden" name="oculto" value="1">
                    <input type="hidden" name="id2" value="<?php echo $persona->id_alumno; ?>">
                    <br>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">GUARDAR CAMBIOS</button>
                        </div>
                    </div>
                </div>

            </form>
            <br>
                            <a href="index.php"><button type="text" name="" class="btn btn-secondary">REGRESAR</button></a>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>