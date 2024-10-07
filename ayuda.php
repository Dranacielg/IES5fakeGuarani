<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario de ayuda
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Guardamos los datos en un archivo local
    $file = fopen("ayuda_data.txt", "a");
    fwrite($file, "Nombre: " . $nombre . " - DNI: " . $dni . " - Email: " . $email . " - Mensaje: " . $mensaje . "\n");
    fclose($file);

    // Mostrar un mensaje de éxito o redirigir
    echo "Consulta recibida. Nos pondremos en contacto contigo.";
} else {
    echo "Método no permitido.";
}
?>
