<?php

namespace Src\Infra\Http;

use Src\Application\UseCases\CalculateRide\CalculateRideInput;
use Src\Application\UseCases\CalculateRide\CalculateRidePositionInput;
use Src\Application\UseCases\CalculateRide\CalculateRideUseCase;


class MainController
{

    public function __construct(
        protected RouteInterface $route

    ) {

        $route::get('/teste/{id}', function ($id) {
            $output = CalculateRideUseCase::execute(new CalculateRideInput(...[
                new CalculateRidePositionInput(lat: 4, long: 1, date: '2023')
            ]));
            return $output;
        });
    }
}
