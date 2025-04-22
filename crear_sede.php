<?php
    require 'conexion.php';

    // Guardar datos si se envió el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $ubicacion = $_POST['ubicacion'];
        $id_responsable = $_POST['id_responsable'];
        $presupuesto = $_POST['presupuesto'];
        $personal = $_POST['personal'];

        $stmt = $pdo->prepare("INSERT INTO centro_trabajo (nombre, ubicacion, id_responsable, presupuesto_mensual, cantidad_personal) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nombre, $ubicacion, $id_responsable, $presupuesto, $personal]);

        // echo "<div class='alert alert-success text-black text-center'>✅ Centro registrado exitosamente</div>";
        
        header("Location: index.php");
    }

    // Obtener lista de usuarios para el dropdown
    $usuarios = $pdo->query("SELECT id_usuario, CONCAT(nombres, ' ', apellidos) AS nombre FROM usuario")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Sede</title>

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
            <div class="card-header bg-danger text-white">
                <h4 class="mb-0">Registrar Nueva Centro</h4>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Centro</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">Ubicación</label>
                        <input type="text" name="ubicacion" id="ubicacion" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="id_responsable" class="form-label">Responsable</label>
                        <select name="id_responsable" id="id_responsable" class="form-select" required>
                            <option value="">Seleccione un usuario...</option>
                            <?php foreach ($usuarios as $u): ?>
                                <option value="<?= $u['id_usuario'] ?>"><?= $u['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="presupuesto" class="form-label">Presupuesto Mensual</label>
                        <input type="number" name="presupuesto" id="presupuesto" class="form-control" step="1000" required>
                    </div>

                    <div class="mb-3">
                        <label for="personal" class="form-label">Cantidad de Personal</label>
                        <input type="number" name="personal" id="personal" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-danger w-100">Registrar Sede</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>