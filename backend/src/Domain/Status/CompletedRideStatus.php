<?php

namespace Src\Domain\Status;

use Exception;
use Src\Domain\Ride;

class CompletedRideStatus extends RideStatus
{
	public string $value;

	public function __construct(Ride $ride)
	{
		parent::__construct($ride);
		$this->value = "completed";
	}

	public function request(): void
	{
		throw new Exception("Invalid status");
	}

	public function accept(): void
	{
		throw new Exception("Invalid status");
	}

	public function start(): void
	{
		throw new Exception("Invalid status");
	}

	public function end(): void
	{
		throw new Exception("Invalid status");
	}
}
