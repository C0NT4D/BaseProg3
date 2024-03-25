<?php
require_once "autoloader.php";
$modelo = new Modelo();
$conexion = new Conexion;
$conn = $conexion->getConn(); 

$id = $_GET['id']; 

$query = "SELECT * FROM tareas WHERE id='$id'";
$result = mysqli_query($conn, $query);
$edit = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $nombre = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $fecha_vencimiento = $_POST["fecha_vencimiento"];

    $query = "UPDATE tareas SET titulo='$nombre', descripcion='$descripcion', fecha_vencimiento='$fecha_vencimiento' WHERE id='$id'";

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Nueva Tarea</title>
<link rel="stylesheet" type="text/css" href="form/view.css" media="all">
</head>
<body id="main_body">
    
    <img id="top" src="form/top.png" alt="">
    <div id="form_container">
    
        <h1><a>Nueva Tarea</a></h1>
        <form class="appnitro"  method="post" action="">
            <div class="form_description">
                <h2>Modifica Tarea</h2>
                <p>Modifica los datos de la tarea</p>
            </div>                      
            <ul >
                <li>
                    <label class="description" for="titulo">Título </label>
                    <div>
                        <input name="titulo" class="element text medium" type="text" maxlength="255" value="<?php echo $edit['titulo']; ?>"/> 
                    </div> 
                </li>
                <li>
                    <label class="description" for="descripcion">Descripción de la tarea </label>
                    <div>
                        <textarea name="descripcion" class="element textarea medium"><?php echo $edit['descripcion']; ?></textarea>
                    </div> 
                </li>
                <li>
                    <label class="description" for="fecha_vencimiento">Fecha de vencimiento </label>
                    <span>
                        <input name="fecha_vencimiento" class="element text" size="10" maxlength="10"  type="date" value="<?php echo $edit['fecha_vencimiento']; ?>">
                    </span>     
                </li>
                <li class="buttons">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <input class="button_text" type="submit" name="submit" value="Guardar" />
                </li>
            </ul>
        </form>    
        <div id="footer">
            Generated by <a href="http://www.floridauniversitaria.es">Florida</a>
        </div>
    </div>
    <img id="bottom" src="form/bottom.png" alt="">
</body>
</html>