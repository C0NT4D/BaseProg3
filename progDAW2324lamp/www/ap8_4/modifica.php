<?
require_once "autoloader.php";
$modelo = new modelo();

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $task_id = $_GET["id"];

    $task = $modelo->encotrarID($task_id);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $fecha_vencimiento = $_POST["fecha_vencimiento"];

    $modelo->updateTarea($id, $titulo, $descripcion, $fecha_vencimiento);

    header("Location: prueba.php");
    exit(); 
}