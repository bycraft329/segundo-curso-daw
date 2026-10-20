<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Metadatos básicos requeridos para la validación W3C -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicios Iniciales</title>

  <!-- CSS de Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <!-- Contenido principal de la página -->
  <main class="container my-5">
    
    <header class="mb-4 text-center">
      <h1 class="display-5">Ejercicios Iniciales</h1>
      <p class="text-muted">Nombre: Óscar Ruiz Felipe</p>
      <p class="text-muted">Curso: 2ºDAW</p>
      <p class="text-muted">Módulo: Desarrollo web entorno servidor (DWES)</p>
    </header>

    <ul class="nav nav-tabs mb-4" id="ejerciciosTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="tab-ejercicio-1" data-bs-toggle="tab" data-bs-target="#ejercicio-1" type="button" role="tab" aria-controls="ejercicio-1" aria-selected="true">
          Ejercicio 1
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="tab-ejercicio-2" data-bs-toggle="tab" data-bs-target="#ejercicio-2" type="button" role="tab" aria-controls="ejercicio-2" aria-selected="false">
          Ejercicio 2
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="tab-ejercicio-3" data-bs-toggle="tab" data-bs-target="#ejercicio-3" type="button" role="tab" aria-controls="ejercicio-3" aria-selected="false">
          Ejercicio 3
        </button>
      </li>
    </ul>

    <div class="tab-content" id="ejerciciosTabContent">
      <div class="tab-pane fade show active" id="ejercicio-1" role="tabpanel" aria-labelledby="tab-ejercicio-1">
        <div class="card shadow-sm">
          <div class="card-body text-center">
            <?php
              $numeroAleatorio = rand(1, 1000);
              $porcentaje = rand(200, 800);
  
            
              echo "<div style='font-size: " . $porcentaje . "%; color: #0d6efd;'>" . $numeroAleatorio . "</div>";
              echo "<p class='mt-3 text-secondary'>Tamaño actual: " . $porcentaje . "%</p>";
            ?>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="ejercicio-2" role="tabpanel" aria-labelledby="tab-ejercicio-2">
        <div class="card shadow-sm">
          <div class="card-body text-center">
            <?php
              $codigo = rand(128512, 128586);
              $emoji = mb_chr($codigo, 'UTF-8');

              echo "<h2 class='h4 text-success mb-3'>Emoticono aleatorio</h2>";
              echo "<div style='font-size: 5rem; line-height: 1;'>" . $emoji . "</div>";
             
            ?>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="ejercicio-3" role="tabpanel" aria-labelledby="tab-ejercicio-3">
        <div class="card shadow-sm">
          <div class="card-body">
            <?php
              $frase = "this is a test";
              echo "La frase es: {$frase}<br>";
              echo "contar cantidad de 't' en la frase.<BR>";
              $contador = substr_count(strtolower($frase), 't');
              echo "La cantidad de 't' en la frase es: {$contador}";
            ?>
          </div>
        </div>
      </div>
    </div>

  </main>

  <!-- JavaScript de Bootstrap (necesario para la interactividad) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>