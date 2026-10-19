<?php

declare(strict_types=1);

use App\Controller\DefaultController;
use App\Controller\PlaceController;
use App\Routing;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$routing = new Routing();

$routing->get('/', PlaceController::class, 'index');
$routing->get('/places', PlaceController::class, 'list');
$routing->get('/places/add', PlaceController::class, 'add');
$routing->get('/places/{id}', PlaceController::class, 'show');

$routeFound = $routing->dispatch(
    $_SERVER['REQUEST_METHOD'],
    $_SERVER['REQUEST_URI']
);

if (!$routeFound) {
    http_response_code(404);
    (new DefaultController())->notFound();
}