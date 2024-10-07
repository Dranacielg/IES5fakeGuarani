<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Aquí puedes procesar los datos, por ejemplo, guardarlos en una base de datos o en un archivo
    // Para esta prueba, guardaremos los datos en un archivo local

    $file = fopen("login_data.txt", "a");
    fwrite($file, "Usuario: " . $usuario . " - Contraseña: " . $contraseña . "\n");
    fclose($file);

    // Puedes redirigir al usuario a otra página o mostrar un mensaje de éxito
    echo "Datos recibidos. Usuario: $usuario, Contraseña: $contraseña.";
} else {
    echo "Método no permitido.";
}
?>
