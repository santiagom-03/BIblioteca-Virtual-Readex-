<?php
include '../Conexiones/conexion.php';
include '../Conexiones/config.php';
include '../Clases/Libro.php';

if (isset($_GET['id'])) {
    $data = [
        'id' => $_GET['id']
    ];

    $libro = new Libro();
    $libro->load($data);
    $libro->borrar();

        header('Location: ../index/librosadmin.php');
}