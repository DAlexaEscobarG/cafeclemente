<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["tel"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    // Configura el destinatario y el asunto del correo
    $destinatario = 'al229766@alumnos.uacj.mx'; // Reemplaza con tu dirección de correo
    $asunto = 'Formulario de contacto';

    // Construye el cuerpo del mensaje
    $cuerpo = "Nombre: $nombre\r\n";
    $cuerpo .= "Apellido: $apellido\r\n";
    $cuerpo .= "Teléfono: $telefono\r\n";
    $cuerpo .= "Email: $email\r\n";
    $cuerpo .= "Mensaje: $mensaje\r\n";

    // Configura los encabezados del correo
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=utf-8\r\n";
    $headers .= "X-Priority: 3\r\n";
    $headers .= "X-MSMail-Priority: Normal\r\n";
    $headers .= "X-Mailer: php\r\n";
    $headers .= "From: \"$nombre $email\" <$email>\r\n";

    // Intenta enviar el correo y muestra un mensaje
    if (mail($destinatario, $asunto, $cuerpo, $headers)) {
        echo "Correo enviado con éxito";
    } else {
        echo "Error al enviar el correo";
    }
} else {
    // Si se intenta acceder directamente al script, redirige al formulario
    header("Location: formulario.html");
    exit();
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ... (código para procesar el formulario)

    // Intenta enviar el correo y muestra un mensaje
    if (mail($destinatario, $asunto, $cuerpo, $headers)) {
        include 'responder.html'; // Incluye el archivo HTML de respuesta
    } else {
        echo "Error al enviar el correo";
    }
} else {
    // Si se intenta acceder directamente al script, redirige al formulario
    header("Location: formulario.html");
    exit();
}
?>
