<?php

require_once "autoloader.php";

$connection = new Connection;
$conn = $connection->getConn();

$id=$_GET['id'];

$query = "SELECT * FROM Investment WHERE id='$id'";
$result = mysqli_query($conn, $query);
$client = mysqli_fetch_assoc($result);

if (count($_POST) > 0) {

    $id=$_POST["id"];
	$company=$_POST["company"];
	$investment=$_POST["investment"];
	$date=$_POST["date"];
	$active=$_POST["active"];
    
    $query = "UPDATE Investment SET Company='$company', Investment='$investment', Date='$date', Active='$active' WHERE Id='$id'";

    if (mysqli_query($conn, $query)) {
        header("location: lista.php");
    }
}

    
    

?>

<html>
    <head>
        <title>Información</title>
        <style>
            form {
                border: 2px solid black;
                width: 400px;
                height: 500px;
                font-size: 25px;
            }
        </style>
    </head>
<center><h1>Informacion de la empresa</h1></center>
<body>
<center>
<form id="form_x" class="class_x" method="post">
<br>
<label for="id" >ID: </label>
<input type="id" name="id" value="<?php echo $client['Id']; ?>" readonly>
<br>
<br>
<br>
<label for="company" >Company: </label>
<input type="company" name="company" value="<?php echo $client['Company']; ?>">
<br>
<br>
<br>
<label for="investment">Investment: </label>
<input type="text" name="investment" value="<?php echo $client['Investment']; ?>">
<br>
<br>
<br>
<label for="date">Date: </label>
<input type="date" name="date" value="<?php echo $client['Date']; ?>">
<br>
<br>
<br> 
<label for="active"> Active: </label>
<select id="active" name="active" value="<?php echo $client['Active']; ?>">
    <option value="0">Yes</option>
    <option value="1">No</option>
</select>
<br>
<br>
<br>
<input id="submit" type="submit" value="Aceptar" />
</form>
</center>
</body>

</html>


<?