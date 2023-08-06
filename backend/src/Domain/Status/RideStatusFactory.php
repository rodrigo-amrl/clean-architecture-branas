<?php

namespace Src\Domain\Status;

use Exception;
use Src\Domain\Ride;

class RideStatusFactory
{
	public static function create(Ride $ride, string $status)
	{
		if ($status === "requested") {
			return new RequestedRideStatus($ride);
		}
		if ($status === "accepted") {
			return new AcceptedRideStatus($ride);
		}
		if ($status === "in_progress") {
			return new InProgressRideStatus($ride);
		}
		if ($status === "completed") {
			return new CompletedRideStatus($ride);
		}
		throw new Exception("Invalid status");
	}
}
