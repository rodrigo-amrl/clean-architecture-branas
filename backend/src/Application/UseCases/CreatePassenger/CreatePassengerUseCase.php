<?php

namespace Src\Application\UseCases\CreatePassenger;

use Src\Application\Repository\PassengerRepository;
use Src\Domain\Passenger;

class CreatePassengerUseCase
{

    public function __construct(protected PassengerRepository $passengerRepository)
    {
    }
    public function execute(CreatePassengerInput $input)
    {
        $passenger  = Passenger::create($input->name, $input->email, $input->document);
        $this->passengerRepository->save($passenger);

        return new CreatePassengerOutput($passenger->passenger_id);
    }
}
