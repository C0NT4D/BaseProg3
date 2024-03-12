<?php

if(!isset($_COOKIE['ivan'])){
    echo "la  cookie ivan no existe";
} else{
    echo " Valor: ". $_COOKIE["ivan"];
}