<?php

namespace Src\Application\UseCases\GetDriver;

class GetDriverInput
{
    public function __construct(public  string $driver_id)
    {
    }
}
