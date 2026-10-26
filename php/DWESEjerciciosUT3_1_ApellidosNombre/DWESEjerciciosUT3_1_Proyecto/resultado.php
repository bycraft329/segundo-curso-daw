<?php
declare(strict_types=1);
$raw = $_POST['numero'] ?? null;
$valid = $_SERVER['REQUEST_METHOD'] === 'POST' && is_string($raw) && filter_var($raw, FILTER_VALIDATE_INT) !== false && (int)$raw >= 0;
$number = $valid ? (int)$raw : 0;
$sum = 0;
if ($valid) {
    for ($i = 0; $i < $number; $i += 2) { $sum += $i; }
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Resultado · Ejercicio 4</title><link rel="stylesheet" href="assets/style.css"></head>
<body><main class="container"><header class="hero"><p class="eyebrow">Estructuras de control con PHP</p><h1>Ejercicio 4 · Resultado</h1></header><section class="panel">
<?php if (!$valid): ?><p class="error">No se ha enviado un número entero no negativo válido.</p>
<?php else: ?><p>La suma de los números pares anteriores a <strong><?= $number ?></strong> es:</p><p class="result"><strong><?= $sum ?></strong></p><?php endif; ?>
<p><a href="index.php?tab=4">← Volver al formulario del ejercicio 4</a></p>
</section></main></body>
</html>
