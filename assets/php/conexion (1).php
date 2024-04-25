<?php
$servername = "localhost"; // Cambia esto si tu servidor MySQL no está en localhost
$username = "id21554131_curuwit_practicas"; // Cambia por tu nombre de usuario de MySQL
$password = "Curuzuenblanco_1"; // Cambia por tu contraseña de MySQL
$dbname = "id21554131_curuwit";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
