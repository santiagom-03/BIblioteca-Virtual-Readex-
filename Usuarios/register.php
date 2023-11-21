<!DOCTYPE html>
<html>
<head>
    <title>Registrarse</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        text-align: center;
        padding: 20px;
    }

    h1 {
        color: #333;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        max-width: 300px; 
        margin: 0 auto; 
    }

    label {
        display: block;
        text-align: left;
        margin-bottom: 5px;
    }

    input {
        width: 90%;
        padding: 10px;
        margin-bottom: 10px; 
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        background-color: #007BFF;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
    <h1>Registrarse</h1>
    <form action="register.php" method="POST">
   
        <label for="username">Nombre de Usuario:</label>
        <input type="text" name="username" required><br><br>

        <label for="email">Correo Electronico:</label>
        <input type="email" name="email" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br><br>

        <label for="password">Confirmar contraseña:</label>
        <input type="password" name="confirm_password" required><br><br>

        <button type="submit">Registrarse</button>
    </form>
</body>
</html>
<?php

include '../Conexiones/config.php';
include '../Conexiones/conexion.php';
include '../Clases/sessionchecker.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validar los datos
    if ($password != $confirm_password) {
        
        echo "Las contraseñas no coinciden.";
    } else {
        // Hash la contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO usuarios (username, email, password) VALUES (:username,:email, :password)");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $hashed_password);

        if ($stmt->execute()) {
            echo "Registro exitoso. ¡Inicia sesión!";
            header('Location: ../Usuarios/login.php');
        } else {
            echo "Error al registrar el usuario.";
        }
    }
}
?>