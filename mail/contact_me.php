<form
  action="https://formspree.io/f/xrgvzgpr"
  method="POST"
>

<?php
// Check for empty fields
if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "Por favor, completa todos los campos correctamente.";
    return false;
}

// Recoge los valores de los campos del formulario
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Configura los detalles del correo
$to = 'thomas-emerson@live.com';
$email_subject = "Formulario de contacto del sitio web: $name";
$email_body = "Has recibido un nuevo mensaje desde el formulario de contacto de tu sitio web.\n\nDetalles:\n\nNombre: $name\nEmail: $email_address\nTeléfono: $phone\nMensaje:\n$message";
$headers = "From: $email_address\n";
$headers .= "Reply-To: $email_address";

// Envía el correo
if (mail($to, $email_subject, $email_body, $headers)) {
    echo "¡El mensaje se envió correctamente! Gracias por contactarnos.";
} else {
    echo "Hubo un problema al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.";
}
?>
