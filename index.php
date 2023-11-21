<?php 

include 'Conexiones/config.php';
include 'Conexiones/conexion.php';
include 'Vistas/layouts/vistaindex.php';
include 'Clases/sessionchecker.php';
include '../Clases/vista.php';

SessionChecker::check();
/*$vista = new Vista();
$vista->set('conn', $conn);
$vista->render('/trabajofinal/Vistas/usuarios/inicio.php');*/
