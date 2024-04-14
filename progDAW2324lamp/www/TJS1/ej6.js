
    let produccionLitros = parseFloat(prompt("Ingrese la producción de leche en litros:"));
    const litrosPorGalon = 1 / 3.785;
    let produccionGalones = produccionLitros * litrosPorGalon;
    console.log("La producción de leche es de", produccionGalones, "galones.");
