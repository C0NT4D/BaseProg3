
let pagoInicial = 10;
let meses = 20;
let totalPagado = 0;

for (let i = 1; i <= meses; i++) {
    totalPagado += pagoInicial * Math.pow(2, i - 1);
}

let pagoMensual = totalPagado / meses;

document.getElementById("salidas").innerHTML = "Pago mensual: " + pagoMensual + "€<br>Total pagado después de " + meses + " meses: " + totalPagado + "€";