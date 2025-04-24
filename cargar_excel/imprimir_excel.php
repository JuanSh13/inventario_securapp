<?php
    // require('../db/conexion.php');

    // Consulta de tabla de contactos
    $stmt = $pdo->query("SELECT * FROM contactos");
    $contactos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // print_r($inventario[0]);
?>

<section>
    <article class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Inventario de Herramientas y Equipos</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-info">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contactos as $c): ?>
                        <tr>
                            <td><?= $c['id'] ?></td>
                            <td><?= $c['nombre'] ?></td>
                            <td><?= $c['correo'] ?></td>
                            <td><?= $c['telefono'] ?></td>
                            <td>
                                <a class="text-danger" href="cargar_excel/eliminar_fila.php?id=<?= $c['id'] ?>">
                                    <i class="fa-solid fa-xmark"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </article>
</section>
