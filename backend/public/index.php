<?php

require_once '../vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('memory_limit', -1);
error_reporting(E_ALL);

define('BASE_DIR', __DIR__);
require_once  '../src/Infra/Config/Route.php';
