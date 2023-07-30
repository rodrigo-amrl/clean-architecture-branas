<?php

namespace Src\Application\Repository;

use Src\Domain\Ride;

interface RideRepository
{
	public function save(Ride $ride): void;
	public function get(string $ride_id): Ride;
	public function update(Ride $ride): void;
}
