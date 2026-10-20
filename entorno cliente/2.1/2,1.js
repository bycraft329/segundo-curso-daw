
function calcularDescuento(PrecioBase) {
    const porcentaje = 0.15;

    if (PrecioBase > 100) {
        alert("Descuento aplicado");
        return PrecioBase * porcentaje;
    }

    return 0;
}

console.log(calcularDescuento(150));