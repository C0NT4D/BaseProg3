
let array1 = [];
let array2 = [];
let producto = 1;

document.getElementById("salidas").innerHTML = "Ingrese elementos para el primer array (0 para terminar):<br>";
let elemento = parseInt(prompt("Ingrese un número para el primer array (0 para terminar):"));
while (elemento !== 0) {
    array1.push(elemento);
    elemento = parseInt(prompt("Ingrese un número para el primer array (0 para terminar):"));
}

elemento = parseInt(prompt("Ingrese un número para el segundo array (0 para terminar):"));
while (elemento !== 0) {
    array2.push(elemento);
    elemento = parseInt(prompt("Ingrese un número para el segundo array (0 para terminar):"));
}

if (array1.length !== array2.length) {
    document.getElementById("salidas").innerHTML += "<br>Los arrays proporcionados no tienen la misma longitud.";
} else {
    for (let i = 0; i < array1.length; i++) {
        producto *= array1[i] * array2[i];
    }

    document.getElementById("salidas").innerHTML += "<br>El producto de los elementos en la misma posición es:" + producto;
}
