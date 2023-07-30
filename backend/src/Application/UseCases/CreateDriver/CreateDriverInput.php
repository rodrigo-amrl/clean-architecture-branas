<?php

namespace Src\Application\UseCases\CreateDriver;

class CreateDriverInput
{

    public function __construct(
        public string $name,
        public string $email,
        public string $document,
        public string $car_plate
    ) {
    }
}
