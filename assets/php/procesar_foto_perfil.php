<?php
session_start();
include('conexion.php');

// Ruta del directorio donde se almacenarán las fotos de perfil
$uploadDir = 'carpeta_de_subida/';

// Verificar si se ha enviado una foto de perfil
if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === 0) {
    // Crear el directorio si no existe
    if (!file_exists($uploadDir) && !is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    // Verificar si el archivo es una imagen
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    $imageFileType = strtolower(pathinfo($_FILES['foto_perfil']['name'], PATHINFO_EXTENSION));

    if (!in_array($imageFileType, $allowedExtensions)) {
        echo "Solo se permiten archivos JPG, JPEG, PNG o GIF.";
        exit();
    }

    // Verificar tamaño de la imagen (max 5 MB)
    if ($_FILES['foto_perfil']['size'] > 5 * 1024 * 1024) {
        echo "La imagen es demasiado grande. Por favor, elige una imagen más pequeña.";
        exit();
    }

    // Generar un nombre único para la imagen
    $uniqueName = uniqid('perfil_', true) . '.' . $imageFileType;
    $uploadFile = $uploadDir . $uniqueName;

    // Mover la foto de perfil al directorio de subida
    if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $uploadFile)) {
        // Actualizar la ruta de la foto de perfil en la base de datos
        $fotoPerfil = $uploadFile;
        $usuario_id = $_SESSION['usuario_id']; // Asegúrate de que tienes el ID del usuario en la sesión
        $sqlUpdateFotoPerfil = "UPDATE usuarios SET foto_perfil = ? WHERE id = ?";
        $stmtUpdateFotoPerfil = $conn->prepare($sqlUpdateFotoPerfil);
        $stmtUpdateFotoPerfil->bind_param("si", $fotoPerfil, $usuario_id);
        $stmtUpdateFotoPerfil->execute();
        $stmtUpdateFotoPerfil->close();
        echo "La foto de perfil se ha subido correctamente.";
    } else {
        echo "Error al subir la foto de perfil.";
    }
} else {
    echo "No se ha enviado ninguna foto de perfil o ha ocurrido un error.";
}
?>
