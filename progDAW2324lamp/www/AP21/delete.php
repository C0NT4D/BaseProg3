<?php

require_once "autoloader.php";
$id = $_GET['id'];
$connection = new Connection();
$conn = $connection->getConn();
$query = "DELETE FROM Investment WHERE id='$id'";
$conn->query($query);
$conn->close();
header("location: lista.php");
