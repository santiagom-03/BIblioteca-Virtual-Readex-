<?php
include 'adminv.php'
?>
<html>

<body>
    <h3>Usuarios</h3>
<table class="table table-bordered table-striped table-sm">
        <thead class="table-primary">
            <tr>
                <th>Usuario</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Rol</th>
                <th>Gestionar</th>
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

            $stmt = $conn->prepare("SELECT id, username, email, rol, password FROM usuarios");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $usuarios = $stmt->fetchAll();

            foreach ($usuarios as $usuario) : ?>
                <tr>
                    <td><?= $usuario["username"] ?></td>
                    <td><?= $usuario["email"] ?></td>
                    <td><?= $usuario["password"] ?></td>
                    <td><?= $usuario["rol"] ?></td>
                    <td>
                        <a href="/trabajofinal/Usuarios/eliminar.php?id=<?= $usuario['id'] ?>" class="btn btn-info">Eliminar</a>
                        <a href="/trabajofinal/Usuarios/gestionar.php?id=<?= $usuario['id'] ?>" class="btn btn-info">Editar</a>
                    </td>
                    <td>
                    <a href="/trabajofinal/Usuarios/ejemplar.php?id=<?= $usuario['id'] ?>" class="btn btn-info">Prestamos</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>