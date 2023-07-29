<?php

namespace Src\Infra\Http;

use Pecee\SimpleRouter\SimpleRouter;

class SimpleRouteAdapter implements RouteInterface
{

    public static function post(string $url, $calback, array $settings = [])
    {
        die('post');
    }
    public static function get(string $url, $calback)
    {
        SimpleRouter::get($url, $calback);
    }
    public static function setDefaultNamespace(string $url, $calback)
    {
    }
    public function start()
    {
        SimpleRouter::start();
    }
}
