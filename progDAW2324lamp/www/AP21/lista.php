<?php

require_once "autoloader.php";
$connection = new Connection();
$conn = $connection->getConn();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>

<body>
    <table class="redTable">
        <tbody>
            <?php 
            $connection = new Connection();
            $conn = $connection->getConn();
    
            $query = 'SELECT * From Investment';
            $result = mysqli_query($conn, $query);
    
            echo '<table class="table table-striped">';
            echo '<tr>
                    <th>Id</th>
                    <th>Company</th>
                    <th>Investment</th>
                    <th>Date</th>
                    <th>Active</th>
                    <th colspan="2">Actions</th>
                </tr>';
            while($value = $result->fetch_array(MYSQLI_ASSOC)){
                echo '<tr>';
                foreach($value as $element){
                    echo '<td>' . $element . '</td>';
                }
                echo '<td><a href="insert.php?"><img src="img/ins_icon.png" width="25"></a></td>';
                echo '<td><a href="delete.php?id=' . $value['Id'] . '"><img src="img/del_icon.png" width="25"></a></td>';
    
                echo '</tr>';
            }
            echo '</table>';

      
        
        ?>
         
        </tbody>
    </table>
</body>

</html>