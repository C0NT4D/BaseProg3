<?php 
require_once "autoloader.php";
$modelo = new Modelo();
$modelo->init();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<table class="greenTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Vencimiento</th>
            <th>Creación</th>
            <th>Acciones</th> <!-- Nueva columna para acciones -->
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="5"> <!-- Modificado para que coincida con el número de columnas -->
                &nbsp;
            </td>
        </tr>
    </tfoot>
    <tbody>
        <?php 
        $tareas = $modelo->getAllTask();
        foreach ($tareas as $tarea) {
            echo '<tr>';
            echo '<td>' . $tarea['id'] . '</td>';
            echo "<td><a href='detalle.php?id=" . $tarea['id'] . "'>" . $tarea['titulo'] . "</a></td>";
            echo '<td>' . $tarea['fecha_creacion'] . '</td>';
            echo '<td>' . $tarea['fecha_vencimiento'] . '</td>';
            echo '<td><a href="borrar.php?id=' . $tarea['id'] . '">Borrar</a> | <a href="modifica.php?id=' . $tarea['id'] . '">Modificar</a></td>'; // Acciones en cada fila
            echo '</tr>';
        }
        ?>
        <tr>
            <td colspan="5"><a href='nueva.php'>Añadir tarea</a></td> <!-- Modificado para que coincida con el número de columnas -->
        </tr>
    </tbody>
</table>

</body>
</html>
