<?php

namespace Src\Domain\Status;

use Exception;
use Src\Domain\Ride;

class InProgressRideStatus extends RideStatus
{
	public string $value;

	public function __construct(protected Ride $ride)
	{
		parent::__construct($ride);
		$this->value =  "in_progress";
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
		$this->ride->status = new CompletedRideStatus($this->ride);
	}
}
