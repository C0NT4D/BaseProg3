<?class Gestion extends Conexion {
    function getBrands() {
        $conexion = $this->getConn();
        $sql = "SELECT DISTINCT brandName FROM brands ORDER BY brandName ASC";
        $result = mysqli_query($conexion, $sql);

        if ($result->num_rows > 0) {
            $html = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $brand = $row['brandName'];
                $html .= "<input type='checkbox' name='brand[]' value='$brand'>" . $brand . "<br>";
            }
            return $html;
        }
    }
}
