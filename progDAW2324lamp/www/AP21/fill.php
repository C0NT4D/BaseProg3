<?php
require_once "autoloader.php";
$connection = new Connection();
$conn = $connection->getConn();

for ($i = 1; $i < 100; $i++) {
    $id = $i;
    $company = "Pepito";
    $investment = rand(100, 999); 
    $date = date("Y-m-d", strtotime("-$i days")); 
    $active = rand(0, 1); 

    $query = "INSERT INTO Investment(Id, Company, Investment, Date, Active) VALUES ($id, '$company', $investment, '$date', $active)";
    mysqli_query($conn, $query);
}

?>
