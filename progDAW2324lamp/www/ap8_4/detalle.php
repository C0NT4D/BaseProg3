<?php
require_once "autoloader.php";
$connexion = new conexion();
$modelo = new Modelo();

$conn = $connexion->getConn();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $query = "SELECT descripcion FROM tareas WHERE id = $id";

        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>descripcion</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['descripcion'] . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron tareas con ese ID.";
        }
    }
}
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
        
        <input type="text" id="id" name="id">
        <input type="submit" value="Buscar">
    </form>

    <a href="prueba.php">Volver</a>
</body>
</html>
