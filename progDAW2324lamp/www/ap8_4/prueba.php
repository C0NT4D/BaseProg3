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
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        require_once "autoloader.php";
        $modelo = new Modelo();
        $conn = new mysqli('db', 'root', 'test', "todolist");
            
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $query = 'SELECT * FROM tareas';
        $result = mysqli_query($conn, $query);
            
        $registro_total = mysqli_num_rows($result); // Total de registros
        $registro_pagina = 15; // Cantidad de registros por página
        $pagina = ceil($registro_total / $registro_pagina); // Total de páginas
        $pagActiva = isset($_GET["pagina"]) ? $_GET["pagina"] : 1; // Página actual
        $primerregistro = ($pagActiva - 1 ) * $registro_pagina; // Primer registro en la página actual
        $ultimoRegistro = min($primerregistro + $registro_pagina, $registro_total); // Último registro en la página actual

        // Iterar sobre los registros de la página actual
        for ($i = $primerregistro; $i < $ultimoRegistro; $i++) {
            $result->data_seek($i);
            $value = $result->fetch_array(MYSQLI_ASSOC);

            echo '<tr>';
            foreach ($value as $element) {
                echo '<td>' . $element . '</td>';
            }
            echo '<td><a href="nueva.php?id="><img src="mas.png" width="25" height="25"></a></td>';
            echo '<td><a href="borrar.php?Id=' . $value['id'] . '"><img src="del_icon.png" width="25" height="25"></a></td>';
            echo '<td><a href="modifica.php?id=' . $value['id'] .'"><img src="edit_icon.png" width="25" height="25"></a></td>';
            echo '</tr>';
        }
        
        $result->close();
        mysqli_close($conn);
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5"><a href='nueva.php'>Añadir tarea</a></td>
        </tr>
        <tr>
            <td colspan="5">
                <?php
                // Generar enlaces de paginación
                for ($i = 1; $i <= $pagina; $i++) {
                    echo '<a href="prueba.php?pagina=' . $i . '">' . $i . '</a>';
                }
                ?>
            </td>
        </tr>
    </tfoot>
</table>
</body>
</html>
