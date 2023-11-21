<html>
<h1 style="text-align: center;">Usuarios</h1>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            background-color: #007BFF;
            color: #fff;
            padding: 20px;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
            max-width: 800px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        thead {
            background-color: #007BFF;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a.btn {
            text-decoration: none;
            background-color: #007BFF;
            color: #fff;
            padding: 5px 10px;
            border-radius: 4px;
        }

        a.btn:hover {
            background-color: #0056b3;
        }
    </style>
<br>
</br>
<body>
<table class="table table-bordered table-striped table-sm">
        <thead class="table-primary">
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Ejemplares</th>
            </tr>
        </thead>
        <tbody>
            <?php

            try {
                $conn = new PDO("mysql:host=localhost;dbname=test", "root", "");
            } catch (PDOException $e) {
                echo "No se pudo conectar con la base de datos";
            }

            $stmt = $conn->prepare("SELECT id, username, email FROM usuarios");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $usuarios = $stmt->fetchAll();



            foreach ($usuarios as $usuario) : ?>
                    <td><?= $usuario["username"] ?></td>
                    <td><?= $usuario["email"] ?></td>
                    <td>
                    <a href='ejemplar.php?id=<?= $usuario["id"] ?>' class="btn btn-info">Prestamos</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
<div style="text-align; margin-top: 20px;">
            <a href=" ../index/usuariosadmin.php" class="btn btn-primary">Volver Atrás</a>
            </div>