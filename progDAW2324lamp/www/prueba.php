<?php

$dPoder1j1 = 1;
$dPoder2j1 = 5;
$dPoder3j1 = 10;

$dPoder1j2 = 1;
$dPoder2j2 = 5;
$dPoder3j2 = 10;
$vidaj1 = 100;
$vidaj2 = 100;

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Barras y Botones</title>
<style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        height: 100vh;
    }
    #container {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .barra {
        height: 10px;
    }
    #barraVerde {
        background-color: green;
        width: 50%;
        padding: 10px; 
    }
    #barraBlanca {
        flex: 1;
        background-color: white;
    }
    #barraAzul {
        background-color: blue;
        width: 50%;
        padding: 10px; 
    }
    #botones {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 20px;
    }
    .boton {
        padding: 10px 20px;
        background-color: #ccc;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
</head>
<body>
    <div id="container">
        <div id="barraVerde" class="barra"></div>
        <div id="barraBlanca" class="barra"></div>
        <div id="barraAzul" class="barra"></div>
    </div>
    <div id="botones">
        <div>
            <button class="boton" onclick="botonClickeado(1,1)">poder1</button>
            <button class="boton" onclick="botonClickeado(2,1)">poder 2</button>
            <button class="boton" onclick="botonClickeado(3,1)">poder 3</button>
        </div>
        <div>
            <button class="boton" onclick="botonClickeado(1,2)">poder 1</button>
            <button class="boton" onclick="botonClickeado(2,2)">poder 2</button>
            <button class="boton" onclick="botonClickeado(3,2)">poder 3</button>
        </div>
    </div>
    <script>

        let poderesJ1 = [<?php echo $dPoder1j1; ?>, <?php echo $dPoder2j1; ?>, <?php echo $dPoder3j1; ?>];
        let poderesJ2 = [<?php echo $dPoder1j2; ?>, <?php echo $dPoder2j2; ?>, <?php echo $dPoder3j2; ?>];
        let vidaj1 = <?php echo $vidaj1; ?>;
        let vidaj2 = <?php echo $vidaj2; ?>;

        function botonClickeado(numero, jugador) {
            let poderes;
            if (jugador === 1) {
                poderes = poderesJ1;
            } else {
                poderes = poderesJ2;

            }
            let daño = poderes[numero - 1];

            if (jugador === 1) {
                vidaj2 -= daño;
            } else {
                vidaj1 -= daño;
            }

            let porcentaje = 0;
            if (jugador === 1) {
                porcentaje = (vidaj2 * 100) / <?php echo $vidaj2; ?>;
            } else {
                porcentaje = (vidaj1 * 100) / <?php echo $vidaj1; ?>;
            }
            cambiarTamaño(porcentaje, jugador);
        }

        function cambiarTamaño(nuevo, jugador) {
            let barraVerde = document.getElementById("barraVerde");
            let barraAzul = document.getElementById("barraAzul");
            let nuevoPorcentaje = (nuevo /2) + "%";
            if (jugador === 1) {
                barraAzul.style.width = (nuevoPorcentaje);
                document.getElementById("pepe").innerHTML= nuevoPorcentaje;
            } else {
                barraVerde.style.width = (nuevoPorcentaje);
                document.getElementById("pepe2").innerHTML= nuevoPorcentaje;

            }
        }
    </script>
</body>
</html>