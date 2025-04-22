<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventarios</title>

    <!-- Bootstrap - CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Styles -->
    <!-- <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #75cac8; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { margin-bottom: 10px; }
    </style> -->
</head>
<body>
    
    <!-- Enlista las sedes - empresas -->
    <section>
        <?php require('sedes.php'); ?>
    </section>
    
    <!-- Enlista el inventario -->
    <section>
        <?php require('inventario.php'); ?>
    </section>

    <!-- Enlista los usuarios  -->
    <section>
        <?php require('usuarios.php'); ?>
    </section>
</body>
</html>