<?php

namespace Src\Application\UseCases\CreatePassenger;

class CreatePassengerInput
{

    public function __construct(
        public string $name,
        public string $email,
        public string $document
    ) {
    }
}
