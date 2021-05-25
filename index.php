<?php
include 'model/conexion.php';
$sentencia = $bd->query("SELECT * FROM alumno;");
$alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="StyleSheet" href="css/mystyle.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Listado Alumnos</title>
</head>

<body>
    <div class="container-fluid">
        <div id="listaAlumnos">
            <h3>Lista de Alumnos</h3>
            <table id="datos" class="table table-dark">
                <tr>
                    <th>Codigo</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Nombre</th>
                    <th>Parcial</th>
                    <th>Nota Final</th>
                    <th>Promedio</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                <?php
                foreach ($alumnos as $dato) {
                ?>
                    <tr>
                        <td><?php echo $dato->id_alumno; ?></td>
                        <td><?php echo $dato->ap_paterno; ?></td>
                        <td><?php echo $dato->ap_materno; ?></td>
                        <td><?php echo $dato->nombre; ?></td>
                        <td><?php echo $dato->ex_parcial; ?></td>
                        <td><?php echo $dato->ex_final; ?></td>
                        <td><?php echo ($dato->ex_final + $dato->ex_parcial) / 2; ?></td>
                        <td><a href="editar.php?id=<?php echo $dato->id_alumno; ?>"><svg class="edit" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg></a></td>
                        <td><a href="eliminar.php?id=<?php echo $dato->id_alumno; ?>"><svg class="delete" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg></a></td>
                    </tr>
                <?php
                }
                ?>
            </table>

        </div>
        <div id="ingresarAlumnos">
            <hr>
            <h3>Ingresar alumnos:</h3>

            <form action="insertar.php" method="POST" class="form-horizontal">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label"> Pimer Apellido </label>
                    <div class="col-sm-10">
                        <input type="text" name="txtPaterno" required>
                    </div>
                    <label for="" class="col-sm-2 control-label"> Segundo Apellido </label>
                    <div class="col-sm-10">
                        <input type="text" name="txtMaterno" required>
                    </div>
                    <label for="" class="col-sm-2 control-label">Nombres </label>
                    <div class="col-sm-10">
                        <input type="text" name="txtNombre" required>
                    </div>
                    <label for="" class="col-sm-2 control-label">Nota Parcial: </label>
                    <div class="col-sm-10">
                        <input type="text" name="txtParcial" required>
                    </div>
                    <label for="" class="col-sm-2 control-label">Nota Final: </label>
                    <div class="col-sm-10">
                        <input type="text" name="txtFinal" required>
                    </div>
                    <input type="hidden" name="oculto" value="1">
                    <br>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="reset" name="" class="btn btn-default">RESET</button>
                            <button type="submit" class="btn btn-primary">INGRESAR ALUMNO</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<br>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>