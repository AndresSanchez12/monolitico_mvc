<?php

namespace App\views;

use App\controllers\TareasController;

class TareasView
{
    private $tareasController;

    function __construct()
    {
        $this->tareasController = new TareasController();
    }
    

    function tablaPrioridad()
{
    $rows = '';
    $tareas = $this->tareasController->allTareasPrioridad();
    if (count($tareas) > 0) {
        foreach ($tareas as $tarea) {
            $id = $tarea->get('id');
            $estado = $tarea->get('estado');
            $prioridad = $tarea->get('prioridad');
            $creador = $tarea->get('creadorTarea');
            $responsable = $tarea->get('responsable');
            $fechaEstimadaFinalizacion = $tarea->get('fechaEstimadaFinalizacion');
            $fechaCreacion = $tarea->get('fechaCreacion');
            $fechaActualizacion = $tarea->get('fechaActualizacion'); 
            $fechaFinalizacion = $tarea->get('fechaFinalizacion');
            $descripcion = $tarea->get('descripcion');
            $observaciones = $tarea->get('observaciones');
            $claseEstado = ($estado === 'impedimento') ? 'estado-impedimento' : '';

            $rows .= "<tr class='{$claseEstado}'>";
            $rows .= "<td>{$tarea->get('titulo')}</td>";
            $rows .= "<td>{$creador}</td>";
            $rows .= "<td>{$responsable}</td>";
            $rows .= "<td>{$prioridad}</td>";
            $rows .= "<td>{$estado}</td>";
            $rows .= "<td>{$fechaCreacion}</td>";
            $rows .= "<td>{$fechaEstimadaFinalizacion}</td>";
            $rows .= "<td>{$fechaActualizacion}</td>"; 
            $rows .= "<td>{$fechaFinalizacion}</td>";
            $rows .= "<td>{$descripcion}</td>";
            $rows .= "<td>{$observaciones}</td>";
            $rows .= "<td class=\"celda-modificar\">
             <button class=\"boton-modificar\" onclick=\"window.location.href='formularioTarea.php?cod={$id}'\">
                 <img src=\"https://cdn-icons-png.flaticon.com/512/1159/1159633.png\" class=\"imagen-modificar\" alt=\"Modificar\">
             </button>
          </td>";
            $rows .= '<td>
            <button onClick="onDeleteTarea(' . $id . ')" style="border: none; background: none;">
              <img src="https://w7.pngwing.com/pngs/627/7/png-transparent-computer-icons-window-icon-design-delete-button-angle-furniture-text-thumbnail.png" width="34" height="34" alt="Eliminar" style="transition: transform 0.2s; display: inline-block;">
          </button>
            </td>';

            $rows .= '</tr>';
        }
    } else {
        $rows .= '<tr><td colspan="12">No hay tareas registradas</td></tr>';
    }

    $table = '<table>';
    $table .= '<thead><tr><th>Título</th><th>Creador</th><th>Responsable</th><th>Prioridad</th><th>Estado</th><th>Fecha Creación</th><th>Fecha Estimada</th><th>Fecha Modificación</th><th>Fecha Finalización Real</th><th>Descripcion</th><th>Observaciones</th><th>Modificar</th><th>Eliminar</th></tr></thead>';
    $table .= '<tbody>' . $rows . '</tbody>';
    $table .= '</table>';
    return $table;
}



   function tablaTareas()
    {
     $rows = '';
        $tareas = $this->tareasController->allTareas();
        if (count($tareas) > 0) {
            foreach ($tareas as $tarea) {
                $id = $tarea->get('id');
                $estado = $tarea->get('estado');
                $prioridad = $tarea->get('prioridad');
                $creador = $tarea->get('creadorTarea');
                $responsable = $tarea->get('responsable');
                $fechaEstimadaFinalizacion = $tarea->get('fechaEstimadaFinalizacion');
                $fechaCreacion = $tarea->get('fechaCreacion');
                $fechaActualizacion = $tarea->get('fechaActualizacion');
                $fechaFinalizacion = $tarea->get('fechaFinalizacion');
                $descripcion = $tarea->get('descripcion');
                $observaciones = $tarea->get('observaciones');
                $claseEstado = ($estado === 'impedimento') ? 'estado-impedimento' : '';

                $rows .= "<tr class='{$claseEstado}'>";
                $rows .= "<td>{$tarea->get('titulo')}</td>";
                $rows .= "<td>{$creador}</td>";
                $rows .= "<td>{$responsable}</td>";
                $rows .= "<td>{$prioridad}</td>";
                $rows .= "<td>{$estado}</td>";
                $rows .= "<td>{$fechaCreacion}</td>";
                $rows .= "<td>{$fechaEstimadaFinalizacion}</td>";
                $rows .= "<td>{$fechaActualizacion}</td>"; 
                $rows .= "<td>{$fechaFinalizacion}</td>";
                $rows .= "<td>{$descripcion}</td>";
                $rows .= "<td>{$observaciones}</td>";
                $rows .= "<td class=\"celda-modificar\">
                <button class=\"boton-modificar\" onclick=\"window.location.href='formularioTarea.php?cod={$id}'\">
                    <img src=\"https://cdn-icons-png.flaticon.com/512/1159/1159633.png\" class=\"imagen-modificar\" alt=\"Modificar\">
                </button>
            </td>";
                $rows .= '<td>
                <button onClick="onDeleteTarea(' . $id . ')" style="border: none; background: none;">
                <img src="https://w7.pngwing.com/pngs/627/7/png-transparent-computer-icons-window-icon-design-delete-button-angle-furniture-text-thumbnail.png" width="34" height="34" alt="Eliminar" style="transition: transform 0.2s; display: inline-block;">
            </button>
                </td>';

                $rows .= '</tr>';                           
            }
        } else {
            $rows .= '<tr><td colspan="12">No hay tareas registradas</td></tr>';
        }

        $table = '<table>';
        $table .= '<thead><tr><th>Título</th><th>Creador</th><th>Responsable</th><th>Prioridad</th><th>Estado</th><th>Fecha Creación</th><th>Fecha Estimada</th><th>Fecha Modificación</th><th>Fecha Finalización Real</th><th>Descripcion</th><th>Observaciones</th><th>Modificar</th><th>Eliminar</th></tr></thead>';
        $table .= '<tbody>' . $rows . '</tbody>';
        $table .= '</table>';
        return $table;
    }


    function tablaPendiente()
{
    $rows = '';
    $tareas = $this->tareasController->allTareas();
    if (count($tareas) > 0) {
        foreach ($tareas as $tarea) {
            $estado = $tarea->get('estado');
            
            if ($estado === 'Pendiente') {
                $id = $tarea->get('id');
                $prioridad = $tarea->get('prioridad');
                $creador = $tarea->get('creadorTarea');
                $responsable = $tarea->get('responsable');
                $fechaEstimadaFinalizacion = $tarea->get('fechaEstimadaFinalizacion');
                $fechaCreacion = $tarea->get('fechaCreacion');
                $fechaActualizacion = $tarea->get('fechaActualizacion');
                $fechaFinalizacion = $tarea->get('fechaFinalizacion');
                $descripcion = $tarea->get('descripcion');
                $observaciones = $tarea->get('observaciones');
                $claseEstado = ($estado === 'impedimento') ? 'estado-impedimento' : '';

                $rows .= "<tr class='{$claseEstado}'>";
                $rows .= "<td>{$tarea->get('titulo')}</td>";
                $rows .= "<td>{$creador}</td>";
                $rows .= "<td>{$responsable}</td>";
                $rows .= "<td>{$prioridad}</td>";
                $rows .= "<td>{$estado}</td>";
                $rows .= "<td>{$fechaCreacion}</td>";
                $rows .= "<td>{$fechaEstimadaFinalizacion}</td>";
                $rows .= "<td>{$fechaActualizacion}</td>";
                $rows .= "<td>{$fechaFinalizacion}</td>";
                $rows .= "<td>{$descripcion}</td>";
                $rows .= "<td>{$observaciones}</td>";
                $rows .= "<td class=\"celda-modificar\">
                    <button class=\"boton-modificar\" onclick=\"window.location.href='formularioTarea.php?cod={$id}'\">
                        <img src=\"https://cdn-icons-png.flaticon.com/512/1159/1159633.png\" class=\"imagen-modificar\" alt=\"Modificar\">
                    </button>
                </td>";
                $rows .= '<td>
                    <button onClick="onDeleteTarea(' . $id . ')" style="border: none; background: none;">
                        <img src="https://w7.pngwing.com/pngs/627/7/png-transparent-computer-icons-window-icon-design-delete-button-angle-furniture-text-thumbnail.png" width="34" height="34" alt="Eliminar" style="transition: transform 0.2s; display: inline-block;">
                    </button>
                </td>';
                $rows .= '</tr>';
            }
        }
    } else {
        $rows .= '<tr><td colspan="12">No hay tareas registradas</td></tr>';
    }

    $table = '<table>';
    $table .= '<thead><tr><th>Título</th><th>Creador</th><th>Responsable</th><th>Prioridad</th><th>Estado</th><th>Fecha Creación</th><th>Fecha Estimada</th><th>Fecha Modificación</th><th>Fecha Finalización Real</th><th>Descripcion</th><th>Observaciones</th><th>Modificar</th><th>Eliminar</th></tr></thead>';
    $table .= '<tbody>' . $rows . '</tbody>';
    $table .= '</table>';
    return $table;
}


function tablaEnProceso()
{
    $rows = '';
    $tareas = $this->tareasController->allTareas();

    if (count($tareas) > 0) {
        foreach ($tareas as $tarea) {
            $estado = $tarea->get('estado');

            if ($estado === 'En proceso') {
                $id = $tarea->get('id');
                $prioridad = $tarea->get('prioridad');
                $creador = $tarea->get('creadorTarea');
                $responsable = $tarea->get('responsable');
                $fechaEstimadaFinalizacion = $tarea->get('fechaEstimadaFinalizacion');
                $fechaCreacion = $tarea->get('fechaCreacion');
                $fechaActualizacion = $tarea->get('fechaActualizacion');
                $fechaFinalizacion = $tarea->get('fechaFinalizacion');
                $descripcion = $tarea->get('descripcion');
                $observaciones = $tarea->get('observaciones');
                $claseEstado = ($estado === 'impedimento') ? 'estado-impedimento' : '';

                $rows .= "<tr class='{$claseEstado}'>";
                $rows .= "<td>{$tarea->get('titulo')}</td>";
                $rows .= "<td>{$creador}</td>";
                $rows .= "<td>{$responsable}</td>";
                $rows .= "<td>{$prioridad}</td>";
                $rows .= "<td>{$estado}</td>";
                $rows .= "<td>{$fechaCreacion}</td>";
                $rows .= "<td>{$fechaEstimadaFinalizacion}</td>";
                $rows .= "<td>{$fechaActualizacion}</td>"; 
                $rows .= "<td>{$fechaFinalizacion}</td>";
                $rows .= "<td>{$descripcion}</td>";
                $rows .= "<td>{$observaciones}</td>";
                $rows .= "<td class=\"celda-modificar\">
                    <button class=\"boton-modificar\" onclick=\"window.location.href='formularioTarea.php?cod={$id}'\">
                        <img src=\"https://cdn-icons-png.flaticon.com/512/1159/1159633.png\" class=\"imagen-modificar\" alt=\"Modificar\">
                    </button>
                </td>";
                $rows .= '<td>
                    <button onClick="onDeleteTarea(' . $id . ')" style="border: none; background: none;">
                        <img src="https://w7.pngwing.com/pngs/627/7/png-transparent-computer-icons-window-icon-design-delete-button-angle-furniture-text-thumbnail.png" width="34" height="34" alt="Eliminar" style="transition: transform 0.2s; display: inline-block;">
                    </button>
                </td>';
                $rows .= '</tr>';
            }
        }
    } else {
        $rows .= '<tr><td colspan="12">No hay tareas registradas en estado "En proceso"</td></tr>';
    }

    $table = '<table>';
    $table .= '<thead><tr><th>Título</th><th>Creador</th><th>Responsable</th><th>Prioridad</th><th>Estado</th><th>Fecha Creación</th><th>Fecha Estimada</th><th>Fecha Modificación</th><th>Fecha Finalización Real</th><th>Descripcion</th><th>Observaciones</th><th>Modificar</th><th>Eliminar</th></tr></thead>';
    $table .= '<tbody>' . $rows . '</tbody>';
    $table .= '</table>';

    return $table;
}



function tablaTerminada()
{
    $rows = '';
    $tareas = $this->tareasController->allTareas();

    if (count($tareas) > 0) {
        foreach ($tareas as $tarea) {
            $estado = $tarea->get('estado');

            if ($estado === 'Terminada') {
                $id = $tarea->get('id');
                $prioridad = $tarea->get('prioridad');
                $creador = $tarea->get('creadorTarea');
                $responsable = $tarea->get('responsable');
                $fechaEstimadaFinalizacion = $tarea->get('fechaEstimadaFinalizacion');
                $fechaCreacion = $tarea->get('fechaCreacion');
                $fechaActualizacion = $tarea->get('fechaActualizacion');
                $fechaFinalizacion = $tarea->get('fechaFinalizacion');
                $descripcion = $tarea->get('descripcion');
                $observaciones = $tarea->get('observaciones');
                $claseEstado = ($estado === 'impedimento') ? 'estado-impedimento' : '';

                $rows .= "<tr class='{$claseEstado}'>";
                $rows .= "<td>{$tarea->get('titulo')}</td>";
                $rows .= "<td>{$creador}</td>";
                $rows .= "<td>{$responsable}</td>";
                $rows .= "<td>{$prioridad}</td>";
                $rows .= "<td>{$estado}</td>";
                $rows .= "<td>{$fechaCreacion}</td>";
                $rows .= "<td>{$fechaEstimadaFinalizacion}</td>";
                $rows .= "<td>{$fechaActualizacion}</td>"; 
                $rows .= "<td>{$fechaFinalizacion}</td>";
                $rows .= "<td>{$descripcion}</td>";
                $rows .= "<td>{$observaciones}</td>";
                $rows .= "<td class=\"celda-modificar\">
                    <button class=\"boton-modificar\" onclick=\"window.location.href='formularioTarea.php?cod={$id}'\">
                        <img src=\"https://cdn-icons-png.flaticon.com/512/1159/1159633.png\" class=\"imagen-modificar\" alt=\"Modificar\">
                    </button>
                </td>";
                $rows .= '<td>
                    <button onClick="onDeleteTarea(' . $id . ')" style="border: none; background: none;">
                        <img src="https://w7.pngwing.com/pngs/627/7/png-transparent-computer-icons-window-icon-design-delete-button-angle-furniture-text-thumbnail.png" width="34" height="34" alt="Eliminar" style="transition: transform 0.2s; display: inline-block;">
                    </button>
                </td>';
                $rows .= '</tr>';
            }
        }
    } else {
        $rows .= '<tr><td colspan="12">No hay tareas registradas en estado "En proceso"</td></tr>';
    }

    $table = '<table>';
    $table .= '<thead><tr><th>Título</th><th>Creador</th><th>Responsable</th><th>Prioridad</th><th>Estado</th><th>Fecha Creación</th><th>Fecha Estimada</th><th>Fecha Modificación</th><th>Fecha Finalización Real</th><th>Descripcion</th><th>Observaciones</th><th>Modificar</th><th>Eliminar</th></tr></thead>';
    $table .= '<tbody>' . $rows . '</tbody>';
    $table .= '</table>';

    return $table;
}



function tablaEnImpedimento()
{
    $rows = '';
    $tareas = $this->tareasController->allTareas();

    if (count($tareas) > 0) {
        foreach ($tareas as $tarea) {
            $estado = $tarea->get('estado');

            if ($estado === 'En impedimento') {
                $id = $tarea->get('id');
                $prioridad = $tarea->get('prioridad');
                $creador = $tarea->get('creadorTarea');
                $responsable = $tarea->get('responsable');
                $fechaEstimadaFinalizacion = $tarea->get('fechaEstimadaFinalizacion');
                $fechaCreacion = $tarea->get('fechaCreacion');
                $fechaActualizacion = $tarea->get('fechaActualizacion');
                $fechaFinalizacion = $tarea->get('fechaFinalizacion');
                $descripcion = $tarea->get('descripcion');
                $observaciones = $tarea->get('observaciones');
                $claseEstado = ($estado === 'impedimento') ? 'estado-impedimento' : '';

                $rows .= "<tr class='{$claseEstado}'>";
                $rows .= "<td>{$tarea->get('titulo')}</td>";
                $rows .= "<td>{$creador}</td>";
                $rows .= "<td>{$responsable}</td>";
                $rows .= "<td>{$prioridad}</td>";
                $rows .= "<td>{$estado}</td>";
                $rows .= "<td>{$fechaCreacion}</td>";
                $rows .= "<td>{$fechaEstimadaFinalizacion}</td>";
                $rows .= "<td>{$fechaActualizacion}</td>"; 
                $rows .= "<td>{$fechaFinalizacion}</td>";
                $rows .= "<td>{$descripcion}</td>";
                $rows .= "<td>{$observaciones}</td>";
                $rows .= "<td class=\"celda-modificar\">
                    <button class=\"boton-modificar\" onclick=\"window.location.href='formularioTarea.php?cod={$id}'\">
                        <img src=\"https://cdn-icons-png.flaticon.com/512/1159/1159633.png\" class=\"imagen-modificar\" alt=\"Modificar\">
                    </button>
                </td>";
                $rows .= '<td>
                    <button onClick="onDeleteTarea(' . $id . ')" style="border: none; background: none;">
                        <img src="https://w7.pngwing.com/pngs/627/7/png-transparent-computer-icons-window-icon-design-delete-button-angle-furniture-text-thumbnail.png" width="34" height="34" alt="Eliminar" style="transition: transform 0.2s; display: inline-block;">
                    </button>
                </td>';
                $rows .= '</tr>';
            }
        }
    } else {
        $rows .= '<tr><td colspan="12">No hay tareas registradas en estado "En proceso"</td></tr>';
    }

    $table = '<table>';
    $table .= '<thead><tr><th>Título</th><th>Creador</th><th>Responsable</th><th>Prioridad</th><th>Estado</th><th>Fecha Creación</th><th>Fecha Estimada</th><th>Fecha Modificación</th><th>Fecha Finalización Real</th><th>Descripcion</th><th>Observaciones</th><th>Modificar</th><th>Eliminar</th></tr></thead>';
    $table .= '<tbody>' . $rows . '</tbody>';
    $table .= '</table>';

    return $table;
}


    function getMsgConfirmarTarea($datosFormulario)
    {
        $datosGuardados = empty($datosFormulario['cod'])
            ? $this->tareasController->saveTarea($datosFormulario)
            : $this->tareasController->updateTarea($datosFormulario);
        if ($datosGuardados) {
            return '<P>Tarea Registrada</P>';
        } else {
            return '<P>Error</P>';
        }
    }

    function getMsgEliminarTarea($id)
    {
        $datoEliminado = $this->tareasController->deleteTarea($id);
        if ($datoEliminado) {
            return '<P>Tarea Eliminada</P>';
        } else {
            return '<P>Error</P>';
        }
    }
}

