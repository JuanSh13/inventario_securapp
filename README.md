# Crear la base de datos de los elementos
CREATE TABLE elementos (
    id INT AUTO_INCREMENT PRIMARY KEY,      -- Llave primaria, se incrementa automáticamente
    codigo VARCHAR(50) NOT NULL,            -- Código de identificación del producto
    nombre VARCHAR(255) NOT NULL,           -- Nombre del producto
    descripcion TEXT,                       -- Descripción del producto
    categoria ENUM('herramienta', 'equipo', 'insumo') NOT NULL,  -- Categoría del producto
    marca VARCHAR(100),                     -- Marca del producto
    modelo VARCHAR(100),                    -- Modelo del producto
    fecha_compra DATE,                      -- Fecha de compra del producto
    valor DECIMAL(10, 2),                   -- Valor del producto
    disponibilidad ENUM('Vendido', 'Prestado', 'En bodega') NOT NULL,  -- Disponibilidad del producto
    estado ENUM('Nuevo', 'Bueno', 'Usado', 'Dañado') NOT NULL, -- Estado del producto
    talla VARCHAR(50),                      -- Talla del producto (si aplica)
    color VARCHAR(50),                      -- Color del producto
    fecha_vencimiento DATE,                 -- Fecha de vencimiento del producto (si aplica)
    stock INT DEFAULT 0,                    -- Stock disponible del producto
    centro_trabajo_id INT,                  -- ID del centro de trabajo (sede)
    FOREIGN KEY (centro_trabajo_id)         -- Relación con la tabla de centros de trabajo
        REFERENCES centro_trabajo(id_centro)  -- Clave foránea que apunta al campo `id` de centros_de_trabajo
        ON DELETE SET NULL                  -- Si se elimina la sede, se pone NULL en este campo
);
