
<?php
require_once "autoloader.php";
$modelo = new Modelo();
$conexion = new Conexion;
$conn = $conexion->getConn(); 

$id = $_GET['id']; 

$query = "SELECT * FROM tareas WHERE id='$id'";
$result = mysqli_query($conn, $query);
$mostrar = mysqli_fetch_assoc($result); 

if (!$mostrar) {
    echo "No se encontró la tarea con la ID proporcionada.";

}

if (count($_POST) > 0) {
   
    header("location: lista.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Tarea</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<table class="greenTable">
    <thead>
        <tr>
            <th><?php echo $mostrar['titulo']; ?></th> 
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td>La tarea <?php echo $mostrar['id']; ?> vence en <?php echo date('d/m/Y', strtotime($mostrar['fecha_vencimiento'])); ?></td> 
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <td>Fecha de creación: <?php echo date('d/m/Y', strtotime($mostrar['fecha_creacion'])); ?></td>
        </tr>
        <tr>
            <td>Descripción: <?php echo $mostrar['descripcion']; ?></td>
        </tr>
    </tbody>
</table>
<a href="lista.php">Volver</a>
</body>
</html>
