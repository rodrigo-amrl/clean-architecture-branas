<?php

namespace Src\Application\Repository;

use Src\Domain\Driver;

interface DriverRepository
{
	public function save(Driver $driver): void;
	public function get(string $driver_id): Driver;
}
