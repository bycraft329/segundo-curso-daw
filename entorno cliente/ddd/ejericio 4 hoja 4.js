
const fecha = new Date(2013, 10, 22, 1, 4); 
console.log(formatearFechaEspanola(fecha));


function formatearFechaEspanola(fecha) {
    const diaFormateado = fecha.getDate().toString().padStart(2, '0');
    const mesFormateado = (fecha.getMonth() + 1).toString().padStart(2, '0');
    const añoFormateado = fecha.getFullYear();
    const horaFormateada = fecha.getHours().toString().padStart(2, '0');
    const minutosFormateados = fecha.getMinutes().toString().padStart(2, '0');
    return `${diaFormateado}/${mesFormateado}/${añoFormateado} ${horaFormateada}:${minutosFormateados}`;
}

