<?php
    require('../db/conexion.php');
    // echo '<pre>';
    // print_r($_FILES);
    // echo '</pre>';


    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
        $archivoTmp = $_FILES['archivo']['tmp_name'];

        if (is_uploaded_file($archivoTmp)) {

            // Intenta abrir el archivo
            $handle = fopen($archivoTmp, "r");

            if ($handle !== false) {
                ob_start();

                while (($datos = fgetcsv($handle, 1000, ";")) !== false || ($datos = fgetcsv($handle, 1000, ",")) !== false) {
                    echo '<pre>';
                        print_r($datos[0]);
                    echo '</pre>';
                    $nombre = $datos[0];    // El nombre está en la posición 0
                    $correo = $datos[1];     // El correo está en la posición 1
                    $telefono = $datos[2];  // El teléfono está en la posición 2

                    $stmt = $pdo->prepare("INSERT INTO contactos 
                    (nombre, correo, telefono)
                    VALUES (?, ?, ?)");

                    $stmt->execute([
                        $nombre, $correo, $telefono
                    ]);
                }
                fclose($handle);
                header("Location: ../index.php");
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