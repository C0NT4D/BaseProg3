<?php

class modelo extends conexion
{


    public function importar($fichero)
    {
        $gestor = fopen($fichero, "r");
        if ($gestor !== false) {
            while (($element = fgetcsv($gestor)) !== false) {

                $query = "INSERT INTO tareas (id, titulo, descripcion, fecha_creacion, fecha_vencimiento) VALUES (?, ?, ?, ?, ?)";
                $statement = $this->conn->prepare($query);


                $id = $element[0];
                $titulo = $element[1];
                $descripcion = $element[2];
                $fecha_creacion = $element[3];
                $fecha_vencimiento = $element[4];


                $statement->bind_param("issss", $id, $titulo, $descripcion, $fecha_creacion, $fecha_vencimiento);
                $statement->execute();
            }
            fclose($gestor);
        }
    }


    public function deletelist()
    {
        $conn = $this->getConn();
        $query = "DELETE FROM tareas";
        $conn->query($query);

    }

    public function init()
    {
        $this->deletelist();
        $this->importar('tareas.csv');
    }
    public function getAllTasks()
    {
        $query = "SELECT * FROM tareas";
        $resultado = $this->conn->query($query);
        if (!$resultado) {
            die("Error en la consulta: " . $this->conn->error);
        }
        $tareas = array();
        while ($file = $resultado->fetch_object()) {
            $tareas[] = $file;
        }
        return $tareas;
    }
    public function showAllTasks()
    {
        $tareas = $this->getAllTasks();
        echo "<table>";
        foreach ($tareas as $tarea) {
            echo "<tr>
                    <td>" . $tarea->id . "</td>
                    <td><a href='detalle.php?id=" . $tarea->id . "'>" . $tarea->titulo . "</a></td>
                    <td>" . $tarea->fecha_creacion . "</td>
                    <td>" . $tarea->fecha_vencimiento . "</td>
                  </tr>";
        }
        echo "<tr>
                <td colspan='4'><a href='nueva.php'>Añadir tarea</a></td>
                <td colspan='4'><a href='modifica.php'>Modificar tarea</a></td>
              </tr>";
        echo "</table>";
    }
    

    function addtarea($nombre, $descripcion, $fecha_creacion, $fecha_vencimiento)
    {
        $query = "INSERT INTO tareas (titulo, descripcion, fecha_creacion, fecha_vencimiento) 
                  VALUES ('$nombre', '$descripcion', '$fecha_creacion', '$fecha_vencimiento')";
        $resultado = $this->conn->query($query);
        if (!$resultado) {
            die("Error en la consulta: " . $this->conn->error);
        }
    }
    public function updateTarea($id, $titulo, $descripcion, $fecha_vencimiento) {


        $query = "UPDATE tareas SET titulo='$titulo', descripcion='$descripcion', fecha_vencimiento='$fecha_vencimiento' WHERE id=$id";
        $resultado = $this->conn->query($query);

        if (!$resultado) {

            die("Error en la consulta: " . $this->conn->error);
        } 
    }
    public function encotrarID($id)
    {
        $query = "SELECT * FROM tareas WHERE id = $id";
        $resultado = $this->conn->query($query);
        if ($resultado && $resultado->num_rows > 0) {
            $row = $resultado->fetch_object();
            return $row;
        } else {
            return null;
        }
    }
}




