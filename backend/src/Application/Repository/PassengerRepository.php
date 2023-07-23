<?php

namespace Src\Application\Repository;

use Src\Domain\Passenger;

interface PassengerRepository
{
	public function save(Passenger $passenger): void;
	public function get(string $passenger_id): Passenger;
}
