<?php
session_start();
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_SESSION['usuario_id'];

    if (isset($_POST['newFirstName'])) {
        $newFirstName = $_POST['newFirstName'];
        $sql = "UPDATE usuarios SET nombre = '$newFirstName' WHERE id = $usuario_id";
    } elseif (isset($_POST['newLastName'])) {
        $newLastName = $_POST['newLastName'];
        $sql = "UPDATE usuarios SET apellido = '$newLastName' WHERE id = $usuario_id";
    } elseif (isset($_POST['newEmail'])) {
        $newEmail = $_POST['newEmail'];
        $sql = "UPDATE usuarios SET correo = '$newEmail' WHERE id = $usuario_id";
    } elseif (isset($_POST['newBorn'])) {
        $newBorn = $_POST['newBorn'];
        $sql = "UPDATE usuarios SET fecha_nacimiento = '$newBorn' WHERE id = $usuario_id";
    } elseif (isset($_POST['newPassword'])) {
        $newPassword = $_POST['newPassword'];
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $sql = "UPDATE usuarios SET contrasena = '$hashedPassword' WHERE id = $usuario_id";
    } else {
        // No se proporcionaron datos válidos
        header("Location: error.php");
        exit();
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: perfil.php");
        exit();
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }
}

$conn->close();
?>
