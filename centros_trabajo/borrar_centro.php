<?php
    require('../db/conexion.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    
        try {
            // Eliminar la sede de forma segura
            $stmt = $pdo->prepare("DELETE FROM centro_trabajo WHERE id_centro = ?");
            $stmt->execute([$id]);
    
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

    // require('../db/conexion.php');

    // if (isset($_GET['id'])) {
    //     $id = $_GET['id'];

    //     try {
    //         // Eliminar la sede de forma segura
    //         $stmt = $pdo->prepare("DELETE FROM centro_trabajo WHERE id_centro = ?");
    //         $stmt->execute([$id]);

    //         // Devolver un mensaje de éxito
    //         echo json_encode(['status' => 'success', 'message' => '✔ Centro eliminado correctamente.']);
    //     } catch (PDOException $e) {
    //         // Verificar si el error es por clave foránea (usuarios asociados)
    //         if ($e->getCode() === '23000') {
    //             echo json_encode(['status' => 'error', 'message' => '❌ No se puede eliminar este centro porque tiene usuarios asignados. ⚠️ Debes reasignar o eliminar esos usuarios primero.']);
    //         } else {
    //             // Otro tipo de error
    //             echo json_encode(['status' => 'warning', 'message' => '⚠️ Error inesperado: ' . $e->getMessage()]);
    //         }
    //     }
    // }
?>