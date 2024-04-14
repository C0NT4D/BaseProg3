
let clasificacion = ["Ana", "Oswaldo", "Raúl", "Celia", "María", "Antonio"];

document.getElementById("salidas").innerHTML = "Clasificación inicial:<br>" + clasificacion.join(", ") + "<br><br>";

// Modificaciones en la clasificación
clasificacion.splice(3, 0, "Celia");
clasificacion.splice(5, 1);
clasificacion.splice(1, 0, "Roberto", "Amaya");
clasificacion.unshift("Marta");

document.getElementById("salidas").innerHTML += "Clasificación actualizada:<br>" + clasificacion.join(", ");