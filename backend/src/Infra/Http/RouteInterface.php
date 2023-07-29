<?php

namespace Src\Infra\Http;

interface RouteInterface
{

    public static function post(string $url, $calback, array $settings = []);
    public static function get(string $url, $calback);
    public function start();
}
