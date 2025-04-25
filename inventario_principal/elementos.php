<?php
    require('../db/conexion.php');

    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    $sql = "SELECT * FROM elementos";
    $stmt = $pdo->query($sql);
    $elemento = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="table-responsive">
    <table class="table table-striped table-hover align-middle m-0">
        <thead class="table-secondary">
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
                <!-- <th>Centro de Trabajo</th> -->
                <th>Fecha de Compra y Vencimiento</th>
                <th>Stock</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($elemento as $e): ?>
                <tr>
                    <td><?= $e['id'] ?></td>
                    <td><?= $e['codigo'] ?></td>
                    <td><?= $e['nombre'] ?></td>
                    <td><?= $e['descripcion'] ?></td>
                    <td><?= $e['categoria'] ?></td>
                    <td><?= $e['marca'] ?></td>
                    <td><?= $e['modelo'] ?></td>
                    <td><?= $e['talla'] ?></td>
                    <td><?= $e['color'] ?></td>
                    <td><?= $e['estado'] ?></td>
                    <td><?= $e['valor'] ?></td>
                    <td><?= $e['disponibilidad'] ?></td>
                    <td><?= $e['fecha_compra'] ?> | <?= $e['fecha_vencimiento'] ?></td>
                    <td><?= $e['stock'] ?></td>
                    <td class="">
                        <a class="text-secondary" href="?id_elemento=<?= $e['id'] ?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <a class="text-danger" href="borrar_elemento.php?id_elemento=<?= $e['id'] ?>">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
