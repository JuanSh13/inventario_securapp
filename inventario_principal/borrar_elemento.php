<?php
    require('../db/conexion.php');

    if (isset($_GET['id_elemento']) && isset($_GET['id_inventario'])) {
        $id_elemento = $_GET['id_elemento'];
        $id_inventario = $_GET['id_inventario'];
        print_r($_GET);
        try {
            // Elimina primero el elemento
            $stmt = $pdo->prepare("DELETE FROM elemento WHERE id_elemento = ?");
            $stmt->execute([$id_elemento]);
            // Luego elimina el inventario del elemento
            $stmt = $pdo->prepare("DELETE FROM elemento WHERE id_inventario = ?");
            $stmt->execute([$id_inventario]);
    
            $success = "✔ Centro eliminado correctamente.";
            header("Location: ../index.php?success=$success");

        } catch (PDOException $e) {
            // Verificar si el error es por clave foránea (usuarios asociados)
            // El código del error 23000, que indica violación de clave foránea.
            if ($e->getCode() === '23000') {
                $error = "❌ No se puede eliminar este centro porque tiene usuarios asignados. ⚠️ Debes reasignar o eliminar esos usuarios primero.";
                header("Location: ../index.php?error=$error");
            } else {
                // Otro tipo de error
                $warning = "⚠️ Error inesperado: " . $e->getMessage();
                header("Location: ../index.php?warning=$warning");
            }
        }
        
    }
?>