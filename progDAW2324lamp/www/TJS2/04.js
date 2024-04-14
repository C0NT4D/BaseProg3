let zona = parseInt(prompt("¿De qué zona eres?"));
let peso = parseInt(prompt("¿Qué peso quieres?"));
let ubicacion;
let costo;

if (peso >= 5) {

     switch (zona) {
        case 1:
            costo = peso * 11;
            ubicacion = "America";
            break;
        case 2:
            costo = peso * 10;
            ubicacion = "Africa";
            break;
        case 3:
            costo = peso * 12;
            ubicacion = "Oceania";
            break;
        case 4:
            costo = peso * 24;
            ubicacion = "Europa";
            break;
        case 5:
            costo = peso * 27;
            ubicacion = "Asia";
            break;
    }
    
} else {
    ubicacion = "El peso del paquete no supera los 5 Kg";
}
    
   


document.getElementById("entradas").innerHTML = "De qué zona eres?: " + zona + "<br>";

document.getElementById("salidas").innerHTML = "Tu ubicación: " + ubicacion + "<br>" +
    "Coste paquete: " + costo+"<br>";