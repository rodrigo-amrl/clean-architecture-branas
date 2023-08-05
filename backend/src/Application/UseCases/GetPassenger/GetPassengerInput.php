<?php

namespace Src\Application\UseCases\GetPassenger;

class GetPassengerInput
{
    public function __construct(public  string $passenger_id)
    {
    }
}
