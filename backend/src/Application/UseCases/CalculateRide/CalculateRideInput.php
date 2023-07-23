<?php

namespace Src\Application\UseCases\CalculateRide;

class CalculateRideInput
{
    public  $positions;
    public function __construct(CalculateRidePositionInput ...$positions)
    {
        $this->positions =  $positions;
    }
}
