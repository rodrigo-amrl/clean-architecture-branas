<?php

namespace Src\Application\UseCases\GetDriver;

class GetDriverOutput
{

    public function __construct(
        public string $name,
        public string $email,
        public string $document,
        public string $car_plate
    ) {
    }
}
