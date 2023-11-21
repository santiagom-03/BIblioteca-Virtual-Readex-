<?php

session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Prevenir el almacenamiento en caché en el navegador
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Redirigir al usuario a la página de inicio de sesión u otra página deseada
header("Location: inicio.php");
exit;



?>