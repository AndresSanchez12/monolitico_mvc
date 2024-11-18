<?php
require '../models/db/database.php';
require '../models/queries/tareasQuery.php';
require '../models/entity/tarea.php';
require '../controllers/tareasController.php';
require '../views/tareasView.php';

use App\views\TareasView;

$tareasView = new TareasView();
$id = $_POST['cod'];
$msg = $tareasView->getMsgEliminarTarea($id);
?>
<!DOCTYPE html>
<html lang="es">    

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar tarea</title>
    <link rel="stylesheet" href="css/estiloTarea.css">
</head>

<body>
    <section>
        <?php echo $msg; ?>
        <br>
        <a href="/monolitico_mvc/index.php">Inicio</a>
    </section>
</body>
</html>