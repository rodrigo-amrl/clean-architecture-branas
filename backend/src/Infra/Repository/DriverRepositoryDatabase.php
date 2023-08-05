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
		$insert = [
			$driver->driver_id,
			$driver->name,
			$driver->email->value,
			$driver->document->value,
			$driver->car_plate->value
		];

		$this->connection->query(
			"insert into drivers (driver_id, name, email, document, car_plate) values (?, ?, ?, ?, ?)",
			$insert

		);
	}
	public function  get(string $driver_id): Driver
	{
		$this->connection->query("select * from drivers where driver_id = ?", [$driver_id]);

		$driver_data = $this->connection->getRow();
		return new Driver(
			$driver_data->driver_id,
			$driver_data->name,
			$driver_data->email,
			$driver_data->document,
			$driver_data->car_plate
		);
	}
}
