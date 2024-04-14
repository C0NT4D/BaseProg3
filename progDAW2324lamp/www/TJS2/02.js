let cita = parseInt(prompt("Ingresa el número de su cita:"));
let precio;
let precioTotal = 0;

let contador = 1;
let precioInicial = 200;

while (contador <= cita) {
    if (contador <= 3) {
        precio = 200;
    } else if (contador <= 5) {
        precio = 150;
    } else if (contador <= 8) {
        precio = 100;
    } else {
        precio = 50;
    }

    precioTotal += precio;
    contador++;
}

document.getElementById("entradas").innerHTML = "Numero de Cita: " + cita + "<br>";

document.getElementById("salidas").innerHTML = "Precio Unitario: " + precioInicial + "€<br>" +
    "Precio Total: " + precioTotal + "€<br>";
