<?php

namespace Src\Domain\Status;

use Exception;
use Src\Domain\Ride;

class RequestedRideStatus extends RideStatus
{
	public string $value;

	public function __construct(Ride $ride)
	{
		parent::__construct($ride);
		$this->value = "requested";
	}

	public function request(): void
	{
		throw new Exception("Invalid status");
	}

	public function accept(): void
	{
		$this->ride->status = new AcceptedRideStatus($this->ride);
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
