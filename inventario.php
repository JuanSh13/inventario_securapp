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

<h2>Inventario</h2>
<table class="table">
    <thead class="table-info">
        <th>Código</th>
        <th>Elemento</th>
        <th>Categoría</th>
        <th>Centro de Trabajo</th>
        <th>Cantidad</th>
        <th>Estado</th>
    </thead>
    <?php foreach ($inventario as $i): ?>
    <tr>
        <td><?= $i['codigo'] ?></td>
        <td><?= $i['elemento'] ?></td>
        <td><?= $i['categoria'] ?></td>
        <td><?= $i['centro'] ?></td>
        <td><?= $i['cantidad'] ?></td>
        <td><?= $i['estado_actual'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>