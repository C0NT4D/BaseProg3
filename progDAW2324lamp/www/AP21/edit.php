<?php
require_once "autoloader.php";
$cartera = new Cartera('data.csv');
$id = isset($_GET['id']) ? $_GET['id'] : null;
$client = $cartera->getClient($id);

if (count($_POST) > 0) {
    $active = isset($_POST["active"]) ? "True" :  "False";

    $datos = [
        'id' => $_POST["id"],
        'company' => $_POST["company"],
        'investment' => $_POST["investment"],
        'date' => $_POST["date"],
        'active' => $active
    ];

    $cartera->update($datos);
    header("location: lista.php");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Styling</title>
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
        color: #000;
    }

    input, button {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
        border: 1px solid #000;
        border-radius: 4px;
        font-size: 14px;
        color: #000;
    }

    button {
        background-color: #000;
        color: #fff;
        cursor: pointer;
    }

    button:hover {
        background-color: #111;
    }

    #active {
        margin-top: 8px;
    }
</style>

</head>
<body>
    <form id="form_x" class="class_x" method="post" action="edit.php?id=<?=$id?>">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" value="<?php echo $client->getId(); ?>">
        <label for="company">Company:</label>
        <input type="text" id="company" name="company" value="<?php  echo $client->getCompany() ?>">
        <label for="investment">Investment:</label>
        <input type="number" id="investment" name="investment" value="<?php  echo $client->getInvestment() ?>">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="<?php  echo $client->getDate() ?>">
        <label for="active">Active:</label>
        <input type="text" id="active" name="active" value=" <?php  $client->getActive()  ?>">
        <button type="submit">Update</button>
    </form>
</body>
</html>
