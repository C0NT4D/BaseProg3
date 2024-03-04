<?php

class Cartera
{
    private $clients = [];


    public function getClient($id)
    {
        foreach ($this->clients as $client) {
            if ($client->getId() == $id)
                return $client;
        }
        return new Empresa(null, null, null, null, null);
    }

   

    public function delete($id)
    {
        $conn= new mysqli ('db', 'root', 'test', "AP21");
        $query = "DELETE FROM Investment WHERE id='$id'";
        $conn -> query($query); 
        $conn->close();

    }
       
    

    public function update($datos)
    {
        
    }

   

    public function insert($datos)
    {
        $conn = new mysqli('db', 'root', 'test', "AP21");
            
        
            $id = $_POST["id"];
            $company = $_POST["company"];
            $investiment = $_POST["investment"];
            $date = $_POST["date"];
            $active = $_POST ["active"];
       
    $query= "INSERT INTO Investment (Id, Company, Investment, Date, Active)
    VALUES ('$id','$company','$investiment','$date','$active')";
    mysqli_query($conn, $query);
    mysqli_close($conn);

}


     function drawList()
    {
        $conn = new mysqli('db', 'root', 'test', "AP21");
                
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

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
            echo '<td><a href="delete.php?"><img src="img/del_icon.png" width="25"></a></td>';

            echo '</tr>';
        }
        echo '</table>';
        $result->close();
        mysqli_close($conn);
    }
}
