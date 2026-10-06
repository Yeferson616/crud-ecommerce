<?php
include 'conexion.php';

// Consultar todas las prendas
$stmt = $conexion->prepare("SELECT * FROM productos");
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda de Ropa - CRUD</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f4f9; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #fff; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        th { background-color: #007bff; color: white; }
        .btn { padding: 8px 12px; text-decoration: none; color: white; border-radius: 4px; display: inline-block; }
        .btn-add { background-color: #28a745; margin-bottom: 15px; }
        .btn-edit { background-color: #ffc107; color: black; }
        .btn-delete { background-color: #dc3545; }
    </style>
</head>
<body>

    <h1>Gestión de Inventario - Tienda de Ropa</h1>
    <a href="crear.php" class="btn btn-add">+ Agregar Nueva Prenda</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de Prenda</th>
                <th>Precio ($)</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $item): ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= htmlspecialchars($item['nombre']) ?></td>
                <td><?= number_format($item['precio'], 2) ?></td>
                <td><?= $item['stock'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $item['id'] ?>" class="btn btn-edit">Editar</a>
                    <a href="eliminar.php?id=<?= $item['id'] ?>" class="btn btn-delete" onclick="return confirm('¿Seguro que deseas eliminar esta prenda?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>