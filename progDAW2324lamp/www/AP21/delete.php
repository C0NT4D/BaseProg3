<?php

require_once "autoloader.php";
$cartera= new Cartera();
$cartera->delete(isset($_GET['id']) ? $_GET['id'] : null);
header("location: lista.php");
