<?php

namespace Src\Config;

use Pecee\SimpleRouter\SimpleRouter;
use Src\Application\Controllers\Controller;

SimpleRouter::get('/', [Controller::class, 'index']);

SimpleRouter::setDefaultNamespace(Controller::class);
// Start the routing
SimpleRouter::start();
