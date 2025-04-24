<?php
    require('../db/conexion.php');
    
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
        $archivoTmp = $_FILES['archivo']['tmp_name'];

        if (is_uploaded_file($archivoTmp)) {

            // Intenta abrir el archivo
            $handle = fopen($archivoTmp, "r");

            if ($handle !== false) {
                ob_start();

                while (($datos = fgetcsv($handle, 1000, ";")) !== false || ($datos = fgetcsv($handle, 1000, ",")) !== false) {
                    echo '<pre>';
                        print_r($datos);
                    echo '</pre>';
                    // Asignar valores correctamente
                    $codigo              = $datos[0] ?? null;
                    $nombre              = $datos[1] ?? null;
                    $descripcion         = $datos[2] ?? null;
                    $categoria           = $datos[3] ?? 'Sin categoría';
                    $marca               = $datos[4] ?? null;
                    $modelo              = $datos[5] ?? null;
                    $fecha_compra        = $datos[6] ?? null;
                    $fecha_vencimiento   = $datos[7] ?? null;
                    $valor               = $datos[8] ?? null;
                    $estado              = ($datos[9] || $datos[9] == NULL) ?? 'Sin estado';
                    $disponibilidad      = $datos[10] ?? 'En bodega';
                    $talla               = $datos[11] ?? null;
                    $color               = $datos[12] ?? null;
                    $stock               = $datos[13] ?? null;
                    $centro_trabajo_id   = ($datos[14] || $datos[14] == NULL) ?? 1 ;

                    $stmt = $pdo->prepare("
                        INSERT INTO elementos (
                            codigo, nombre, descripcion, categoria, marca, modelo, 
                            fecha_compra, fecha_vencimiento, valor, estado, disponibilidad, 
                            talla, color, stock
                        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                    ");
    
                    $stmt->execute([
                        $codigo, $nombre, $descripcion, $categoria, $marca, $modelo,
                        $fecha_compra, $fecha_vencimiento, $valor, $estado, $disponibilidad,
                        $talla, $color, $stock
                    ]);
                }
                fclose($handle);
                header("Location: crear_elemento.php");
                exit();              

            } else {
                echo "No se pudo abrir el archivo CSV.";
            }

        } else {
            echo "El archivo subido no es válido.";
        }
    } else {
        echo "Error al subir el archivo. Código: " . $_FILES['archivo']['error'];
    }

    
?>