<?php
$id = "";
$isbn = "";
$titulo = "";
$autor = "";
$genero = "";
$año_publicacion = "";
$ejemplares = "";
include '../Conexiones/conexion.php';
include '../Conexiones/config.php';
include '../Clases/Libro.php';

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET["id"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure that $isbn is set from the form data.
    $id = $_POST['id'];

    $data = [
        'id' => $id,
        'isbn' => $_POST['isbn'],
        'titulo' => $_POST['titulo'],
        'autor' => $_POST['autor'],
        'genero' => $_POST['genero'],
        'año_publicacion' => $_POST['año_publicacion'],
        'ejemplares' => $_POST['ejemplares'],
    ];

    $libro = new Libro();
    $libro->load($data);
    $libro->guardar();

    // Redirect to the appropriate location after saving.
        header('Location: ../index/librosadmin.php');

}

// If not in POST mode, retrieve the book details for editing.
try {
    $stmt = $conn->prepare("
        SELECT id, isbn, titulo, autor, genero, año_publicacion, ejemplares
        FROM libros 
        WHERE id=:id");

    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $libro = $stmt->fetch();

} catch (PDOException $e) {
    echo "No se pudo conectar con la base de datos";
    exit;
}
?>
<form action="<?= $_SERVER["PHP_SELF"]; ?>?id=<?= $id ?>" method="POST">
    <input type="hidden" name="id" value="<?= $id ?>">
    <div class="form-group">
    <label for="isbn">ISBN:</label>
    <input type="text" name="isbn" class="form-control" value="<?= $isbn ?>" required>
</div>
<div class="form-group">
    <label for="titulo">Titulo:</label>
    <input type="text" name="titulo" class="form-control" value="<?= $titulo ?>" required>
</div>
<div>
    <label for="autor">Autor:</label>
    <input type="text" name="autor" class="form-control" value="<?= $autor ?>" required>
</div>

<div>
    <label for="genero">Genero:</label>
    <input type="text" name="genero" class="form-control" value="<?= $genero ?>" required>
</div>

<div>
    <label for="año_publicacion">Año de publicacion:</label>
    <input type="date" name="año_publicacion" class="form-control" value="<?= $año_publicacion ?>" required>
</div>

<div>
    <label for="ejemplares">Ejemplares:</label>
    <input type="text" name="ejemplares" class="form-control" value="<?= $ejemplares ?>" required>
</div>

<div class="d-grid gap-2">
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
</form>