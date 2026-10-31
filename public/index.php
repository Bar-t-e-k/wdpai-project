<?php

declare(strict_types=1);

use App\Controller\DefaultController;
use App\Controller\AuthController;
use App\Controller\PlaceController;
use App\Routing;

require_once dirname(__DIR__) . '/vendor/autoload.php';

session_start();

$routing = new Routing();

$routing->get('/', DefaultController::class, 'index');
$routing->get('/about', DefaultController::class, 'about');
$routing->get('/places', PlaceController::class, 'list');

$routing->get('/login', AuthController::class, 'login');
$routing->post('/login', AuthController::class, 'login');
$routing->get('/logout', AuthController::class, 'logout');
$routing->get('/places/add', PlaceController::class, 'add');
$routing->post('/places/add', PlaceController::class, 'add');
$routing->get('/places/{id}', PlaceController::class, 'show');

$routeFound = $routing->dispatch(
    $_SERVER['REQUEST_METHOD'],
    $_SERVER['REQUEST_URI']
);

if (!$routeFound) {
    http_response_code(404);
    (new DefaultController())->notFound();
}