<div class="container">
  <ul class="list-group">
    <?php foreach ($productos as $producto): ?>
      <li class="list-group-item">
        <strong><?= htmlspecialchars($producto["nombre"]) ?> </strong><br>
        Precio: <?= number_format($producto["precio"], 2) ?> $
      </li>
      <?php endforeach; ?>
  </ul>

  <nav aria-label="Page navigation" class="my-4">
      <ul class="pagination">
        <?= $paginador->generarLinks($paginaActual, $urlBase) ?>
      </ul>
  </nav>
</div>