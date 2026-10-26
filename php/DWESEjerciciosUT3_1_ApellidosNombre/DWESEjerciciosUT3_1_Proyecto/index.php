<?php
declare(strict_types=1);
$tab = filter_input(INPUT_GET, 'tab', FILTER_VALIDATE_INT);
$tab = ($tab !== false && $tab !== null && $tab >= 1 && $tab <= 8) ? $tab : 1;
function e(string $value): string { return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
function numberInput(string $name): string {
    $value = $_POST[$name] ?? '';
    return is_string($value) ? $value : '';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UT3_1 · Estructuras de control</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<main class="container">
    <header class="hero">
        <p class="eyebrow">Desarrollo web en entorno servidor · 2.º DAW</p>
        <h1>Ejercicios UT3_1</h1>
        <p>Estructuras de control con PHP</p>
    </header>
    <nav class="tabs" aria-label="Seleccionar ejercicio">
        <?php for ($i = 1; $i <= 8; $i++): ?>
            <a href="?tab=<?= $i ?>" <?= $tab === $i ? 'aria-current="page" class="selected"' : '' ?>>Ejercicio <?= $i ?></a>
        <?php endfor; ?>
    </nav>
    <section class="panel" aria-labelledby="exercise-title">
        <div class="heading"><h2 id="exercise-title">Ejercicio <?= $tab ?></h2><span><?= $tab >= 7 ? 'Obligatorio' : 'Opcional' ?></span></div>
        <?php switch ($tab):
            case 1: ?>
                <p>Al recargar la página, se lanza una moneda al aire.</p>
                <?php $coin = random_int(0, 1); ?>
                <figure class="coin"><img width="190" height="190" src="assets/<?= $coin === 0 ? 'cara.svg' : 'cruz.svg' ?>" alt="Moneda mostrando <?= $coin === 0 ? 'cara' : 'cruz' ?>"><figcaption>Ha salido <strong><?= $coin === 0 ? 'cara' : 'cruz' ?></strong>.</figcaption></figure>
                <?php break;
            case 2:
                $grade = random_int(1, 10);
                if ($grade < 5) { $label = 'Insuficiente'; }
                elseif ($grade < 6) { $label = 'Suficiente'; }
                elseif ($grade < 7) { $label = 'Bien'; }
                elseif ($grade < 9) { $label = 'Notable'; }
                else { $label = 'Sobresaliente'; } ?>
                <p>Se ha generado una nota aleatoria entre 1 y 10.</p><p class="result">Nota: <strong><?= $grade ?></strong> — <?= $label ?></p>
                <?php break;
            case 3:
                $submitted = isset($_POST['check_numbers']);
                $values = [numberInput('a'), numberInput('b'), numberInput('c')];
                $valid = $submitted;
                foreach ($values as $value) { if ($value === '' || filter_var($value, FILTER_VALIDATE_INT) === false || (int)$value < 0) { $valid = false; } } ?>
                <p>Introduce tres números enteros no negativos para comprobar cuáles coinciden.</p>
                <form method="post" action="?tab=3" class="form-grid">
                    <?php foreach (['a', 'b', 'c'] as $index => $field): ?><label>Número <?= $index + 1 ?><input type="number" min="0" step="1" required name="<?= $field ?>" value="<?= e($values[$index]) ?>"></label><?php endforeach; ?>
                    <button type="submit" name="check_numbers" value="1">Comprobar</button>
                </form>
                <?php if ($submitted): ?>
                    <?php if (!$valid): ?><p class="error">Introduce tres números enteros iguales o superiores a cero.</p>
                    <?php else:
                        [$a, $b, $c] = array_map('intval', $values);
                        if ($a === $b && $b === $c) { $message = "Hay tres números iguales a $a."; }
                        elseif ($a === $b || $a === $c) { $message = "Hay dos números iguales a $a."; }
                        elseif ($b === $c) { $message = "Hay dos números iguales a $b."; }
                        else { $message = 'No hay números iguales.'; } ?>
                        <p class="result"><?= e($message) ?></p>
                    <?php endif; ?>
                <?php endif; ?>
                <?php break;
            case 4: ?>
                <p>Calcula la suma de todos los números pares no negativos anteriores al que indiques. El resultado se muestra en otra página.</p>
                <form method="post" action="resultado.php" class="form-grid">
                    <label>Número entero<input type="number" name="numero" min="0" step="1" required></label>
                    <button type="submit">Calcular suma</button>
                </form>
                <?php break;
            case 5: ?>
                <p>Tabla de códigos Unicode del 0 al 50000. Los puntos de código no admitidos en HTML se identifican sin generar referencias numéricas inválidas.</p>
                <p class="hint">Esta tabla contiene 50.001 filas y puede tardar en mostrarse.</p>
                <div class="large-table"><table><thead><tr><th scope="col">Número</th><th scope="col">Entidad HTML</th><th scope="col">Carácter</th></tr></thead><tbody>
                <?php for ($code = 0; $code <= 50000; $code++):
                    $allowed = ($code === 9 || $code === 10 || $code === 13 || $code >= 32) && !($code >= 0xD800 && $code <= 0xDFFF) && !($code >= 0x7F && $code <= 0x9F) && !($code >= 0xFDD0 && $code <= 0xFDEF) && (($code & 0xFFFF) !== 0xFFFE) && (($code & 0xFFFF) !== 0xFFFF);
                    // Los caracteres de control permitidos no tienen representación visual significativa.
                    $visible = $allowed && !in_array($code, [9,10,13], true);
                    ?>
                    <tr><td><?= $code ?></td><td><?= $allowed ? e('&#' . $code . ';') : 'No válido' ?></td><td><?= $visible ? '&#' . $code . ';' : '—' ?></td></tr>
                <?php endfor; ?>
                </tbody></table></div>
                <?php break;
            case 6:
                $number = random_int(1, 10); ?>
                <p>Tabla de multiplicar de un número aleatorio entre 1 y 10.</p>
                <h3>Tabla del <?= $number ?></h3>
                <table class="short-table"><thead><tr><th scope="col">Operación</th><th scope="col">Resultado</th></tr></thead><tbody>
                <?php for ($i = 1; $i <= 10; $i++): ?><tr><td><?= $number ?> × <?= $i ?></td><td><?= $number * $i ?></td></tr><?php endfor; ?>
                </tbody></table>
                <?php break;
            case 7:
                $count = random_int(7, 20);
                $fruits = [];
                for ($i = 0; $i < $count; $i++) { $fruits[] = random_int(127815, 127827); }
                $selected = random_int(127815, 127827);
                $total = 0;
                foreach ($fruits as $fruit) { if ($fruit === $selected) { $total++; } } ?>
                <h3>Busca la fruta</h3><p>Actualiza la página para mostrar otra búsqueda.</p><p><strong><?= $count ?> frutas</strong></p>
                <div class="fruits" aria-label="Colección de <?= $count ?> frutas">
                    <?php foreach ($fruits as $fruit): ?><span aria-label="Fruta Unicode <?= $fruit ?>" title="Código <?= $fruit ?>"><?= '&#' . $fruit . ';' ?></span><?php endforeach; ?>
                </div>
                <p class="result">La fruta <span class="emoji"><?= '&#' . $selected . ';' ?></span> aparece <strong><?= $total ?></strong> <?= $total === 1 ? 'vez' : 'veces' ?> en la lista.</p>
                <?php break;
            case 8:
                $emojis = [128169, 128168, 127866, 128405, 129313]; ?>
                <h3>Apartado 1. Números del 1 al 100</h3>
                <div class="table-scroll"><table class="matrix" aria-label="Tabla de números del 1 al 100"><tbody>
                    <?php for ($row = 0; $row < 10; $row++): ?><tr><?php for ($col = 1; $col <= 10; $col++): ?><td><?= $row * 10 + $col ?></td><?php endfor; ?></tr><?php endfor; ?>
                </tbody></table></div>
                <h3>Apartado 2. Emoticonos aleatorios</h3>
                <p>Cada casilla muestra uno de los cinco emoticonos indicados en el enunciado.</p>
                <div class="table-scroll"><table class="matrix matrix-emoji" aria-label="Tabla de emoticonos aleatorios"><tbody>
                    <?php for ($row = 0; $row < 10; $row++): ?><tr><?php for ($col = 0; $col < 10; $col++): ?><td><?= '&#' . $emojis[random_int(0, count($emojis) - 1)] . ';' ?></td><?php endfor; ?></tr><?php endfor; ?>
                </tbody></table></div>
                <?php break;
        endswitch; ?>
    </section>
    <footer>PHP · HTML5 · CSS · Ejercicios UT3_1</footer>
</main>
</body>
</html>
