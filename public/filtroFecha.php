<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Filtro de Fechas</title>
  <link rel="stylesheet" href="css/filtroFecha.css">
</head>
<body>

<div class="container">
  <div class="formmm">
    <h2>Filtrar por Fechas</h2>
    <br>
    <div class="form_field">
      <label for="start_date">Fecha Inicial</label>
      <input type="date" id="start_date" name="start_date">
    </div>
    <br>

    <div class="form_field">
      <label for="end_date">Fecha Final</label>
      <input type="date" id="end_date" name="end_date">
    </div>
    <br>

    <button type="button" onclick="filtrar()">Buscar</button>
  </div>
</div>

<script src="js/tareas.js"></script>

</body>
</html>
