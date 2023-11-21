<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión o Registrarse</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        #container {
            background: url('tu-imagen-de-fondo.jpg') center center;
            background-size: cover;
            border: 2px solid #333;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            display: inline-block;
            margin: 10px;
        }

        a {
            text-decoration: none;
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #0077b6;
        }
    </style>
</head>
<body>
    <div id="container">
        <h1>Bienvenido</h1>
        <p>Por favor, elige una opción:</p>

        <ul>
            <li><a href=" /trabajofinal/Usuarios/login.php">Iniciar Sesión</a></li>
            <li><a href=" /trabajofinal/Usuarios/register.php">Registrarse</a></li>
        </ul>
    </div>
</body>
</html>