
let distanciaValencia = 70;
let distanciaBarcelona = 150;
let velocidad = parseFloat(prompt("Ingrese la velocidad en km/h:"));

let tiempo = (distanciaBarcelona - distanciaValencia) / velocidad;
let puntoEncuentro = distanciaValencia + velocidad * tiempo;

document.getElementById("salidas").innerHTML = "El encuentro ocurrirá en el kilómetro " + puntoEncuentro + " de la carretera.";