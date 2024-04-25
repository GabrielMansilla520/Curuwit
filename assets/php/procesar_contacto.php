 <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $primerNombre = $_POST["primerNombre"];
    $segundoNombre = $_POST["segundoNombre"];
    $correo = $_POST["correo"];
    $message = $_POST["message"];
    $subject = $_POST["subject"];

    // Dirección de correo a la que se enviará el mensaje
    $destino = "curuwit.soporte@gmail.com"; // Cambiar a la dirección que recibe los mensajes

    // Asunto del correo
    $asunto = "Nuevo mensaje de contacto - $subject - de $primerNombre $segundoNombre";

    // Cuerpo del mensaje
    $mensaje = "Nombre: $primerNombre $segundoNombre\n";
    $mensaje .= "Correo electrónico: $correo\n\n";
    $mensaje .= "Asunto: $subject\n\n";
    $mensaje .= "Mensaje:\n$message";

    // Cabeceras del correo
    $headers = "From: $correo";

    // Enviar el correo usando la función mail de 000webhost
    if (mail($destino, $asunto, $mensaje, $headers)) {
        // Éxito
        echo "El mensaje se ha enviado correctamente. Nos pondremos en contacto contigo pronto.";
    } else {
        // Error
        echo "Hubo un error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.";
    }
} else {
    // Si no es una solicitud POST, redirigir a la página de contacto
    header("Location: contacto.php");
    exit();
}

?>