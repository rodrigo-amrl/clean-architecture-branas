<?php

namespace Src\Config;

use Pecee\SimpleRouter\SimpleRouter;
use Src\Infra\Http\Controllers\MainController;

SimpleRouter::get('/', [MainController::class, 'index']);

SimpleRouter::setDefaultNamespace(MainController::class);
// Start the routing
SimpleRouter::start();
