<?php
require_once "autoloader.php";
$modelo = new Modelo();
// eje 2
$modelo->showAllProducts();
// eje 3
$modelo->showAllEmp();
// eje 4
$modelo->showAllCliente('ASC');
// eje 5
$modelo->showPedidoOver(100);
// eje 6
$modelo->showLineasPedido(5);