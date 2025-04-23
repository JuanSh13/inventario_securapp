<?php
    // use function Symfony\Component\DependencyInjection\Loader\Configurator\ref;
    // require('../db/conexion.php');

    $sql = "
        SELECT 
            c.id_centro,
            c.nombre,
            c.ubicacion,
            CONCAT(u.nombres, ' ', u.apellidos) AS responsable,
            u.telefono,
            u.email,
            c.presupuesto_mensual,
            c.cantidad_personal
        FROM centro_trabajo c
        LEFT JOIN usuario u ON c.id_responsable = u.id_usuario
    ";

    $stmt = $pdo->query($sql);
    $centros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($centros);
?>

<section>
    <article class="card shadow-sm">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">Centros de Trabajo Registrados</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-danger">
                        <tr>
                            <th>ID</th>
                            <th>Nombre del Centro</th>
                            <th>Ubicación</th>
                            <th>Responsable</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Presupuesto</th>
                            <th>Personal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($centros as $c): ?>
                        <tr>
                            <td><?= $c['id_centro'] ?></td>
                            <td><?= $c['nombre'] ?></td>
                            <td><?= $c['ubicacion'] ?></td>
                            <td><?= $c['responsable'] ?? '<em>Sin asignar</em>' ?></td>
                            <td><?= $c['telefono'] ?></td>
                            <td><?= $c['email'] ?></td>
                            <td>$<?= number_format($c['presupuesto_mensual'], 0, ',', '.') ?></td>
                            <td><?= $c['cantidad_personal'] ?></td>
                            <td>
                                <div data-bs-toggle="modal" data-bs-target="#myModal" >
                                    <a href="centros_trabajo/borrar_centro.php?id=<?= $c['id_centro'] ?>" class="text-danger">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
                                </div>
                                <!-- <a href="#" class="text-danger" id="deleteLink" data-id="<?= $c['id_centro'] ?>"><i class="fa-solid fa-xmark"></i></a> -->
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </article>
</section>


