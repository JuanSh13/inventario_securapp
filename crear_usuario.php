<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_centro = $_POST['id_centro'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $cargo = $_POST['cargo'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("INSERT INTO usuario 
        (id_centro, nombres, apellidos, tipo_documento, numero_documento, cargo, telefono, email)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->execute([$id_centro, $nombres, $apellidos, $tipo_documento, $numero_documento, $cargo, $telefono, $email]);

    // echo "<div class='alert alert-success text-center'>✅ Usuario registrado exitosamente</div>";
    header("Location: index.php");
}

// Obtener los centros disponibles
$centros = $pdo->query("SELECT id_centro, nombre FROM centro_trabajo")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Usuario</title>
    
    <!-- Bootstrap - CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container-fluid mx-5">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="fa-solid fa-house"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="crear_sede.php">
                        <i class="fa-solid fa-warehouse"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="crear_elemento.php">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="crear_usuario.php">
                        <i class="fa-solid fa-users"></i>
                    </a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-white">
                <h4 class="mb-0">Registrar Nuevo Usuario</h4>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombres</label>
                            <input type="text" name="nombres" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Tipo de Documento</label>
                            <select name="tipo_documento" class="form-select" required>
                                <option value="">Seleccione...</option>
                                <option value="CC">Cédula de Ciudadanía</option>
                                <option value="CE">Cédula de Extranjería</option>
                                <option value="TI">Tarjeta de Identidad</option>
                                <option value="Pasaporte">Pasaporte</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Número de Documento</label>
                            <input type="text" name="numero_documento" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Cargo</label>
                            <input type="text" name="cargo" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Centro de Trabajo</label>
                        <select name="id_centro" class="form-select" required>
                            <option value="">Seleccione un centro...</option>
                            <?php foreach ($centros as $c): ?>
                                <option value="<?= $c['id_centro'] ?>"><?= $c['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning w-100">Registrar Usuario</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
