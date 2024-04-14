
    let cantidad = parseInt(prompt("Ingresa el numero de Hamburguesas a pedir:"));
    let tipoHamburguesa = prompt("¿Qué tipo de Hamburguesa deseas? Sencillas, Dobles o Triples.");
    let precio;

    switch (tipoHamburguesa()) {
        case "sencillas":
            precio = 20;
            break;
        case "dobles":
            precio = 25;
            break;
        case "triples":
            precio = 28;
            break;
        default:
            alert("Tipo de hamburguesa no válido.");
    }

    let precioTotal = precio * cantidad;
    let cargo = precioTotal * 0.05;
    let precioFinal = cargo + precioTotal;

    document.getElementById("entradas").innerHTML = "Cantidad de hamburguesas: " + cantidad + "<br>" +
        "Tipo de hamburguesa: " + tipoHamburguesa + "<br>";

        document.getElementById("salidas").innerHTML = "Coste por Hamburguesa: " + precio + "€<br>" +
        "Costo total sin cargo: " + precioTotal + "€<br>" +
        "Cargo por tarjeta (5%): " + cargo + "€<br>" + 
        "Costo total con cargo: " + precioFinal + "€";
    