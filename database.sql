-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS ecommerce_db;

-- Usar la base de datos
USE ecommerce_db;

-- Crear la tabla de prendas / productos
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertar prendas de vestir de prueba
INSERT INTO productos (nombre, precio, stock) VALUES 
('Camiseta Algodón Negra', 15.99, 30),
('Pantalón Jean Clásico', 35.50, 20),
('Chaqueta de Cuero', 89.99, 10);