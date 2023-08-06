<?php

namespace Src\Domain\Status;

use Src\Domain\Ride;

abstract class RideStatus
{
	public string  $value;

	public function __construct(protected readonly Ride $ride)
	{
	}

	abstract function request(): void;
	abstract function  accept(): void;
	abstract function  start(): void;
	abstract function  end(): void;
}
