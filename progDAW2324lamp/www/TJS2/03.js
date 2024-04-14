let articulo = parseInt(prompt("Que articulo quieres? 1,2,3,4,5 o 6:"));
let materiaPrima = parseInt(prompt("Que coste de materia prima es?:"));
let manoObra;
let gastoFab;


switch (articulo) {
    case 3:
    case 4:
        manoObra = materiaPrima * 0.75;
        break;
    case 1:
    case 5:
        manoObra = materiaPrima * 0.8;
        break;
    case 2:
    case 6:
        manoObra = materiaPrima * 0.85;
        break;
    default:
        alert("Tipo de articulo no válido.");
}



switch (articulo) {
    case 2:
    case 5:
        gastoFab = materiaPrima * 0.3;
        break;
    case 3:
    case 6:
        gastoFab = materiaPrima * 0.35;
        break;
    case 1:
    case 4:
        gastoFab = materiaPrima * 0.28;
        break;
    default:
        alert("Tipo de articulo no válido.");
}
let costeProd = materiaPrima + manoObra + gastoFab;
let precioVenta = costeProd + (costeProd * 0.45);


document.getElementById("entradas").innerHTML = "Articulo a elegir: " + articulo + "<br>" +
    "Coste de Materia Prima: " + materiaPrima + "<br>";

document.getElementById("salidas").innerHTML = "Coste de Produccion: " + costeProd + "€<br>" +
    "Precio de Venta: " + precioVenta + "€<br>";
