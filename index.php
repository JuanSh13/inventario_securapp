<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventarios</title>

    <!-- Bootstrap - CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <!-- <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #75cac8; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { margin-bottom: 10px; }
    </style> -->
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

    <!-- Main -->
    <main>
        <!-- Enlista las sedes - empresas -->
        <section class="m-5">
            <?php require('sedes.php'); ?>
        </section>
        
        <!-- Enlista el inventario -->
        <section class="m-5">
            <?php require('inventario.php'); ?>
        </section>

        <!-- Enlista los usuarios  -->
        <section class="m-5">
            <?php require('usuarios.php'); ?>
        </section>
    </main>

    

<!-- Vinculamos los scripts de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>