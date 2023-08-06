<?php

namespace Src\Domain\Status;

use Exception;
use Src\Domain\Ride;

class AcceptedRideStatus extends RideStatus
{
	public string $value;

	public function __construct(protected Ride $ride)
	{
		parent::__construct($ride);
		$this->value = "accepted";
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
		$this->ride->status = new InProgressRideStatus($this->ride);
	}

	public function end(): void
	{
		throw new Exception("Invalid status");
	}
}
