<?php
    require('conexion.php');

    // Consulta de inventario
    $sql = "
        SELECT 
            c.nombre AS centro, 
            e.nombre AS elemento, 
            i.cantidad, 
            i.estado_actual, 
            e.codigo, 
            e.categoria
        FROM inventario i
        JOIN centro_trabajo c ON i.id_centro = c.id_centro
        JOIN elemento e ON i.id_elemento = e.id_elemento
    ";

    $stmt = $pdo->query($sql);
    $inventario = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Inventario de Herramientas y Equipos</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-info">
                        <tr>
                            <th>Código</th>
                            <th>Elemento</th>
                            <th>Categoría</th>
                            <th>Centro de Trabajo</th>
                            <th>Cantidad</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($inventario as $i): ?>
                        <tr>
                            <td><?= $i['codigo'] ?></td>
                            <td><?= $i['elemento'] ?></td>
                            <td><?= $i['categoria'] ?></td>
                            <td><?= $i['centro'] ?></td>
                            <td class="text-center"><?= $i['cantidad'] ?></td>
                            <td><?= $i['estado_actual'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
