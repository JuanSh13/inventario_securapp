<?php
    require('../db/conexion.php');

    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    // Consulta de tabla
    // $sql = "
    //     SELECT 
    //         e.id,
    //         e.codigo,
    //         e.nombre,
    //         e.descripcion,
    //         e.categoria,
    //         e.marca,
    //         e.modelo,
    //         e.talla,
    //         e.color,
    //         e.estado,
    //         e.valor,
    //         e.disponibilidad,
    //         e.centro_trabajo_id,
    //         e.fecha_compra,
    //         e.fecha_vencimiento,
    //         e.stock,
    //         c.id_centro,
    //         c.nombre AS c_nombre
    //     FROM elementos e
    //     JOIN centro_trabajo c ON e.centro_trabajo_id = c.id_centro
    // ";
    $sql = "SELECT * FROM elementos";
    $stmt = $pdo->query($sql);
    $inventario = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // print_r($inventario);
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
                            <th>ID</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Categoría</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Talla</th>
                            <th>Color</th>
                            <th>Estado</th>
                            <th>Valor</th>
                            <th>Disponibilidad</th>
                            <th>Centro de Trabajo</th>
                            <th>Fecha de Compra</th>
                            <th>Fecha de Vencimiento</th>
                            <th>Stock</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($inventario as $i): ?>
                            <tr>
                                <td><?= $i['id'] ?></td>
                                <td><?= $i['codigo'] ?></td>
                                <td><?= $i['nombre'] ?></td>
                                <td><?= $i['descripcion'] ?></td>
                                <td><?= $i['categoria'] ?></td>
                                <td><?= $i['marca'] ?></td>
                                <td><?= $i['modelo'] ?></td>
                                <td><?= $i['talla'] ?></td>
                                <td><?= $i['color'] ?></td>
                                <td><?= $i['estado'] ?></td>
                                <td><?= $i['valor'] ?></td>
                                <td><?= $i['disponibilidad'] ?></td>
                                <td><?= $i['centro_trabajo_id'] ?></td>
                                <!-- <td><?= $i['c_nombre'] ?></td> -->
                                <td><?= $i['fecha_compra'] ?></td>
                                <td><?= $i['fecha_vencimiento'] ?></td>
                                <td><?= $i['stock'] ?></td>
                                <td>
                                    <!-- <a class="text-danger" href="inventario_principal/borrar_elemento.php?id_elemento=<?= $i['id_elemento']; ?>&id_inventario=<?= $i['id_inventario']; ?>">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </article>
</section>
