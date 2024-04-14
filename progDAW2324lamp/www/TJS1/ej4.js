
        let ancho = parseFloat(prompt("Ingrese el ancho del rectángulo:"));
        let largo = parseFloat(prompt("Ingrese el largo del rectángulo:"));
        let a = parseFloat(prompt("Ingrese el valor de 'a':"));

        let arearect =  ancho * largo;
        let cateto1 = a - ancho ;
        let areatring = (largo * cateto1) / 2;
        let areaTotal = arearect + areatring;

        document.write(areaTotal);
