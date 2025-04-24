<?php
    require('../db/conexion.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Eliminar la sede de forma segura
        $stmt = $pdo->prepare("DELETE FROM contactos WHERE id = ?");
        $stmt->execute([$id]);

        header("Location: ../index.php");        
    }
?>