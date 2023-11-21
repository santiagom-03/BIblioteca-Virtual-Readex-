<?php
$username = "";
$email = "";
$rol = "";

include '../Conexiones/conexion.php';
include '../Conexiones/config.php';
include '../Clases/Usuario.php';

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET["id"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure that $isbn is set from the form data.
    $id = $_POST['id'];

    $data = [
        'id' => $id,
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'rol' => $_POST['rol'],
    ];

    $usuario = new Usuario();
    $usuario->load($data);
    $usuario->guardar();

    // Redirect to the appropriate location after saving.
        header('Location: ../index/usuariosadmin.php');

}

// If not in POST mode, retrieve the book details for editing.
try {
    $stmt = $conn->prepare("
        SELECT id, username, email, rol
        FROM usuarios 
        WHERE id=:id");

    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $usuario = $stmt->fetch();

} catch (PDOException $e) {
    echo "No se pudo conectar con la base de datos";
    exit;
}
?>
<form action="<?= $_SERVER["PHP_SELF"]; ?>?id=<?= $id ?>" method="POST">
    <input type="hidden" name="id" value="<?= $id ?>">
    <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" name="username" class="form-control" value="<?= $username ?>" required>
</div>
<div class="form-group">
    <label for="email">Email::</label>
    <input type="text" name="email" class="form-control" value="<?= $email ?>" required>
</div>
<div>
    <label for="rol">Rol:</label>
    <input type="text" name="rol" class="form-control" value="<?= $rol ?>" required>
</div>

<div class="d-grid gap-2">
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
</form>