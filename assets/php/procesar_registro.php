<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['firstName'];
    $apellido = $_POST['lastName'];
    $nombre_usuario = $_POST['luserName'];
    $correo = $_POST['email'];
    $contrasena = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $fecha_nacimiento = $_POST['dob'];
    $recordar_contraseña = isset($_POST['rememberMe']) ? 1 : 0;

    $sql = "INSERT INTO usuarios (nombre, apellido, nombre_usuario, correo, contrasena, fecha_nacimiento, recordar_contraseña)
            VALUES ('$nombre', '$apellido', '$nombre_usuario', '$correo', '$contrasena', '$fecha_nacimiento', '$recordar_contraseña')";

    if ($conn->query($sql) === TRUE) {
        // Registro exitoso, redirige a la página de inicio con una notificación
        header("Location: ../../index.php?registro=exito");
        exit();
    } else {
        // Registro fallido, muestra un mensaje de error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

