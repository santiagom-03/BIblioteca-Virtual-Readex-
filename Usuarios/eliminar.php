<?php
include '../Conexiones/conexion.php';
include '../Conexiones/config.php';
include '../Clases/Usuario.php';

if (isset($_GET['id'])) {
    $data = [
        'id' => $_GET['id']
    ];

    $userData = new Usuario();
    $userData->load($data);
    $userData->borrar();

        header('Location: ../index/usuariosadmin.php');
}