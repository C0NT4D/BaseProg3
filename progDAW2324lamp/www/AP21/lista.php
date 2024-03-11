<?php

require_once "autoloader.php";
$connection = new Connection();
$conn = $connection->getConn();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
    <table class="redTable">
        <tbody>
            <?php
            $connection = new Connection();
            $conn = $connection->getConn();

            $query = 'SELECT * FROM Investment';
            $result = mysqli_query($conn, $query);

            // Calculos Paginacion
            $registrosTotales = mysqli_num_rows($result);
            $regPaginas = 7; // Cantidad de registros por página
            $paginas = ceil($registrosTotales / $regPaginas); // Calcula la cantidad de páginas
            $pagAct = isset($_GET['page']) ? $_GET['page'] : 1; // Página actual
            $primerRegistro = ($pagAct - 1) * $regPaginas; // Primer registro a mostrar en la página
            $ultimoRegistro = min($primerRegistro + $regPaginas, $registrosTotales); // Último registro a mostrar en la página

            echo '<table class="table table-striped">';
            echo '<tr>
                    <th>Id</th>
                    <th>Company</th>
                    <th>Investment</th>
                    <th>Date</th>
                    <th>Active</th>
                    <th colspan="2">Actions</th>
                </tr>';

            // Iterar sobre los registros de la página actual
            for ($i = $primerRegistro; $i < $ultimoRegistro; $i++) {
                $result->data_seek($i);
                $value = $result->fetch_array(MYSQLI_ASSOC);

                echo '<tr>';
                foreach ($value as $element) {
                    echo '<td>' . $element . '</td>';
                }
                echo '<td><a href="insert.php"><img src="img/ins_icon.png" width="25"></a></td>';
                echo '<td><a href="delete.php?id=' . $value['Id'] . '"><img src="img/del_icon.png" width="25"></a></td>';
                echo '<td><a href="edit.php"><img src="img/edit_icon.png" width="25"></a></td>';
                echo '</tr>';
            }
            echo '</table>';

            // Paginación
            for ($i = 1; $i <= $paginas; $i++) {
                echo "<a href='lista.php?page=$i'>$i</a> ";
            }

            ?>
        </tbody>
    </table>
</body>

</html>
