<?php

namespace Src\Application\UseCases\CreateDriver;

use Src\Application\Repository\DriverRepository;
use Src\Domain\Driver;

class CreateDriverUseCase
{

    public function __construct(protected DriverRepository $driverRepository)
    {
    }
    public function execute(CreateDriverInput $input)
    {
        $driver  = Driver::create($input->name, $input->email, $input->document, $input->car_plate);
        $this->driverRepository->save($driver);

        return new CreateDriverOutput($driver->driver_id);
    }
}
