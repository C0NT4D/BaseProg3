let tipoTarjeta=parseInt(prompt("¿Cual es tu tipo de tarjeta?"));
let creditoInicial=parseInt(prompt("¿Cuanto credito tienes?"));
let aumento;
let creditoFinal;


switch (tipoTarjeta) {
    case 1:
        aumento=creditoInicial*0.25;
        creditoFinal=creditoInicial+aumento;
    
        break;
    case 2:
        aumento=creditoInicial*0.35;
        creditoFinal=creditoInicial+aumento;
        break;
    case 3:
        aumento=creditoInicial*0.40;
        creditoFinal=creditoInicial+aumento;
        break;
    case tipoTarjeta>3 :
        aumento=creditoInicial*0.5;
        creditoFinal=creditoInicial+aumento;
        break;
   
}
document.getElementById("entradas").innerHTML = "¿Cual es tu tipo de tarjeta?" + tipoTarjeta + "<br>" +
"¿Cuanto credito tienes?" + creditoInicial+"<br>";

document.getElementById("salidas").innerHTML = "Aumento: " + aumento + "<br>" +
    "Credito Final" + creditoFinal+"<br>";