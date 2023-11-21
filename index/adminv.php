<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../Usuarios/login.php");
        exit;
    }
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    ?>
<html>
<head>        
        <title>Readex</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <style>

        /* Estilos para el menú de navegación */
        ul.nav-menu {
            list-style: none;
            padding: 10;
            background-color: #96DDFE;
            display: flex;
        }

        ul.nav-menu li {
            margin: 10;
        }

        ul.nav-menu li a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 15px 20px;
        }

        ul.nav-menu li a:hover {
            background-color: #96DDFE;
        }
    </style>
</head>
<!DOCTYPE html>
<html>
<head>
    <title>Menú de Navegación</title>
    <style>
        /* Estilos para el menú de navegación */
        ul.nav-menu {
            list-style: none;
            padding: 0;
            background-color: #A5380F;
            display: flex;
        }

        ul.nav-menu li {
            margin: 0;
        }

        ul.nav-menu li a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 15px 20px;
        }

        ul.nav-menu li a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <nav>
    <div>
        <ul class="nav-menu">
            <li><a href="../index/mainadmin.php">Inicio</a></li>
            <li><a href="../index/infoadmin.php">Acerca de Nosotros</a></li>
            <li><a href="../index/librosadmin.php">Libros</a></li>
            <li><a href="../index/usuariosadmin.php">Usuarios</a></li>
            <li><a href="../Usuarios/logout.php">Logout</a></li>
        </ul>
            </form>
        </form>
        <form class="d-flex" role="search" action="buscar_libros.php" method="POST">
                <input class="form-control me-2" type="search" placeholder="Buscar " name="busqueda" aria-label="Buscar libros" >
                <button class="btn btn-outline-success" type="submit">Buscar</button>
        </div>
    </nav>
</body>
</html>