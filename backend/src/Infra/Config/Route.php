<?php

namespace Src\Config;

use Pecee\SimpleRouter\SimpleRouter;
use Src\Infra\Http\Controllers\MainController;

SimpleRouter::get('/', [MainController::class, 'index']);
SimpleRouter::post("/calculate-ride", MainController::class);

SimpleRouter::setDefaultNamespace(MainController::class);
SimpleRouter::start();
