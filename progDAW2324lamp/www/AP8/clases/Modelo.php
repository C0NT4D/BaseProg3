<?php

class Modelo extends Conexion{

    function getAllProductos(){
        $query="SELECT * FROM producto";
        $result= $this-> conn -> query($query);

        $productos=array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productos[] = $row;
            }
        }

        return $productos;
    }
    function showAllProducts(){
        $productos= $this->getAllProductos();

        if(count($productos)>0){
            echo '<table class="table table-striped">';
            echo '<tr>
                    <th>PROD_NUM</th>
                    <th>DESCRIPCION</th>
                </tr>';
                foreach($productos as $producto){
                    echo '<tr>'
                    echo 
                }
    }

}