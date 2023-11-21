<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form action="login.php" method="POST">
        <label for="username">Nombre de Usuario:</label>
        <input type="text" name="username" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>

        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>
<?php
include '../Conexiones/config.php';
include '../Conexiones/conexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT username, id, password, rol FROM usuarios WHERE username = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $userData = $stmt->fetch();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $stmt = $conn->prepare("SELECT id, rol, username, password FROM usuarios WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $userData = $stmt->fetch();
        
        if ($userData) {
            $storedPassword = $userData["password"];

            if (password_verify($password, $storedPassword)) {
                session_start();
                $_SESSION["username"] = $username;
                $_SESSION['id'] = $userData['id'];
                if (($userData["rol"]) == 1) {
                    header('Location: ../index/mainadmin.php');
                    exit;}
                   else {header('Location: ../index/main.php');
                    exit;}
                } else { echo "Contraseña incorrecta.";}
            } else {
                echo "Nombre de usuario no encontrado.";
            }
    }
}