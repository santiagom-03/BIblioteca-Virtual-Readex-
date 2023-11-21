<?php
include 'usuariov.php';
?>

<html>

<body>
    <h3>Libros</h3>

<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=test", "root", "");
} catch (PDOException $e) {
    echo "No se pudo conectar con la base de datos";
}

$stmt = $conn->prepare("SELECT id, isbn, titulo, autor, genero, año_publicacion, ejemplares FROM libros");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$libros = $stmt->fetchAll();
?>

<ul>
    <?php foreach ($libros as $libro) : ?>
        <li class="<?= ($libro['ejemplares'] == 0) ? 'zero-inventory' : '' ?>">
            <span><strong>Ejemplares:</strong> <?= $libro["ejemplares"] ?></span><br>
            <span><strong>ISBN:</strong> <?= $libro["isbn"] ?></span><br>
            <span><strong>Título:</strong> <?= $libro["titulo"] ?></span><br>
            <span><strong>Autor:</strong> <?= $libro["autor"] ?></span><br>
            <span><strong>Género:</strong> <?= $libro["genero"] ?></span><br>
            <span><strong>Año de Publicación:</strong> <?= $libro["año_publicacion"] ?></span><br>
            <?php if ($libro['ejemplares'] > 0) : ?>
                <a href=" ../Libros/prestamos.php?id=<?= $libro['id'] ?>" class="btn btn-info">Pedir</a>
                <a href=" /trabajofinal/Libros/lectura.php?id=<?= $libro['id'] ?>" class="btn btn-info">Ver</a><br><br><br>
            <?php else : ?>
                <button class="btn btn-info" disabled>Pedir</button>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>