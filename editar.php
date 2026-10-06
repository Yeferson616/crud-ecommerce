<?php
include 'conexion.php';

$id = $_GET['id'];
$stmt = $conexion->prepare("SELECT * FROM productos WHERE id = ?");
$stmt->execute([$id]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock  = $_POST['stock'];

    $stmt = $conexion->prepare("UPDATE productos SET nombre = ?, precio = ?, stock = ? WHERE id = ?");
    $stmt->execute([$nombre, $precio, $stock, $id]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Prenda</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f4f9; }
        .form-container { background: white; padding: 20px; max-width: 400px; border-radius: 5px; border: 1px solid #ccc; }
        input { width: 100%; padding: 8px; margin: 8px 0 15px 0; box-sizing: border-box; }
        button { background-color: #ffc107; color: black; border: none; padding: 10px; width: 100%; cursor: pointer; }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Editar Prenda</h2>
        <form action="editar.php?id=<?= $id ?>" method="POST">
            <label>Nombre de la prenda:</label>
            <input type="text" name="nombre" value="<?= htmlspecialchars($item['nombre']) ?>" required>

            <label>Precio ($):</label>
            <input type="number" step="0.01" name="precio" value="<?= $item['precio'] ?>" required>

            <label>Stock (Cantidad):</label>
            <input type="number" name="stock" value="<?= $item['stock'] ?>" required>

            <button type="submit">Actualizar Prenda</button>
        </form>
    </div>

</body>
</html>