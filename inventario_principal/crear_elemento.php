<?php
    require('../db/conexion.php');

    // Enviar formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Insertar el elemento
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $fecha_compra = $_POST['fecha_compra'];
        $fecha_vencimiento = $_POST['fecha_vencimiento'];
        $valor = $_POST['valor'];
        $estado = $_POST['estado'];
        $disponibilidad = $_POST['disponibilidad'];
        $talla = $_POST['talla'];
        $color = $_POST['color']; 
        $stock = !empty($_POST['stock']) ? $_POST['stock'] : null;
        $id_centro = ($_POST['id_centro'] == "Sin Asignación") ? null : $_POST['id_centro'];

        // Consulta SQL
        $sql = "INSERT INTO elementos (codigo, nombre, descripcion, categoria, marca, modelo, fecha_compra, fecha_vencimiento, valor, estado, disponibilidad, talla, color, stock) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$codigo, $nombre, $descripcion, $categoria, $marca, $modelo, $fecha_compra, $fecha_vencimiento, $valor, $estado, $disponibilidad, $talla, $color, $stock]);
        
        // Obtener ID del nuevo elemento insertado
        $id_elemento = $pdo->lastInsertId();

        // print_r($id_centro);

        // Insertar en inventario
        $codigo_inventario = generarCodigo(5); // Función para generar código aleatorio
        $fecha_creacion = date("Y-m-d h:i:sa");
        
        $fecha_devolucion = null; // Puedes ajustarlo si necesitas una fecha estimada

        // Consulta SQL
        if($id_centro > 0) {
            $sql = "INSERT INTO inventario (
                codigo_inventario, id_elemento, id_centro, fecha_creacion, fecha_devolucion, estado
            ) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$codigo_inventario, $id_elemento, $id_centro, $fecha_creacion, $fecha_devolucion, $estado]);
        }
    }

    function generarCodigo($longitud = 12) {
        // Caracteres permitidos: letras (mayúsculas y minúsculas) y números
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';
        $max = strlen($caracteres) - 1;
        for ($i = 0; $i < $longitud; $i++) {
            $password .= $caracteres[random_int(0, $max)];
        }
        return $password;
    }

    // Obtener lista de usuarios para el dropdown
    $centros = $pdo->query("SELECT id AS id_centro, nombre FROM centro_trabajo")->fetchAll();
    
    
    // Usar uniqid()
    // $cadena_aleatoria = uniqid(); // Cadena única

    // Usar random_bytes() y bin2hex()
    // $bytes_aleatorios = random_bytes(16); // 16 bytes aleatorios
    // $cadena_hex = bin2hex($bytes_aleatorios); // Cadena hexadecimal

    // Usar una función para generar palabras (ejemplo)
    // function generarPalabraAleatoria($longitud = 2) {
    // $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    // $palabra = '';
    // for ($i = 0; $i < $longitud; $i++) {
    //     $palabra .= $caracteres[mt_rand(0, strlen($caracteres) - 1)];
    // }
    // return $palabra;
    // }

    // $palabra_aleatoria = generarPalabraAleatoria(2);

    

?>
<!-- Formulario de creación -->
<article class="card shadow-sm">
    <div class="card-header bg-secondary text-white">
        <h5 class="mb-0">
            <i class="fa-solid fa-screwdriver-wrench me-2"></i>
            Registrar Nuevo Elemento de Inventario
        </h5>
    </div>
    <div class="card-body">
        <!-- Form -->
        <form method="post">
            <!-- Fila 1 -->
            <div class="row">
                <!-- Codigo -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Código *</label>
                    <input type="text" name="codigo" class="form-control" placeholder="?">
                </div>
                <!-- Nombre -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombre *</label>
                    <input type="text" name="nombre" class="form-control" placeholder="?">
                </div>
            </div>
            <!-- Fila 2 -->
            <!-- Descripción -->
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="2"></textarea></textarea>
            </div>
            <!-- Fila 3 -->
            <div class="row">
                <!-- Categoria -->
                <div class="col-md-4 mb-3">
                    <label for="categoria" class="form-label">Categoría *</label>
                    <select id="categoria" class="form-select"name="categoria">
                        <option value="Sin categoria">Sin categoría</option>
                        <option value="Herramienta">Herramienta</option>
                        <option value="Equipo">Equipo</option>
                        <option value="Insumo">Insumo</option>
                    </select>
                </div>
                <!-- Marca -->
                <div class="col-md-4 mb-3">
                    <label class="form-label">Marca *</label>
                    <input type="text" name="marca" class="form-control" placeholder="?">
                </div>
                <!-- Modelo -->
                <div class="col-md-4 mb-3">
                    <label class="form-label">Modelo</label>
                    <input type="text" name="modelo" class="form-control" placeholder="?">
                </div>
            </div>
            <!-- Fila 4 -->
            <div class="row">
                <!-- Fecha de Compra -->
                <div class="col-md-4 mb-3">
                    <label class="form-label">Fecha de Compra *</label>
                    <input type="date" name="fecha_compra" class="form-control">
                </div>
                <!-- Fecha de Vencimiento -->
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="fecha_vencimiento">Fecha de Vencimiento *</label>
                    <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" class="form-control">
                </div>
                <!-- Valor -->
                <div class="col-md-4 mb-3">
                    <label class="form-label">Valor ($) *</label>
                    <input type="number" name="valor" step="100" class="form-control" placeholder="?">
                </div>
            </div>
            <!-- Fila 5 -->
            <div class="row">
                <!-- Color -->
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="color">Color</label>
                    <input type="text" id="color" name="color" class="form-control" placeholder="?">
                </div>
                <!-- Talla -->
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="talla">Talla</label>
                    <input type="text" id="talla" name="talla" class="form-control" placeholder="?">
                </div>
                <!-- Stock -->
                <div class="col-md-4 mb-3">
                    <label class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" placeholder="?">
                </div>
            </div>
            <!-- Fila 6 -->
            <div class="row">
                <!-- Disponibilidad -->
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="disponibilidad">Disponibilidad *</label>
                    <select id="disponibilidad" name="disponibilidad" class="form-select">
                        <option value="En bodega">En bodega</option>
                        <option value="Vendido">Vendido</option>
                        <option value="Prestado">Prestado</option>
                    </select>
                </div>
                <!-- Centro de Trabajo -->
                <div class="col-md-4 mb-3">
                    <label for="id_centro" class="form-label">Centro de Trabajo</label>
                    <select name="id_centro" id="id_centro" class="form-select">
                        <option value="Sin Asignación">Sin Asignación</option>
                        <?php foreach ($centros as $c): ?>
                            <option value="<?= $c['id_centro'] ?>"><?= $c['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <!-- Estado -->
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="estado">Estado *</label>
                    <select id="estado" name="estado" class="form-select">
                        <option value="Sin estado">Sin estado</option>
                        <option value="Nuevo">Nuevo</option>
                        <option value="Bueno">Bueno</option>
                        <option value="Usado">Usado</option>
                        <option value="Dañado">Dañado</option>
                    </select>
                </div>
            </div>
                    
            <!-- Enviar Registro -->
            <button type="submit" class="btn btn-secondary w-100">Registrar Elemento</button>
        </form>
    </div>
</article>
