<?php
    require('../db/conexion.php');

    if (isset($_GET['id_elemento'])) {
        $id_elemento = $_GET['id_elemento'];
        try {
            // Elimina primero el elemento
            $stmt = $pdo->prepare("DELETE FROM elementos WHERE id = ?");
            $stmt->execute([$id_elemento]);
    
            // $success = "✔ Centro eliminado correctamente.";
            header("Location: index.php");

        } catch (PDOException $e) {
            // Verificar si el error es por clave foránea (usuarios asociados)
            // El código del error 23000, que indica violación de clave foránea.
            if ($e->getCode() === '23000') {
                // $error = "❌ No se puede eliminar este centro porque tiene usuarios asignados. ⚠️ Debes reasignar o eliminar esos usuarios primero.";
                header("Location: index.php");
            } else {
                // Otro tipo de error
                // $warning = "⚠️ Error inesperado: " . $e->getMessage();
                header("Location: index.php");
            }
        }
        
    }
?>