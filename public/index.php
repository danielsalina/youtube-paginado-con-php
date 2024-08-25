<?php

require "../vendor/autoload.php";
include "../views/header.php";

use App\Paginado;

$itemsPorPagina = 5;
$paginaActual = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

$pdo = new PDO('mysql:host=localhost;dbname=youtube', 'root', '');

$totalItems = $pdo->query('SELECT COUNT(*) FROM productos')->fetchColumn();

$paginador = new Paginado($totalItems, $itemsPorPagina);
$offset = $paginador->obtenerOffset($paginaActual);

$stmt = $pdo->prepare('SELECT * FROM productos LIMIT :limit OFFSET :offset');
$stmt->bindValue(':limit', $itemsPorPagina, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$urlBase = 'index.php';

include '../views/paginado.php';
include '../views/footer.php';
