<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conexion->prepare("DELETE FROM productos WHERE id = ?");
    $stmt->execute([$id]);
}

header('Location: index.php');
exit;
?>