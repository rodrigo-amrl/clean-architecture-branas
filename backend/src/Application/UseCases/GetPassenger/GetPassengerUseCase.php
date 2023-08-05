<?php

namespace Src\Application\UseCases\GetPassenger;

use Src\Application\Repository\PassengerRepository;
use Src\Application\UseCases\GetPassenger\GetPassengerOutput;

class GetPassengerUseCase
{

    public function __construct(protected PassengerRepository $driverRepository)
    {
    }
    public function execute(GetPassengerInput $input)
    {
        $driver =  $this->driverRepository->get($input->passenger_id);

        return new GetPassengerOutput(
            name: $driver->name,
            email: $driver->email->value,
            document: $driver->document->value
        );
    }
}
