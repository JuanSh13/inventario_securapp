<?php
    require('../db/conexion.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $fecha_compra = $_POST['fecha_compra'];
        $valor = $_POST['valor'];
        $estado = $_POST['estado'];
        $vida_util = $_POST['vida_util'];
        $consumible = isset($_POST['consumible']) ? 1 : 0;
        $stock_minimo = $_POST['stock_minimo'] ?: null;

        $stmt = $pdo->prepare("INSERT INTO elemento 
            (codigo, nombre, descripcion, categoria, marca, modelo, fecha_compra, valor, estado, vida_util, consumible, stock_minimo)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->execute([
            $codigo, $nombre, $descripcion, $categoria, $marca, $modelo,
            $fecha_compra, $valor, $estado, $vida_util, $consumible, $stock_minimo
        ]);

        // echo "<div class='alert alert-success text-black text-center'>✅ Centro registrado exitosamente</div>";
    }
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
            <!-- Formulario de creación -->
            <section class="col-4 p-0">
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
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Código</label>
                                    <input type="text" name="codigo" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" required>
                                </div>
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <textarea name="descripcion" class="form-control" rows="2" required></textarea>
                            </div>
    
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Categoría</label>
                                    <input type="text" name="categoria" class="form-control" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Marca</label>
                                    <input type="text" name="marca" class="form-control" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Modelo</label>
                                    <input type="text" name="modelo" class="form-control">
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Fecha de Compra</label>
                                    <input type="date" name="fecha_compra" class="form-control" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Valor ($)</label>
                                    <input type="number" name="valor" step="100" class="form-control" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Estado</label>
                                    <select name="estado" class="form-select" required>
                                        <option value="Nuevo">Nuevo</option>
                                        <option value="Bueno">Bueno</option>
                                        <option value="Usado">Usado</option>
                                        <option value="Dañado">Dañado</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Vida útil (meses)</label>
                                    <input type="number" name="vida_util" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-check mt-4 pt-2">
                                        <input class="form-check-input" type="checkbox" name="consumible" id="consumible">
                                        <label class="form-check-label" for="consumible">
                                            Es consumible
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Stock mínimo</label>
                                    <input type="number" name="stock_minimo" class="form-control" placeholder="Opcional">
                                </div>
                            </div>
    
                            <button type="submit" class="btn btn-info w-100">Registrar Elemento</button>
                        </form>
                    </div>
                </article>
            </section>

            <section class="col-8 pl-2">
                <?php require('inventario.php'); ?>
            </section>
        </div>
    </main>

</body>
</html>
