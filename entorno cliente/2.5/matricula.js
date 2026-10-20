
function calcularMatricula(datos) {

    // 1. Validar los datos
    if (datos === null || typeof datos !== "object") {
        return { valido: false, error: "Parámetros de matrícula inválidos." };
    }

    // 2. Validar el precio base
    if (typeof datos.precioBase !== "number" || datos.precioBase <= 0) {
        return { valido: false, error: "El precio base debe ser un número positivo." };
    }

    // 3. Validar el tipo de estudiante
    if (!["general", "desempleado", "socio"].includes(datos.tipoEstudiante)) {
        return { valido: false, error: "Tipo de estudiante no reconocido." };
    }

    // 4. Calcular el descuento según el tipo de estudiante
    let descuentoPorcentaje = 0;

    if (datos.tipoEstudiante === "desempleado") {
        descuentoPorcentaje = 0.30;
    }

    if (datos.tipoEstudiante === "socio") {
        descuentoPorcentaje = 0.15;
    }

    // 5. Calcular el importe final
    let total = datos.precioBase * (1 - descuentoPorcentaje);

    if (datos.codigoDescuento === "WEB2026") {
        total = total - 10;
    }

    if (total < 0) {
        total = 0;
    }

    return { valido: true, total: total };
}
