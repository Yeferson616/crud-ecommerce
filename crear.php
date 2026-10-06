<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock  = $_POST['stock'];

    $stmt = $conexion->prepare("INSERT INTO productos (nombre, precio, stock) VALUES (?, ?, ?)");
    $stmt->execute([$nombre, $precio, $stock]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Prenda</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f4f9; }
        .form-container { background: white; padding: 20px; max-width: 400px; border-radius: 5px; border: 1px solid #ccc; }
        input { width: 100%; padding: 8px; margin: 8px 0 15px 0; box-sizing: border-box; }
        button { background-color: #28a745; color: white; border: none; padding: 10px; width: 100%; cursor: pointer; }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Agregar Nueva Prenda</h2>
        <form action="crear.php" method="POST">
            <label>Nombre de la prenda:</label>
            <input type="text" name="nombre" required placeholder="Ej: Camisa Manga Larga">

            <label>Precio ($):</label>
            <input type="number" step="0.01" name="precio" required placeholder="Ej: 25.00">

            <label>Stock (Cantidad):</label>
            <input type="number" name="stock" required placeholder="Ej: 15">

            <button type="submit">Guardar Prenda</button>
        </form>
    </div>

</body>
</html>