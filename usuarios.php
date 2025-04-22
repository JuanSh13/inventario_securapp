<?php
require('conexion.php');

$sql = "
    SELECT 
        u.id_usuario, 
        u.nombres, 
        u.apellidos, 
        u.tipo_documento, 
        u.numero_documento, 
        u.cargo, 
        u.telefono, 
        u.email, 
        c.nombre AS centro
    FROM usuario u
    JOIN centro_trabajo c ON u.id_centro = c.id_centro
";

$stmt = $pdo->query($sql);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Lista de Usuarios por Centro de Trabajo</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-warning">
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Tipo Doc</th>
                            <th>Número Doc</th>
                            <th>Cargo</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Centro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $u): ?>
                        <tr>
                            <td class="text-center"><?= $u['id_usuario'] ?></td>
                            <td><?= $u['nombres'] ?></td>
                            <td><?= $u['apellidos'] ?></td>
                            <td><?= $u['tipo_documento'] ?></td>
                            <td><?= $u['numero_documento'] ?></td>
                            <td><?= $u['cargo'] ?></td>
                            <td><?= $u['telefono'] ?></td>
                            <td><?= $u['email'] ?></td>
                            <td><?= $u['centro'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

