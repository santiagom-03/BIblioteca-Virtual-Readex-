<!DOCTYPE html>
<html>
<head>
    <title>Búsqueda de Libros</title>
</head>
<body>
    <h1>Búsqueda de Libros</h1>
    <form action="buscar_libros.php" method="POST">
        <label for="busqueda">Buscar por título, autor o género:</label>
        <input type="text" name="busqueda" required>
        <button type="submit">Buscar</button>
    </form>
</body>
</html>
<?php
// Conexión a la base de datos
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

    $sql = "SELECT * FROM libros WHERE titulo LIKE '%$busqueda%' OR autor LIKE '%$busqueda%' OR genero LIKE '%$busqueda%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Resultados de la búsqueda:</h2>";

        while ($row = $result->fetch_assoc()) {
            echo "<h3>Título: " . $row["titulo"] . "</h3>";
            echo "Autor: " . $row["autor"] . "<br>";
            echo "Género: " . $row["genero"] . "<br>";
            echo "Año de Publicación: " . $row["anio_publicacion"] . "<br>";
            echo "Descripción: " . $row["descripcion"] . "<br><br>";
        }
    } else {
        echo "No se encontraron resultados para la búsqueda: " . $busqueda;
    }
}

$conn->close();
?>