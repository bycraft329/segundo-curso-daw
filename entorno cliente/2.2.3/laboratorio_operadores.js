
function procesarEvaluacion() {
    const txtA = document.getElementById("campoValor1").value.trim();
    const txtB = document.getElementById("campoValor2").value.trim();
    const visor = document.getElementById("pantallaSalida");

    let valA, valB;

    try {
        valA = JSON.parse(txtA);
    } catch (e) {
        valA = txtA;
    }

    try {
        valB = JSON.parse(txtB);
    } catch (e) {
        valB = txtB;
    }

    const tipoA = typeof valA;
    const tipoB = typeof valB;

    const igualdadAbstracta = valA == valB;
    const igualdadEstricta = valA === valB;
    const operacionOr = valA || valB;
    const operacionNullish = valA ?? valB;

    // Modificación 1: AND y doble negación
    const operacionAnd = valA && valB;
    const negacionDoble = !!valA;

    // Modificación 2: aviso sobre números demasiado grandes
    let avisoBigInt = "";

    if (typeof valA === "number" &&
        Math.abs(valA) > Number.MAX_SAFE_INTEGER) {
        avisoBigInt = "Aviso: Precisión comprometida. Utiliza BigInt (sufijo n) para operar en este rango";
    }

    visor.innerHTML = `
        <strong>Operando A:</strong> ${String(valA)} (typeof: ${tipoA})<br>
        <strong>Operando B:</strong> ${String(valB)} (typeof: ${tipoB})<br>
        --------------------------------------------------<br>
        <strong>Igualdad abstracta (A == B):</strong> ${igualdadAbstracta}<br>
        <strong>Igualdad estricta (A === B):</strong> ${igualdadEstricta}<br>
        <strong>Cortocircuito OR (A || B):</strong> ${String(operacionOr)}<br>
        <strong>Coalescencia nula (A ?? B):</strong> ${String(operacionNullish)}<br>
        <strong>Operador AND (A && B):</strong> ${String(operacionAnd)}<br>
        <strong>Doble negación (!!A):</strong> ${negacionDoble}<br>
        <strong>${avisoBigInt}</strong>
    `;
}

document.getElementById("btnEvaluar")
    .addEventListener("click", procesarEvaluacion);