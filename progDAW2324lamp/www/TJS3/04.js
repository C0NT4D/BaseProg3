
let tamanoArray = parseInt(prompt("Ingrese el tamaño del array de números primos:"));
let numerosPrimos = [];
let numero = 2;

while (numerosPrimos.length < tamanoArray) {
    let esPrimo = true;
    for (let i = 2; i <= Math.sqrt(numero); i++) {
        if (numero % i === 0) {
            esPrimo = false;
            break;
        }
    }
    if (esPrimo) {
        numerosPrimos.push(numero);
    }
    numero++;
}

document.getElementById("salidas").innerHTML = "Array de números primos:<br>" + numerosPrimos.join(", ");