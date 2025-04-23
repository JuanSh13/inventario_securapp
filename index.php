<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Working Services SAS</title>

    <!-- Bootstrap - CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-light"> 
    <?php require('db/conexion.php'); ?>
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
                    <a class="nav-link" href="centros_trabajo/crear_centro.php">
                        <i class="fa-solid fa-warehouse"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inventario_principal/crear_elemento.php">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="usuarios/crear_usuario.php">
                        <i class="fa-solid fa-users"></i>
                    </a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <main>
        <!-- Enlista las sedes - empresas -->
        <section class="m-5">
            <!-- Require - Centros -->
            <?php require('centros_trabajo/centros.php'); ?>
        </section>
        
        <!-- Enlista el inventario -->
        <section class="m-5">
            <!-- Require - Inventario -->
            <?php require('inventario_principal/inventario.php'); ?>
        </section>

        <!-- Enlista los usuarios  -->
        <section class="m-5">
            <!-- Require - Usuarios -->
            <?php require('usuarios/usuarios.php'); ?>
        </section>
    </main>


    <!-- <?php if(!empty($_GET['success'])): ?>
        <div class="bg-success mt-3">
            <p>
                <?= htmlspecialchars($_GET['success'], ENT_QUOTES, 'UTF-8'); ?>
            </p>
        </div>
    <?php elseif (!empty($_GET['error'])): ?>
        <div class="mt-3">
            <p>
                <?= htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8') ?>
            </p>
            <a href="index.php" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>

        </div>
    <?php elseif(!empty($_GET['warning'])): ?>
        <div class="mt-3">
            <p>
                <?= htmlspecialchars($_GET['warning'], ENT_QUOTES, 'UTF-8') ?>
            </p>
            <a href="index.php" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
        </div>
    <?php endif; ?> -->

    <!-- Modal de confirmación de eliminación -->
    <!-- <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">¿Estás seguro?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    ¿Seguro que deseas eliminar este centro de trabajo?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Modal para mostrar el mensaje de éxito/error/advertencia -->
    <!-- <div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="responseModalLabel">Resultado de la Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
            <div class="modal-body" id="responseMessageContent">
                Aquí aparecerá el mensaje (success/error/warning)
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- <script src="script.js"></script> -->

    <!-- Vinculamos los scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>