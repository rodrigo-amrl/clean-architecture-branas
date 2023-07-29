<?php

use Src\Infra\Http\MainController;
use Src\Infra\Http\SimpleRouteAdapter;

$router = new SimpleRouteAdapter();
new MainController($router);
$router->start();
