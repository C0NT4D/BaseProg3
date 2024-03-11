<?php
require_once "autoloader.php";
$connection = new Connection();
$conn = $connection->getConn();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $active = isset($_POST["active"]) ? "True" : "False";
  


    $id = $_POST["id"];
    $company = $_POST["company"];
    $investiment = $_POST["investment"];
    $date = $_POST["date"];
    $active = $_POST["active"];

    $query = "INSERT INTO Investment (Id, Company, Investment, Date, Active)
    VALUES ('$id','$company','$investiment','$date','$active')";
    mysqli_query($conn, $query);
    mysqli_close($conn);



    header("location: lista.php");


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            color: #000;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #000;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            background-color: #000;
            color: #fff;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }

        button:hover {
            background-color: #111;
        }
    </style>

</head>

<body>
    <form id="form_x" class="class_x" method="post" action="insert.php">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" value="">
        <label for="company">Company:</label>
        <input type="text" id="company" name="company" value="">
        <label for="investment">Investment:</label>
        <input type="number" id="investment" name="investment" value="">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="">
        <label for="active">Active:</label>
        <input type="text" id="active" name="active" value="">
        <button type="submit">Insert</button>
    </form>
</body>

</html>