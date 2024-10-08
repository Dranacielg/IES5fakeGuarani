<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario de ayuda
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Guardar los datos en un archivo local
    $file_path = "/var/www/html/ayuda_data.txt"; // Ruta absoluta
    $file = fopen($file_path, "a");

    if ($file) {
        fwrite($file, "Nombre: " . $nombre . " - DNI: " . $dni . " - Email: " . $email . " - Mensaje: " . $mensaje . "\n");
        fclose($file);
        // Mostrar mensaje y enlace para volver a index.html
        echo "<h2>Consulta recibida correctamente.</h2>";
        echo "<p>Gracias, $nombre. Nos pondremos en contacto contigo a través del correo: " . htmlspecialchars($email) . ".</p>";
        echo "<p><a href='index.html'>Volver al inicio</a></p>";  // Enlace para volver a index.html
    } else {
        echo "<h2>Error al abrir el archivo para guardar los datos.</h2>";
        echo "<p><a href='index.html'>Volver al inicio</a></p>";
    }
} else {
    echo "Método no permitido.";
}
?>
