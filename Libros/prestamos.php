<!DOCTYPE html>
<html>
<head>
    <title>Solicitud de Préstamo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #007BFF;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
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
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <h1>Solicitud de Préstamo</h1>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];


        try {
            $conn = new PDO("mysql:host=localhost;dbname=test", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Consulta SQL para obtener los detalles del libro seleccionado
            $sql = "SELECT id, isbn, titulo, autor, año_publicacion, genero, ejemplares FROM libros WHERE id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<p>Título del Libro: " . $row['titulo'] . "</p>";
                echo "<p>Ejemplares Disponibles: " . $row['ejemplares'] . "</p>";


                echo "<form action='ejemplar.php' method='POST'>";
                echo "<label for='cantidad'>Cantidad de Ejemplares a Solicitar:</label>";
                echo "<input type='number' id='cantidad' name='cantidad' required>";
                echo "<input type='hidden' name='id' value='" . $id . "'>";
                echo "<button type='submit'>Solicitar Préstamo</button>";
                echo "</form>";
            } else {
                echo "Libro no encontrado.";
            }
        } catch (PDOException $e) {
            echo "Error al conectar con la base de datos: " . $e->getMessage();
        }
    } else {
        echo "No se ha seleccionado ningún libro para solicitar préstamo.";
    }
    ?>
</body>
</html>