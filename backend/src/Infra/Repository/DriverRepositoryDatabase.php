<?php

namespace Src\Infra\Repository;

use Src\Application\Repository\DriverRepository;
use Src\Domain\Driver;
use Src\Infra\database\DatabaseConnectionInterface;

class DriverRepositoryDatabase implements DriverRepository
{

	public function __construct(protected DatabaseConnectionInterface $connection)
	{
	}
	public function  save(Driver $driver): void
	{
		$this->connection->query(
			"insert into cccat12.driver (driver_id, name, email, document, car_plate) values ($1, $2, $3, $4, $5)",
			[$driver->driverId, $driver->name, $driver->email->value, $driver->document->value, $driver->carPlate->value]
		);
	}
	public function  get(string $driver_id): Driver
	{
		$driver_data =  $this->connection->query("select * from cccat12.driver where driver_id = $1", [$driver_id]);
		return new Driver(
			$driver_data->driver_id,
			$driver_data->name,
			$driver_data->email,
			$driver_data->document,
			$driver_data->car_plate
		);
	}
}
