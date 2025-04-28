<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tabla con DataTables</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css" />
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Lista de Usuarios</h2>
    <table id="myTable" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Edad</th>
          <th>Ciudad</th>
        </tr>
      </thead>
      <tbody>
        <tr><td>1</td><td>Ana Pérez</td><td>ana@example.com</td><td>28</td><td>Madrid</td></tr>
        <tr><td>2</td><td>Luis García</td><td>luis@example.com</td><td>35</td><td>Barcelona</td></tr>
        <tr><td>3</td><td>Carla Torres</td><td>carla@example.com</td><td>30</td><td>Valencia</td></tr>
        <tr><td>4</td><td>Jorge Ruiz</td><td>jorge@example.com</td><td>40</td><td>Sevilla</td></tr>
        <tr><td>5</td><td>Lucía Gómez</td><td>lucia@example.com</td><td>25</td><td>Bilbao</td></tr>
      </tbody>
    </table>
  </div>

  <!-- jQuery (debe ir antes de DataTables JS) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <!-- Bootstrap JS (bundle incluye Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

  <!-- Activar DataTable -->
  <script>
    $(document).ready(function () {
      new DataTable('#myTable');
    });
  </script>
</body>
</html>
