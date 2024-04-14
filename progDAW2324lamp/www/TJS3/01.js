
let numeros = [];
let suma = 0;

for (let i = 0; i < 5; i++) {
    numeros.push(parseInt(prompt("Ingrese el número " + (i + 1) + ":")));
    suma += numeros[i];
}

let media = suma / 5;

document.getElementById("salidas").innerHTML = 
"El vector ingresado es: [" + numeros.join(", ") + "]<br>La media aritmética es: " + media;