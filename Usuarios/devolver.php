<?php

    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../Usuarios/login.php");
        exit;
    }
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    $User_id = $_SESSION['id'];

?>
       
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['cantidad'])) {

    $id = $_POST['id'];
    $cantidad_solicitada = $_POST['cantidad'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=test", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT ejemplares FROM prestamos WHERE isbnp = :id AND idp = :User_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':User_id', $User_id);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $ejemplares_disponibles = $row['ejemplares'];
            
            if ($cantidad_solicitada <= $ejemplares_disponibles) {
                   
                $nueva_cantidad = $ejemplares_disponibles - $cantidad_solicitada;

                $sql = "UPDATE prestamos SET ejemplares = :nueva_cantidad WHERE isbnp = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nueva_cantidad', $nueva_cantidad);
                $stmt->bindParam(':id', $id);
                $stmt->execute();


                $sql = "SELECT ejemplares FROM libros WHERE isbn = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

                $ejemplares_disponibles = $resultado['ejemplares'];

                $nuevo = $ejemplares_disponibles + $cantidad_solicitada;

                $sql = "UPDATE libros SET ejemplares = :nuevo WHERE isbn = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nuevo', $nuevo);
                $stmt->bindParam(':id', $id);
                $stmt->execute();


                echo "Solicitud exitosa. Le quedan " . $nueva_cantidad . " ejemplar(es).";
            
            }else {

                echo "No hay suficientes ejemplares disponibles para devolver.";
            }
        }
        $sql = "DELETE FROM prestamos WHERE ejemplares = 0";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }  catch (PDOException $e) {
        echo "Error al conectar con la base de datos: " . $e->getMessage();
    }$conn = null;

} 
