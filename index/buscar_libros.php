<?php
include 'usuariov.php';
?>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #FF8000;
        }

        h3 {
            color: #333;
        }

        p {
            color: #555;
        }
    </style>
<?php
// Conexión a la base de datos (reemplaza con tus propios datos)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar la búsqueda
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["busqueda"])) {
    $busqueda = $_POST["busqueda"];

    // Consulta SQL para buscar libros
    $sql = "SELECT * FROM libros WHERE titulo LIKE '%$busqueda%' OR autor LIKE '%$busqueda%' OR genero LIKE '%$busqueda%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Resultados de la búsqueda:</h2>";

        while ($row = $result->fetch_assoc()) {
            echo "<h3>Título: " . $row["titulo"] . "</h3>";
            echo "Autor: " . $row["autor"] . "<br>";
            echo "Género: " . $row["genero"] . "<br>";
            echo "Año de Publicación: " . $row["año_publicacion"] . "<br>";
        }
    } else {
        echo "No se encontraron resultados para la búsqueda: " . $busqueda;
    }
}

$conn->close();
?>