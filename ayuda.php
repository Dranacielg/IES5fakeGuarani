<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "tu_contraseña", "siuguarani");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar los datos en la tabla ayuda_data
    $stmt = $conn->prepare("INSERT INTO ayuda_data (nombre, dni, email, mensaje) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $dni, $email, $mensaje);

    if ($stmt->execute()) {
        echo "<h2>Consulta recibida correctamente.</h2>";
        echo "<p>Gracias, $nombre. Nos pondremos en contacto contigo a través del correo: " . htmlspecialchars($email) . ".</p>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();

    echo "<p><a href='index.html'>Volver al inicio</a></p>";
}
?>