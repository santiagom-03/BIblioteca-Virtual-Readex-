<?php

    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: ../Usuarios/login.php");
        exit;
    }
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    $User_id =$_SESSION['id'];

    ?>
<html>
<head>
    <title>Procesar Solicitud de Préstamo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F9E4B7; /* Color de fondo pastel */
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #FFC77E; /* Color de encabezado pastel */
            color: #333;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #FFF2D2; /* Color de fondo de contenedor pastel */
            border: 1px solid #FFC77E; /* Borde pastel */
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #FFC77E; /* Borde pastel */
            border-radius: 4px;
        }

        button {
            background-color: #FFC77E; /* Color de botón pastel */
            color: #333;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #FFA900; /* Color de botón pastel al pasar el cursor */
        }

        .error {
            color: #FF5555; /* Color de error pastel */
        }

        .success {
            color: #55AA55; /* Color de éxito pastel */
        }

        .back-link {
            margin-top: 20px;
            display: block;
            text-align: center;
            text-decoration: none;
            color: #FFC77E; /* Color de enlace pastel */
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<div class="container">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['cantidad'])) {
    $id = $_POST['id'];
    $cantidad_solicitada = $_POST['cantidad'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=test", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM prestamos WHERE ejemplares = 0";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        $sql = "SELECT * FROM prestamos WHERE isbnp = :id AND idp = :User_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':User_id', $User_id);
        $stmt->execute();

        $filas_con_coincidencia = $stmt->fetchColumn();

        if ($filas_con_coincidencia == 0) {

            $sql = "SELECT ejemplares FROM libros WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                $ejemplares_disponibles = $row['ejemplares'];

                if ($cantidad_solicitada <= $ejemplares_disponibles) {
                   
                    $nueva_cantidad = $ejemplares_disponibles - $cantidad_solicitada;

                    $sql = "UPDATE libros SET ejemplares = :nueva_cantidad WHERE id = :id";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':nueva_cantidad', $nueva_cantidad);
                    $stmt->bindParam(':id', $id);
                    $stmt->execute();


                    $fecha = date("Y/m/d");
                    $fechad = date("Y-m-d", strtotime($fecha . " +15 days"));

                    $sql_insert = "INSERT INTO prestamos (idp, isbnp, finicio, ffin, ejemplares) VALUES (:User_id, :id, :fecha, :fechad, :cantidad_solicitada)";
                    $stmt_insert = $conn->prepare($sql_insert);
                    $stmt_insert->bindParam(':User_id', $User_id);
                    $stmt_insert->bindParam(':id', $id);
                    $stmt_insert->bindParam(':fecha', $fecha);
                    $stmt_insert->bindParam(':fechad', $fechad);
                    $stmt_insert->bindParam(':cantidad_solicitada', $cantidad_solicitada);
                    $stmt_insert->execute();

                    echo "Solicitud de préstamo exitosa. Se han prestado " . $cantidad_solicitada . " ejemplar(es).";
                
                }else {
                    echo "No hay suficientes ejemplares disponibles para la cantidad solicitada.";
                }
                  

                }
            }
        else {
                    echo "No puedes realizar otro prestamo de este libro";

                }
} catch (PDOException $e) {
        echo "Error al conectar con la base de datos: " . $e->getMessage();
    }

    $conn = null;
}
?>
<br><br>
<a href="../index/libros.php">Volver a la Lista de Libros</a>
</div>
</body>
</html>