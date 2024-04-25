<?php
session_start();
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_SESSION['usuario_id'];
    $contenido = $_POST['postContent'];
    $respuesta_a = isset($_POST['respuesta_a']) ? $_POST['respuesta_a'] : null;

    // Manejar la carga de la imagen
    $imagen_nombre = null;

    // Verificar y crear el directorio si no existe
    $directorio = __DIR__ . '/imagenes_publicaciones/';
    if (!is_dir($directorio)) {
        mkdir($directorio, 0755, true);
    }

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
        // Generar un nombre único para la imagen
        $imagen_nombre = uniqid() . "_" . $_FILES['imagen']['name'];

        // Mover la imagen al directorio deseado
        $imagen_ruta = $directorio . $imagen_nombre;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_ruta);

    }

    // Insertar la publicación en la base de datos
    $sql = "INSERT INTO publicaciones (usuario_id, contenido, respuesta_a, fecha_publicacion, imagen) VALUES (?, ?, ?, NOW(), ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $usuario_id, $contenido, $respuesta_a, $imagen_nombre);

    if ($stmt->execute()) {
        header("Location: home.php");
        exit();
    } else {
        echo "Error al realizar la publicación: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
