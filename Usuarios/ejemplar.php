 <title>Préstamos</title>
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

        tr:hover {
            background-color: #e0e0e0;
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
</head>
<body>
    <h1>Préstamos</h1>
    <table>
        <thead>
            <tr>
                <th>ISBN</th>
                <th>F-Inicio</th>
                <th>F-Fin</th>
                <th>Ejemplares</th>
                <th>Devolver</th>
                
            </tr>
        </thead>
        <tbody>
                <?php
             if (isset($_GET['id'])) {
                $id = $_GET['id'];}

                $conn = new PDO("mysql:host=localhost;dbname=test", "root", "");


                $stmt = $conn->prepare("SELECT isbnp, finicio, ffin, ejemplares FROM prestamos WHERE idp = :id");
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $prestaos = $stmt->fetchAll();

                foreach ($prestaos as $prestao) : ?>
      
                 <tr>
                    <td><?= $prestao["isbnp"] ?></td>
                    <td><?= $prestao["finicio"] ?></td>
                    <td><?= $prestao["ffin"] ?></td>
                    <td><?= $prestao["ejemplares"] ?></td>
                    <td><a href="devolver.php?id=<?= $prestao['id']?>" class="btn btn-primary">Devolver</a></td>
                </tr>

                <?php endforeach;?>
           

                </tbody>
                </table>
            </html>
           
            <a href=" /trabajofinal/index/usuariosadmin.php" class="btn btn-primary">Volver Atrás</a>
            </div>
