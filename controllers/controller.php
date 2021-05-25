<?php
include_once 'model/alumnos.php';
class Control{

    public $mode;
    public function __construct(){
        $this->mode = new Alumnos();
    }
    public function index(){
        include_once 'views/home.php';
    }
}
?>