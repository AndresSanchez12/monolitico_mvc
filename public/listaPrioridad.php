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
    <link rel="stylesheet" href="css/btback.css">
</head>
<body>
    <header>
        <h1>Lista Prioridad</h1>
    </header>
    <section>
        <br><br>
        <?php echo $tareasView->tablaPrioridad(); ?>
    </section>
    <?php echo $modalesView->getConfirmacion(
        'modalEliminarTarea', 
        'eliminarTarea.php', 
        'tareaForm'
        ); ?>
    <script src="js/tareas.js"></script>
    <section>
        <a href="/monolitico_mvc/index.php" class="btback">Volver</a>
    </section>
</body>
</html>
