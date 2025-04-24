
<div class="card m-5" style="width: 40rem;">
  <div class="card-body">
    <form action="cargar_excel/procesar_csv.php" method="post" enctype="multipart/form-data">
        <label for="archivo">Sube un archivo CSV:</label>
        <input type="file" name="archivo" id="archivo" accept=".csv" required>

        <button type="submit" name="submit">Subir y procesar</button>
    </form>
  </div>
</div>