
"use strict";

// 1. Demostración de ámbito de bloque e inmutabilidad
var variableGlobal = "Accesible fuera";

{
    let variableLocal = "Aislada en bloque";
    const CONFIG_APP = {
        version: "1.0.0",
        entorno: "test"
    };

    CONFIG_APP.entorno = "produccion";
    console.log("Objeto modificado:", CONFIG_APP);
}

// 2. Comprobaciones con typeof
console.log("typeof 50n:", typeof 50n);
console.log("typeof Symbol():", typeof Symbol());
console.log("typeof null:", typeof null);
console.log("typeof NaN:", typeof NaN);

// 3. Coerción y comparaciones
console.log("5 == '5':", 5 == "5");
console.log("5 === '5':", 5 === "5");
console.log("5 + '5':", 5 + "5");
console.log("5 - '5':", 5 - "5");

// 4. Operadores in, delete e instanceof
const alumno = {
    id: 1001,
    curso: "2 DAW",
    activo: true
};

console.log("¿Tiene propiedad 'curso'?:", "curso" in alumno);

delete alumno.activo;

console.log("Objeto tras borrado:", alumno);
console.log("alumno es instancia de Object:", alumno instanceof Object);