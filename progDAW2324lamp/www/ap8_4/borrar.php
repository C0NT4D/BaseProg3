<?php
require_once "autoloader.php";


$modelo = new Modelo();
$conn = $modelo->getConn();
if(isset($_GET['Id']) && !empty($_GET['Id'])) {
  
    $id = $conn->real_escape_string($_GET['Id']);
    $query = "DELETE FROM tareas WHERE id = '$id'";
    if($conn->query($query)) {
      
        $conn->close();
        header("Location: prueba.php");
        exit; 
    }
}
?>
