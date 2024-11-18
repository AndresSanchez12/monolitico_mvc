<?php
require '../models/db/database.php';
require '../models/queries/tareasQuery.php';
require '../models/entity/tarea.php';
require '../models/entity/empleado.php';
require '../models/entity/estado.php';
require '../models/entity/prioridad.php';
require '../controllers/tareasController.php';
require '../views/tareasView.php';
require '../views/modalesView.php';

use App\views\TareasView;
use App\views\ModalesView;


$tareasView = new TareasView();
$modalesView = new ModalesView();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin de Tareas</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/modales.css">
    <link rel="stylesheet" href="css/botones.css">
</head>
<body>
    <header>
        <h1>Gestión de Tareas</h1>
    </header>
    <section>
        <a href="formularioTarea.php">Registrar Tarea</a>
        <a href="listaPrioridad.php">Lista por Prioridad</a>
        <a href="filtroFecha.php">Filtro por Fecha</a>
        <a href="agrupacionEstado.php">Agrupacion por estado</a>

        <br><br>
        <?php echo $tareasView->tablaTareas(); ?>
    </section>
    <?php echo $modalesView->getConfirmacion(
        'modalEliminarTarea', 
        'eliminarTarea.php', 
        'tareaForm'
        ); ?>
    <script src="js/tareas.js"></script>
</body>
</html>
