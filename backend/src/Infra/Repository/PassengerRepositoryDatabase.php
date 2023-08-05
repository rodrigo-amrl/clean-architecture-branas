<?php

namespace Src\Infra\Repository;

use Src\Application\Repository\PassengerRepository;
use Src\Domain\Passenger;
use Src\Infra\database\DatabaseConnectionInterface;

class PassengerRepositoryDatabase implements PassengerRepository
{

	public function __construct(protected DatabaseConnectionInterface $connection)
	{
	}

	public function save(Passenger $passenger): void
	{
		$this->connection->query(
			"insert into passengers (passenger_id, name, email, document) values 
		(?,?,?,?)",
			[$passenger->passenger_id, $passenger->name, $passenger->email->value, $passenger->document->value]
		);
	}

	public function get(string $passenger_id): Passenger
	{
		$this->connection->query("select * from passengers where passenger_id = ?", [$passenger_id]);
		$passenger_data = $this->connection->getRow();
		return new Passenger($passenger_data->passenger_id, $passenger_data->name, $passenger_data->email, $passenger_data->document);
	}
}
