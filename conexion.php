<?php
$host = "localhost";
$dbname = "ecommerce_db";
$username = "root"; // O el usuario de MySQL que configuraste
$password = "";     // Coloca aquí la contraseña de tu MySQL si la tienes

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>