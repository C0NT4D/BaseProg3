<?php

class Modelo extends Conexion
{

    function getAllProductos()
    {
        $query = "SELECT * FROM producto";
        $result = $this->conn->query($query);

        $productos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productos[] = $row;
            }
        }

        return $productos;
    }
    function showAllProducts()
    {
        $productos = $this->getAllProductos();

        if (count($productos) > 0) {
            echo '<table class="table table-striped">';
            echo '<tr>
                    <th>PROD_NUM</th>
                    <th>DESCRIPCION</th>
                </tr>';
            foreach ($productos as $producto) {
                echo '<tr>';
                echo '<td>' . $producto['PROD_NUM'] . '</td>';
                echo '<td>' . $producto['DESCRIPCION'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }

    }
    function getAllEmp()
    {
        $query = "SELECT EMP_NO,APELLIDOS,DEPT_NO,SALARIO FROM EMP";
        $result = $this->conn->query($query);

        $emp = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $emp[] = $row;
            }
        }

        return $emp;

    }
    function showAllEmp()
    {
        $empleados = $this->getAllEmp();

        if (count($empleados) > 0) {
            echo '<table class="table table-striped">';
            echo '<tr>
                    <th>EMP_NO</th>
                    <th>APELLIDOS</th>
                    <th>DEPT_NO</th>
                    <th>SALARIO</th>
                </tr>';
            foreach ($empleados as $empleado) {
                echo '<tr>';
                echo '<td>' . $empleado['EMP_NO'] . '</td>';
                echo '<td>' . $empleado['APELLIDOS'] . '</td>';
                echo '<td>' . $empleado['DEPT_NO'] . '</td>';
                echo '<td>' . $empleado['SALARIO'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }

    }
    function getAllCliente($order)
    {
        $query = "SELECT CLIENTE_COD, NOMBRE,CIUDAD FROM CLIENTE";
        $result = $this->conn->query($query);

        $clientes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $clientes[] = $row;
            }
        }

        return $clientes;

    }

    function showAllCliente($order)
    {
        $clientes = $this->getAllCliente($order);

        if (count($clientes) > 0) {
            echo '<table class="table table-striped">';
            echo '<tr>
                    <th>CLIENTE_COD</th>
                    <th>NOMBRE</th>
                    <th>CIUDAD</th>
                </tr>';
            foreach ($clientes as $cliente) {
                echo '<tr>';
                echo '<td>' . $cliente['CLIENTE_COD'] . '</td>';
                echo '<td>' . $cliente['NOMBRE'] . '</td>';
                echo '<td>' . $cliente['CIUDAD'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }

    }
    function getPedidoOver($total)
    {
        $query = "SELECT PEDIDO_NUM, CLIENTE_COD ,TOTAL FROM PEDIDO WHERE TOTAL >=$total";
        $result = $this->conn->query($query);

        $pedidos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pedidos[] = $row;
            }
        }

        return $pedidos;

    }

    function showPedidoOver($total)
    {
        $pedidos = $this->getPedidoOver($total);

        if (count($pedidos) > 0) {
            echo '<table class="table table-striped">';
            echo '<tr>
                    <th>PEDIDO_NUM</th>
                    <th>CLIENTE_COD</th>
                    <th>TOTAL</th>
                </tr>';
            foreach ($pedidos as $pedido) {
                echo '<tr>';
                echo '<td>' . $pedido['PEDIDO_NUM'] . '</td>';
                echo '<td>' . $pedido['CLIENTE_COD'] . '</td>';
                echo '<td>' . $pedido['TOTAL'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        }

    }
    function getLineasPedido($pedido)
    {
        $query = "SELECT PEDIDO_NUM, DETALLE ,IMPORTE FROM DETALLE";
        $result = $this->conn->query($query);

        $detalles = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $detalles[] = $row;
            }
        }

        return $detalles;

    }

    function getLineasPedidoMayor($pedido)
    {
        $query = "SELECT MAX(IMPORTE) FROM DETALLE  WHERE PEDIDO_NUM = $pedido";
        $result = $this->conn->query($query);

        $lineasPedidoMayor = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $lineasPedidoMayor[] = $row;
            }
        }

        return $lineasPedidoMayor;
    }

    public function showLineasPedido($pedido) {
        $lineasPedido = $this->getLineasPedido($pedido);
        $lineasPedidoMayor = $this->getLineasPedidoMayor($pedido);

        echo "<table border='1'>";
        echo "<tr>

        <th>PEDIDO_NUM</th>
        <th>DETALLE_NUM</th>
        <th>IMPORTE</th>

        </tr>";
        foreach ($lineasPedido as $linea) {
            echo "<tr>";
            echo "<td>" . $linea['PEDIDO_NUM'] . "</td>";
            echo "<td>" . $linea['DETALLE_NUM'] . "</td>";
            if ($linea==$lineasPedidoMayor) {
                echo "<td>" . $linea['IMPORTE'] . "<img src='estrella.png' alt='estrella'/></td>";
            } else {
                echo "<td>" . $linea['IMPORTE'] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }


}