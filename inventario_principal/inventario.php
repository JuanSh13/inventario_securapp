<?php
    require('../db/conexion.php');

    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    // Consulta de tabla
    $sql = "
        SELECT 
            i.id,
            i.codigo_inventario,
            i.fecha_salida,
            i.fecha_devolucion,
            i.fecha_creacion,
            i.estado,
            e.id AS id_elemento,
            e.nombre AS nombre_elemento,
            c.id AS id_centro,
            c.nombre AS nombre_centro
        FROM inventario i
        JOIN elementos e ON i.id_elemento = e.id
        JOIN centro_trabajo c ON i.id_centro = c.id
    ";


    // $sql = "SELECT * FROM inventario";
    $stmt = $pdo->query($sql);
    $inventario = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="table-responsive">
    <table class="table table-striped table-hover align-middle m-0">
        <thead class="table-secondary">
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nombre del Elemento</th>
                <th>Nombre del Centro</th>
                <th>Fecha de Salida</th>
                <th>Fecha de Devolución</th>
                <th>Estado</th>
                <th>Fecha de Creación</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inventario as $i): ?>
                <tr>
                    <td><?= $i['id'] ?></td>
                    <td><?= $i['codigo_inventario'] ?></td>
                    <td><?= $i['nombre_elemento'] ?></td>
                    <td><?= $i['nombre_centro'] ?></td>
                    <td><?= $i['fecha_salida'] ?></td>
                    <td><?= $i['fecha_devolucion'] ?></td>
                    <td><?= $i['estado'] ?></td>
                    <td><?= $i['fecha_creacion'] ?></td>
                    <td>
                        <!-- <a class="text-danger" href="inventario_principal/borrar_elemento.php?id_elemento=<?= $i['id_elemento']; ?>&id_inventario=<?= $i['id_inventario']; ?>">
                            <i class="fa-solid fa-xmark"></i>
                        </a> -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
