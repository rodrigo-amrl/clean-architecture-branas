<?php

namespace Src\Application\UseCases\GetPassenger;

class GetPassengerOutput
{

    public function __construct(
        public string $name,
        public string $email,
        public string $document
    ) {
    }
}
