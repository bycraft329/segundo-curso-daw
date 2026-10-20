function obtenerUltimaDiasDelMes(mes, año) {
    switch (mes) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            return 31;
        case 4:
        case 6:
        case 9:
        case 11:
            return 30;
        case 2:
            return 28;

        default: return "Mes no válido";
    }

}

console.log(obtenerUltimaDiasDelMes(2, 2024)); // Devuelve 28
console.log(obtenerUltimaDiasDelMes(4, 2024)); // Devuelve 30
console.log(obtenerUltimaDiasDelMes(13, 2024)); // Devuelve "Mes no válido"
