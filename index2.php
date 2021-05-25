<?php
include_once 'controllers/controller.php';
include_once 'config/conexion.php';
$Controller =  new Control();


if (!isset($_REQUEST['c'])) {
    $Controller->index();
}else{
    $action = $_REQUEST['c'];
    call_user_func(array($Controller,$action));
}
?>