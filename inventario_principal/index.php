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

    <style>
        .content-section {
            display: none;
        }
        .content-section.active {
            display: block;
        }
        .active-button {
            background-color: #6c757d;
            color: white;
        }
  </style>
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
                    <a class="nav-link" href="index.php">
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

    <!-- Main -->
    <main class="mt-3">
        <div class="row m-5">
            <!-- Formulario de creación -->
            <div class="col-3 p-0">
                <section>
                    <?php require('crear_elemento.php'); ?>
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
            
            <!-- Navegacion de tablas -->
            <section class="col-9 pl-2">
                <div class="card shadow-sm">
                    <!-- Navbar - Filtrar tablas -->
                    <section class="bg-secondary card card-header">
                        <div class="container p-0 m-0">
                            <button type="button" id="btn1" data-target="contenido1" class="btn btn-outline-light">Elementos</button>
                            <button type="button" id="btn2" data-target="contenido2" class="btn btn-outline-light">Inventario</button>
                            <button type="button" id="btn3" data-target="contenido3" class="btn btn-outline-light">Contacto</button>
                        </div>
                    </section>
        
                    <!-- Mostrar tablas -->
                    <div class="card-body p-0">
                        <div id="contenido1" class="content-section active">
                            <?php require('elementos.php'); ?>
                        </div>
                        <div id="contenido2" class="content-section">
                            <?php require('inventario.php'); ?>
                        </div>
                        <div id="contenido3" class="content-section">
                        </div>
                    </div>
                </div>
                
            </section>
        </div>
    </main>
  <script>
    const botones = document.querySelectorAll('button[data-target]');
    const secciones = document.querySelectorAll('.content-section');

    botones.forEach(boton => {
      boton.addEventListener('click', () => {
        const destino = boton.getAttribute('data-target');

        // Marcar botón activo
        botones.forEach(b => b.classList.remove('active-button'));
        boton.classList.add('active-button');

        // Mostrar contenido correspondiente
        secciones.forEach(sec => {
          sec.classList.remove('active');
          if (sec.id === destino) {
            sec.classList.add('active');
          }
        });
      });
    });
  </script>
</body>
</html>
