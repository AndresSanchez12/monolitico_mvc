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
$estados = ['Pendiente', 'En proceso', 'Terminada', 'En impedimento'];
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
        <h1>Agrupado por Estado</h1>
    </header>

    <?php foreach ($estados as $estado): ?>
        <header>
            <br><br>
            <h2>Estado: <?php echo $estado; ?></h2>
        </header>
        <section> 
            <br><br>
            <?php 
            switch ($estado) {
                case 'Pendiente':
                    echo $tareasView->tablaPendiente();
                    break;
                
                case 'En proceso':
                     echo $tareasView->tablaEnProceso();
                     break;
                

                case 'Terminada':
                    echo $tareasView->tablaTerminada();
                    break;

                case 'En impedimento':
                    echo $tareasView->tablaEnImpedimento();
                    break;
               }
             ?>
        </section>
    <?php endforeach; ?>

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
