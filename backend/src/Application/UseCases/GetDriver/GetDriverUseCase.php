<?php

namespace Src\Application\UseCases\GetDriver;

use Src\Application\Repository\DriverRepository;
use Src\Domain\Driver;

class GetDriverUseCase
{

    public function __construct(protected DriverRepository $driverRepository)
    {
    }
    public function execute(GetDriverInput $input)
    {
        $driver =  $this->driverRepository->get($input->driver_id);

        return new GetDriverOutput(
            name: $driver->name,
            email: $driver->email->value,
            document: $driver->document->value,
            car_plate: $driver->car_plate->value
        );
    }
}
