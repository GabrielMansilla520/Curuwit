<?php
session_start();

// Elimina todas las variables de sesión
session_unset();

// Destruye la sesión
session_destroy();

// Elimina la cookie persistente
setcookie('usuario_token', '', time() - 3600, "/"); // Expira la cookie

// Redirige al usuario a la página de inicio o donde desees
header("Location: ../../index.php");
exit();
?>