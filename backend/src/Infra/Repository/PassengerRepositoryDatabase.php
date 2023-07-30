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
			"insert into cccat12.passenger (passenger_id, name, email, document) values 
		($1, $2, $3, $4)",
			[$passenger->passengerId, $passenger->name, $passenger->email->value, $passenger->document->value]
		);
	}

	public function get(string $passenger_id): Passenger
	{
		$passenger_data = $this->connection->query("select * from cccat12.passenger where passenger_id = $1", [$passenger_id]);
		return new Passenger($passenger_data->passenger_id, $passenger_data->name, $passenger_data->email, $passenger_data->document);
	}
}
