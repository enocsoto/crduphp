<?php
$contrasena = '';
$usuario='root';
$nombredb='nota';
try {
    $bd = new PDO(
        'mysql:host=localhost;
        dbname='.$nombredb,
        $usuario, $contrasena,
        array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
    );
} catch (Exception $e) {
    echo "Error de Conexion" .$e->getMessage();
}

?>