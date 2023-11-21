<?php
$titulo = "";
$autor = "";
$genero = "";
$año_publicacion = "";
$ejemplares = "";
$isbn = "";

include '../Conexiones/conexion.php';
include '../Conexiones/config.php';
include '../Clases/Libro.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
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

        header('Location: ../index/mainadmin.php');

}

?>

<form action="<?= $_SERVER["PHP_SELF"]; ?>" method="POST" class="form">
<div class="form.group">
    <label for="isbn">ISBN:</label>
    <input type="text" name="isbn" class="form-control" value="<?= $isbn ?>" required>                
</div>
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
