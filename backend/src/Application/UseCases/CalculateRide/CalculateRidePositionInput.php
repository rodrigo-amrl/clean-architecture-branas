<?php

namespace Src\Application\UseCases\CalculateRide;

use DateTimeImmutable;

class CalculateRidePositionInput
{

    public function __construct(public float $lat, public float $long,public string  $date)
    {
    }
}
