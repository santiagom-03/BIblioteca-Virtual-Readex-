<?php
include 'usuariov.php'
?>
<html>

<body>
    <h3>Libros</h3>
<table class="table table-bordered table-striped table-sm">
        <thead class="table-primary">
            <tr>
                <th>Ejemplares</th>
                <th>ISBN</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Género</th>
                <th>Año de Publicación</th>
                <th>Prestamos</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $conn = new PDO("mysql:host=localhost;dbname=test", "root", "");
            } catch (PDOException $e) {
                echo "No se pudo conectar con la base de datos";
            }

            $stmt = $conn->prepare("SELECT isbn, titulo, autor, genero, año_publicacion, ejemplares FROM libros");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $libros = $stmt->fetchAll();

            foreach ($libros as $libro) : ?>
                <tr class="<?= ($libro['ejemplares'] == 0) ? 'zero-inventory' : '' ?>">
                    <td><?= $libro["ejemplares"] ?></td>
                    <td><?= $libro["isbn"] ?></td>
                    <td><?= $libro["titulo"] ?></td>
                    <td><?= $libro["autor"] ?></td>
                    <td><?= $libro["genero"] ?></td>
                    <td><?= $libro["año_publicacion"] ?></td>
                    <td>
                        <?php if ($libro['ejemplares'] > 0) : ?>
                            <a href="/trabajofinal/Libros/editar.php?isbn=<?= $libro['isbn'] ?>" class="btn btn-info">Pedir</a>
                        <?php else : ?>
                            <button class="btn btn-info" disabled>Pedir</button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>