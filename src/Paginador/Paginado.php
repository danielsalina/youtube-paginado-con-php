<?php

namespace App;

class Paginado {
  
  public function __construct(private $totalItems, private $itemsPorPagina = 5) {}


  public function calcularPaginas()
  {
      return ceil($this->totalItems / $this->itemsPorPagina);
  }

  public function obtenerOffset($paginaActual)
  {
      return ($paginaActual - 1) * $this->itemsPorPagina;
  }

  public function generarLinks($paginaActual, $urlBase)
  {
      $totalPaginas = $this->calcularPaginas();
      $links = '';

      for ($i = 1; $i <= $totalPaginas; $i++) {
          $activeClass = ($i == $paginaActual) ? 'active' : '';
          $links .= "<li class='page-item $activeClass'><a class='page-link' href='{$urlBase}?page={$i}'>{$i}</a></li>";
      }

      return $links;
  }
}