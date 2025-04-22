<?php
    // use function Symfony\Component\DependencyInjection\Loader\Configurator\ref;

    require('conexion.php');

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

<h2>Centros de Trabajo</h2>
<table border="1" class="table">
    <thead class="table-danger">
        <th>ID</th>
        <th>Nombre del Centro</th>
        <th>Ubicación</th>
        <th>Responsable</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Presupuesto</th>
        <th>Personal</th>
    </thead>
    <?php foreach ($centros as $c): ?>
    <tr>
        <td><?= $c['id_centro'] ?></td>
        <td><?= $c['nombre'] ?></td>
        <td><?= $c['ubicacion'] ?></td>
        <td><?= $c['responsable'] ?? 'Sin asignar' ?></td>
        <td><?= $c['telefono'] ?></td>
        <td><?= $c['email'] ?></td>
        <td>$<?= number_format($c['presupuesto_mensual'], 0, ',', '.') ?></td>
        <td><?= $c['cantidad_personal'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

