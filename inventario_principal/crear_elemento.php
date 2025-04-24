<?php
    require('../db/conexion.php');

    // Enviar formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $fecha_compra = $_POST['fecha_compra'];
        $fecha_vencimiento = $_POST['fecha_vencimiento'];
        $valor = $_POST['valor'];
        $estado = $_POST['estado'];
        $disponibilidad = $_POST['disponibilidad'];
        $talla = $_POST['talla'];
        $color = $_POST['color'];
        $stock = $_POST['stock'] ?: null;
        $centro_trabajo_id = $_POST['centro_trabajo_id'];

        $stmt = $pdo->prepare("INSERT INTO elementos (codigo, nombre, descripcion, categoria, marca, modelo, fecha_compra, fecha_vencimiento, valor, estado, disponibilidad, talla, color, stock, centro_trabajo_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->execute([$codigo, $nombre, $descripcion, $categoria, $marca, $modelo, $fecha_compra, $fecha_vencimiento, $valor, $estado, $disponibilidad, $talla, $color, $stock, $centro_trabajo_id]);
    }

    // Obtener lista de usuarios para el dropdown
    $centros = $pdo->query("SELECT id_centro, nombre FROM centro_trabajo")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Elemento</title>
    
    <!-- Bootstrap - CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container-fluid mx-5">
            <ul class="navbar-nav">
                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">
                        <i class="fa-solid fa-house"></i>
                        Home
                    </a>
                </li>
                <!-- Crear Centro -->
                <li class="nav-item">
                    <a class="nav-link" href="../centros_trabajo/crear_centro.php">
                        <i class="fa-solid fa-warehouse"></i>
                        Crear Centro
                    </a>
                </li>
                <!-- Crear Elemento de Inventario -->
                <li class="nav-item">
                    <a class="nav-link" href="../inventario_principal/crear_elemento.php">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                        Crear Elemento
                    </a>
                </li>
                <!-- Crear Usuario -->
                <li class="nav-item">
                    <a class="nav-link" href="../usuarios/crear_usuario.php">
                        <i class="fa-solid fa-users"></i>
                        Crear Usuario
                    </a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <main class="mt-3">
        <div class="row m-5">
            <div class="col-3 p-0 row">
                <!-- Formulario de creación -->
                <section>
                    <article class="card shadow-sm">
                        <div class="card-header bg-info text-white">
                            <h4 class="mb-0">
                                <i class="fa-solid fa-screwdriver-wrench me-2"></i>
                                Registrar Nuevo Elemento de Inventario
                            </h4>
                        </div>
                        <div class="card-body">
                            <!-- Form -->
                            <form method="post">
                                <!-- Fila 1 -->
                                <div class="row">
                                    <!-- Codigo -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Código *</label>
                                        <input type="text" name="codigo" class="form-control" placeholder="?" required>
                                    </div>
                                    <!-- Nombre -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nombre *</label>
                                        <input type="text" name="nombre" class="form-control" placeholder="?" required>
                                    </div>
                                </div>
                                <!-- Fila 2 -->
                                <!-- Descripción -->
                                <div class="mb-3">
                                    <label class="form-label">Descripción</label>
                                    <textarea name="descripcion" class="form-control" rows="2" required></textarea>
                                </div>
                                <!-- Fila 3 -->
                                <div class="row">
                                    <!-- Categoria -->
                                    <div class="col-md-4 mb-3">
                                        <label for="categoria" class="form-label">Categoría *</label>
                                        <select id="categoria" class="form-select"name="categoria" required>
                                            <option value="Sin categoria">Sin categoría</option>
                                            <option value="Herramienta">Herramienta</option>
                                            <option value="Equipo">Equipo</option>
                                            <option value="Insumo">Insumo</option>
                                        </select>
                                    </div>
                                    <!-- Marca -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Marca *</label>
                                        <input type="text" name="marca" class="form-control" placeholder="?" required>
                                    </div>
                                    <!-- Modelo -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Modelo</label>
                                        <input type="text" name="modelo" class="form-control" placeholder="?">
                                    </div>
                                </div>
                                <!-- Fila 4 -->
                                <div class="row">
                                    <!-- Fecha de Compra -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Fecha de Compra *</label>
                                        <input type="date" name="fecha_compra" class="form-control" required>
                                    </div>
                                    <!-- Fecha de Vencimiento -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="fecha_vencimiento">Fecha de Vencimiento *</label>
                                        <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" class="form-control">
                                    </div>
                                    <!-- Valor -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Valor ($) *</label>
                                        <input type="number" name="valor" step="100" class="form-control" placeholder="?" required>
                                    </div>
                                </div>
                                <!-- Fila 5 -->
                                <div class="row">
                                    <!-- Color -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="color">Color</label>
                                        <input type="text" id="color" name="color" class="form-control" placeholder="?">
                                    </div>
                                    <!-- Talla -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="talla">Talla</label>
                                        <input type="text" id="talla" name="talla" class="form-control" placeholder="?">
                                    </div>
                                    <!-- Stock -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Stock</label>
                                        <input type="number" name="stock" class="form-control" placeholder="?">
                                    </div>
                                </div>
                                <!-- Fila 6 -->
                                <div class="row">
                                    <!-- Disponibilidad -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="disponibilidad">Disponibilidad *</label>
                                        <select id="disponibilidad" name="disponibilidad" class="form-select" required>
                                            <option value="Vendido">Vendido</option>
                                            <option value="Prestado">Prestado</option>
                                            <option value="En bodega">En bodega</option>
                                        </select>
                                    </div>
                                    <!-- Centro de Trabajo -->
                                    <div class="col-md-4 mb-3">
                                        <label for="id_centro" class="form-label">Centro de Trabajo</label>
                                        <select name="centro_trabajo_id" id="id_centro" class="form-select" required>
                                            <option value="">Seleccione un centro...</option>
                                            <?php foreach ($centros as $c): ?>
                                                <option value="<?= $c['id_centro'] ?>"><?= $c['nombre'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!-- Estado -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="estado">Estado *</label>
                                        <select id="estado" name="estado" class="form-select" required>
                                            <option value="Sin estado">Sin estado</option>
                                            <option value="Nuevo">Nuevo</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Usado">Usado</option>
                                            <option value="Dañado">Dañado</option>
                                        </select>
                                    </div>
                                </div>
                                        
                                <!-- Enviar Registro -->
                                <button type="submit" class="btn btn-info w-100">Registrar Elemento</button>
                            </form>
                        </div>
                    </article>
                </section>
                <!-- Enviar Archivo -->
                 <section class="mt-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="procesar_csv.php" method="post" enctype="multipart/form-data">
                                <label for="archivo">Sube un archivo CSV:</label>
                                <input type="file" name="archivo" id="archivo" accept=".csv" required>

                                <button type="submit" name="submit">Subir y procesar</button>
                            </form>
                        </div>
                    </div>
                 </section>
            </div>

            <section class="col-9 pl-2">
                <?php require('elementos.php'); ?>
            </section>
        </div>
    </main>

</body>
</html>
