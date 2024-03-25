<?
class Modelo extends Conexion
{
    public function importar()
    {
        $fichero = 'tareas.csv';
        $gestor = fopen($fichero, "r");
        $query = "INSERT INTO tareas (id, titulo, descripcion, fecha_creacion, fecha_vencimiento) VALUES (?, ?, ?, ?, ?)";

        $statement = $this->conn->prepare($query);

        if ($gestor !== false) {
            while (($element = fgetcsv($gestor)) !== false) {
                $fecha_creacion = date("Y-m-d", strtotime($element[2]));
                $fecha_vencimiento = date("Y-m-d", strtotime($element[3]));

                $statement->bind_param("issss", $element[0], $element[1], $element[2], $fecha_creacion, $fecha_vencimiento);
                $statement->execute();
            }
            fclose($gestor);
        }
    }


    function deleteList()
    {
        $conn = $this->getConn();
        $query = "DELETE FROM tareas ";
        $conn->query($query);
    }

    function init()
    {
        $this->deleteList();
        $this->importar();
    }

    function getAllTask()
    {
        $query = "SELECT * FROM tareas";
        $result = $this->conn->query($query);

        $tareas = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tareas[] = $row;
            }
        }

        return $tareas;
    }

    function showAllTask()
    {
        $tareas = $this->getAllTask();

        if (count($tareas) > 0) {
            echo '<table class="table table-striped">';
            echo '<tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>F_Creacion</th>
                    <th>F_Vencimiento</th>
                    <th>Acciones</th> <!-- Nueva columna para las acciones -->
                </tr>';
            foreach ($tareas as $tarea) {
                echo "<tr>";
                echo "<td>" . $tarea['id'] . "</td>";
                echo "<td><a href='detalle.php?id=" . $tarea['id'] . "'>" . $tarea['titulo'] . "</a></td>";
                echo "<td>" . date('d/m/Y', strtotime($tarea['fecha_vencimiento'])) . "</td>";
                echo "<td><a href='borrar.php?id=" . $tarea['id'] . "'>Borrar</a></td>";
                echo "<td><a href='modifica.php?id=" . $tarea['id'] . "'>Modificar</a></td>";
                echo "</tr>";
            }
            echo '</table>';
        }

    }

    function addTarea($titulo, $descripcion, $fecha_vencimiento)
    {
        $conn = $this->getConn();

        $sql = "INSERT INTO tareas (titulo, descripcion, fecha_vencimiento, fecha_creacion) VALUES (?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $titulo, $descripcion, $fecha_vencimiento);

     
    }
    function updateTarea()
{
    $id = $_GET['id'];
    $conn = $this->getConn();

    $query = "SELECT * FROM tareas WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $edit = mysqli_fetch_assoc($result);

    if (count($_POST) > 0) {

        $nombre = $_POST["titulo"];
        $descripcion = $_POST["descripcion"];
        $fecha_vencimiento = $_POST["fecha_vencimiento"];

        $query = "UPDATE tareas SET titulo='$nombre', descripcion='$descripcion', fecha_vencimiento='$fecha_vencimiento' WHERE id='$id'";

        if (mysqli_query($conn, $query)) {
            header("location: lista.php");
        } else {
            echo "Error al actualizar la tarea: " . mysqli_error($conn);
        }
    }
    
    $conn->close();
}
function deleteTarea()
{
    $id = $_GET['id'];
    $conn = $this->getConn();
    $query = "DELETE FROM tareas WHERE id='$id'";
    $conn->query($query);
    header('Location: lista.php');
}


}




