<?php
session_start();
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = isset($_POST['luserName']) ? $_POST['luserName'] : '';
    $contrasena = isset($_POST['password']) ? $_POST['password'] : '';

    if (!empty($nombre_usuario) && !empty($contrasena)) {
        $sql = "SELECT * FROM usuarios WHERE nombre_usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nombre_usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($contrasena, $row['contrasena'])) {
                // Establecer las variables de sesión
                $_SESSION['usuario_id'] = $row['id'];
                $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
                $_SESSION['firstname'] = $row['nombre'];
                $_SESSION['lastname'] = $row['apellido'];
                $_SESSION['email'] = $row['correo'];
                $_SESSION['born'] = $row['fecha_nacimiento'];

                header("Location: perfil.php?usuario_id=" . $row['id']);
                exit();
            } else {
                echo "Contraseña incorrecta";
            }
        } else {
            echo "Usuario no encontrado";
        }
    } else {
        echo "Por favor, ingrese nombre de usuario y contraseña.";
    }
    $stmt->close();
}

$conn->close();
?>
